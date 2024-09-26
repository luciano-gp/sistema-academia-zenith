<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * MotivoCancelamento Controller
 *
 * @property \App\Model\Table\MotivoCancelamentoTable $MotivoCancelamento
 */
class MotivoCancelamentoController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        try {
            $motivoCancelamentos = $this->paginate($this->MotivoCancelamento->find());
            return $this->response->withType('application/json')->withStringBody(json_encode($motivoCancelamentos));
        } catch (\Exception $e) {
            return $this->response->withStatus(500)
                ->withStringBody(json_encode([
                    "message" => "Erro ao buscar motivos de cancelamento",
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
            $motivoCancelamentos = $this->MotivoCancelamento->find('list')->toArray();
            return $this->response->withType('application/json')->withStringBody(json_encode($motivoCancelamentos));
        } catch (\Exception $e) {
            return $this->response->withStatus(500)
                ->withStringBody(json_encode([
                    "message" => "Erro ao buscar motivos de cancelamento",
                    "error" => $e->getMessage()
                ]));
        }
    }

    /**
     * View method
     *
     * @param string|null $id Motivo Cancelamento id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        try {
            $motivoCancelamento = $this->MotivoCancelamento->get($id);
            return $this->response->withType('application/json')->withStringBody(json_encode($motivoCancelamento));
        } catch (\Exception $e) {
            return $this->response->withStatus(404)
                ->withStringBody(json_encode([
                    "message" => "Motivo de cancelamento não encontrado",
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
        $motivoCancelamento = $this->MotivoCancelamento->newEmptyEntity();

        if ($this->request->is('post')) {
            try {
                $motivoCancelamento = $this->MotivoCancelamento->patchEntity($motivoCancelamento, $this->request->getData());

                $this->MotivoCancelamento->saveOrFail($motivoCancelamento);

                return $this->response->withType('application/json')
                    ->withStringBody(json_encode([
                        'message' => 'Motivo de cancelamento adicionado com sucesso',
                        'motivo_cancelamento' => $motivoCancelamento
                    ]));
            } catch (\Exception $e) {
                return $this->response->withStatus(400)->withType('application/json')
                    ->withStringBody(json_encode([
                        'message' => 'Erro ao adicionar motivo de cancelamento',
                        'errors' => $e->getMessage()
                    ]));
            }
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Motivo Cancelamento id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $motivoCancelamento = null;

        try {
            $motivoCancelamento = $this->MotivoCancelamento->get($id, contain: []);
        } catch (\Exception $e) {
            return $this->response->withStatus(404)
                ->withStringBody(json_encode([
                    "message" => "MotivoCancelamento não encontrado",
                    "error" => $e->getMessage()
                ]));
        }

        try {
            if ($this->request->is(['patch', 'post', 'put'])) {
                $motivoCancelamento = $this->MotivoCancelamento->patchEntity($motivoCancelamento, $this->request->getData());

                $this->MotivoCancelamento->saveOrFail($motivoCancelamento);

                return $this->response->withType('application/json')
                    ->withStringBody(json_encode([
                        'message' => 'Motivo de cancelamento editado com sucesso',
                        'motivo_cancelamento' => $motivoCancelamento
                    ]));
            }
        } catch (\Exception $e) {
            return $this->response->withStatus(400)
                ->withStringBody(json_encode([
                    "message" => "Erro ao editar motivo de cancelamento",
                    "error" => $e->getMessage()
                ]));
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Motivo Cancelamento id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $motivoCancelamento = null;

        try {
            $motivoCancelamento = $this->MotivoCancelamento->get($id, contain: []);
        } catch (\Exception $e) {
            return $this->response->withStatus(404)
                ->withStringBody(json_encode([
                    "message" => "Motivo de cancelamento não encontrado",
                    "error" => $e->getMessage()
                ]));
        }

        try {
            $this->MotivoCancelamento->delete($motivoCancelamento);
            return $this->response->withType('application/json')
                ->withStringBody(json_encode([
                    'message' => 'Motivo de cancelamento deletado com sucesso',
                    'motivo_cancelamento' => $motivoCancelamento
                ]));
        } catch (\Exception $e) {
            return $this->response->withStatus(500)
                ->withStringBody(json_encode([
                    "message" => "Erro ao deletar motivo de cancelamento",
                    "error" => $e->getMessage()
                ]));
        }
    }
}
