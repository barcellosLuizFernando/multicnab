<?php

namespace Multicnab\Cobranca;

use ArrayIterator;
use Countable;
use DateTimeImmutable;
use IteratorAggregate;
use JsonSerializable;
use Multicnab\Cobranca\Header as CobrancaHeader;
use Multicnab\Cobranca\Segmentos\Segmento_t;
use Multicnab\Cobranca\Segmentos\Segmento_u;
use Multicnab\Cobranca\Trailer as CobrancaTrailer;
use Multicnab\Header;
use Multicnab\ReadFile;
use Multicnab\Trailer;
use PhpParser\Node\Expr\Cast\Double;
use stdClass;
use Traversable;

class Cobranca implements Countable, IteratorAggregate, JsonSerializable
{

    public Header $fileheader;
    public CobrancaHeader $loteheader;
    public Segmentos $segmentos;
    public CobrancaTrailer $lotetrailer;
    public Trailer $filetrailer;

    public function __construct(string $file_path = null)
    {

        $this->fileheader = new Header();
        $this->loteheader = new CobrancaHeader();
        $this->segmentos = new Segmentos();
        $this->lotetrailer = new CobrancaTrailer();
        $this->filetrailer = new Trailer();

        #echo json_encode($this);

        try {
            $this->readfile($file_path);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function jsonSerialize(): mixed
    {
        return json_decode(json_encode($this));
    }

    public function count(): int
    {
        # code...
        return 1;
    }

    public function getIterator(): Traversable
    {
        return new ArrayIterator($this);
    }

    public function getAll()
    {
        return $this;
    }

    private function readFile(string $file_path)
    {

        $filereader = new ReadFile($file_path);

        $lines = $filereader->getContent();

        foreach ($lines["header"] as $key => $field) {
            # code...
            $value = rtrim($field['value']);

            switch ($field['campo']) {
                case 'Banco':
                    # code...
                    $this->fileheader->banco = $value;
                    break;
                case 'Lote':
                    # code...
                    $this->fileheader->lote = $value;
                    break;
                case 'Registro':
                    # code...
                    $this->fileheader->registro = $value;
                    break;
                case 'Inscrição - tipo':
                    # code...
                    $this->fileheader->tipo_inscricao = $value;
                    break;
                case 'Inscrição - número':
                    # code...
                    $this->fileheader->numero_inscricao = $value;
                    break;
                case 'Convênio':
                    # code...
                    $this->fileheader->convenio = $value;
                    break;
                case 'Agência - código':
                    # code...
                    $this->fileheader->cc_cod_agencia = $value;
                    break;
                case 'Agência - DV':
                    # code...
                    $this->fileheader->cc_dv_agencia = $value;
                    break;
                case 'Conta - número':
                    # code...
                    $this->fileheader->cc_numero = $value;
                    break;
                case 'Conta - DV':
                    # code...
                    $this->fileheader->cc_dv = $value;
                    break;
                case 'Nome':
                    # code...
                    $this->fileheader->nome_empresa = $value;
                    break;
                case 'Nome do banco':
                    # code...
                    $this->fileheader->nome_banco = $value;
                    break;
                case 'Código':
                    # code...
                    $this->fileheader->cod_rem_ret = $value;
                    break;
                case 'Data de geração':
                    # code...
                    #$dt_geracao = date_parse_from_format("dmY", $value);
                    $dt_geracao = DateTimeImmutable::createFromFormat("dmY", $value);
                    $this->fileheader->data_ger_arquivo = $dt_geracao->format("Y-m-d");
                    break;
                case 'Hora de geração':
                    # code...
                    $this->fileheader->hora_ger_arquivo = $value;
                    break;
                case 'Sequencia (NSA)':
                    # code...
                    $this->fileheader->numero_arquivo = $value;
                    break;
                case 'Layout do arquivo':
                    # code...
                    $this->fileheader->versao_layout = $value;
                    break;

                default:
                    # code...
                    break;
            }
        }

        foreach ($lines["headerLote"] as $key => $field) {
            # code...
            $value = rtrim($field['value']);

            switch ($field['campo']) {
                case 'Banco':
                    # code...
                    $this->loteheader->banco = $value;
                    break;
                case 'Lote':
                    # code...
                    $this->loteheader->lote = $value;
                    break;
                case 'Registro':
                    # code...
                    $this->loteheader->registro = $value;
                    break;
                case 'Operação':
                    # code...
                    $this->loteheader->operacao = $value;
                    break;
                case 'Serviço':
                    # code...
                    $this->loteheader->servico = $value;
                    break;
                case 'Layout':
                    # code...
                    $this->loteheader->versao_layout = $value;
                    break;
                case 'Inscrição - Tipo':
                    # code...
                    $this->loteheader->tipo_inscricao = $value;
                    break;
                case 'Inscrição - Número':
                    # code...
                    $this->loteheader->numero_inscricao = $value;
                    break;
                case 'Convênio':
                    # code...
                    $this->loteheader->convenio = $value;
                    break;
                case 'Agência - Código':
                    # code...
                    $this->loteheader->cc_cod_agencia = $value;
                    break;
                case 'Agência - DV':
                    # code...
                    $this->loteheader->cc_dv_agencia = $value;
                    break;
                case 'Conta - Número':
                    # code...
                    $this->loteheader->cc_numero = $value;
                    break;
                case 'Conta - DV':
                    # code...
                    $this->loteheader->cc_dv = $value;
                    break;
                case 'Nome':
                    # code...
                    $this->loteheader->nome_empresa = $value;
                    break;
                case 'Nº rem/ret':
                    # code...
                    $this->loteheader->numero_rem_ret = $value;
                    break;
                case 'Dt. Gravação"':
                    # code...

                    $dt_gravacao = DateTimeImmutable::createFromFormat("dmY", $value);
                    $this->loteheader->dt_gravacao = $dt_gravacao->format("Y-m-d");
                    break;


                default:
                    # code...
                    break;
            }
        }

        foreach ($lines["loteTrailer"] as $key => $field) {
            # code...
            $value = rtrim($field['value']);

            switch ($field['campo']) {
                case 'Banco':
                    # code...
                    $this->lotetrailer->banco = $value;
                    break;
                case 'Lote':
                    # code...
                    $this->lotetrailer->lote = $value;
                    break;
                case 'Registro':
                    # code...
                    $this->lotetrailer->registro = $value;
                    break;
                case 'Qtd registros':
                    # code...
                    $this->lotetrailer->qtd_registros = (int) $value;
                    break;
                case 'Simples - Quantidade de títulos em cobrança':
                    # code...
                    $this->lotetrailer->tot_cobranca_simples = (int) $value;
                    break;
                case 'Simples - Valor total dos títulos em carteiras':
                    # code...
                    $numcaract = strlen($value);
                    $vlr = substr_replace($value, ".", $numcaract - 2, 0);
                    $this->lotetrailer->vlr_cobranca_simples = (float) $vlr;
                    break;
                case 'Vinculada - Quantidade de títulos em cobrança':
                    # code...
                    $this->lotetrailer->tot_cobranca_vinculada = (int) $value;
                    break;
                case 'Vinculada - Valor total dos títulos em carteiras':
                    # code...
                    $numcaract = strlen($value);
                    $vlr = substr_replace($value, ".", $numcaract - 2, 0);
                    $this->lotetrailer->vlr_cobranca_vinculada = (float) $vlr;
                    break;
                case 'Caucionada - Quantidade de títulos em cobrança':
                    # code...
                    $this->lotetrailer->tot_cobranca_caucionada = (int) $value;
                    break;
                case 'Caucionada - Valor total dos títulos em carteiras':
                    # code...
                    $numcaract = strlen($value);
                    $vlr = substr_replace($value, ".", $numcaract - 2, 0);
                    $this->lotetrailer->vlr_cobranca_caucionada = (float) $vlr;
                    break;
                case 'Descontada - Quantidade de títulos em cobrança':
                    # code...
                    $this->lotetrailer->tot_cobranca_descontada = (int) $value;
                    break;
                case 'Descontada - Valor total dos títulos em carteiras':
                    # code...
                    $numcaract = strlen($value);
                    $vlr = substr_replace($value, ".", $numcaract - 2, 0);
                    $this->lotetrailer->vlr_cobranca_descontada = (float) $vlr;
                    break;
                case 'N. do aviso':
                    # code...
                    $this->lotetrailer->numero_aviso = $value;
                    break;



                default:
                    # code...
                    break;
            }
        }

        foreach ($lines["trailer"] as $key => $field) {
            # code...
            $value = rtrim($field['value']);

            switch ($field['campo']) {
                case 'Banco':
                    # code...
                    $this->filetrailer->banco = $value;
                    break;
                case 'Lote':
                    # code...
                    $this->filetrailer->lote = $value;
                    break;
                case 'Registro':
                    # code...
                    $this->filetrailer->registro = $value;
                    break;
                case 'Qtd registros':
                    # code...
                    $this->filetrailer->qtd_lotes = (int) $value;
                    break;
                case 'Simples - Quantidade de títulos em cobrança':
                    # code...
                    $this->filetrailer->qtd_registros = (int) $value;
                    break;

                default:
                    # code...
                    break;
            }
        }

        foreach ($lines["detail"] as $key => $detail) {
            $segmento_t = new Segmento_t();
            # code...
            foreach ($detail as $key => $field) {
                # code...

                $value = $field['value'];

                switch ($field['campo']) {
                    case 'Banco':
                        # code...
                        $segmento_t->banco = $value;
                        break;
                    case 'Lote':
                        # code...
                        $segmento_t->lote = $value;
                        break;
                    case 'Registro':
                        # code...
                        $segmento_t->registro = $value;
                        break;
                    case 'Nº do registro':
                        # code...
                        $segmento_t->numero_registro = $value;
                        break;
                    case 'Segmento':
                        # code...
                        $segmento_t->segmento = $value;
                        break;
                    case 'Cod. Mov.':
                        # code...
                        $segmento_t->cod_movimento = $value;
                        break;
                    case 'Agência - código':
                        # code...
                        $segmento_t->cc_cod_agencia = $value;
                        break;
                    case 'Agência - DV':
                        # code...
                        $segmento_t->cc_dv_agencia = $value;
                        break;
                    case 'Conta - número':
                        # code...
                        $segmento_t->cc_numero = $value;
                        break;
                    case 'Conta - DV':
                        # code...
                        $segmento_t->cc_dv = $value;
                        break;
                    case 'Nosso número':
                        # code...
                        $segmento_t->nosso_numero = $value;
                        break;
                    case 'Carteira':
                        # code...
                        $segmento_t->carteira = $value;
                        break;
                    case 'Número do documento':
                        # code...
                        $segmento_t->numero_documento = rtrim($value);
                        break;
                    case 'Vencimento':
                        # code...
                        $dt = DateTimeImmutable::createFromFormat("dmY", $value);
                        $segmento_t->vencimento = $dt->format("Y-m-d");
                        break;
                    case 'Valor do título':
                        # code...
                        $numcaract = strlen($value);
                        $vlr = (float) substr_replace($value, ".", $numcaract - 2, 0);
                        $segmento_t->valor_titulo = $vlr;
                        break;
                    case 'Banco Cobr./Receb.':
                        # code...
                        $segmento_t->banco_recebimento = $value;
                        break;
                    case 'Ag. Cobr./Receb.':
                        # code...
                        $segmento_t->agencia_recebimento = $value;
                        break;
                    case 'DV':
                        # code...
                        $segmento_t->dv_recebimento = $value;
                        break;
                    case 'Cod. Moeda':
                        # code...
                        $segmento_t->cod_moeda = $value;
                        break;
                    case 'Inscrição - tipo':
                        # code...
                        $segmento_t->tipo_inscricao = $value;
                        break;
                    case 'Inscrição - número':
                        # code...
                        $segmento_t->numero_inscricao = $value;
                        break;
                    case 'Nome':
                        # code...
                        $segmento_t->nome = rtrim($value);
                        break;
                    case 'Número do contrato':
                        # code...
                        $segmento_t->numero_contrato = $value;
                        break;
                    case 'Valor da tar. custas':
                        # code...
                        $numcaract = strlen($value);
                        $vlr = (float) substr_replace($value, ".", $numcaract - 2, 0);
                        $segmento_t->vlr_tarifas_custas = $vlr;
                        break;
                    case 'Motivo da ocorrência':
                        # code...
                        $segmento_t->motivo_ocorrencia = $value;
                        break;
                    case 'Movimento':
                        # code...
                        $segmento_u = new Segmento_u();

                        foreach ($field['value'] as $key => $det) {
                            # code...
                            $value = $det['value'];
                            switch ($det['campo']) {
                                case 'Banco':
                                    # code...
                                    $segmento_t->segmento_u->banco = $value;
                                    break;
                                case 'Lote':
                                    # code...
                                    $segmento_t->segmento_u->lote = $value;
                                    break;
                                case 'Registro':
                                    # code...
                                    $segmento_t->segmento_u->registro = $value;
                                    break;
                                case 'Nº do registro':
                                    # code...
                                    $segmento_t->segmento_u->numero_lote = $value;
                                    break;
                                case 'Segmento':
                                    # code...
                                    $segmento_t->segmento_u->segmento = $value;
                                    break;
                                case 'Cod. Mov.':
                                    # code...
                                    $segmento_t->segmento_u->cod_movimento = $value;
                                    break;
                                case 'Acréscimos':
                                    # code...
                                    $numcaract = strlen($value);
                                    $vlr = (float) substr_replace($value, ".", $numcaract - 2, 0);
                                    $segmento_t->segmento_u->vlr_acrescimos = $vlr;
                                    break;
                                case 'Vlr do desconto':
                                    # code...
                                    $numcaract = strlen($value);
                                    $vlr = (float) substr_replace($value, ".", $numcaract - 2, 0);
                                    $segmento_t->segmento_u->vlr_descontos = $vlr;
                                    break;
                                case 'Vlr do abatimento':
                                    # code...
                                    $numcaract = strlen($value);
                                    $vlr = (float) substr_replace($value, ".", $numcaract - 2, 0);
                                    $segmento_t->segmento_u->vlr_abatimentos = $vlr;
                                    break;
                                case 'Vlr do IOF':
                                    # code...
                                    $numcaract = strlen($value);
                                    $vlr = (float) substr_replace($value, ".", $numcaract - 2, 0);
                                    $segmento_t->segmento_u->vlr_iof = $vlr;
                                    break;
                                case 'Vlr pago':
                                    # code...
                                    $numcaract = strlen($value);
                                    $vlr = (float) substr_replace($value, ".", $numcaract - 2, 0);
                                    $segmento_t->segmento_u->vlr_pago = $vlr;
                                    break;
                                case 'Vlr líquido':
                                    # code...
                                    $numcaract = strlen($value);
                                    $vlr = (float) substr_replace($value, ".", $numcaract - 2, 0);
                                    $segmento_t->segmento_u->vlr_liquido = $vlr;
                                    break;
                                case 'Outras despesas':
                                    # code...
                                    $numcaract = strlen($value);
                                    $vlr = (float) substr_replace($value, ".", $numcaract - 2, 0);
                                    $segmento_t->segmento_u->outras_despesas = $vlr;
                                    break;
                                case 'Outros créditos':
                                    # code...
                                    $numcaract = strlen($value);
                                    $vlr = (float) substr_replace($value, ".", $numcaract - 2, 0);
                                    $segmento_t->segmento_u->outros_creditos = $vlr;
                                    break;
                                case 'Data da ocorrência':
                                    # code...
                                    $dt = DateTimeImmutable::createFromFormat("dmY", $value);
                                    $segmento_t->segmento_u->data_ocorrencia = $dt->format('Y-m-d');
                                    break;
                                case 'Data do crédito':
                                    # code...
                                    $dt = DateTimeImmutable::createFromFormat("dmY", $value);
                                    $segmento_t->segmento_u->data_credito = $dt->format("Y-m-d");
                                    break;
                                case 'Código':
                                    # code...
                                    $segmento_t->segmento_u->pg_codigo_ocorrencia = $value;
                                    break;
                                case 'Data ocorrência':
                                    # code...
                                    $dt = DateTimeImmutable::createFromFormat("dmY", $value);
                                    $segmento_t->segmento_u->pg_data_ocorrencia = $dt->format("Y-m-d");
                                    break;
                                case 'Valor ocorrência':
                                    # code...
                                    $numcaract = strlen($value);
                                    $vlr = (float) substr_replace($value, ".", $numcaract - 2, 0);
                                    $segmento_t->segmento_u->pg_valor_ocorrencia = $vlr;
                                    break;
                                case 'Compl. da ocorrência':
                                    # code...
                                    $segmento_t->segmento_u->compl_ocorrencia = $value;
                                    break;
                                case 'Cod. Bco. Corr.':
                                    # code...
                                    $segmento_t->segmento_u->cod_banco_correspondente = $value;
                                    break;




                                default:
                                    # code...
                                    break;
                            }
                        }
                        break;


                    default:
                        # code...
                        break;
                }
            }

            $this->segmentos->addItem($segmento_t);
        }

        #echo json_encode($filereader->getContent());
        #echo json_encode($lines);
        #echo json_encode($this);
    }
}
