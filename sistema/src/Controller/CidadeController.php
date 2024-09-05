<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Cidade Controller
 *
 * @property \App\Model\Table\CidadeTable $Cidade
 */
class CidadeController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Cidade->find();
        $cidade = $this->paginate($query);

        $this->set(compact('cidade'));
    }

    /**
     * View method
     *
     * @param string|null $id Cidade id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cidade = $this->Cidade->get($id, contain: []);
        $this->set(compact('cidade'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cidade = $this->Cidade->newEmptyEntity();
        if ($this->request->is('post')) {
            $cidade = $this->Cidade->patchEntity($cidade, $this->request->getData());
            if ($this->Cidade->save($cidade)) {
                $this->Flash->success(__('The cidade has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cidade could not be saved. Please, try again.'));
        }
        $this->set(compact('cidade'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Cidade id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cidade = $this->Cidade->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cidade = $this->Cidade->patchEntity($cidade, $this->request->getData());
            if ($this->Cidade->save($cidade)) {
                $this->Flash->success(__('The cidade has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cidade could not be saved. Please, try again.'));
        }
        $this->set(compact('cidade'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Cidade id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cidade = $this->Cidade->get($id);
        if ($this->Cidade->delete($cidade)) {
            $this->Flash->success(__('The cidade has been deleted.'));
        } else {
            $this->Flash->error(__('The cidade could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
