<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Pessoa Controller
 *
 * @property \App\Model\Table\PessoaTable $Pessoa
 */
class PessoaController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        try {
            $pessoas = $this->paginate($this->Pessoa->find());
            return $this->response->withType('application/json')->withStringBody(json_encode($pessoas));
        } catch (\Exception $e) {
            return $this->response->withStatus(500)
                ->withStringBody(json_encode([
                    "message" => "Erro ao buscar pessoas",
                    "error" => $e->getMessage()
                ]));
        }
    }

    /**
     * View method
     *
     * @param string|null $id Pessoa id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        try {
            $pessoa = $this->Pessoa->get($id, contain: ['Treino']);
            return $this->response->withType('application/json')->withStringBody(json_encode($pessoa));
        } catch (\Exception $e) {
            return $this->response->withStatus(404)
                ->withStringBody(json_encode([
                    "message" => "Pessoa não encontrada",
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
        $pessoa = $this->Pessoa->newEmptyEntity();

        if ($this->request->is('post')) {
            try {
                $pessoa = $this->Pessoa->patchEntity($pessoa, $this->request->getData());

                $this->Pessoa->save($pessoa);

                return $this->response->withType('application/json')
                    ->withStringBody(json_encode([
                        'message' => 'Pessoa adicionada com sucesso',
                        'pessoa' => $pessoa
                    ]));
            } catch (\Exception $e) {
                return $this->response->withStatus(400)->withType('application/json')
                    ->withStringBody(json_encode([
                        'message' => 'Erro ao adicionar pessoa',
                        'errors' => $e->getMessage()
                    ]));
            }
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Pessoa id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pessoa = null;

        try {
            $pessoa = $this->Pessoa->get($id, contain: ['Treino']);
        } catch (\Exception $e) {
            return $this->response->withStatus(404)
                ->withStringBody(json_encode([
                    "message" => "Pessoa não encontrada",
                    "error" => $e->getMessage()
                ]));
        }

        try {
            if ($this->request->is(['patch', 'post', 'put'])) {
                $pessoa = $this->Pessoa->patchEntity($pessoa, $this->request->getData());

                $this->Pessoa->save($pessoa);

                return $this->response->withType('application/json')
                    ->withStringBody(json_encode([
                        'message' => 'Pessoa editada com sucesso',
                        'pessoa' => $pessoa
                    ]));
            }
        } catch (\Exception $e) {
            return $this->response->withStatus(400)
                ->withStringBody(json_encode([
                    "message" => "Erro ao editar pessoa",
                    "error" => $e->getMessage()
                ]));
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Pessoa id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pessoa = null;

        try {
            $pessoa = $this->Pessoa->get($id, contain: []);
        } catch (\Exception $e) {
            return $this->response->withStatus(404)
                ->withStringBody(json_encode([
                    "message" => "Pessoa não encontrada",
                    "error" => $e->getMessage()
                ]));
        }

        try {
            $this->Pessoa->delete($pessoa);
            return $this->response->withType('application/json')
                ->withStringBody(json_encode([
                    'message' => 'Pessoa deletada com sucesso',
                    'pessoa' => $pessoa
                ]));
        } catch (\Exception $e) {
            return $this->response->withStatus(500)
                ->withStringBody(json_encode([
                    "message" => "Erro ao deletar pessoa",
                    "error" => $e->getMessage()
                ]));
        }
    }
}
