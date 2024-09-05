<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Lancamento Controller
 *
 * @property \App\Model\Table\LancamentoTable $Lancamento
 */
class LancamentoController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Lancamento->find();
        $lancamento = $this->paginate($query);

        $this->set(compact('lancamento'));
    }

    /**
     * View method
     *
     * @param string|null $id Lancamento id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $lancamento = $this->Lancamento->get($id, contain: []);
        $this->set(compact('lancamento'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $lancamento = $this->Lancamento->newEmptyEntity();
        if ($this->request->is('post')) {
            $lancamento = $this->Lancamento->patchEntity($lancamento, $this->request->getData());
            if ($this->Lancamento->save($lancamento)) {
                $this->Flash->success(__('The lancamento has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The lancamento could not be saved. Please, try again.'));
        }
        $this->set(compact('lancamento'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Lancamento id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $lancamento = $this->Lancamento->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $lancamento = $this->Lancamento->patchEntity($lancamento, $this->request->getData());
            if ($this->Lancamento->save($lancamento)) {
                $this->Flash->success(__('The lancamento has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The lancamento could not be saved. Please, try again.'));
        }
        $this->set(compact('lancamento'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Lancamento id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $lancamento = $this->Lancamento->get($id);
        if ($this->Lancamento->delete($lancamento)) {
            $this->Flash->success(__('The lancamento has been deleted.'));
        } else {
            $this->Flash->error(__('The lancamento could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
