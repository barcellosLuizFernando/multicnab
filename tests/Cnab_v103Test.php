<?php

namespace Tests;

use Multicnab\Layouts\CnabPHP_v103;
use PHPUnit\Framework\TestCase;

final class Cnab_v103Test extends TestCase
{

    public function testCobHeader(): void
    {

        $cnab = new CnabPHP_v103();

        $arr = $this->countDigits($cnab->getCobHeader());

        # code...
        $this->assertSame($arr[0], $arr[1]);

        #$this->assertEmpty();
        #fwrite(STDERR, print_r($arr, true));
        #return $arr;
    }

    public function testCobSegmentoT(): void
    {
        # code...
        $cnab = new CnabPHP_v103();
        $arr = $this->countDigits($cnab->getSegmentoT());
        $this->assertSame($arr[0], $arr[1]);
    }

    public function testCobSegmentoU(): void
    {
        # code...
        $cnab = new CnabPHP_v103();
        $arr = $this->countDigits($cnab->getSegmentoU());
        $this->assertSame($arr[0], $arr[1]);
    }

    public function testCobTrailer(): void
    {
        # code...
        $cnab = new CnabPHP_v103();
        $arr = $this->countDigits($cnab->getCobTrailer());
        $this->assertSame($arr[0], $arr[1]);
    }
    
    public function testHeader(): void
    {
        # code...
        $cnab = new CnabPHP_v103();
        $arr = $this->countDigits($cnab->getHeader());
        $this->assertSame($arr[0], $arr[1]);
    }
    

    private function countDigits(array $layout): array
    {
        # code...

        $xChars = 0;
        $xLenght = 0;
        $xResult01 = [];
        $xResult02 = [];

        foreach ($layout as $key => $content) {
            # code...
            $xVariacao = $content['posicao'] - $xLenght;
            $xNumDig = $content['numdig'];
            $xChars += $xNumDig;
            $xLenght = $content['posicao'];

            array_push($xResult01, [
                "campo" => $content['campo'],
                "numdig" => $xNumDig
            ]);

            array_push($xResult02, [
                "campo" => $content["campo"],
                "numdig" => $xVariacao
            ]);
        }

        return [$xResult01, $xResult02];
    }
}
