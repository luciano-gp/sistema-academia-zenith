<?php
declare(strict_types=1);

namespace App\Controller;

use App\Lib\Relatorios\RelatorioFrequencia;
use Cake\I18n\DateTime;
use Cake\I18n\FrozenDate;

/**
 * OcorrenciaAula Controller
 *
 * @property \App\Model\Table\RegistroPresencaTable $RegistroPresenca
 */
class RelatorioController extends AppController
{
    /**
     * Relatorio Frequencia method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function relatorio_frequencia()
    {
        try {
            $dados = $this->getRequest()->getData();
            if (empty($dados['data_inicial']) || empty($dados['data_final'])) {
                throw new \Exception('É necessário preencher as datas inicial e final.');
            }

            $dataInicio = new FrozenDate(self::dataBRToISO($dados['data_inicio']));
            $dataFinal = new FrozenDate(self::dataBRToISO($dados['data_final']));
            $pessoaId = !empty($dados['pessoa_id']) ? (int)$dados['pessoa_id'] : null;

            $relatorioFrequencia = new RelatorioFrequencia($this->RegistroPresenca);
            $frequencias = $relatorioFrequencia->getDados($dataInicio, $dataFinal, $pessoaId);

            return $this->response->withType('application/json')->withStringBody(json_encode($frequencias));
        } catch (\Exception $e) {
            return $this->response->withStatus(500)
                ->withStringBody(json_encode([
                    "message" => "Erro ao gerar relatório",
                    "error" => $e->getMessage()
                ]));
        }
    }

    private static function dataBRToISO($data): ?string
    {
        $date = DateTime::createFromFormat('d/m/Y', $data);
        return $date ? $date->format('Y-m-d') : null;
    }
}
