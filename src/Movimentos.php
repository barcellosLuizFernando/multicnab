<?php

namespace Multicnab;

class Movimentos
{

    private $movimentos = [];
    public string $descricao;


    public function __construct(int $rem_ret, string $cod_movimento = null)
    {

        $movimentos = [];

        if ($rem_ret == 2) {
            #CÓDIGOS DE REMESSA
            $movimentos["02"] = "Entrada Confirmada";
            $movimentos["03"] = "Entrada Rejeitada";
            $movimentos["06"] = "Liquidação";
            $movimentos["07"] = "Confirmação do Recebimento da Instrução de Desconto";
            $movimentos["08"] = "Confirmação do Recebimento do Cancelamento da Instrução de Desconto";
            $movimentos["09"] = "Baixa";
            $movimentos["10"] = "Confirmação do Recebimento da Instrução de Repactuação";
            $movimentos["12"] = "Confirmação do Recebimento da Instrução de Abatimento";
            $movimentos["13"] = "Confirmação do Recebimento do Cancelamento da Instrução de Abatimento";
            $movimentos["14"] = "Confirmação do Recebimento da Instrução de Alteração de Vencimento";
            $movimentos["17"] = "Liquidação após Baixa ou Liquidação Título não Registrado";
            $movimentos["26"] = "Instrução Rejeitada";
            $movimentos["27"] = "Confirmação do Pedido de Alteração de Outros Dados";
            $movimentos["30"] = "Alteração de Dados Rejeitada";
            $movimentos["36"] = "Concentração (Será informado apenas no arquivo retorno dos dados do Comprador)";
            $movimentos["37"] = "Títulos debitados a Empresa após o término da carência";
            $movimentos["38"] = "Títulos pagos em atraso creditados a Empresa";
        } else {
            #CÓDIGOS DE REMESSA
            $movimentos["01"] = "Entrada de Títulos";
            $movimentos["02"] = "Pedido de Baixa";
            $movimentos["04"] = "Concessão de Abatimento";
            $movimentos["05"] = "Cancelamento de Abatimento";
            $movimentos["06"] = "Alteração de Vencimento";
            $movimentos["07"] = "Concessão de Desconto";
            $movimentos["08"] = "Cancelamento de Desconto";
            $movimentos["12"] = "Confirmação de Repactuação";
            $movimentos["31"] = "Alteração de Outros Dados";
            $movimentos["41"] = "Alteração de Dados do Comprador";
            $movimentos["42"] = "Alteração de Dados do Título";
        }

        $this->descricao = $movimentos[$cod_movimento];

        $this->movimentos = $movimentos;
    }

    public function getDescricao(): string
    {
        # code...

        return $this->descricao;
    }

    public function getMovimentos(): array
    {
        return $this->movimentos;
    }
}
