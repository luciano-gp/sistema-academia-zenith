<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Turma Controller
 *
 * @property \App\Model\Table\TurmaTable $Turma
 */
class TurmaController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        try {
            $turmas = $this->paginate($this->Turma->find()->contain(['Pessoa', 'OcorrenciaAula']));
            return $this->response->withType('application/json')->withStringBody(json_encode($turmas));
        } catch (\Exception $e) {
            return $this->response->withStatus(500)
                ->withStringBody(json_encode([
                    "message" => "Erro ao buscar turmas",
                    "error" => $e->getMessage()
                ]));
        }
    }

    /**
     * View method
     *
     * @param string|null $id Turma id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        try {
            $turma = $this->Turma->get($id, contain: ['Pessoa', 'OcorrenciaAula']);
            return $this->response->withType('application/json')->withStringBody(json_encode($turma));
        } catch (\Exception $e) {
            return $this->response->withStatus(404)
                ->withStringBody(json_encode([
                    "message" => "Turma não encontrada",
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
        $turma = $this->Turma->newEmptyEntity();

        if ($this->request->is('post')) {
            try {
                $turma = $this->Turma->patchEntity($turma, $this->request->getData());

                $this->Turma->saveOrFail($turma);

                return $this->response->withType('application/json')
                    ->withStringBody(json_encode([
                        'message' => 'Turma adicionada com sucesso',
                        'turma' => $turma
                    ]));
            } catch (\Exception $e) {
                return $this->response->withStatus(400)->withType('application/json')
                    ->withStringBody(json_encode([
                        'message' => 'Erro ao adicionar turma',
                        'errors' => $e->getMessage()
                    ]));
            }
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Turma id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $turma = null;

        try {
            $turma = $this->Turma->get($id, contain: ['Pessoa', 'OcorrenciaAula']);
        } catch (\Exception $e) {
            return $this->response->withStatus(404)
                ->withStringBody(json_encode([
                    "message" => "Turma não encontrada",
                    "error" => $e->getMessage()
                ]));
        }

        try {
            if ($this->request->is(['patch', 'post', 'put'])) {
                $turma = $this->Turma->patchEntity($turma, $this->request->getData());

                $this->Turma->saveOrFail($turma);

                return $this->response->withType('application/json')
                    ->withStringBody(json_encode([
                        'message' => 'Turma editada com sucesso',
                        'turma' => $turma
                    ]));
            }
        } catch (\Exception $e) {
            return $this->response->withStatus(400)
                ->withStringBody(json_encode([
                    "message" => "Erro ao editar turma",
                    "error" => $e->getMessage()
                ]));
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Turma id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $turma = null;

        try {
            $turma = $this->Turma->get($id, contain: []);
        } catch (\Exception $e) {
            return $this->response->withStatus(404)
                ->withStringBody(json_encode([
                    "message" => "Turma não encontrada",
                    "error" => $e->getMessage()
                ]));
        }

        try {
            $this->Turma->delete($turma);
            return $this->response->withType('application/json')
                ->withStringBody(json_encode([
                    'message' => 'Turma deletada com sucesso',
                    'turma' => $turma
                ]));
        } catch (\Exception $e) {
            return $this->response->withStatus(500)
                ->withStringBody(json_encode([
                    "message" => "Erro ao deletar Turma",
                    "error" => $e->getMessage()
                ]));
        }
    }
}
