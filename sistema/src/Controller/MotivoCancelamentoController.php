<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * MotivoCancelamento Controller
 *
 * @property \App\Model\Table\MotivoCancelamentoTable $MotivoCancelamento
 */
class MotivoCancelamentoController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->MotivoCancelamento->find();
        $motivoCancelamento = $this->paginate($query);

        $this->set(compact('motivoCancelamento'));
    }

    /**
     * View method
     *
     * @param string|null $id Motivo Cancelamento id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $motivoCancelamento = $this->MotivoCancelamento->get($id, contain: []);
        $this->set(compact('motivoCancelamento'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $motivoCancelamento = $this->MotivoCancelamento->newEmptyEntity();
        if ($this->request->is('post')) {
            $motivoCancelamento = $this->MotivoCancelamento->patchEntity($motivoCancelamento, $this->request->getData());
            if ($this->MotivoCancelamento->save($motivoCancelamento)) {
                $this->Flash->success(__('The motivo cancelamento has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The motivo cancelamento could not be saved. Please, try again.'));
        }
        $this->set(compact('motivoCancelamento'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Motivo Cancelamento id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $motivoCancelamento = $this->MotivoCancelamento->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $motivoCancelamento = $this->MotivoCancelamento->patchEntity($motivoCancelamento, $this->request->getData());
            if ($this->MotivoCancelamento->save($motivoCancelamento)) {
                $this->Flash->success(__('The motivo cancelamento has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The motivo cancelamento could not be saved. Please, try again.'));
        }
        $this->set(compact('motivoCancelamento'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Motivo Cancelamento id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $motivoCancelamento = $this->MotivoCancelamento->get($id);
        if ($this->MotivoCancelamento->delete($motivoCancelamento)) {
            $this->Flash->success(__('The motivo cancelamento has been deleted.'));
        } else {
            $this->Flash->error(__('The motivo cancelamento could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
