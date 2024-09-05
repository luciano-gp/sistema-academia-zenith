<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * FormaPagamento Controller
 *
 * @property \App\Model\Table\FormaPagamentoTable $FormaPagamento
 */
class FormaPagamentoController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->FormaPagamento->find();
        $formaPagamento = $this->paginate($query);

        $this->set(compact('formaPagamento'));
    }

    /**
     * View method
     *
     * @param string|null $id Forma Pagamento id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $formaPagamento = $this->FormaPagamento->get($id, contain: []);
        $this->set(compact('formaPagamento'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $formaPagamento = $this->FormaPagamento->newEmptyEntity();
        if ($this->request->is('post')) {
            $formaPagamento = $this->FormaPagamento->patchEntity($formaPagamento, $this->request->getData());
            if ($this->FormaPagamento->save($formaPagamento)) {
                $this->Flash->success(__('The forma pagamento has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The forma pagamento could not be saved. Please, try again.'));
        }
        $this->set(compact('formaPagamento'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Forma Pagamento id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $formaPagamento = $this->FormaPagamento->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $formaPagamento = $this->FormaPagamento->patchEntity($formaPagamento, $this->request->getData());
            if ($this->FormaPagamento->save($formaPagamento)) {
                $this->Flash->success(__('The forma pagamento has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The forma pagamento could not be saved. Please, try again.'));
        }
        $this->set(compact('formaPagamento'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Forma Pagamento id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $formaPagamento = $this->FormaPagamento->get($id);
        if ($this->FormaPagamento->delete($formaPagamento)) {
            $this->Flash->success(__('The forma pagamento has been deleted.'));
        } else {
            $this->Flash->error(__('The forma pagamento could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
