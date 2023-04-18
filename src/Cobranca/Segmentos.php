<?php

namespace Multicnab\Cobranca;

use ArrayIterator;
use Countable;
use IteratorAggregate;
use JsonSerializable;
use Multicnab\Cobranca\Segmentos\Segmento_t;
use Traversable;

class Segmentos
{

    public $segmento_t = array();

    public function __construct()
    {
    }

    public function count(): int
    {
        # code...
        return count($this->segmento_t);
    }

    public function addItem(Segmento_t $obj)
    {
        # code...
        $this->segmento_t[] = $obj;
    }

    public function getAll()
    {
        # code...
        return $this->segmento_t;
    }

    public function getIterator(): Traversable
    {

        return new ArrayIterator($this);
    }

    public function jsonSerialize(): mixed
    {
        return json_encode($this);
    }
}
