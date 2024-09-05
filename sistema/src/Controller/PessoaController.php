<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Pessoa Controller
 *
 * @property \App\Model\Table\PessoaTable $Pessoa
 */
class PessoaController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Pessoa->find();
        $pessoa = $this->paginate($query);

        $this->set(compact('pessoa'));
    }

    /**
     * View method
     *
     * @param string|null $id Pessoa id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pessoa = $this->Pessoa->get($id, contain: ['Treino']);
        $this->set(compact('pessoa'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pessoa = $this->Pessoa->newEmptyEntity();
        if ($this->request->is('post')) {
            $pessoa = $this->Pessoa->patchEntity($pessoa, $this->request->getData());
            if ($this->Pessoa->save($pessoa)) {
                $this->Flash->success(__('The pessoa has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pessoa could not be saved. Please, try again.'));
        }
        $treino = $this->Pessoa->Treino->find('list', limit: 200)->all();
        $this->set(compact('pessoa', 'treino'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Pessoa id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pessoa = $this->Pessoa->get($id, contain: ['Treino']);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pessoa = $this->Pessoa->patchEntity($pessoa, $this->request->getData());
            if ($this->Pessoa->save($pessoa)) {
                $this->Flash->success(__('The pessoa has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pessoa could not be saved. Please, try again.'));
        }
        $treino = $this->Pessoa->Treino->find('list', limit: 200)->all();
        $this->set(compact('pessoa', 'treino'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Pessoa id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pessoa = $this->Pessoa->get($id);
        if ($this->Pessoa->delete($pessoa)) {
            $this->Flash->success(__('The pessoa has been deleted.'));
        } else {
            $this->Flash->error(__('The pessoa could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
