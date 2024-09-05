<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Aula Controller
 *
 * @property \App\Model\Table\AulaTable $Aula
 */
class AulaController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Aula->find();
        $aula = $this->paginate($query);

        $this->set(compact('aula'));
    }

    /**
     * View method
     *
     * @param string|null $id Aula id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $aula = $this->Aula->get($id, contain: ['Plano']);
        $this->set(compact('aula'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $aula = $this->Aula->newEmptyEntity();
        if ($this->request->is('post')) {
            $aula = $this->Aula->patchEntity($aula, $this->request->getData());
            if ($this->Aula->save($aula)) {
                $this->Flash->success(__('The aula has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The aula could not be saved. Please, try again.'));
        }
        $plano = $this->Aula->Plano->find('list', limit: 200)->all();
        $this->set(compact('aula', 'plano'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Aula id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $aula = $this->Aula->get($id, contain: ['Plano']);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $aula = $this->Aula->patchEntity($aula, $this->request->getData());
            if ($this->Aula->save($aula)) {
                $this->Flash->success(__('The aula has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The aula could not be saved. Please, try again.'));
        }
        $plano = $this->Aula->Plano->find('list', limit: 200)->all();
        $this->set(compact('aula', 'plano'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Aula id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $aula = $this->Aula->get($id);
        if ($this->Aula->delete($aula)) {
            $this->Flash->success(__('The aula has been deleted.'));
        } else {
            $this->Flash->error(__('The aula could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
