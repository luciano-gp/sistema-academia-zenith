<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Cidade Controller
 *
 * @property \App\Model\Table\CidadeTable $Cidade
 */
class CidadeController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        try {
            $cidades = $this->paginate($this->Cidade->find()->contain(['Estado']));
            return $this->response->withType('application/json')->withStringBody(json_encode($cidades));
        } catch (\Exception $e) {
            return $this->response->withStatus(500)
                ->withStringBody(json_encode([
                    "message" => "Erro ao buscar cidades",
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
            $cidades = $this->Cidade->find('list')->contain(['Estado'])->toArray();
            return $this->response->withType('application/json')->withStringBody(json_encode($cidades));
        } catch (\Exception $e) {
            return $this->response->withStatus(500)
                ->withStringBody(json_encode([
                    "message" => "Erro ao buscar cidades",
                    "error" => $e->getMessage()
                ]));
        }
    }

    /**
     * View method
     *
     * @param string|null $id Cidade id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        try {
            $cidade = $this->Cidade->get($id, contain:['Estado']);
            return $this->response->withType('application/json')->withStringBody(json_encode($cidade));
        } catch (\Exception $e) {
            return $this->response->withStatus(404)
                ->withStringBody(json_encode([
                    "message" => "Cidade não encontrada",
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
        $cidade = $this->Cidade->newEmptyEntity();

        if ($this->request->is('post')) {
            try {
                $cidade = $this->Cidade->patchEntity($cidade, $this->request->getData());

                $this->Cidade->saveOrFail($cidade);

                return $this->response->withType('application/json')
                    ->withStringBody(json_encode([
                        'message' => 'Cidade adicionada com sucesso',
                        'cidade' => $cidade
                    ]));
            } catch (\Exception $e) {
                return $this->response->withStatus(400)->withType('application/json')
                    ->withStringBody(json_encode([
                        'message' => 'Erro ao adicionar cidade',
                        'errors' => $e->getMessage()
                    ]));
            }
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Cidade id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cidade = null;

        try {
            $cidade = $this->Cidade->get($id, contain: ['Estado']);
        } catch (\Exception $e) {
            return $this->response->withStatus(404)
                ->withStringBody(json_encode([
                    "message" => "Cidade não encontrada",
                    "error" => $e->getMessage()
                ]));
        }

        try {
            if ($this->request->is(['patch', 'post', 'put'])) {
                $cidade = $this->Cidade->patchEntity($cidade, $this->request->getData());

                $this->Cidade->saveOrFail($cidade);

                return $this->response->withType('application/json')
                    ->withStringBody(json_encode([
                        'message' => 'Cidade editada com sucesso',
                        'cidade' => $cidade
                    ]));
            }
        } catch (\Exception $e) {
            return $this->response->withStatus(400)
                ->withStringBody(json_encode([
                    "message" => "Erro ao editar cidade",
                    "error" => $e->getMessage()
                ]));
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Cidade id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cidade = null;

        try {
            $cidade = $this->Cidade->get($id, contain: []);
        } catch (\Exception $e) {
            return $this->response->withStatus(404)
                ->withStringBody(json_encode([
                    "message" => "Cidade não encontrada",
                    "error" => $e->getMessage()
                ]));
        }

        try {
            $this->Cidade->delete($cidade);
            return $this->response->withType('application/json')
                ->withStringBody(json_encode([
                    'message' => 'Cidade deletada com sucesso',
                    'cidade' => $cidade
                ]));
        } catch (\Exception $e) {
            return $this->response->withStatus(500)
                ->withStringBody(json_encode([
                    "message" => "Erro ao deletar cidade",
                    "error" => $e->getMessage()
                ]));
        }
    }
}
