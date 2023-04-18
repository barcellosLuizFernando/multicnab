<?php

namespace Multicnab\Cobranca\Layouts;

interface CnabPHP {

    public function __construct();

    public function getHeader(): array;

    public function getCobTrailer(): array;

    public function getTrailer(): array;

    public function getCobHeader(): array;

    public function getSegmentoT(): array;

    public function getSegmentoU(): array;
}