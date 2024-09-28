<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * FormaPagamento Controller
 *
 * @property \App\Model\Table\FormaPagamentoTable $FormaPagamento
 */
class FormaPagamentoController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        try {
            $formaPagamentos = $this->paginate($this->FormaPagamento->find());
            return $this->response->withType('application/json')->withStringBody(json_encode($formaPagamentos));
        } catch (\Exception $e) {
            return $this->response->withStatus(500)
                ->withStringBody(json_encode([
                    "message" => "Erro ao buscar formas de pagamento",
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
            $formaPagamentos = $this->FormaPagamento->find('list')->toArray();
            return $this->response->withType('application/json')->withStringBody(json_encode($formaPagamentos));
        } catch (\Exception $e) {
            return $this->response->withStatus(500)
                ->withStringBody(json_encode([
                    "message" => "Erro ao buscar formas de pagamento",
                    "error" => $e->getMessage()
                ]));
        }
    }

    /**
     * View method
     *
     * @param string|null $id Forma Pagamento id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        try {
            $formaPagamento = $this->FormaPagamento->get($id);
            return $this->response->withType('application/json')->withStringBody(json_encode($formaPagamento));
        } catch (\Exception $e) {
            return $this->response->withStatus(404)
                ->withStringBody(json_encode([
                    "message" => "Forma de pagamento não encontrada",
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
        $formaPagamento = $this->FormaPagamento->newEmptyEntity();

        if ($this->request->is('post')) {
            try {
                $formaPagamento = $this->FormaPagamento->patchEntity($formaPagamento, $this->request->getData());

                $this->FormaPagamento->saveOrFail($formaPagamento);

                return $this->response->withType('application/json')
                    ->withStringBody(json_encode([
                        'message' => 'Forma de pagamento adicionada com sucesso',
                        'forma_pagamento' => $formaPagamento
                    ]));
            } catch (\Exception $e) {
                return $this->response->withStatus(400)->withType('application/json')
                    ->withStringBody(json_encode([
                        'message' => 'Erro ao adicionar forma de pagamento',
                        'errors' => $e->getMessage()
                    ]));
            }
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Forma Pagamento id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $formaPagamento = null;

        try {
            $formaPagamento = $this->FormaPagamento->get($id, contain: []);
        } catch (\Exception $e) {
            return $this->response->withStatus(404)
                ->withStringBody(json_encode([
                    "message" => "Forma de pagamento não encontrada",
                    "error" => $e->getMessage()
                ]));
        }

        try {
            if ($this->request->is(['patch', 'post', 'put'])) {
                $formaPagamento = $this->FormaPagamento->patchEntity($formaPagamento, $this->request->getData());

                $this->FormaPagamento->saveOrFail($formaPagamento);

                return $this->response->withType('application/json')
                    ->withStringBody(json_encode([
                        'message' => 'Forma de pagamento editada com sucesso',
                        'forma_pagamento' => $formaPagamento
                    ]));
            }
        } catch (\Exception $e) {
            return $this->response->withStatus(400)
                ->withStringBody(json_encode([
                    "message" => "Erro ao editar forma de pagamento",
                    "error" => $e->getMessage()
                ]));
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Forma Pagamento id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $formaPagamento = null;

        try {
            $formaPagamento = $this->FormaPagamento->get($id, contain: []);
        } catch (\Exception $e) {
            return $this->response->withStatus(404)
                ->withStringBody(json_encode([
                    "message" => "Forma de pagamento não encontrada",
                    "error" => $e->getMessage()
                ]));
        }

        try {
            $this->FormaPagamento->delete($formaPagamento);
            return $this->response->withType('application/json')
                ->withStringBody(json_encode([
                    'message' => 'Forma de Pagamento deletada com sucesso',
                    'forma_pagamento' => $formaPagamento
                ]));
        } catch (\Exception $e) {
            return $this->response->withStatus(500)
                ->withStringBody(json_encode([
                    "message" => "Erro ao deletar forma de pagamento",
                    "error" => $e->getMessage()
                ]));
        }
    }
}
