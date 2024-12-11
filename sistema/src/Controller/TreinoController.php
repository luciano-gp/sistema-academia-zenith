<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * Treino Controller
 *
 * @property \App\Model\Table\TreinoTable $Treino
 */
class TreinoController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        try {
            $treinos = $this->paginate($this->Treino->find('all', [
                'contain' => ['Exercicio']
            ]));

            return $this->response->withType('application/json')->withStringBody(json_encode($treinos));
        } catch (\Exception $e) {
            return $this->response->withStatus(500)
                ->withStringBody(json_encode([
                    "message" => "Erro ao buscar treinos",
                    "error" => $e->getMessage()
                ]));
        }
    }

    /**
     * Listar method
     *
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function listar()
    {
        try {
            $treinos = $this->Treino->find('list')->toArray();
            return $this->response->withType('application/json')->withStringBody(json_encode($treinos));
        } catch (\Exception $e) {
            return $this->response->withStatus(500)
                ->withStringBody(json_encode([
                    "message" => "Erro ao buscar treinos",
                    "error" => $e->getMessage()
                ]));
        }
    }

    /**
     * View method
     *
     * @param string|null $id Treino id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        try {
            $treino = $this->Treino->get($id, contain: ['Exercicio']);
            return $this->response->withType('application/json')->withStringBody(json_encode($treino));
        } catch (\Exception $e) {
            return $this->response->withStatus(404)
                ->withStringBody(json_encode([
                    "message" => "Treino não encontrado",
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

        // Cria uma nova entidade para o treino
        $treino = $this->Treino->newEntity([
            'descricao' => $data['descricao'],
            'exercicio' => array_map(function ($exercicio) {
                return [
                    'id' => $exercicio['ref_exercicio'],
                    '_joinData' => [
                        'num_series' => $exercicio['num_series'],
                        'num_repeticoes' => $exercicio['num_repeticoes'],
                        'carga' => $exercicio['carga'],
                        'observacao' => $exercicio['observacao']
                    ]
                ];
            }, $data['exercicio'])
        ], ['associated' => ['Exercicio']]);

        if ($this->Treino->save($treino)) {
            return $this->response->withType('application/json')
                ->withStringBody(json_encode([
                    'message' => 'Treino adicionado com sucesso',
                    'treino' => $treino
                ]));
        }

        return $this->response->withStatus(400)
            ->withStringBody(json_encode([
                'message' => 'Erro ao salvar o treino',
                'errors' => $treino->getErrors()
            ]));
    }

    /**
     * Edit method
     *
     * @param string|null $id Treino id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id)
    {
        $this->request->allowMethod(['put', 'patch']);

        $data = $this->request->getData();

        $treino = $this->Treino->get($id, [
            'contain' => ['Exercicio']
        ]);

        if (!$treino) {
            return $this->response->withStatus(404)
                ->withStringBody(json_encode([
                    'message' => 'Treino não encontrado'
                ]));
        }

        $treino = $this->Treino->patchEntity($treino, [
            'descricao' => $data['descricao'],
            'exercicio' => array_map(function ($exercicio) {
                return [
                    'id' => $exercicio['ref_exercicio'],
                    '_joinData' => [
                        'num_series' => $exercicio['num_series'],
                        'num_repeticoes' => $exercicio['num_repeticoes'],
                        'carga' => $exercicio['carga'],
                        'observacao' => $exercicio['observacao']
                    ]
                ];
            }, $data['exercicio'])
        ], ['associated' => ['Exercicio']]);

        if ($this->Treino->save($treino)) {
            return $this->response->withType('application/json')
                ->withStringBody(json_encode([
                    'message' => 'Treino atualizado com sucesso',
                    'treino' => $treino
                ]));
        }

        return $this->response->withStatus(400)
            ->withStringBody(json_encode([
                'message' => 'Erro ao atualizar o treino',
                'errors' => $treino->getErrors()
            ]));
    }

    /**
     * Delete method
     *
     * @param string|null $id Treino id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $treino = null;

        try {
            $treino = $this->Treino->get($id, contain: ['Exercicio']);
        } catch (\Exception $e) {
            return $this->response->withStatus(404)
                ->withStringBody(json_encode([
                    "message" => "Treino não encontrado",
                    "error" => $e->getMessage()
                ]));
        }

        try {
            $this->Treino->delete($treino);
            return $this->response->withType('application/json')
                ->withStringBody(json_encode([
                    'message' => 'Treino deletado com sucesso',
                    'treino' => $treino
                ]));
        } catch (\Exception $e) {
            return $this->response->withStatus(500)
                ->withStringBody(json_encode([
                    "message" => "Erro ao deletar treino",
                    "error" => $e->getMessage()
                ]));
        }
    }
}
