<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pregunta
 *
 * @author nestor
 */
class Pregunta {
  private $id;
    private $cuerpo;  
    private $tipo;
    private $valor;
   
    
    function __construct($id, $cuerpo, $tipo, $valor) {
        $this->id = $id;
        $this->cuerpo = $cuerpo;
        $this->tipo = $tipo;
        $this->valor = $valor;
    }

    function getCuerpo() {
        return $this->cuerpo;
    }

    function getTipo() {
        return $this->tipo;
    }

    function getValor() {
        return $this->valor;
    }

    function setCuerpo($cuerpo): void {
        $this->cuerpo = $cuerpo;
    }

    function setTipo($tipo): void {
        $this->tipo = $tipo;
    }

    function setValor($valor): void {
        $this->valor = $valor;
    }

    function getId() {
        return $this->id;
    }


}
