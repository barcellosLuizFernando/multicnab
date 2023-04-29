<?php

    namespace Multicnab\Cobranca\Segmentos;

use Multicnab\Movimentos;

class Segmento_t {


    public $banco;
    public $lote;
    public $registro;
    public $numero_registro;
    public $segmento;
    public $cnab01;
    public $cod_movimento;
    public $cc_cod_agencia;
    public $cc_dv_agencia;
    public $cc_numero;
    public $cc_dv;
    public $cc_dv_agencia_conta;
    public $nosso_numero;
    public $carteira;
    public $numero_documento;
    public $vencimento;
    public $valor_titulo;
    public $banco_recebimento;
    public $agencia_recebimento;
    public $dv_recebimento;
    public $numero_titulo_empresa;
    public $cod_moeda;
    public $tipo_inscricao;
    public $numero_inscricao;
    public $nome;
    public $numero_contrato;
    public $vlr_tarifas_custas;
    public $motivo_ocorrencia;
    public $cnab02;
    public Segmento_u $segmento_u;
    public Movimentos $movimentos;

    public function __construct()
    {
        $this->segmento_u = new Segmento_u();
    }

}