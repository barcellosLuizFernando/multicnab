<?php

namespace Multicnab;

use Multicnab\Cobranca\Layouts\CnabPHP_v040;
use Multicnab\Cobranca\Layouts\CnabPHP_v103;

class ReadFile
{

    private $layout;
    private $content = [];


    public function __construct(string $path)
    {
        # code...

        $file = file($path, FILE_SKIP_EMPTY_LINES);

        $this->layout = $this->getLayout($file[0]);
        $this->setContent($file);
        #echo  json_encode($this->content);
    }

    private function setContent(array $lines)
    {
        # code...

        $content = [];
        $detail = [];

        foreach ($lines as $key => $line) {
            # code...
            $arrLine = [];
            $regType = substr($line, 7, 1);

            switch ($regType) {
                case '0':
                    $arrLine = $this->layout->getHeader();
                    $content['header'] = $this->setValue($arrLine, $line);
                    break;

                case '1':
                    # code...
                    $arrLine = $this->layout->getCobHeader();
                    $content['headerLote'] = $this->setValue($arrLine, $line);
                    break;

                case '3':
                    # code...
                    if(!isset($content['detail'])) {
                        $content['detail'] = [];
                    }
                    $codSeg = substr($line, 13, 1);
                    
                    switch ($codSeg) {
                        case 'T':
                            # code...
                            $arrLine = $this->layout->getSegmentoT();
                            $detail = $this->setValue($arrLine, $line);
                            break;

                        case 'U':
                            # code...
                            $arrLine = $this->layout->getSegmentoU();
                            array_push($detail, [
                                'campo' => 'Movimento',
                                'value' => $this->setValue($arrLine, $line)
                            ]);
                            array_push($content['detail'], $detail);
                            break;

                        default:
                            # code...
                            break;
                    }

                    break;

                case '5':
                    # code...
                    $arrLine = $this->layout->getCobTrailer();
                    $content['loteTrailer'] = $this->setValue($arrLine, $line);
                    break;
                    
                    case '9':
                        # code...
                        $arrLine = $this->layout->getTrailer();
                        $content['trailer'] = $this->setValue($arrLine, $line);
                    break;

                default:
                    # code...
                    break;
            }          
        }

        $this->content = $content;
    }

    private function setValue($arrLine, $line): array
    {

        foreach ($arrLine as $headerKey => $field) {
            # code...
            $numdig = $field['numdig'];
            $iniPosition = $field['posicao'] - $numdig;
            $value = substr($line, $iniPosition, $numdig);

            $arrLine[$headerKey]["value"] = $value;

            #echo json_encode($field);
        }

        return $arrLine;
    }

    public function getContent(): array
    {
        # code...
        return $this->content;
    }

    private function getLayout(string $firstline)
    {
        # code...
        $layouts = [
            CnabPHP_v103::class,
            CnabPHP_v040::class
        ];

        $cnabLayout = null;

        /** Itera todas as classes de layout */
        foreach ($layouts as $key => $class) {
            # code...
            $layout = new $class;
            $header = $layout->getHeader();
            $version = [];
            $iniPosition = 0;
            $endPosition = 0;
            $version = "";

            /** Itera todas as colunas do header para buscar o campo "Layout do arquivo"  */
            foreach ($header as $hKey => $column) {
                # code...
                if ($column['campo'] == "Layout do arquivo") {

                    $numdig = $column["numdig"];
                    $endPosition = $column["posicao"];
                    $iniPosition = $endPosition - $numdig;
                    $version = $column["default"];
                    #echo "Posição inicial: " . $iniPosition;
                    #echo "Posição final: " . $endPosition;
                    #echo "(" . $column['default'] . ")";

                    /** Verifica qual a versão do arquivo */
                    $fileVersion = substr($firstline, $iniPosition, $numdig);

                    /** Avalia se a versão do arquivo bate com a versão do layout
                     * Encerra o loop caso afirmativo
                     */
                    if ($fileVersion == $version) {
                        $cnabLayout = $layout;
                        goto FIM;
                    }
                }
            }
        }

        FIM:



        return $cnabLayout;
    }
}
