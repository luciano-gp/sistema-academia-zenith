<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * RegistroPresenca Controller
 *
 * @property \App\Model\Table\RegistroPresencaTable $RegistroPresenca
 */
class RegistroPresencaController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->RegistroPresenca->find();
        $registroPresenca = $this->paginate($query);

        $this->set(compact('registroPresenca'));
    }

    /**
     * View method
     *
     * @param string|null $id Registro Presenca id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $registroPresenca = $this->RegistroPresenca->get($id, contain: []);
        $this->set(compact('registroPresenca'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $registroPresenca = $this->RegistroPresenca->newEmptyEntity();
        if ($this->request->is('post')) {
            $registroPresenca = $this->RegistroPresenca->patchEntity($registroPresenca, $this->request->getData());
            if ($this->RegistroPresenca->saveOrFail($registroPresenca)) {
                $this->Flash->success(__('The registro presenca has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The registro presenca could not be saved. Please, try again.'));
        }
        $this->set(compact('registroPresenca'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Registro Presenca id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $registroPresenca = $this->RegistroPresenca->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $registroPresenca = $this->RegistroPresenca->patchEntity($registroPresenca, $this->request->getData());
            if ($this->RegistroPresenca->saveOrFail($registroPresenca)) {
                $this->Flash->success(__('The registro presenca has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The registro presenca could not be saved. Please, try again.'));
        }
        $this->set(compact('registroPresenca'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Registro Presenca id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $registroPresenca = $this->RegistroPresenca->get($id);
        if ($this->RegistroPresenca->delete($registroPresenca)) {
            $this->Flash->success(__('The registro presenca has been deleted.'));
        } else {
            $this->Flash->error(__('The registro presenca could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
