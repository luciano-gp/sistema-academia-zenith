<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Contrato Controller
 *
 * @property \App\Model\Table\ContratoTable $Contrato
 */
class ContratoController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        try {
            $contratos = $this->paginate($this->Contrato->find()->contain(['Plano', 'Pessoa', 'FormaPagamento', 'MotivoCancelamento', 'PessoaIndicacao', 'Titulo']));
            return $this->response->withType('application/json')->withStringBody(json_encode($contratos));
        } catch (\Exception $e) {
            return $this->response->withStatus(500)
                ->withStringBody(json_encode([
                    "message" => "Erro ao buscar contratos",
                    "error" => $e->getMessage()
                ]));
        }
    }

    /**
     * View method
     *
     * @param string|null $id Contrato id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        try {
            $contrato = $this->Contrato->get($id, contain: ['Plano', 'Pessoa', 'FormaPagamento', 'MotivoCancelamento', 'PessoaIndicacao', 'Titulo']);
            return $this->response->withType('application/json')->withStringBody(json_encode($contrato));
        } catch (\Exception $e) {
            return $this->response->withStatus(404)
                ->withStringBody(json_encode([
                    "message" => "Contrato não encontrado",
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
        $contrato = $this->Contrato->newEmptyEntity();

        if ($this->request->is('post')) {
            try {
                $contrato = $this->Contrato->patchEntity($contrato, $this->request->getData());

                $this->Contrato->saveOrFail($contrato);

                return $this->response->withType('application/json')
                    ->withStringBody(json_encode([
                        'message' => 'Contrato adicionado com sucesso',
                        'contrato' => $contrato
                    ]));
            } catch (\Exception $e) {
                return $this->response->withStatus(400)->withType('application/json')
                    ->withStringBody(json_encode([
                        'message' => 'Erro ao adicionar contrato',
                        'errors' => $e->getMessage()
                    ]));
            }
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Contrato id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $contrato = null;

        try {
            $contrato = $this->Contrato->get($id, contain: []);
        } catch (\Exception $e) {
            return $this->response->withStatus(404)
                ->withStringBody(json_encode([
                    "message" => "Contrato não encontrado",
                    "error" => $e->getMessage()
                ]));
        }

        try {
            if ($this->request->is(['patch', 'post', 'put'])) {
                $contrato = $this->Contrato->patchEntity($contrato, $this->request->getData());

                $this->Contrato->saveOrFail($contrato);

                return $this->response->withType('application/json')
                    ->withStringBody(json_encode([
                        'message' => 'Contrato editado com sucesso',
                        'contrato' => $contrato
                    ]));
            }
        } catch (\Exception $e) {
            return $this->response->withStatus(400)
                ->withStringBody(json_encode([
                    "message" => "Erro ao editar contrato",
                    "error" => $e->getMessage()
                ]));
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Contrato id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $contrato = null;

        try {
            $contrato = $this->Contrato->get($id, contain: []);
        } catch (\Exception $e) {
            return $this->response->withStatus(404)
                ->withStringBody(json_encode([
                    "message" => "Contrato não encontrado",
                    "error" => $e->getMessage()
                ]));
        }

        try {
            $this->Contrato->delete($contrato);
            return $this->response->withType('application/json')
                ->withStringBody(json_encode([
                    'message' => 'Contrato deletado com sucesso',
                    'contrato' => $contrato
                ]));
        } catch (\Exception $e) {
            return $this->response->withStatus(500)
                ->withStringBody(json_encode([
                    "message" => "Erro ao deletar contrato",
                    "error" => $e->getMessage()
                ]));
        }
    }
}
