<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Turma Controller
 *
 * @property \App\Model\Table\TurmaTable $Turma
 */
class TurmaController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Turma->find();
        $turma = $this->paginate($query);

        $this->set(compact('turma'));
    }

    /**
     * View method
     *
     * @param string|null $id Turma id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $turma = $this->Turma->get($id, contain: []);
        $this->set(compact('turma'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $turma = $this->Turma->newEmptyEntity();
        if ($this->request->is('post')) {
            $turma = $this->Turma->patchEntity($turma, $this->request->getData());
            if ($this->Turma->save($turma)) {
                $this->Flash->success(__('The turma has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The turma could not be saved. Please, try again.'));
        }
        $this->set(compact('turma'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Turma id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $turma = $this->Turma->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $turma = $this->Turma->patchEntity($turma, $this->request->getData());
            if ($this->Turma->save($turma)) {
                $this->Flash->success(__('The turma has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The turma could not be saved. Please, try again.'));
        }
        $this->set(compact('turma'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Turma id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $turma = $this->Turma->get($id);
        if ($this->Turma->delete($turma)) {
            $this->Flash->success(__('The turma has been deleted.'));
        } else {
            $this->Flash->error(__('The turma could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
