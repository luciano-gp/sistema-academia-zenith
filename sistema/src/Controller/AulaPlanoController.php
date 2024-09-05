<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * AulaPlano Controller
 *
 * @property \App\Model\Table\AulaPlanoTable $AulaPlano
 */
class AulaPlanoController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->AulaPlano->find();
        $aulaPlano = $this->paginate($query);

        $this->set(compact('aulaPlano'));
    }

    /**
     * View method
     *
     * @param string|null $id Aula Plano id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $aulaPlano = $this->AulaPlano->get($id, contain: []);
        $this->set(compact('aulaPlano'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $aulaPlano = $this->AulaPlano->newEmptyEntity();
        if ($this->request->is('post')) {
            $aulaPlano = $this->AulaPlano->patchEntity($aulaPlano, $this->request->getData());
            if ($this->AulaPlano->save($aulaPlano)) {
                $this->Flash->success(__('The aula plano has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The aula plano could not be saved. Please, try again.'));
        }
        $this->set(compact('aulaPlano'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Aula Plano id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $aulaPlano = $this->AulaPlano->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $aulaPlano = $this->AulaPlano->patchEntity($aulaPlano, $this->request->getData());
            if ($this->AulaPlano->save($aulaPlano)) {
                $this->Flash->success(__('The aula plano has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The aula plano could not be saved. Please, try again.'));
        }
        $this->set(compact('aulaPlano'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Aula Plano id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $aulaPlano = $this->AulaPlano->get($id);
        if ($this->AulaPlano->delete($aulaPlano)) {
            $this->Flash->success(__('The aula plano has been deleted.'));
        } else {
            $this->Flash->error(__('The aula plano could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
