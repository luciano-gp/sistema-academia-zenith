<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Estado Controller
 *
 * @property \App\Model\Table\EstadoTable $Estado
 */
class EstadoController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        try {
            $estados = $this->paginate($this->Estado->find());
            return $this->response->withType('application/json')->withStringBody(json_encode($estados));
        } catch (\Exception $e) {
            return $this->response->withStatus(500)
                ->withStringBody(json_encode([
                    "message" => "Erro ao buscar estados",
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
            $estados = $this->Estado->find('list')->toArray();
            return $this->response->withType('application/json')->withStringBody(json_encode($estados));
        } catch (\Exception $e) {
            return $this->response->withStatus(500)
                ->withStringBody(json_encode([
                    "message" => "Erro ao buscar estados",
                    "error" => $e->getMessage()
                ]));
        }
    }

    /**
     * View method
     *
     * @param string|null $id Estado id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        try {
            $estado = $this->Estado->get($id);
            return $this->response->withType('application/json')->withStringBody(json_encode($estado));
        } catch (\Exception $e) {
            return $this->response->withStatus(404)
                ->withStringBody(json_encode([
                    "message" => "Estado não encontrado",
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
        $estado = $this->Estado->newEmptyEntity();

        if ($this->request->is('post')) {
            try {
                $estado = $this->Estado->patchEntity($estado, $this->request->getData());

                $this->Estado->saveOrFail($estado);

                return $this->response->withType('application/json')
                    ->withStringBody(json_encode([
                        'message' => 'Estado adicionado com sucesso',
                        'estado' => $estado
                    ]));
            } catch (\Exception $e) {
                return $this->response->withStatus(400)->withType('application/json')
                    ->withStringBody(json_encode([
                        'message' => 'Erro ao adicionar estado',
                        'errors' => $e->getMessage()
                    ]));
            }
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Estado id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $estado = null;

        try {
            $estado = $this->Estado->get($id, contain: []);
        } catch (\Exception $e) {
            return $this->response->withStatus(404)
                ->withStringBody(json_encode([
                    "message" => "Estado não encontrado",
                    "error" => $e->getMessage()
                ]));
        }

        try {
            if ($this->request->is(['patch', 'post', 'put'])) {
                $estado = $this->Estado->patchEntity($estado, $this->request->getData());

                $this->Estado->saveOrFail($estado);

                return $this->response->withType('application/json')
                    ->withStringBody(json_encode([
                        'message' => 'Estado editado com sucesso',
                        'estado' => $estado
                    ]));
            }
        } catch (\Exception $e) {
            return $this->response->withStatus(400)
                ->withStringBody(json_encode([
                    "message" => "Erro ao editar estado",
                    "error" => $e->getMessage()
                ]));
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Estado id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $estado = null;

        try {
            $estado = $this->Estado->get($id, contain: []);
        } catch (\Exception $e) {
            return $this->response->withStatus(404)
                ->withStringBody(json_encode([
                    "message" => "Estado não encontrado",
                    "error" => $e->getMessage()
                ]));
        }

        try {
            $this->Estado->delete($estado);
            return $this->response->withType('application/json')
                ->withStringBody(json_encode([
                    'message' => 'Estado deletado com sucesso',
                    'estado' => $estado
                ]));
        } catch (\Exception $e) {
            return $this->response->withStatus(500)
                ->withStringBody(json_encode([
                    "message" => "Erro ao deletar estado",
                    "error" => $e->getMessage()
                ]));
        }
    }
}
