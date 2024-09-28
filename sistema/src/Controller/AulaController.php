<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Aula Controller
 *
 * @property \App\Model\Table\AulaTable $Aula
 */
class AulaController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        try {
            $aulas = $this->paginate($this->Aula->find()->contain(['Plano']));
            return $this->response->withType('application/json')->withStringBody(json_encode($aulas));
        } catch (\Exception $e) {
            return $this->response->withStatus(500)
                ->withStringBody(json_encode([
                    "message" => "Erro ao buscar aulas",
                    "error" => $e->getMessage()
                ]));
        }
    }

    /**
     * View method
     *
     * @param string|null $id Aula id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        try {
            $aula = $this->Aula->get($id, contain: ['Plano']);
            return $this->response->withType('application/json')->withStringBody(json_encode($aula));
        } catch (\Exception $e) {
            return $this->response->withStatus(404)
                ->withStringBody(json_encode([
                    "message" => "Aula não encontrada",
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
        $aula = $this->Aula->newEmptyEntity();

        if ($this->request->is('post')) {
            try {
                $aula = $this->Aula->patchEntity($aula, $this->request->getData());

                $this->Aula->saveOrFail($aula);

                return $this->response->withType('application/json')
                    ->withStringBody(json_encode([
                        'message' => 'Aula adicionada com sucesso',
                        'aula' => $aula
                    ]));
            } catch (\Exception $e) {
                return $this->response->withStatus(400)->withType('application/json')
                    ->withStringBody(json_encode([
                        'message' => 'Erro ao adicionar aula',
                        'errors' => $e->getMessage()
                    ]));
            }
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Aula id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $aula = null;

        try {
            $aula = $this->Aula->get($id, contain: []);
        } catch (\Exception $e) {
            return $this->response->withStatus(404)
                ->withStringBody(json_encode([
                    "message" => "Aula não encontrada",
                    "error" => $e->getMessage()
                ]));
        }

        try {
            if ($this->request->is(['patch', 'post', 'put'])) {
                $aula = $this->Aula->patchEntity($aula, $this->request->getData());

                $this->Aula->saveOrFail($aula);

                return $this->response->withType('application/json')
                    ->withStringBody(json_encode([
                        'message' => 'Aula editada com sucesso',
                        'aula' => $aula
                    ]));
            }
        } catch (\Exception $e) {
            return $this->response->withStatus(400)
                ->withStringBody(json_encode([
                    "message" => "Erro ao editar aula",
                    "error" => $e->getMessage()
                ]));
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Aula id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $aula = null;

        try {
            $aula = $this->Aula->get($id, contain: []);
        } catch (\Exception $e) {
            return $this->response->withStatus(404)
                ->withStringBody(json_encode([
                    "message" => "Aula não encontrada",
                    "error" => $e->getMessage()
                ]));
        }

        try {
            $this->Aula->delete($aula);
            return $this->response->withType('application/json')
                ->withStringBody(json_encode([
                    'message' => 'Aula deletada com sucesso',
                    'aula' => $aula
                ]));
        } catch (\Exception $e) {
            return $this->response->withStatus(500)
                ->withStringBody(json_encode([
                    "message" => "Erro ao deletar aula",
                    "error" => $e->getMessage()
                ]));
        }
    }
}
