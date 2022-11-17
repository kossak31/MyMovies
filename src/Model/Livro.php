<?php

namespace App\Model;

class Livro
{

    public $id;
    public $nome;
    public $editora_id;
    public $pags;
    public $editora;

    public function __construct($array = null)
    {
        if ($array) {
            $this->id = $array['id'];
            $this->nome = $array['nome'];
            $this->editora_id = $array['editora_id'];
            $this->pags = $array['pags'];
        }
    }
}
