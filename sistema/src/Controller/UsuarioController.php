<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\Entity\Usuario;
use Cake\Http\Response;
use Cake\Utility\Security;

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
     * Login method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function login()
    {
        $this->request->allowMethod(['post']);

        $data = $this->request->getData();
        $email = $data['email'] ?? null;
        $senha = $data['senha'] ?? null;

        if (empty($email) || empty($senha)) {
            return $this->response->withStatus(400)
                ->withStringBody(json_encode([
                    "message" => "E-mail e senha são obrigatórios"
                ]));
        }

        try {
            /** @var Usuario $usuario */
            $usuario = $this->Usuario->find('all')
                ->where(['email' => $email, 'ativo' => true])
                ->firstOrFail();

            if (Security::hash($senha) !== $usuario->senha) {
                return $this->response->withStatus(401)
                    ->withStringBody(json_encode([
                        "message" => "E-mail ou senha inválidos"
                    ]));
            }

            return $this->response->withType('application/json')
                ->withStringBody(json_encode([
                    "message" => "Login bem-sucedido",
                    "user" => $usuario
                ]));
        } catch (\Exception $e) {
            return $this->response->withStatus(400)->withType('application/json')
                ->withStringBody(json_encode([
                    "message" => "Erro ao realizar o login",
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
                $usuario->senha = Security::hash($usuario->senha);

                $this->Usuario->saveOrFail($usuario);

                return $this->response->withType('application/json')
                    ->withStringBody(json_encode([
                        'message' => 'Usuário adicionado com sucesso',
                        'user' => $usuario
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

                $this->Usuario->saveOrFail($usuario);

                return $this->response->withType('application/json')
                    ->withStringBody(json_encode([
                        'message' => 'Usuário editado com sucesso',
                        'user' => $usuario
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
                    'user' => $usuario
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
