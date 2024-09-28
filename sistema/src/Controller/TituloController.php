<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Titulo Controller
 *
 * @property \App\Model\Table\TituloTable $Titulo
 */
class TituloController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        try {
            $titulos = $this->paginate($this->Titulo->find()->contain(['Contrato']));
            return $this->response->withType('application/json')->withStringBody(json_encode($titulos));
        } catch (\Exception $e) {
            return $this->response->withStatus(500)
                ->withStringBody(json_encode([
                    "message" => "Erro ao buscar títulos",
                    "error" => $e->getMessage()
                ]));
        }
    }

    /**
     * View method
     *
     * @param string|null $id Titulo id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        try {
            $titulo = $this->Titulo->get($id, contain: ['Contrato']);
            return $this->response->withType('application/json')->withStringBody(json_encode($titulo));
        } catch (\Exception $e) {
            return $this->response->withStatus(404)
                ->withStringBody(json_encode([
                    "message" => "Título não encontrado",
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
        $titulo = $this->Titulo->newEmptyEntity();

        if ($this->request->is('post')) {
            try {
                $titulo = $this->Titulo->patchEntity($titulo, $this->request->getData());

                $this->Titulo->saveOrFail($titulo);

                return $this->response->withType('application/json')
                    ->withStringBody(json_encode([
                        'message' => 'Título adicionado com sucesso',
                        'titulo' => $titulo
                    ]));
            } catch (\Exception $e) {
                return $this->response->withStatus(400)->withType('application/json')
                    ->withStringBody(json_encode([
                        'message' => 'Erro ao adicionar título',
                        'errors' => $e->getMessage()
                    ]));
            }
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Titulo id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $titulo = null;

        try {
            $titulo = $this->Titulo->get($id, contain: []);
        } catch (\Exception $e) {
            return $this->response->withStatus(404)
                ->withStringBody(json_encode([
                    "message" => "Título não encontrado",
                    "error" => $e->getMessage()
                ]));
        }

        try {
            if ($this->request->is(['patch', 'post', 'put'])) {
                $titulo = $this->Titulo->patchEntity($titulo, $this->request->getData());

                $this->Titulo->saveOrFail($titulo);

                return $this->response->withType('application/json')
                    ->withStringBody(json_encode([
                        'message' => 'Título editado com sucesso',
                        'titulo' => $titulo
                    ]));
            }
        } catch (\Exception $e) {
            return $this->response->withStatus(400)
                ->withStringBody(json_encode([
                    "message" => "Erro ao editar título",
                    "error" => $e->getMessage()
                ]));
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Titulo id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $titulo = null;

        try {
            $titulo = $this->Titulo->get($id, contain: []);
        } catch (\Exception $e) {
            return $this->response->withStatus(404)
                ->withStringBody(json_encode([
                    "message" => "Título não encontrado",
                    "error" => $e->getMessage()
                ]));
        }

        try {
            $this->Titulo->delete($titulo);
            return $this->response->withType('application/json')
                ->withStringBody(json_encode([
                    'message' => 'Título deletado com sucesso',
                    'titulo' => $titulo
                ]));
        } catch (\Exception $e) {
            return $this->response->withStatus(500)
                ->withStringBody(json_encode([
                    "message" => "Erro ao deletar título",
                    "error" => $e->getMessage()
                ]));
        }
    }
}
