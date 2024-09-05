<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * OcorrenciaAula Controller
 *
 * @property \App\Model\Table\OcorrenciaAulaTable $OcorrenciaAula
 */
class OcorrenciaAulaController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->OcorrenciaAula->find();
        $ocorrenciaAula = $this->paginate($query);

        $this->set(compact('ocorrenciaAula'));
    }

    /**
     * View method
     *
     * @param string|null $id Ocorrencia Aula id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ocorrenciaAula = $this->OcorrenciaAula->get($id, contain: []);
        $this->set(compact('ocorrenciaAula'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ocorrenciaAula = $this->OcorrenciaAula->newEmptyEntity();
        if ($this->request->is('post')) {
            $ocorrenciaAula = $this->OcorrenciaAula->patchEntity($ocorrenciaAula, $this->request->getData());
            if ($this->OcorrenciaAula->save($ocorrenciaAula)) {
                $this->Flash->success(__('The ocorrencia aula has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ocorrencia aula could not be saved. Please, try again.'));
        }
        $this->set(compact('ocorrenciaAula'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Ocorrencia Aula id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ocorrenciaAula = $this->OcorrenciaAula->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ocorrenciaAula = $this->OcorrenciaAula->patchEntity($ocorrenciaAula, $this->request->getData());
            if ($this->OcorrenciaAula->save($ocorrenciaAula)) {
                $this->Flash->success(__('The ocorrencia aula has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ocorrencia aula could not be saved. Please, try again.'));
        }
        $this->set(compact('ocorrenciaAula'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Ocorrencia Aula id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ocorrenciaAula = $this->OcorrenciaAula->get($id);
        if ($this->OcorrenciaAula->delete($ocorrenciaAula)) {
            $this->Flash->success(__('The ocorrencia aula has been deleted.'));
        } else {
            $this->Flash->error(__('The ocorrencia aula could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
