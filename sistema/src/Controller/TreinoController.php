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
            $treinos = $this->paginate($this->Treino->find()->contain(['Exercicio', 'Pessoa']));
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
     * Listar Por Pessoa method
     *
     * @param string|null $ref_pessoa Pessoa id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function listar_por_pessoa($ref_pessoa = null)
    {
        try {
            $treinos = $this->Treino->find()->where(['Treino.ref_pessoa' => $ref_pessoa])->contain(['Exercicio', 'Pessoa'])->toArray();
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
            $treino = $this->Treino->get($id, contain: ['Exercicio', 'Pessoa']);
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
        $treino = $this->Treino->newEmptyEntity();

        if ($this->request->is('post')) {
            try {
                $treino = $this->Treino->patchEntity($treino, $this->request->getData());

                $this->Treino->saveOrFail($treino);

                return $this->response->withType('application/json')
                    ->withStringBody(json_encode([
                        'message' => 'Treino adicionado com sucesso',
                        'treino' => $treino
                    ]));
            } catch (\Exception $e) {
                return $this->response->withStatus(400)->withType('application/json')
                    ->withStringBody(json_encode([
                        'message' => 'Erro ao adicionar treino',
                        'errors' => $e->getMessage()
                    ]));
            }
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Treino id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $treino = null;

        try {
            $treino = $this->Treino->get($id, contain: []);
        } catch (\Exception $e) {
            return $this->response->withStatus(404)
                ->withStringBody(json_encode([
                    "message" => "Treino não encontrado",
                    "error" => $e->getMessage()
                ]));
        }

        try {
            if ($this->request->is(['patch', 'post', 'put'])) {
                $treino = $this->Treino->patchEntity($treino, $this->request->getData());

                $this->Treino->saveOrFail($treino);

                return $this->response->withType('application/json')
                    ->withStringBody(json_encode([
                        'message' => 'Treino editado com sucesso',
                        'treino' => $treino
                    ]));
            }
        } catch (\Exception $e) {
            return $this->response->withStatus(400)
                ->withStringBody(json_encode([
                    "message" => "Erro ao editar treino",
                    "error" => $e->getMessage()
                ]));
        }
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
            $treino = $this->Treino->get($id, contain: []);
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
