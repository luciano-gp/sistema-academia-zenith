<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * ExercicioTreino Controller
 *
 * @property \App\Model\Table\ExercicioTreinoTable $ExercicioTreino
 */
class ExercicioTreinoController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        try {
            $exerciciosTreino = $this->paginate($this->ExercicioTreino->find());
            return $this->response->withType('application/json')->withStringBody(json_encode($exerciciosTreino));
        } catch (\Exception $e) {
            return $this->response->withStatus(500)
                ->withStringBody(json_encode([
                    "message" => "Erro ao buscar exerciciosTreino",
                    "error" => $e->getMessage()
                ]));
        }
    }

    /**
     * View method
     *
     * @param string|null $ref_treino Treino id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($ref_treino = null)
    {
        try {
            $exercicioTreino = $this->ExercicioTreino->find()->where(['ref_treino' => $ref_treino])->toArray();
            return $this->response->withType('application/json')->withStringBody(json_encode($exercicioTreino));
        } catch (\Exception $e) {
            return $this->response->withStatus(404)
                ->withStringBody(json_encode([
                    "message" => "ExercicioTreino não encontrado",
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
        $exercicioTreino = $this->ExercicioTreino->newEmptyEntity();

        if ($this->request->is('post')) {
            try {
                $exercicioTreino = $this->ExercicioTreino->patchEntity($exercicioTreino, $this->request->getData());

                $this->ExercicioTreino->saveOrFail($exercicioTreino);

                return $this->response->withType('application/json')
                    ->withStringBody(json_encode([
                        'message' => 'ExercicioTreino adicionado com sucesso',
                        'exercicio_treino' => $exercicioTreino
                    ]));
            } catch (\Exception $e) {
                return $this->response->withStatus(400)->withType('application/json')
                    ->withStringBody(json_encode([
                        'message' => 'Erro ao adicionar exercicioTreino',
                        'errors' => $e->getMessage()
                    ]));
            }
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Exercicio ExercicioTreino id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $exercicioTreino = null;

        try {
            $exercicioTreino = $this->ExercicioTreino->get($id, contain: []);
        } catch (\Exception $e) {
            return $this->response->withStatus(404)
                ->withStringBody(json_encode([
                    "message" => "ExercicioTreino não encontrado",
                    "error" => $e->getMessage()
                ]));
        }

        try {
            if ($this->request->is(['patch', 'post', 'put'])) {
                $exercicioTreino = $this->ExercicioTreino->patchEntity($exercicioTreino, $this->request->getData());

                $this->ExercicioTreino->saveOrFail($exercicioTreino);

                return $this->response->withType('application/json')
                    ->withStringBody(json_encode([
                        'message' => 'ExercicioTreino editado com sucesso',
                        'exercicio_treino' => $exercicioTreino
                    ]));
            }
        } catch (\Exception $e) {
            return $this->response->withStatus(400)
                ->withStringBody(json_encode([
                    "message" => "Erro ao editar exercicioTreino",
                    "error" => $e->getMessage()
                ]));
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Exercicio ExercicioTreino id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $exercicioTreino = null;

        try {
            $exercicioTreino = $this->ExercicioTreino->get($id, contain: []);
        } catch (\Exception $e) {
            return $this->response->withStatus(404)
                ->withStringBody(json_encode([
                    "message" => "ExercicioTreino não encontrado",
                    "error" => $e->getMessage()
                ]));
        }

        try {
            $this->ExercicioTreino->delete($exercicioTreino);
            return $this->response->withType('application/json')
                ->withStringBody(json_encode([
                    'message' => 'ExercicioTreino deletado com sucesso',
                    'exercicio_treino' => $exercicioTreino
                ]));
        } catch (\Exception $e) {
            return $this->response->withStatus(500)
                ->withStringBody(json_encode([
                    "message" => "Erro ao deletar exercicioTreino",
                    "error" => $e->getMessage()
                ]));
        }
    }
}
