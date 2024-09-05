<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Treino Controller
 *
 * @property \App\Model\Table\TreinoTable $Treino
 */
class TreinoController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Treino->find();
        $treino = $this->paginate($query);

        $this->set(compact('treino'));
    }

    /**
     * View method
     *
     * @param string|null $id Treino id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $treino = $this->Treino->get($id, contain: ['Exercicio', 'Pessoa']);
        $this->set(compact('treino'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $treino = $this->Treino->newEmptyEntity();
        if ($this->request->is('post')) {
            $treino = $this->Treino->patchEntity($treino, $this->request->getData());
            if ($this->Treino->save($treino)) {
                $this->Flash->success(__('The treino has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The treino could not be saved. Please, try again.'));
        }
        $exercicio = $this->Treino->Exercicio->find('list', limit: 200)->all();
        $pessoa = $this->Treino->Pessoa->find('list', limit: 200)->all();
        $this->set(compact('treino', 'exercicio', 'pessoa'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Treino id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $treino = $this->Treino->get($id, contain: ['Exercicio', 'Pessoa']);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $treino = $this->Treino->patchEntity($treino, $this->request->getData());
            if ($this->Treino->save($treino)) {
                $this->Flash->success(__('The treino has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The treino could not be saved. Please, try again.'));
        }
        $exercicio = $this->Treino->Exercicio->find('list', limit: 200)->all();
        $pessoa = $this->Treino->Pessoa->find('list', limit: 200)->all();
        $this->set(compact('treino', 'exercicio', 'pessoa'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Treino id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $treino = $this->Treino->get($id);
        if ($this->Treino->delete($treino)) {
            $this->Flash->success(__('The treino has been deleted.'));
        } else {
            $this->Flash->error(__('The treino could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
