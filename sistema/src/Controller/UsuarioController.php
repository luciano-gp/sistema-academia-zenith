<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\Http\Response;

/**
 * Usuario Controller
 *
 * @property \App\Model\Table\UsuarioTable $Usuario
 */
class UsuarioController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        try {
            $usuarios = $this->paginate($this->Usuario->find());
            return $this->response->withType('application/json')->withStringBody(json_encode($usuarios));
        } catch (\Exception $e) {
            return $this->response->withStatus(500)
                ->withStringBody(json_encode([
                    "message" => "Erro ao buscar usuários",
                    "error" => $e->getMessage()
                ]));
        }
    }

    /**
     * View method
     *
     * @param string|null $id Usuario id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        try {
            $usuario = $this->Usuario->get($id);
            return $this->response->withType('application/json')->withStringBody(json_encode($usuario));
        } catch (\Exception $e) {
            return $this->response->withStatus(404)
                ->withStringBody(json_encode([
                    "message" => "Usuário não encontrado",
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
        $usuario = $this->Usuario->newEmptyEntity();

        if ($this->request->is('post')) {
            try {
                $usuario = $this->Usuario->patchEntity($usuario, $this->request->getData());

                $this->Usuario->save($usuario);

                return $this->response->withType('application/json')
                    ->withStringBody(json_encode([
                        'message' => 'Usuário adicionado com sucesso',
                        'usuario' => $usuario
                    ]));
            } catch (\Exception $e) {
                return $this->response->withStatus(400)->withType('application/json')
                    ->withStringBody(json_encode([
                        'message' => 'Erro ao adicionar usuário',
                        'errors' => $e->getMessage()
                    ]));
            }
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Usuario id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $usuario = null;

        try {
            $usuario = $this->Usuario->get($id, contain: []);
        } catch (\Exception $e) {
            return $this->response->withStatus(404)
                ->withStringBody(json_encode([
                    "message" => "Usuário não encontrado",
                    "error" => $e->getMessage()
                ]));
        }

        try {
            if ($this->request->is(['patch', 'post', 'put'])) {
                $usuario = $this->Usuario->patchEntity($usuario, $this->request->getData());

                $this->Usuario->save($usuario);

                return $this->response->withType('application/json')
                    ->withStringBody(json_encode([
                        'message' => 'Usuário editado com sucesso',
                        'usuario' => $usuario
                    ]));
            }
        } catch (\Exception $e) {
            return $this->response->withStatus(400)
                ->withStringBody(json_encode([
                    "message" => "Erro ao editar usuário",
                    "error" => $e->getMessage()
                ]));
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Usuario id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);

        $usuario = null;

        try {
            $usuario = $this->Usuario->get($id, contain: []);
        } catch (\Exception $e) {
            return $this->response->withStatus(404)
                ->withStringBody(json_encode([
                    "message" => "Usuário não encontrado",
                    "error" => $e->getMessage()
                ]));
        }

        try {
            $this->Usuario->delete($usuario);
            return $this->response->withType('application/json')
                ->withStringBody(json_encode([
                    'message' => 'Usuário deletado com sucesso',
                    'usuario' => $usuario
                ]));
        } catch (\Exception $e) {
            return $this->response->withStatus(500)
                ->withStringBody(json_encode([
                    "message" => "Erro ao deletar usuário",
                    "error" => $e->getMessage()
                ]));
        }
    }
}
