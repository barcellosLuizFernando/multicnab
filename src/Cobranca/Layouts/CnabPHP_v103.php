<?php

namespace Multicnab\Cobranca\Layouts;

class CnabPHP_v103 implements CnabPHP
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
        $this->cobHeader = [
            [
                'campo' => 'Banco',
                'descricao' => 'Código do banco na compensação',
                'posicao' => 3,
                'numdig' => 3,
                'tipo' => 'num'
            ],
            [
                'campo' => 'Lote',
                'descricao' => 'Lote de serviço',
                'posicao' => 7,
                'numdig' => 4,
                'tipo' => 'num'
            ],
            [
                'campo' => 'Registro',
                'descricao' => 'Tipo de registro',
                'posicao' => 8,
                'numdig' => 1,
                'tipo' => 'num'
            ],
            [
                'campo' => 'Operação',
                'descricao' => 'Tipo de operação',
                'posicao' => 9,
                'numdig' => 1,
                'tipo' => 'alfa'
            ],
            [
                'campo' => 'Serviço',
                'descricao' => 'Tipo de serviço',
                'posicao' => 11,
                'numdig' => 2,
                'tipo' => 'num'
            ],
            [
                'campo' => 'CNAB',
                'descricao' => 'Uso exclusivo FEBRABAN/CNAB',
                'posicao' => 13,
                'numdig' => 2,
                'tipo' => 'alfa'
            ],
            [
                'campo' => 'Layout',
                'descricao' => 'Nº da versão do layout do lote',
                'posicao' => 16,
                'numdig' => 3,
                'tipo' => 'num'
            ],
            [
                'campo' => 'CNAB',
                'descricao' => 'Uso exclusivo FEBRABAN/CNAB',
                'posicao' => 17,
                'numdig' => 1,
                'tipo' => 'num'
            ],
            [
                'campo' => 'Inscrição - Tipo',
                'descricao' => 'Tipo de inscrição da Empresa',
                'posicao' => 18,
                'numdig' => 1,
                'tipo' => 'num'
            ],
            [
                'campo' => 'Inscrição - Número',
                'descricao' => 'Número de inscrição da Empresa',
                'posicao' => 33,
                'numdig' => 15,
                'tipo' => 'num'
            ],
            [
                'campo' => 'Convênio',
                'descricao' => 'Código do convênio do Banco',
                'posicao' => 53,
                'numdig' => 20,
                'tipo' => 'alfa'
            ],
            [
                'campo' => 'Agência - Código',
                'descricao' => 'Agência mantenedora da conta',
                'posicao' => 58,
                'numdig' => 5,
                'tipo' => 'num'
            ],
            [
                'campo' => 'Agência - DV',
                'descricao' => 'Dígito verificador da agência',
                'posicao' => 59,
                'numdig' => 1,
                'tipo' => 'alfa'
            ],
            [
                'campo' => 'Conta - Número',
                'descricao' => 'Número da conta corrente',
                'posicao' => 71,
                'numdig' => 12,
                'tipo' => 'num'
            ],
            [
                'campo' => 'Conta - DV',
                'descricao' => 'Dígito verificador da conta',
                'posicao' => 72,
                'numdig' => 1,
                'tipo' => 'alfa'
            ],
            [
                'campo' => 'DV',
                'descricao' => 'Dígito verificador da agência/conta',
                'posicao' => 73,
                'numdig' => 1,
                'tipo' => 'alfa'
            ],
            [
                'campo' => 'Nome',
                'descricao' => 'Nome da Empresa',
                'posicao' => 103,
                'numdig' => 30,
                'tipo' => 'alfa'
            ],
            [
                'campo' => 'Informação 1',
                'descricao' => 'Mensagem 1',
                'posicao' => 143,
                'numdig' => 40,
                'tipo' => 'alfa'
            ],
            [
                'campo' => 'Informação 2',
                'descricao' => 'Mensagem 2',
                'posicao' => 183,
                'numdig' => 40,
                'tipo' => 'alfa'
            ],
            [
                'campo' => 'Nº rem/ret',
                'descricao' => 'número remessa/retorno',
                'posicao' => 191,
                'numdig' => 8,
                'tipo' => 'num'
            ],
            [
                'campo' => 'Dt. Gravação',
                'descricao' => 'Data de gravação remessa/retorno',
                'posicao' => 199,
                'numdig' => 8,
                'tipo' => 'num'
            ],
            [
                'campo' => 'Data do crédito',
                'descricao' => 'Data do crédito',
                'posicao' => 207,
                'numdig' => 8,
                'tipo' => 'num'
            ],
            [
                'campo' => 'CNAB',
                'descricao' => 'Uso Exclusivo FREBRABAN/CNAB',
                'posicao' => 240,
                'numdig' => 33,
                'tipo' => 'alfa'
            ]
        ];

        $this->setLayout("cobSegmentoT", ["Banco", "Código do banco na compensação", 3, 3, "num"]);
        $this->setLayout("cobSegmentoT", ["Lote", "Lote de serviço", 7, 4, "num"]);
        $this->setLayout("cobSegmentoT", ["Registro", "Tipo de registro", 8, 1, "num"]);
        $this->setLayout("cobSegmentoT", ["Nº do registro", "Número sequencial registro no lote", 13, 5, "num"]);
        $this->setLayout("cobSegmentoT", ["Segmento", "Código segmento do registro detalhe", 14, 1, "alfa"]);
        $this->setLayout("cobSegmentoT", ["CNAB", "Uso exclusivo FEBRABAN/CNAB", 15, 1, "alfa"]);
        $this->setLayout("cobSegmentoT", ["Cod. Mov.", "Código do movimento retorno", 17, 2, "num"]);
        $this->setLayout("cobSegmentoT", ["Agência - código", "Agência mantenedora da conta", 22, 5, "num"]);
        $this->setLayout("cobSegmentoT", ["Agência - DV", "Dígito verificador da agência", 23, 1, "num"]);
        $this->setLayout("cobSegmentoT", ["Conta - número", "Número da conta corrente", 35, 12, "num"]);
        $this->setLayout("cobSegmentoT", ["Conta - DV", "Dígito verificador da conta", 36, 1, "num"]);
        $this->setLayout("cobSegmentoT", ["DV", "Dígito verificador da agência/conta", 37, 1, "num"]);
        $this->setLayout("cobSegmentoT", ["Nosso número", "Identificação do título", 57, 20, "alfa"]);
        $this->setLayout("cobSegmentoT", ["Carteira", "Código da carteira", 58, 1, "num"]);
        $this->setLayout("cobSegmentoT", ["Número do documento", "Número do documento de cobrança", 73, 15, "num"]);
        $this->setLayout("cobSegmentoT", ["Vencimento", "Data do vencimento do título", 81, 8, "num"]);
        $this->setLayout("cobSegmentoT", ["Valor do título", "Valor nominal do título", 96, 15, "num"]);
        $this->setLayout("cobSegmentoT", ["Banco Cobr./Receb.", "Número do banco", 99, 3, "num"]);
        $this->setLayout("cobSegmentoT", ["Ag. Cobr./Receb.", "Agência cobradora / recebedora", 104, 5, "num"]);
        $this->setLayout("cobSegmentoT", ["DV", "Dígito verificador da agência", 105, 1, "num"]);
        $this->setLayout("cobSegmentoT", ["Uso da empresa", "Identificação do título na empresa", 130, 25, "alfa"]);
        $this->setLayout("cobSegmentoT", ["Cod. Moeda", "Código da Moeda", 132, 2, "num"]);
        $this->setLayout("cobSegmentoT", ["Inscrição - tipo", "Tipo de inscrição", 133, 1, "num"]);
        $this->setLayout("cobSegmentoT", ["Inscrição - número", "Número de inscrição", 148, 15, "num"]);
        $this->setLayout("cobSegmentoT", ["Nome", "Nome", 188, 40, "alfa"]);
        $this->setLayout("cobSegmentoT", ["Número do contrato", "Nº do contr. da operação de crédito", 198, 10, "num"]);
        $this->setLayout("cobSegmentoT", ["Valor da tar. custas", "Valor da tarifa / custas", 213, 15, "num"]);
        $this->setLayout("cobSegmentoT", ["Motivo da ocorrência", "Identificação para rejeições, tarifas, custas, liquidação e baixas", 223, 10, "alfa"]);
        $this->setLayout("cobSegmentoT", ["CNAB", "CNAB", 240, 17, "alfa"]);


        $this->setLayout("cobSegmentoU", ["Banco", "Código do banco na compensação", 3, 3, "num"]);
        $this->setLayout("cobSegmentoU", ["Lote", "Lote de serviço", 7, 4, "num"]);
        $this->setLayout("cobSegmentoU", ["Registro", "Tipo de registro", 8, 1, "num"]);
        $this->setLayout("cobSegmentoU", ["Nº do registro", "Número sequencial registro no lote", 13, 5, "num"]);
        $this->setLayout("cobSegmentoU", ["Segmento", "Código segmento do registro detalhe", 14, 1, "alfa"]);
        $this->setLayout("cobSegmentoU", ["CNAB", "Uso exclusivo FEBRABAN/CNAB", 15, 1, "alfa"]);
        $this->setLayout("cobSegmentoU", ["Cod. Mov.", "Código do movimento retorno", 17, 2, "num"]);
        $this->setLayout("cobSegmentoU", ["Acréscimos", "Juros / Multa / Encargos", 32, 15, "num"]);
        $this->setLayout("cobSegmentoU", ["Vlr do desconto", "Valor do desconto concedido", 47, 15, "num"]);
        $this->setLayout("cobSegmentoU", ["Vlr do abatimento", "Valor do abatimento concedido / cancelado", 62, 15, "num"]);
        $this->setLayout("cobSegmentoU", ["Vlr do IOF", "Valor do IOF recolhido", 77, 15, "num"]);
        $this->setLayout("cobSegmentoU", ["Vlr pago", "Valor pago pelo pagador", 92, 15, "num"]);
        $this->setLayout("cobSegmentoU", ["Vlr líquido", "Valor líquido a ser creditado", 107, 15, "num"]);
        $this->setLayout("cobSegmentoU", ["Outras despesas", "Valor de outras despesas", 122, 15, "num"]);
        $this->setLayout("cobSegmentoU", ["Outros créditos", "Valor de outros créditos", 137, 15, "num"]);
        $this->setLayout("cobSegmentoU", ["Data da ocorrência", "Data da ocorrência", 145, 8, "num"]);
        $this->setLayout("cobSegmentoU", ["Data do crédito", "Data da efetivação do crédito", 153, 8, "num"]);
        $this->setLayout("cobSegmentoU", ["Código", "Código da ocorrência", 157, 4, "alfa"]);
        $this->setLayout("cobSegmentoU", ["Data ocorrência", "Data da ocorrência", 165, 8, "num"]);
        $this->setLayout("cobSegmentoU", ["Valor ocorrência", "Valor da ocorrência", 180, 15, "num"]);
        $this->setLayout("cobSegmentoU", ["Compl. da ocorrência", "Complemento da ocorrência", 210, 30, "alfa"]);
        $this->setLayout("cobSegmentoU", ["Cod. Bco. Corr.", "Cod. Banco correspondente compens.", 213, 3, "num"]);
        $this->setLayout("cobSegmentoU", ["N. Num. Bco. Corr.", "Nosso número banco correspondente", 233, 20, "num"]);
        $this->setLayout("cobSegmentoU", ["CNAB", "CNAB", 240, 7, "alfa"]);


        $this->setLayout("cobTrailer", ["Banco", "Código do banco na compensação", 3, 3, "num"]);
        $this->setLayout("cobTrailer", ["Lote", "Lote de serviço", 7, 4, "num"]);
        $this->setLayout("cobTrailer", ["Registro", "Tipo de registro", 8, 1, "num", "5"]);
        $this->setLayout("cobTrailer", ["CNAB", "CNAB", 17, 9, "alfa", " "]);
        $this->setLayout("cobTrailer", ["Qtd registros", "Quantidade de registros no lote", 23, 6, "num"]);
        $this->setLayout("cobTrailer", ["Simples - Quantidade de títulos em cobrança", "Quantidade de títulos em cobrança", 29, 6, "num"]);
        $this->setLayout("cobTrailer", ["Simples - Valor total dos títulos em carteiras", "Valor total dos títulos em carteiras", 46, 17, "num"]);
        $this->setLayout("cobTrailer", ["Vinculada - Quantidade de títulos em cobrança", "Quantidade de títulos em cobrança", 52, 6, "num"]);
        $this->setLayout("cobTrailer", ["Vinculada - Valor total dos títulos em carteiras", "Valor total dos títulos em carteiras", 69, 17, "num"]);
        $this->setLayout("cobTrailer", ["Caucionada - Quantidade de títulos em cobrança", "Quantidade de títulos em cobrança", 75, 6, "num"]);
        $this->setLayout("cobTrailer", ["Caucionada - Valor total dos títulos em carteiras", "Valor total dos títulos em carteiras", 92, 17, "num"]);
        $this->setLayout("cobTrailer", ["Descontada - Quantidade de títulos em cobrança", "Quantidade de títulos em cobrança", 98, 6, "num"]);
        $this->setLayout("cobTrailer", ["Descontada - Valor total dos títulos em carteiras", "Valor total dos títulos em carteiras", 115, 17, "num"]);
        $this->setLayout("cobTrailer", ["N. do aviso", "Número do aviso de lançamento", 123, 8, "alfa"]);
        $this->setLayout("cobTrailer", ["CNAB", "CNAB", 240, 117, "alfa", " "]);
        
        $this->setLayout("header", ["Banco", "Código do banco na compensação", 3, 3, "num"]);
        $this->setLayout("header", ["Lote", "Lote de serviço", 7, 4, "num", '0']);
        $this->setLayout("header", ["Registro", "Tipo de registro", 8, 1, "num", '0']);
        $this->setLayout("header", ["CNAB", "Uso exclusivo FEBRABAN/CNAB", 17, 9, "alfa", ' ']);
        $this->setLayout("header", ["Inscrição - tipo", "Tipo de inscrição da empresa", 18, 1, "num"]);
        $this->setLayout("header", ["Inscrição - número", "Número de inscrição da empresa", 32, 14, "num"]);
        $this->setLayout("header", ["Convênio", "Código do convênio no banco", 52, 20, "alfa"]);
        $this->setLayout("header", ["Agência - código", "Agência mantenedora da conta", 57, 5, "num"]);
        $this->setLayout("header", ["Agência - DV", "Dígito verificador da agência", 58, 1, "alfa"]);
        $this->setLayout("header", ["Conta - número", "Número da conta corrente", 70, 12, "num"]);
        $this->setLayout("header", ["Conta - DV", "Dígito verificador da conta", 71, 1, "alfa"]);
        $this->setLayout("header", ["DV", "Dígito verificador da agência / conta", 72, 1, "alfa"]);
        $this->setLayout("header", ["Nome", "Nome da empresa", 102, 30, "alfa"]);
        $this->setLayout("header", ["Nome do banco", "Nome do banco", 132, 30, "alfa"]);
        $this->setLayout("header", ["CNAB", "Uso exclusivo FEBRABAN / CNAB", 142, 10, "alfa", ' ']);
        $this->setLayout("header", ["Código", "Código remessa / retorno", 143, 1, "num"]);
        $this->setLayout("header", ["Data de geração", "Data de geração do arquivo", 151, 8, "num"]);
        $this->setLayout("header", ["Hora de geração", "Hora de geração do arquivo", 157, 6, "num"]);
        $this->setLayout("header", ["Sequencia (NSA)", "Número sequencial do arquivo", 163, 6, "num"]);
        $this->setLayout("header", ["Layout do arquivo", "Nº da versão do layout do arquivo", 166, 3, "num", '103']);
        $this->setLayout("header", ["Densidade", "Densidade de geração do arquivo", 171, 5, "num"]);
        $this->setLayout("header", ["Reservado banco", "Para uso reservado do banco", 191, 20, "alfa"]);
        $this->setLayout("header", ["Reservado empresa", "Para uso reservado da empresa", 211, 20, "alfa"]);
        $this->setLayout("header", ["CNAB", "Uso exclusivo FEBRABAN/ CNAB", 240, 29, "alfa", ' ']);

        $this->setLayout("trailer", ["Banco", "Código do banco na compensação", 3, 3, "num"]);
        $this->setLayout("trailer", ["Lote", "Lote de serviço", 7, 4, "num", '9']);
        $this->setLayout("trailer", ["Registro", "Tipo de registro", 8, 1, "num", '9']);
        $this->setLayout("trailer", ["CNAB", "Uso exclusivo FEBRABAN/CNAB", 17, 9, "alfa", ' ']);
        $this->setLayout("trailer", ["Qtde. de Lotes", "Quantidade de lotes do arquivo", 23, 6, "num"]);
        $this->setLayout("trailer", ["Qtde. de Registros", "Quantidade de registros do arquivo", 29, 6, "num"]);
        $this->setLayout("trailer", ["Qtde. de contas", "Quantidade de contas para conciliação", 35, 6, "num"]);
        $this->setLayout("trailer", ["CNAB", "Uso exclusivo FEBRABAN / CNAB", 240, 205, "alfa", " "]);
    }

    private function setLayout(string $variable, array $data): void
    {
        
        $default = null;
        if(count($data) > 5) {
            //echo $data[0]. " " . count($data) . " ";
            $default = $data[5];
        }

        $arr = [
            "campo" => $data[0],
            "descricao" => $data[1],
            'posicao' => $data[2],
            'numdig' => $data[3],
            'tipo' => $data[4],
            'default' => $default
        ];

        array_push($this->$variable, $arr);
    }

    public function getTrailer(): array
    {
        return $this->trailer;   
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
