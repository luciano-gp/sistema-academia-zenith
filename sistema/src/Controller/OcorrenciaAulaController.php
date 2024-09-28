<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * OcorrenciaAula Controller
 *
 * @property \App\Model\Table\OcorrenciaAulaTable $OcorrenciaAula
 */
class OcorrenciaAulaController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        try {
            $ocorrenciaAulas = $this->paginate($this->OcorrenciaAula->find()->contain(['Aula']));
            return $this->response->withType('application/json')->withStringBody(json_encode($ocorrenciaAulas));
        } catch (\Exception $e) {
            return $this->response->withStatus(500)
                ->withStringBody(json_encode([
                    "message" => "Erro ao buscar ocorrências de aulas",
                    "error" => $e->getMessage()
                ]));
        }
    }

    /**
     * View method
     *
     * @param string|null $id Ocorrencia Aula id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        try {
            $ocorrenciaAula = $this->OcorrenciaAula->get($id, contain: ['Aula']);
            return $this->response->withType('application/json')->withStringBody(json_encode($ocorrenciaAula));
        } catch (\Exception $e) {
            return $this->response->withStatus(404)
                ->withStringBody(json_encode([
                    "message" => "Ocorrência de aula não encontrada",
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
        $ocorrenciaAula = $this->OcorrenciaAula->newEmptyEntity();

        if ($this->request->is('post')) {
            try {
                $ocorrenciaAula = $this->OcorrenciaAula->patchEntity($ocorrenciaAula, $this->request->getData());

                $this->OcorrenciaAula->saveOrFail($ocorrenciaAula);

                return $this->response->withType('application/json')
                    ->withStringBody(json_encode([
                        'message' => 'Ocorrência de aula adicionada com sucesso',
                        'ocorrencia_aula' => $ocorrenciaAula
                    ]));
            } catch (\Exception $e) {
                return $this->response->withStatus(400)->withType('application/json')
                    ->withStringBody(json_encode([
                        'message' => 'Erro ao adicionar ocorrência de aula',
                        'errors' => $e->getMessage()
                    ]));
            }
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Ocorrencia Aula id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ocorrenciaAula = null;

        try {
            $ocorrenciaAula = $this->OcorrenciaAula->get($id, contain: ['Aula']);
        } catch (\Exception $e) {
            return $this->response->withStatus(404)
                ->withStringBody(json_encode([
                    "message" => "Ocorrência de aula não encontrada",
                    "error" => $e->getMessage()
                ]));
        }

        try {
            if ($this->request->is(['patch', 'post', 'put'])) {
                $ocorrenciaAula = $this->OcorrenciaAula->patchEntity($ocorrenciaAula, $this->request->getData());

                $this->OcorrenciaAula->saveOrFail($ocorrenciaAula);

                return $this->response->withType('application/json')
                    ->withStringBody(json_encode([
                        'message' => 'Ocorrência de aula editada com sucesso',
                        'ocorrencia_aula' => $ocorrenciaAula
                    ]));
            }
        } catch (\Exception $e) {
            return $this->response->withStatus(400)
                ->withStringBody(json_encode([
                    "message" => "Erro ao editar ocorrência de aula",
                    "error" => $e->getMessage()
                ]));
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Ocorrencia Aula id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ocorrenciaAula = null;

        try {
            $ocorrenciaAula = $this->OcorrenciaAula->get($id, contain: []);
        } catch (\Exception $e) {
            return $this->response->withStatus(404)
                ->withStringBody(json_encode([
                    "message" => "Ocorrência de aula não encontrada",
                    "error" => $e->getMessage()
                ]));
        }

        try {
            $this->OcorrenciaAula->delete($ocorrenciaAula);
            return $this->response->withType('application/json')
                ->withStringBody(json_encode([
                    'message' => 'Ocorrência de aula deletada com sucesso',
                    'ocorrencia_aula' => $ocorrenciaAula
                ]));
        } catch (\Exception $e) {
            return $this->response->withStatus(500)
                ->withStringBody(json_encode([
                    "message" => "Erro ao deletar ocorrência de aula",
                    "error" => $e->getMessage()
                ]));
        }
    }
}
