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
        $query = $this->ExercicioTreino->find();
        $exercicioTreino = $this->paginate($query);

        $this->set(compact('exercicioTreino'));
    }

    /**
     * View method
     *
     * @param string|null $id Exercicio Treino id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $exercicioTreino = $this->ExercicioTreino->get($id, contain: []);
        $this->set(compact('exercicioTreino'));
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
            $exercicioTreino = $this->ExercicioTreino->patchEntity($exercicioTreino, $this->request->getData());
            if ($this->ExercicioTreino->save($exercicioTreino)) {
                $this->Flash->success(__('The exercicio treino has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The exercicio treino could not be saved. Please, try again.'));
        }
        $this->set(compact('exercicioTreino'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Exercicio Treino id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $exercicioTreino = $this->ExercicioTreino->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $exercicioTreino = $this->ExercicioTreino->patchEntity($exercicioTreino, $this->request->getData());
            if ($this->ExercicioTreino->save($exercicioTreino)) {
                $this->Flash->success(__('The exercicio treino has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The exercicio treino could not be saved. Please, try again.'));
        }
        $this->set(compact('exercicioTreino'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Exercicio Treino id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $exercicioTreino = $this->ExercicioTreino->get($id);
        if ($this->ExercicioTreino->delete($exercicioTreino)) {
            $this->Flash->success(__('The exercicio treino has been deleted.'));
        } else {
            $this->Flash->error(__('The exercicio treino could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
