<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * RegistroPresenca Controller $this->find('list')->where(['ref_pessoa' => $ref_pessoa])->toArray()
 *
 * @property \App\Model\Table\RegistroPresencaTable $RegistroPresenca
 */
class RegistroPresencaController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        try {
            $registrosPresenca = $this->paginate($this->RegistroPresenca->find());
            return $this->response->withType('application/json')->withStringBody(json_encode($registrosPresenca));
        } catch (\Exception $e) {
            return $this->response->withStatus(500)
                ->withStringBody(json_encode([
                    "message" => "Erro ao buscar registros de presença",
                    "error" => $e->getMessage()
                ]));
        }
    }

    /**
     * Listar method
     *
     * @param string|null $ref_pessoa Pessoa id.
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function listar($ref_pessoa = null)
    {
        try {
            $registrosPresenca = $this->RegistroPresenca->find('list')->where(['ref_pessoa' => $ref_pessoa])->toArray();
            return $this->response->withType('application/json')->withStringBody(json_encode($registrosPresenca));
        } catch (\Exception $e) {
            return $this->response->withStatus(500)
                ->withStringBody(json_encode([
                    "message" => "Erro ao buscar registros de presença",
                    "error" => $e->getMessage()
                ]));
        }
    }

    /**
     * View method
     *
     * @param string|null $id Registro Presenca id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        try {
            $registroPresenca = $this->RegistroPresenca->get($id);
            return $this->response->withType('application/json')->withStringBody(json_encode($registroPresenca));
        } catch (\Exception $e) {
            return $this->response->withStatus(404)
                ->withStringBody(json_encode([
                    "message" => "Registro de presença não encontrado",
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
        $registroPresenca = $this->RegistroPresenca->newEmptyEntity();

        if ($this->request->is('post')) {
            try {
                $registroPresenca = $this->RegistroPresenca->patchEntity($registroPresenca, $this->request->getData());

                $this->RegistroPresenca->saveOrFail($registroPresenca);

                return $this->response->withType('application/json')
                    ->withStringBody(json_encode([
                        'message' => 'Registro de presença adicionado com sucesso',
                        'registro_presenca' => $registroPresenca
                    ]));
            } catch (\Exception $e) {
                return $this->response->withStatus(400)->withType('application/json')
                    ->withStringBody(json_encode([
                        'message' => 'Erro ao adicionar registro de presença',
                        'errors' => $e->getMessage()
                    ]));
            }
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Registro Presenca id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $registroPresenca = null;

        try {
            $registroPresenca = $this->RegistroPresenca->get($id, contain: []);
        } catch (\Exception $e) {
            return $this->response->withStatus(404)
                ->withStringBody(json_encode([
                    "message" => "Registro de presença não encontrado",
                    "error" => $e->getMessage()
                ]));
        }

        try {
            if ($this->request->is(['patch', 'post', 'put'])) {
                $registroPresenca = $this->RegistroPresenca->patchEntity($registroPresenca, $this->request->getData());

                $this->RegistroPresenca->saveOrFail($registroPresenca);

                return $this->response->withType('application/json')
                    ->withStringBody(json_encode([
                        'message' => 'Registro de presença editado com sucesso',
                        'registro_presenca' => $registroPresenca
                    ]));
            }
        } catch (\Exception $e) {
            return $this->response->withStatus(400)
                ->withStringBody(json_encode([
                    "message" => "Erro ao editar registro de presença",
                    "error" => $e->getMessage()
                ]));
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Registro Presenca id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $registroPresenca = null;

        try {
            $registroPresenca = $this->RegistroPresenca->get($id, contain: []);
        } catch (\Exception $e) {
            return $this->response->withStatus(404)
                ->withStringBody(json_encode([
                    "message" => "Registro de presença não encontrado",
                    "error" => $e->getMessage()
                ]));
        }

        try {
            $this->RegistroPresenca->delete($registroPresenca);
            return $this->response->withType('application/json')
                ->withStringBody(json_encode([
                    'message' => 'Registro de presença deletado com sucesso',
                    'registro_presenca' => $registroPresenca
                ]));
        } catch (\Exception $e) {
            return $this->response->withStatus(500)
                ->withStringBody(json_encode([
                    "message" => "Erro ao deletar registro de presença",
                    "error" => $e->getMessage()
                ]));
        }
    }
}
