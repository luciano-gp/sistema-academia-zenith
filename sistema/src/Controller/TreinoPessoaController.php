<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Datasource\EntityInterface;

/**
 * TreinoPessoa Controller
 *
 * @property \App\Model\Table\TreinoPessoaTable $TreinoPessoa
 */
class TreinoPessoaController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        try {
            $treinosPessoas = $this->paginate($this->TreinoPessoa->find());
            return $this->response->withType('application/json')->withStringBody(json_encode($treinosPessoas));
        } catch (\Exception $e) {
            return $this->response->withStatus(500)
                ->withStringBody(json_encode([
                    "message" => "Erro ao buscar treinosPessoas",
                    "error" => $e->getMessage()
                ]));
        }
    }

    /**
     * View method
     *
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($ref_treino = null, $ref_pessoa = null)
    {
        try {
            $treinoPessoa = $this->TreinoPessoa->find()->where(['ref_treino' => $ref_treino, 'ref_pessoa' => $ref_pessoa])->firstOrFail()->toArray();
            return $this->response->withType('application/json')->withStringBody(json_encode($treinoPessoa));
        } catch (\Exception $e) {
            return $this->response->withStatus(404)
                ->withStringBody(json_encode([
                    "message" => "TreinoPessoa não encontrado",
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
        $treinoPessoa = $this->TreinoPessoa->newEmptyEntity();

        if ($this->request->is('post')) {
            try {
                $treinoPessoa = $this->TreinoPessoa->patchEntity($treinoPessoa, $this->request->getData());

                $this->TreinoPessoa->saveOrFail($treinoPessoa);

                return $this->response->withType('application/json')
                    ->withStringBody(json_encode([
                        'message' => 'TreinoPessoa adicionado com sucesso',
                        'treino_pessoa' => $treinoPessoa
                    ]));
            } catch (\Exception $e) {
                return $this->response->withStatus(400)->withType('application/json')
                    ->withStringBody(json_encode([
                        'message' => 'Erro ao adicionar treinoPessoa',
                        'errors' => $e->getMessage()
                    ]));
            }
        }
    }

    /**
     * Edit method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($ref_treino = null, $ref_pessoa = null)
    {
        $treinoPessoa = null;

        try {
            /** @var EntityInterface $treinoPessoa */
            $treinoPessoa = $this->TreinoPessoa->find()->where(['ref_treino' => $ref_treino, 'ref_pessoa' => $ref_pessoa])->firstOrFail();
        } catch (\Exception $e) {
            return $this->response->withStatus(404)
                ->withStringBody(json_encode([
                    "message" => "TreinoPessoa não encontrado",
                    "error" => $e->getMessage()
                ]));
        }

        try {
            if ($this->request->is(['patch', 'post', 'put'])) {
                $treinoPessoa = $this->TreinoPessoa->patchEntity($treinoPessoa, $this->request->getData());

                $this->TreinoPessoa->saveOrFail($treinoPessoa);

                return $this->response->withType('application/json')
                    ->withStringBody(json_encode([
                        'message' => 'TreinoPessoa editado com sucesso',
                        'treino_pessoa' => $treinoPessoa
                    ]));
            }
        } catch (\Exception $e) {
            return $this->response->withStatus(400)
                ->withStringBody(json_encode([
                    "message" => "Erro ao editar treinoPessoa",
                    "error" => $e->getMessage()
                ]));
        }
    }

    /**
     * Delete method
     *
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($ref_treino = null, $ref_pessoa = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $treinoPessoa = null;

        try {
            /** @var EntityInterface $treinoPessoa */
            $treinoPessoa = $this->TreinoPessoa->find()->where(['ref_treino' => $ref_treino, 'ref_pessoa' => $ref_pessoa])->firstOrFail();
        } catch (\Exception $e) {
            return $this->response->withStatus(404)
                ->withStringBody(json_encode([
                    "message" => "TreinoPessoa não encontrado",
                    "error" => $e->getMessage()
                ]));
        }

        try {
            $this->TreinoPessoa->delete($treinoPessoa);
            return $this->response->withType('application/json')
                ->withStringBody(json_encode([
                    'message' => 'TreinoPessoa deletado com sucesso',
                    'treino_pessoa' => $treinoPessoa
                ]));
        } catch (\Exception $e) {
            return $this->response->withStatus(500)
                ->withStringBody(json_encode([
                    "message" => "Erro ao deletar treinoPessoa",
                    "error" => $e->getMessage()
                ]));
        }
    }
}
