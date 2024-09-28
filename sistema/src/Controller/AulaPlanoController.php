<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Datasource\EntityInterface;

/**
 * AulaPlano Controller
 *
 * @property \App\Model\Table\AulaPlanoTable $AulaPlano
 */
class AulaPlanoController extends AppController
{
    /**
     * View method
     *
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($ref_plano = null)
    {
        try {
            $aulaPlano = $this->AulaPlano->find()->where(['ref_plano' => $ref_plano])->firstOrFail()->toArray();
            return $this->response->withType('application/json')->withStringBody(json_encode($aulaPlano));
        } catch (\Exception $e) {
            return $this->response->withStatus(404)
                ->withStringBody(json_encode([
                    "message" => "Aula do plano não encontrada",
                    "error" => $e->getMessage()
                ]));
        }
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
            try {
                $aulaPlano = $this->AulaPlano->patchEntity($aulaPlano, $this->request->getData());

                $this->AulaPlano->saveOrFail($aulaPlano);

                return $this->response->withType('application/json')
                    ->withStringBody(json_encode([
                        'message' => 'Aula do plano adicionada com sucesso',
                        'aula_plano' => $aulaPlano
                    ]));
            } catch (\Exception $e) {
                return $this->response->withStatus(400)->withType('application/json')
                    ->withStringBody(json_encode([
                        'message' => 'Erro ao adicionar aula do plano',
                        'errors' => $e->getMessage()
                    ]));
            }
        }
    }

    /**
     * Delete method
     *
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($ref_aula = null, $ref_plano = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $aulaPlano = null;

        try {
            /** @var EntityInterface $aulaPlano */
            $aulaPlano = $this->AulaPlano->find()->where(['ref_aula' => $ref_aula, 'ref_plano' => $ref_plano])->firstOrFail();
        } catch (\Exception $e) {
            return $this->response->withStatus(404)
                ->withStringBody(json_encode([
                    "message" => "Aula do plano não encontrada",
                    "error" => $e->getMessage()
                ]));
        }

        try {
            $this->AulaPlano->delete($aulaPlano);
            return $this->response->withType('application/json')
                ->withStringBody(json_encode([
                    'message' => 'Aula do plano deletada com sucesso',
                    'aula_plano' => $aulaPlano
                ]));
        } catch (\Exception $e) {
            return $this->response->withStatus(500)
                ->withStringBody(json_encode([
                    "message" => "Erro ao deletar aula do plano",
                    "error" => $e->getMessage()
                ]));
        }
    }
}
