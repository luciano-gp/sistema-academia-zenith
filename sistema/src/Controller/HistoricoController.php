<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Historico Controller
 *
 * @property \App\Model\Table\HistoricoTable $Historico
 */
class HistoricoController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        try {
            $historicos = $this->paginate($this->Historico->find());
            return $this->response->withType('application/json')->withStringBody(json_encode($historicos));
        } catch (\Exception $e) {
            return $this->response->withStatus(500)
                ->withStringBody(json_encode([
                    "message" => "Erro ao buscar historicos",
                    "error" => $e->getMessage()
                ]));
        }
    }

    /**
     * View method
     *
     * @param string|null $id Historico id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        try {
            $historico = $this->Historico->get($id);
            return $this->response->withType('application/json')->withStringBody(json_encode($historico));
        } catch (\Exception $e) {
            return $this->response->withStatus(404)
                ->withStringBody(json_encode([
                    "message" => "Historico não encontrado",
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
        $historico = $this->Historico->newEmptyEntity();

        if ($this->request->is('post')) {
            try {
                $historico = $this->Historico->patchEntity($historico, $this->request->getData());

                $this->Historico->saveOrFail($historico);

                return $this->response->withType('application/json')
                    ->withStringBody(json_encode([
                        'message' => 'Historico adicionado com sucesso',
                        'historico' => $historico
                    ]));
            } catch (\Exception $e) {
                return $this->response->withStatus(400)->withType('application/json')
                    ->withStringBody(json_encode([
                        'message' => 'Erro ao adicionar historico',
                        'errors' => $e->getMessage()
                    ]));
            }
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Historico id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $historico = null;

        try {
            $historico = $this->Historico->get($id);
        } catch (\Exception $e) {
            return $this->response->withStatus(404)
                ->withStringBody(json_encode([
                    "message" => "Historico não encontrado",
                    "error" => $e->getMessage()
                ]));
        }

        try {
            if ($this->request->is(['patch', 'post', 'put'])) {
                $historico = $this->Historico->patchEntity($historico, $this->request->getData());

                $this->Historico->saveOrFail($historico);

                return $this->response->withType('application/json')
                    ->withStringBody(json_encode([
                        'message' => 'Historico editado com sucesso',
                        'historico' => $historico
                    ]));
            }
        } catch (\Exception $e) {
            return $this->response->withStatus(400)
                ->withStringBody(json_encode([
                    "message" => "Erro ao editar historico",
                    "error" => $e->getMessage()
                ]));
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Historico id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $historico = null;

        try {
            $historico = $this->Historico->get($id);
        } catch (\Exception $e) {
            return $this->response->withStatus(404)
                ->withStringBody(json_encode([
                    "message" => "Historico não encontrado",
                    "error" => $e->getMessage()
                ]));
        }

        try {
            $this->Historico->delete($historico);
            return $this->response->withType('application/json')
                ->withStringBody(json_encode([
                    'message' => 'Historico deletado com sucesso',
                    'historico' => $historico
                ]));
        } catch (\Exception $e) {
            return $this->response->withStatus(500)
                ->withStringBody(json_encode([
                    "message" => "Erro ao deletar historico",
                    "error" => $e->getMessage()
                ]));
        }
    }
}
