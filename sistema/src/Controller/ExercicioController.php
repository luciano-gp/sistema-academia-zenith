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
        $query = $this->Exercicio->find();
        $exercicio = $this->paginate($query);

        $this->set(compact('exercicio'));
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
        $exercicio = $this->Exercicio->get($id, contain: ['Treino']);
        $this->set(compact('exercicio'));
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
            $exercicio = $this->Exercicio->patchEntity($exercicio, $this->request->getData());
            if ($this->Exercicio->save($exercicio)) {
                $this->Flash->success(__('The exercicio has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The exercicio could not be saved. Please, try again.'));
        }
        $treino = $this->Exercicio->Treino->find('list', limit: 200)->all();
        $this->set(compact('exercicio', 'treino'));
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
        $exercicio = $this->Exercicio->get($id, contain: ['Treino']);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $exercicio = $this->Exercicio->patchEntity($exercicio, $this->request->getData());
            if ($this->Exercicio->save($exercicio)) {
                $this->Flash->success(__('The exercicio has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The exercicio could not be saved. Please, try again.'));
        }
        $treino = $this->Exercicio->Treino->find('list', limit: 200)->all();
        $this->set(compact('exercicio', 'treino'));
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
        $exercicio = $this->Exercicio->get($id);
        if ($this->Exercicio->delete($exercicio)) {
            $this->Flash->success(__('The exercicio has been deleted.'));
        } else {
            $this->Flash->error(__('The exercicio could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
