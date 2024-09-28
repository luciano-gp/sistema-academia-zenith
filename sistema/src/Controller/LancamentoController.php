<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Lancamento Controller
 *
 * @property \App\Model\Table\LancamentoTable $Lancamento
 */
class LancamentoController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        try {
            $lancamentos = $this->paginate($this->Lancamento->find()->contain(['Historico', 'Titulo']));
            return $this->response->withType('application/json')->withStringBody(json_encode($lancamentos));
        } catch (\Exception $e) {
            return $this->response->withStatus(500)
                ->withStringBody(json_encode([
                    "message" => "Erro ao buscar lançamentos",
                    "error" => $e->getMessage()
                ]));
        }
    }

    /**
     * View method
     *
     * @param string|null $id Lancamento id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        try {
            $lancamento = $this->Lancamento->get($id, contain: ['Historico', 'Titulo']);
            return $this->response->withType('application/json')->withStringBody(json_encode($lancamento));
        } catch (\Exception $e) {
            return $this->response->withStatus(404)
                ->withStringBody(json_encode([
                    "message" => "Lançamento não encontrado",
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
        $lancamento = $this->Lancamento->newEmptyEntity();

        if ($this->request->is('post')) {
            try {
                $lancamento = $this->Lancamento->patchEntity($lancamento, $this->request->getData());

                $this->Lancamento->saveOrFail($lancamento);

                return $this->response->withType('application/json')
                    ->withStringBody(json_encode([
                        'message' => 'Lançamento adicionado com sucesso',
                        'lancamento' => $lancamento
                    ]));
            } catch (\Exception $e) {
                return $this->response->withStatus(400)->withType('application/json')
                    ->withStringBody(json_encode([
                        'message' => 'Erro ao adicionar lançamento',
                        'errors' => $e->getMessage()
                    ]));
            }
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Lancamento id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $lancamento = null;

        try {
            $lancamento = $this->Lancamento->get($id, contain: []);
        } catch (\Exception $e) {
            return $this->response->withStatus(404)
                ->withStringBody(json_encode([
                    "message" => "Lançamento não encontrado",
                    "error" => $e->getMessage()
                ]));
        }

        try {
            if ($this->request->is(['patch', 'post', 'put'])) {
                $lancamento = $this->Lancamento->patchEntity($lancamento, $this->request->getData());

                $this->Lancamento->saveOrFail($lancamento);

                return $this->response->withType('application/json')
                    ->withStringBody(json_encode([
                        'message' => 'Lançamento editado com sucesso',
                        'lancamento' => $lancamento
                    ]));
            }
        } catch (\Exception $e) {
            return $this->response->withStatus(400)
                ->withStringBody(json_encode([
                    "message" => "Erro ao editar lançamento",
                    "error" => $e->getMessage()
                ]));
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Lancamento id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $lancamento = null;

        try {
            $lancamento = $this->Lancamento->get($id, contain: []);
        } catch (\Exception $e) {
            return $this->response->withStatus(404)
                ->withStringBody(json_encode([
                    "message" => "Lançamento não encontrado",
                    "error" => $e->getMessage()
                ]));
        }

        try {
            $this->Lancamento->delete($lancamento);
            return $this->response->withType('application/json')
                ->withStringBody(json_encode([
                    'message' => 'Lançamento deletado com sucesso',
                    'lancamento' => $lancamento
                ]));
        } catch (\Exception $e) {
            return $this->response->withStatus(500)
                ->withStringBody(json_encode([
                    "message" => "Erro ao deletar lançamento",
                    "error" => $e->getMessage()
                ]));
        }
    }
}
