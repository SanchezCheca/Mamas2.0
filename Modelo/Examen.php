<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Examen
 *
 * @author nestor
 */
class Examen {
    
    private $id;
    private $nombre;
    private $idProfesor;
    private $fechaCreacion;
    private $fechaInicio;
    private $fechaFin;
    private $opcion;
    
    function __construct($id, $nombre, $idProfesor, $fechaCreacion, $fechaInicio, $fechaFin, $opcion) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->idProfesor = $idProfesor;
        $this->fechaCreacion = $fechaCreacion;
        $this->fechaInicio = $fechaInicio;
        $this->fechaFin = $fechaFin;
        $this->opcion = $opcion;
    }

    function getId() {
        return $this->id;
    }

    function setId($id): void {
        $this->id = $id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getIdProfesor() {
        return $this->idProfesor;
    }

    function getFechaCreacion() {
        return $this->fechaCreacion;
    }

    function getFechaInicio() {
        return $this->fechaInicio;
    }

    function getFechaFin() {
        return $this->fechaFin;
    }

    function getOpcion() {
        return $this->opcion;
    }

    function setNombre($nombre): void {
        $this->nombre = $nombre;
    }

    function setIdProfesor($idProfesor): void {
        $this->idProfesor = $idProfesor;
    }

    function setFechaCreacion($fechaCreacion): void {
        $this->fechaCreacion = $fechaCreacion;
    }

    function setFechaInicio($fechaInicio): void {
        $this->fechaInicio = $fechaInicio;
    }

    function setFechaFin($fechaFin): void {
        $this->fechaFin = $fechaFin;
    }

    function setOpcion($opcion): void {
        $this->opcion = $opcion;
    }

}
