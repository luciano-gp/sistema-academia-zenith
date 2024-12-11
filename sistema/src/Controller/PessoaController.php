<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * Pessoa Controller
 *
 * @property \App\Model\Table\PessoaTable $Pessoa
 */
class PessoaController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        try {
            $pessoas = $this->paginate($this->Pessoa->find()->contain(['Cidade', 'Usuario']));
            return $this->response->withType('application/json')->withStringBody(json_encode($pessoas));
        } catch (\Exception $e) {
            return $this->response->withStatus(500)
                ->withStringBody(json_encode([
                    "message" => "Erro ao buscar pessoas",
                    "error" => $e->getMessage()
                ]));
        }
    }

    /**
     * View method
     *
     * @param string|null $id Pessoa id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        try {
            $pessoa = $this->Pessoa->get($id, contain: ['Cidade', 'Usuario', 'Treino', 'Exercicio']);
            return $this->response->withType('application/json')->withStringBody(json_encode($pessoa));
        } catch (\Exception $e) {
            return $this->response->withStatus(404)
                ->withStringBody(json_encode([
                    "message" => "Pessoa não encontrada",
                    "error" => $e->getMessage()
                ]));
        }
    }

    /**
     * ByUserId method
     *
     * @param string|null $id Usuario id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function byUserId($id)
    {
        try {
            $pessoa = $this->Pessoa
                ->find()
                ->where(['ref_usuario' => $id])
                ->contain(['Cidade', 'Usuario', 'Treino' => ['Exercicio']])
                ->firstOrFail();
            return $this->response->withType('application/json')->withStringBody(json_encode([
                "person" => $pessoa
            ]));
        } catch (\Exception $e) {
            return $this->response->withStatus(404)
                ->withStringBody(json_encode([
                    "message" => "Pessoa não encontrada",
                    "error" => $e->getMessage()
                ]));
        }
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->request->allowMethod(['post']);

        $data = $this->request->getData();

        $pessoa = $this->Pessoa->newEntity([
            'nome' => $data['nome'],
            'dt_nascimento' => $data['dt_nascimento'],
            'cpf' => $data['cpf'],
            'endereco' => $data['endereco'],
            'telefone' => $data['telefone'],
            'genero' => $data['genero'],
            'ref_cidade' => $data['ref_cidade'],
            'ref_usuario' => $data['ref_usuario'],
            'treino' => array_map(function ($treino) {
                return [
                    'id' => $treino['ref_treino'],
                    '_joinData' => [
                        'dt_inicial' => $treino['dt_inicial'],
                        'dt_final' => $treino['dt_final'] ?? null,
                    ]
                ];
            }, $data['treino'] ?? [])
        ], ['associated' => ['Treino']]);

        if ($this->Pessoa->save($pessoa)) {
            return $this->response->withType('application/json')
                ->withStringBody(json_encode([
                    'message' => 'Pessoa adicionada com sucesso',
                    'pessoa' => $pessoa
                ]));
        }

        return $this->response->withStatus(400)
            ->withStringBody(json_encode([
                'message' => 'Erro ao salvar a pessoa',
                'errors' => $pessoa->getErrors()
            ]));
    }


    /**
     * Edit method
     *
     * @param string|null $id Pessoa id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id)
    {
        $this->request->allowMethod(['put', 'patch']);

        $data = $this->request->getData();

        $pessoa = $this->Pessoa->get($id, [
            'contain' => ['Treino', 'Usuario', 'Cidade']
        ]);

        if (!$pessoa) {
            return $this->response->withStatus(404)
                ->withStringBody(json_encode([
                    'message' => 'Pessoa não encontrada'
                ]));
        }

        $pessoa = $this->Pessoa->patchEntity($pessoa, [
            'nome' => $data['nome'],
            'dt_nascimento' => $data['dt_nascimento'],
            'cpf' => $data['cpf'],
            'endereco' => $data['endereco'] ?? '',
            'telefone' => $data['telefone'],
            'genero' => $data['genero'] ?? null,
            'ref_cidade' => $data['ref_cidade'],
            'ref_usuario' => $data['ref_usuario'],
            'treino' => array_map(function ($treino) {
                return [
                    'id' => $treino['ref_treino'],
                    '_joinData' => [
                        'dt_inicial' => $treino['dt_inicial'],
                        'dt_final' => $treino['dt_final'] ?? null,
                    ]
                ];
            }, $data['treino'] ?? [])
        ], ['associated' => ['Treino']]);

        if ($this->Pessoa->save($pessoa)) {
            return $this->response->withType('application/json')
                ->withStringBody(json_encode([
                    'message' => 'Pessoa atualizada com sucesso',
                    'pessoa' => $pessoa
                ]));
        }

        return $this->response->withStatus(400)
            ->withStringBody(json_encode([
                'message' => 'Erro ao atualizar a pessoa',
                'errors' => $pessoa->getErrors()
            ]));
    }


    /**
     * Delete method
     *
     * @param string|null $id Pessoa id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pessoa = null;

        try {
            $pessoa = $this->Pessoa->get($id, contain: ['Cidade', 'Usuario']);
        } catch (\Exception $e) {
            return $this->response->withStatus(404)
                ->withStringBody(json_encode([
                    "message" => "Pessoa não encontrada",
                    "error" => $e->getMessage()
                ]));
        }

        try {
            $this->Pessoa->delete($pessoa);
            return $this->response->withType('application/json')
                ->withStringBody(json_encode([
                    'message' => 'Pessoa deletada com sucesso',
                    'pessoa' => $pessoa
                ]));
        } catch (\Exception $e) {
            return $this->response->withStatus(500)
                ->withStringBody(json_encode([
                    "message" => "Erro ao deletar pessoa",
                    "error" => $e->getMessage()
                ]));
        }
    }
}
