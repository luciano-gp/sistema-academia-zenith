<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Plano Controller
 *
 * @property \App\Model\Table\PlanoTable $Plano
 */
class PlanoController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Plano->find();
        $plano = $this->paginate($query);

        $this->set(compact('plano'));
    }

    /**
     * View method
     *
     * @param string|null $id Plano id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $plano = $this->Plano->get($id, contain: ['Aula']);
        $this->set(compact('plano'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $plano = $this->Plano->newEmptyEntity();
        if ($this->request->is('post')) {
            $plano = $this->Plano->patchEntity($plano, $this->request->getData());
            if ($this->Plano->saveOrFail($plano)) {
                $this->Flash->success(__('The plano has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The plano could not be saved. Please, try again.'));
        }
        $aula = $this->Plano->Aula->find('list', limit: 200)->all();
        $this->set(compact('plano', 'aula'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Plano id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $plano = $this->Plano->get($id, contain: ['Aula']);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $plano = $this->Plano->patchEntity($plano, $this->request->getData());
            if ($this->Plano->saveOrFail($plano)) {
                $this->Flash->success(__('The plano has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The plano could not be saved. Please, try again.'));
        }
        $aula = $this->Plano->Aula->find('list', limit: 200)->all();
        $this->set(compact('plano', 'aula'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Plano id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $plano = $this->Plano->get($id);
        if ($this->Plano->delete($plano)) {
            $this->Flash->success(__('The plano has been deleted.'));
        } else {
            $this->Flash->error(__('The plano could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
