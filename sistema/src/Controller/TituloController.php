<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Titulo Controller
 *
 * @property \App\Model\Table\TituloTable $Titulo
 */
class TituloController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Titulo->find();
        $titulo = $this->paginate($query);

        $this->set(compact('titulo'));
    }

    /**
     * View method
     *
     * @param string|null $id Titulo id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $titulo = $this->Titulo->get($id, contain: []);
        $this->set(compact('titulo'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $titulo = $this->Titulo->newEmptyEntity();
        if ($this->request->is('post')) {
            $titulo = $this->Titulo->patchEntity($titulo, $this->request->getData());
            if ($this->Titulo->saveOrFail($titulo)) {
                $this->Flash->success(__('The titulo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The titulo could not be saved. Please, try again.'));
        }
        $this->set(compact('titulo'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Titulo id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $titulo = $this->Titulo->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $titulo = $this->Titulo->patchEntity($titulo, $this->request->getData());
            if ($this->Titulo->saveOrFail($titulo)) {
                $this->Flash->success(__('The titulo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The titulo could not be saved. Please, try again.'));
        }
        $this->set(compact('titulo'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Titulo id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $titulo = $this->Titulo->get($id);
        if ($this->Titulo->delete($titulo)) {
            $this->Flash->success(__('The titulo has been deleted.'));
        } else {
            $this->Flash->error(__('The titulo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
