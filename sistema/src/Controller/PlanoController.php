<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Plano Controller
 *
 * @property \App\Model\Table\PlanoTable $Plano
 */
class PlanoController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        try {
            $planos = $this->paginate($this->Plano->find()->contain(['Historico']));
            return $this->response->withType('application/json')->withStringBody(json_encode($planos));
        } catch (\Exception $e) {
            return $this->response->withStatus(500)
                ->withStringBody(json_encode([
                    "message" => "Erro ao buscar planos",
                    "error" => $e->getMessage()
                ]));
        }
    }

    /**
     * Listar method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function listar()
    {
        try {
            $planos = $this->Plano->find('list')->toArray();
            return $this->response->withType('application/json')->withStringBody(json_encode($planos));
        } catch (\Exception $e) {
            return $this->response->withStatus(500)
                ->withStringBody(json_encode([
                    "message" => "Erro ao buscar planos",
                    "error" => $e->getMessage()
                ]));
        }
    }

    /**
     * View method
     *
     * @param string|null $id Plano id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        try {
            $plano = $this->Plano->get($id, contain: ['Historico']);
            return $this->response->withType('application/json')->withStringBody(json_encode($plano));
        } catch (\Exception $e) {
            return $this->response->withStatus(404)
                ->withStringBody(json_encode([
                    "message" => "Plano não encontrado",
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
        $plano = $this->Plano->newEmptyEntity();

        if ($this->request->is('post')) {
            try {
                $plano = $this->Plano->patchEntity($plano, $this->request->getData());

                $this->Plano->saveOrFail($plano);

                return $this->response->withType('application/json')
                    ->withStringBody(json_encode([
                        'message' => 'Plano adicionado com sucesso',
                        'plano' => $plano
                    ]));
            } catch (\Exception $e) {
                return $this->response->withStatus(400)->withType('application/json')
                    ->withStringBody(json_encode([
                        'message' => 'Erro ao adicionar plano',
                        'errors' => $e->getMessage()
                    ]));
            }
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Plano id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $plano = null;

        try {
            $plano = $this->Plano->get($id, contain: []);
        } catch (\Exception $e) {
            return $this->response->withStatus(404)
                ->withStringBody(json_encode([
                    "message" => "Plano não encontrado",
                    "error" => $e->getMessage()
                ]));
        }

        try {
            if ($this->request->is(['patch', 'post', 'put'])) {
                $plano = $this->Plano->patchEntity($plano, $this->request->getData());

                $this->Plano->saveOrFail($plano);

                return $this->response->withType('application/json')
                    ->withStringBody(json_encode([
                        'message' => 'Plano editado com sucesso',
                        'plano' => $plano
                    ]));
            }
        } catch (\Exception $e) {
            return $this->response->withStatus(400)
                ->withStringBody(json_encode([
                    "message" => "Erro ao editar plano",
                    "error" => $e->getMessage()
                ]));
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Plano id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $plano = null;

        try {
            $plano = $this->Plano->get($id, contain: []);
        } catch (\Exception $e) {
            return $this->response->withStatus(404)
                ->withStringBody(json_encode([
                    "message" => "Plano não encontrado",
                    "error" => $e->getMessage()
                ]));
        }

        try {
            $this->Plano->delete($plano);
            return $this->response->withType('application/json')
                ->withStringBody(json_encode([
                    'message' => 'Plano deletado com sucesso',
                    'plano' => $plano
                ]));
        } catch (\Exception $e) {
            return $this->response->withStatus(500)
                ->withStringBody(json_encode([
                    "message" => "Erro ao deletar plano",
                    "error" => $e->getMessage()
                ]));
        }
    }
}
