<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Historico Controller
 *
 * @property \App\Model\Table\HistoricoTable $Historico
 */
class HistoricoController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Historico->find();
        $historico = $this->paginate($query);

        $this->set(compact('historico'));
    }

    /**
     * View method
     *
     * @param string|null $id Historico id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $historico = $this->Historico->get($id, contain: []);
        $this->set(compact('historico'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $historico = $this->Historico->newEmptyEntity();
        if ($this->request->is('post')) {
            $historico = $this->Historico->patchEntity($historico, $this->request->getData());
            if ($this->Historico->save($historico)) {
                $this->Flash->success(__('The historico has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The historico could not be saved. Please, try again.'));
        }
        $this->set(compact('historico'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Historico id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $historico = $this->Historico->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $historico = $this->Historico->patchEntity($historico, $this->request->getData());
            if ($this->Historico->save($historico)) {
                $this->Flash->success(__('The historico has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The historico could not be saved. Please, try again.'));
        }
        $this->set(compact('historico'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Historico id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $historico = $this->Historico->get($id);
        if ($this->Historico->delete($historico)) {
            $this->Flash->success(__('The historico has been deleted.'));
        } else {
            $this->Flash->error(__('The historico could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
