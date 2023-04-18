<?php

namespace Multicnab\Cobranca\Layouts;

class CnabPHP_v040 implements CnabPHP
{
    //Properties
    private $header = [];
    private $cobHeader = [];
    private $cobSegmentoT = [];
    private $cobSegmentoU = [];
    private $cobTrailer = [];
    private $trailer = [];

    public function __construct()
    {
        $this->setLayout(
            "cobHeader",

            'Banco',
            'Código do banco na compensação',
            3,
            3,
            'num'
        );
        $this->setLayout("cobHeader", 'Lote', 'Lote de serviço', 7, 4, 'num');
        $this->setLayout("cobHeader", 'Registro', 'Tipo de registro', 8, 1, 'num');
        $this->setLayout("cobHeader", 'Operação', 'Tipo de operação', 9, 1, 'alfa');
        $this->setLayout("cobHeader", 'Serviço', 'Tipo de serviço', 11, 2, 'num');
        $this->setLayout("cobHeader",  'CNAB', 'Uso exclusivo FEBRABAN/CNAB', 13, 2, 'alfa');
        $this->setLayout("cobHeader", 'Layout', 'Nº da versão do layout do lote', 16, 3, 'num');
        $this->setLayout("cobHeader", 'CNAB', 'Uso exclusivo FEBRABAN/CNAB', 17, 1, 'num');
        $this->setLayout("cobHeader", 'Inscrição - tipo', 'Tipo de inscrição da Empresa', 18, 1, 'num');
        $this->setLayout("cobHeader", 'Inscrição - número', 'Número de inscrição da Empresa', 33, 15, 'num');
        $this->setLayout("cobHeader", 'Convênio', 'Código do convênio do Banco', 42, 9, 'alfa');
        $this->setLayout("cobHeader", 'Reservado (uso Banco)', 'Reservado', 53, 11, 'alfa');
        $this->setLayout("cobHeader", 'Agência - Código', 'Agência mantenedora da conta', 57, 4, 'num');
        $this->setLayout("cobHeader", 'Agência - DV', 'Dígito verificador da agência', 58, 1, 'alfa');
        $this->setLayout("cobHeader", 'Conta - Número', 'Número da conta corrente', 67, 9, 'num');
        $this->setLayout("cobHeader", 'Conta - DV', 'Dígito verificador da conta', 68, 1, 'alfa');
        $this->setLayout("cobHeader", 'Reservado', 'Reservado', 73, 5, 'alfa');
        $this->setLayout("cobHeader", 'Nome', 'Nome da Empresa', 103, 30, 'alfa');
        $this->setLayout("cobHeader", 'Reservado', 'Reservado', 183, 80, 'alfa');
        $this->setLayout("cobHeader", 'Nº rem/ret', 'número remessa/retorno', 191, 8, 'num');
        $this->setLayout("cobHeader", 'Dt. Gravação', 'Data de gravação remessa/retorno', 199, 8, 'num');
        $this->setLayout("cobHeader", 'CNAB', 'Uso Exclusivo FREBRABAN/CNAB', 240, 41, 'alfa');


        $this->setLayout("cobSegmentoT", "Banco", "Código do banco na compensação", 3, 3, "num");
        $this->setLayout("cobSegmentoT", "Lote", "Lote de serviço", 7, 4, "num");
        $this->setLayout("cobSegmentoT", "Registro", "Tipo de registro", 8, 1, "num");
        $this->setLayout("cobSegmentoT", "Nº do registro", "Número sequencial registro no lote", 13, 5, "num");
        $this->setLayout("cobSegmentoT", "Segmento", "Código segmento do registro detalhe", 14, 1, "alfa");
        $this->setLayout("cobSegmentoT", "CNAB", "Uso exclusivo FEBRABAN/CNAB", 15, 1, "alfa");
        $this->setLayout("cobSegmentoT", "Cod. Mov.", "Código do movimento retorno", 17, 2, "num");
        $this->setLayout("cobSegmentoT", "Agência - código", "Agência mantenedora da conta", 21, 4, "num");
        $this->setLayout("cobSegmentoT", "Agência - DV", "Dígito verificador da agência", 22, 1, "num");
        $this->setLayout("cobSegmentoT", "Conta - número", "Número da conta corrente", 31, 9, "num");
        $this->setLayout("cobSegmentoT", "Conta - DV", "Dígito verificador da conta", 32, 1, "num");
        #$this->setLayout("cobSegmentoT", "DV", "Dígito verificador da agência/conta", 37, 1, "num");
        $this->setLayout("cobSegmentoT", "CNAB", "Uso exclusivo FEBRABAN/CNAB", 40, 8, "alfa");
        $this->setLayout("cobSegmentoT", "Nosso número", "Identificação do título", 53, 13, "alfa");
        $this->setLayout("cobSegmentoT", "Carteira", "Código da carteira", 54, 1, "num");
        $this->setLayout("cobSegmentoT", "Número do documento", "Número do documento de cobrança", 69, 15, "num");
        $this->setLayout("cobSegmentoT", "Vencimento", "Data do vencimento do título", 77, 8, "num");
        $this->setLayout("cobSegmentoT", "Valor do título", "Valor nominal do título", 92, 15, "num");
        $this->setLayout("cobSegmentoT", "Banco Cobr./Receb.", "Número do banco", 95, 3, "num");
        $this->setLayout("cobSegmentoT", "Ag. Cobr./Receb.", "Agência cobradora / recebedora", 99, 4, "num");
        $this->setLayout("cobSegmentoT", "DV", "Dígito verificador da agência", 100, 1, "num");
        $this->setLayout("cobSegmentoT", "Uso da empresa", "Identificação do título na empresa", 125, 25, "alfa");
        $this->setLayout("cobSegmentoT", "Cod. Moeda", "Código da Moeda", 127, 2, "num");
        $this->setLayout("cobSegmentoT", "Inscrição - tipo", "Tipo de inscrição", 128, 1, "num");
        $this->setLayout("cobSegmentoT", "Inscrição - número", "Número de inscrição", 143, 15, "num");
        $this->setLayout("cobSegmentoT", "Nome", "Nome", 183, 40, "alfa");
        $this->setLayout("cobSegmentoT", "Número do contrato", "Nº do contr. da operação de crédito", 193, 10, "num");
        $this->setLayout("cobSegmentoT", "Valor da tar. custas", "Valor da tarifa / custas", 208, 15, "num");
        $this->setLayout("cobSegmentoT", "Motivo da ocorrência", "Identificação para rejeições, tarifas, custas, liquidação e baixas", 218, 10, "alfa");
        $this->setLayout("cobSegmentoT", "CNAB", "CNAB", 240, 22, "alfa");


        $this->setLayout("cobSegmentoU", "Banco", "Código do banco na compensação", 3, 3, "num");
        $this->setLayout("cobSegmentoU", "Lote", "Lote de serviço", 7, 4, "num");
        $this->setLayout("cobSegmentoU", "Registro", "Tipo de registro", 8, 1, "num");
        $this->setLayout("cobSegmentoU", "Nº do registro", "Número sequencial registro no lote", 13, 5, "num");
        $this->setLayout("cobSegmentoU", "Segmento", "Código segmento do registro detalhe", 14, 1, "alfa");
        $this->setLayout("cobSegmentoU", "CNAB", "Uso exclusivo FEBRABAN/CNAB", 15, 1, "alfa");
        $this->setLayout("cobSegmentoU", "Cod. Mov.", "Código do movimento retorno", 17, 2, "num");
        $this->setLayout("cobSegmentoU", "Acréscimos", "Juros / Multa / Encargos", 32, 15, "num");
        $this->setLayout("cobSegmentoU", "Vlr do desconto", "Valor do desconto concedido", 47, 15, "num");
        $this->setLayout("cobSegmentoU", "Vlr do abatimento", "Valor do abatimento concedido / cancelado", 62, 15, "num");
        $this->setLayout("cobSegmentoU", "Vlr do IOF", "Valor do IOF recolhido", 77, 15, "num");
        $this->setLayout("cobSegmentoU", "Vlr pago", "Valor pago pelo pagador", 92, 15, "num");
        $this->setLayout("cobSegmentoU", "Vlr líquido", "Valor líquido a ser creditado", 107, 15, "num");
        $this->setLayout("cobSegmentoU", "Outras despesas", "Valor de outras despesas", 122, 15, "num");
        $this->setLayout("cobSegmentoU", "Outros créditos", "Valor de outros créditos", 137, 15, "num");
        $this->setLayout("cobSegmentoU", "Data da ocorrência", "Data da ocorrência", 145, 8, "num");
        $this->setLayout("cobSegmentoU", "Data do crédito", "Data da efetivação do crédito", 153, 8, "num");
        $this->setLayout("cobSegmentoU", "Código", "Código da ocorrência", 157, 4, "alfa");
        $this->setLayout("cobSegmentoU", "Data ocorrência", "Data da ocorrência", 165, 8, "num");
        $this->setLayout("cobSegmentoU", "Valor ocorrência", "Valor da ocorrência", 180, 15, "num");
        $this->setLayout("cobSegmentoU", "Compl. da ocorrência", "Complemento da ocorrência", 210, 30, "alfa");
        $this->setLayout("cobSegmentoU", "Cod. Bco. Corr.", "Cod. Banco correspondente compens.", 213, 3, "num");
        #$this->setLayout("cobSegmentoU", "N. Num. Bco. Corr.", "Nosso número banco correspondente", 233, 20, "num");
        $this->setLayout("cobSegmentoU", "CNAB", "CNAB", 240, 27, "alfa");


        $this->setLayout("cobTrailer", "Banco", "Código do banco na compensação", 3, 3, "num");
        $this->setLayout("cobTrailer", "Lote", "Lote de serviço", 7, 4, "num");
        $this->setLayout("cobTrailer", "Registro", "Tipo de registro", 8, 1, "num", "5");
        $this->setLayout("cobTrailer", "CNAB", "CNAB", 17, 9, "alfa", " ");
        $this->setLayout("cobTrailer", "Qtd registros", "Quantidade de registros no lote", 23, 6, "num");
        $this->setLayout("cobTrailer", "Simples - Quantidade de títulos em cobrança", "Quantidade de títulos em cobrança", 29, 6, "num");
        $this->setLayout("cobTrailer", "Simples - Valor total dos títulos em carteiras", "Valor total dos títulos em carteiras", 46, 17, "num");
        $this->setLayout("cobTrailer", "Vinculada - Quantidade de títulos em cobrança", "Quantidade de títulos em cobrança", 52, 6, "num");
        $this->setLayout("cobTrailer", "Vinculada - Valor total dos títulos em carteiras", "Valor total dos títulos em carteiras", 69, 17, "num");
        $this->setLayout("cobTrailer", "Caucionada - Quantidade de títulos em cobrança", "Quantidade de títulos em cobrança", 75, 6, "num");
        $this->setLayout("cobTrailer", "Caucionada - Valor total dos títulos em carteiras", "Valor total dos títulos em carteiras", 92, 17, "num");
        $this->setLayout("cobTrailer", "Descontada - Quantidade de títulos em cobrança", "Quantidade de títulos em cobrança", 98, 6, "num");
        $this->setLayout("cobTrailer", "Descontada - Valor total dos títulos em carteiras", "Valor total dos títulos em carteiras", 115, 17, "num");
        $this->setLayout("cobTrailer", "N. do aviso", "Número do aviso de lançamento", 123, 8, "alfa");
        $this->setLayout("cobTrailer", "CNAB", "CNAB", 240, 117, "alfa", " ");

        $this->setLayout("header", "Banco", "Código do banco na compensação", 3, 3, "num");
        $this->setLayout("header", "Lote", "Lote de serviço", 7, 4, "num", '0');
        $this->setLayout("header", "Registro", "Tipo de registro", 8, 1, "num", '0');
        $this->setLayout("header", "CNAB", "Uso exclusivo FEBRABAN/CNAB", 16, 8, "alfa", ' ');
        $this->setLayout("header", "Inscrição - tipo", "Tipo de inscrição da empresa", 17, 1, "num");
        $this->setLayout("header", "Inscrição - número", "Número de inscrição da empresa", 32, 15, "num");
        $this->setLayout("header", "Agência - código", "Agência mantenedora da conta", 36, 4, "num");
        $this->setLayout("header", "Agência - DV", "Dígito verificador da agência", 37, 1, "alfa");
        $this->setLayout("header", "Conta - número", "Número da conta corrente", 46, 9, "num");
        $this->setLayout("header", "Conta - DV", "Dígito verificador da conta", 47, 1, "alfa");
        #$this->setLayout("header", "DV", "Dígito verificador da agência / conta", 72, 1, "alfa");
        $this->setLayout("header", "CNAB", "Uso exclusivo FEBRABAN / CNAB", 52, 5, "alfa", ' ');
        $this->setLayout("header", "Convênio", "Código do convênio no banco", 61, 9, "num");
        $this->setLayout("header", "CNAB", "Uso exclusivo FEBRABAN / CNAB", 72, 11, "alfa", ' ');
        $this->setLayout("header", "Nome", "Nome da empresa", 102, 30, "alfa");
        $this->setLayout("header", "Nome do banco", "Nome do banco", 132, 30, "alfa");
        $this->setLayout("header", "CNAB", "Uso exclusivo FEBRABAN / CNAB", 142, 10, "alfa", ' ');
        $this->setLayout("header", "Código", "Código remessa / retorno", 143, 1, "num");
        $this->setLayout("header", "Data de geração", "Data de geração do arquivo", 151, 8, "num");
        $this->setLayout("header", "Hora de geração", "Hora de geração do arquivo", 157, 6, "num");
        $this->setLayout("header", "Sequencia (NSA)", "Número sequencial do arquivo", 163, 6, "num");
        $this->setLayout("header", "Layout do arquivo", "Nº da versão do layout do arquivo", 166, 3, "num", '040');
        #$this->setLayout("header", "Densidade", "Densidade de geração do arquivo", 171, 5, "num");
        #$this->setLayout("header", "Reservado banco", "Para uso reservado do banco", 191, 20, "alfa");
        #$this->setLayout("header", "Reservado empresa", "Para uso reservado da empresa", 211, 20, "alfa");
        $this->setLayout("header", "CNAB", "Uso exclusivo FEBRABAN/ CNAB", 240, 74, "alfa", ' ');

        $this->setLayout("trailer", "Banco", "Código do banco na compensação", 3, 3, "num");
        $this->setLayout("trailer", "Lote", "Lote de serviço", 7, 4, "num");
        $this->setLayout("trailer", "Registro", "Tipo de registro", 8, 1, "num", "5");
        $this->setLayout("trailer", "CNAB", "CNAB", 17, 9, "alfa", " ");
        $this->setLayout("trailer", "Qtd registros", "Quantidade de registros no lote", 23, 6, "num");
        $this->setLayout("trailer", "Simples - Quantidade de títulos em cobrança", "Quantidade de títulos em cobrança", 29, 6, "num");
        $this->setLayout("trailer", "CNAB", "Uso exclusivo FEBRABAN/ CNAB", 240, 211, "alfa", ' ');
    }


    private function setLayout(
        string $variable,
        string $campo,
        string $descricao,
        int $posicao,
        int $numdig,
        string $tipo,
        string $default = null
    ): void {

        $arr = [
            "campo" => $campo,
            "descricao" => $descricao,
            'posicao' => $posicao,
            'numdig' => $numdig,
            'tipo' => $tipo,
            'default' => $default
        ];

        array_push($this->$variable, $arr);
    }

    public function getHeader(): array
    {
        return $this->header;
    }

    public function getCobTrailer(): array
    {
        # code...
        return $this->cobTrailer;
    }

    public function getTrailer(): array
    {
        # code...
        return $this->trailer;
    }

    public function getCobHeader(): array
    {
        # code...
        return $this->cobHeader;
    }

    public function getSegmentoT(): array
    {
        # code...
        return $this->cobSegmentoT;
    }

    public function getSegmentoU(): array
    {
        # code...
        return $this->cobSegmentoU;
    }
}
