<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Exercicio Controller
 *
 * @property \App\Model\Table\ExercicioTable $Exercicio
 */
class ExercicioController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        try {
            $exercicios = $this->paginate($this->Exercicio->find());
            return $this->response->withType('application/json')->withStringBody(json_encode($exercicios));
        } catch (\Exception $e) {
            return $this->response->withStatus(500)
                ->withStringBody(json_encode([
                    "message" => "Erro ao buscar exercicios",
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
            $exercicios = $this->Exercicio->find('list')->toArray();
            return $this->response->withType('application/json')->withStringBody(json_encode($exercicios));
        } catch (\Exception $e) {
            return $this->response->withStatus(500)
                ->withStringBody(json_encode([
                    "message" => "Erro ao buscar exercicios",
                    "error" => $e->getMessage()
                ]));
        }
    }

    /**
     * View method
     *
     * @param string|null $id Exercicio id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        try {
            $exercicio = $this->Exercicio->get($id);
            return $this->response->withType('application/json')->withStringBody(json_encode($exercicio));
        } catch (\Exception $e) {
            return $this->response->withStatus(404)
                ->withStringBody(json_encode([
                    "message" => "Exercicio não encontrado",
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
        $exercicio = $this->Exercicio->newEmptyEntity();

        if ($this->request->is('post')) {
            try {
                $exercicio = $this->Exercicio->patchEntity($exercicio, $this->request->getData());

                $this->Exercicio->saveOrFail($exercicio);

                return $this->response->withType('application/json')
                    ->withStringBody(json_encode([
                        'message' => 'Exercicio adicionado com sucesso',
                        'exercicio' => $exercicio
                    ]));
            } catch (\Exception $e) {
                return $this->response->withStatus(400)->withType('application/json')
                    ->withStringBody(json_encode([
                        'message' => 'Erro ao adicionar exercicio',
                        'errors' => $e->getMessage()
                    ]));
            }
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Exercicio id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $exercicio = null;

        try {
            $exercicio = $this->Exercicio->get($id, contain: []);
        } catch (\Exception $e) {
            return $this->response->withStatus(404)
                ->withStringBody(json_encode([
                    "message" => "Exercicio não encontrado",
                    "error" => $e->getMessage()
                ]));
        }

        try {
            if ($this->request->is(['patch', 'post', 'put'])) {
                $exercicio = $this->Exercicio->patchEntity($exercicio, $this->request->getData());

                $this->Exercicio->saveOrFail($exercicio);

                return $this->response->withType('application/json')
                    ->withStringBody(json_encode([
                        'message' => 'Exercicio editado com sucesso',
                        'exercicio' => $exercicio
                    ]));
            }
        } catch (\Exception $e) {
            return $this->response->withStatus(400)
                ->withStringBody(json_encode([
                    "message" => "Erro ao editar exercicio",
                    "error" => $e->getMessage()
                ]));
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Exercicio id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $exercicio = null;

        try {
            $exercicio = $this->Exercicio->get($id, contain: []);
        } catch (\Exception $e) {
            return $this->response->withStatus(404)
                ->withStringBody(json_encode([
                    "message" => "Exercicio não encontrado",
                    "error" => $e->getMessage()
                ]));
        }

        try {
            $this->Exercicio->delete($exercicio);
            return $this->response->withType('application/json')
                ->withStringBody(json_encode([
                    'message' => 'Exercicio deletado com sucesso',
                    'exercicio' => $exercicio
                ]));
        } catch (\Exception $e) {
            return $this->response->withStatus(500)
                ->withStringBody(json_encode([
                    "message" => "Erro ao deletar exercicio",
                    "error" => $e->getMessage()
                ]));
        }
    }
}
