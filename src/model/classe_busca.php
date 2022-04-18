<?php

class Busca
{
    private $busca;

    public function __construct($busca)
    {
        $this->busca = $busca;
    }

    public function getBusca()
    {
        return $this->busca;
    }

    public function setBusca($busca)
    {
        $this->busca = $busca;

        return $this;
    }

    public function getArrayBusca()
    {
        $data = [
            "busca" => $this->busca,
        ];
        return $data;
    }
}
