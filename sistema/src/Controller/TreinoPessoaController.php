<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * TreinoPessoa Controller
 *
 * @property \App\Model\Table\TreinoPessoaTable $TreinoPessoa
 */
class TreinoPessoaController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->TreinoPessoa->find();
        $treinoPessoa = $this->paginate($query);

        $this->set(compact('treinoPessoa'));
    }

    /**
     * View method
     *
     * @param string|null $id Treino Pessoa id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $treinoPessoa = $this->TreinoPessoa->get($id, contain: []);
        $this->set(compact('treinoPessoa'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $treinoPessoa = $this->TreinoPessoa->newEmptyEntity();
        if ($this->request->is('post')) {
            $treinoPessoa = $this->TreinoPessoa->patchEntity($treinoPessoa, $this->request->getData());
            if ($this->TreinoPessoa->save($treinoPessoa)) {
                $this->Flash->success(__('The treino pessoa has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The treino pessoa could not be saved. Please, try again.'));
        }
        $this->set(compact('treinoPessoa'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Treino Pessoa id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $treinoPessoa = $this->TreinoPessoa->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $treinoPessoa = $this->TreinoPessoa->patchEntity($treinoPessoa, $this->request->getData());
            if ($this->TreinoPessoa->save($treinoPessoa)) {
                $this->Flash->success(__('The treino pessoa has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The treino pessoa could not be saved. Please, try again.'));
        }
        $this->set(compact('treinoPessoa'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Treino Pessoa id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $treinoPessoa = $this->TreinoPessoa->get($id);
        if ($this->TreinoPessoa->delete($treinoPessoa)) {
            $this->Flash->success(__('The treino pessoa has been deleted.'));
        } else {
            $this->Flash->error(__('The treino pessoa could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
