<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Opcion
 *
 * @author nestor
 */
class Opcion {
  private $id;
    private $idPregunta;  
    private $esCorrecta;
    private $cuerpo;
    
    function __construct($id, $idPregunta, $esCorrecta, $cuerpo) {
        $this->id = $id;
        $this->idPregunta = $idPregunta;
        $this->esCorrecta = $esCorrecta;
        $this->cuerpo = $cuerpo;
    }
    
    function getId() {
        return $this->id;
    }

    function getIdPregunta() {
        return $this->idPregunta;
    }

    function getEsCorrecta() {
        return $this->esCorrecta;
    }

    function getCuerpo() {
        return $this->cuerpo;
    }

    function setEsCorrecta($esCorrecta): void {
        $this->esCorrecta = $esCorrecta;
    }

    function setCuerpo($cuerpo): void {
        $this->cuerpo = $cuerpo;
    }


}
