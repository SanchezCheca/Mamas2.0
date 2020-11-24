<?php

class Usuario {
    
    //--------------------------PROPIEDADES
    private $id;
    private $rol;   //0: Alumno     1: Profesor     2: Profesor-Administrador
    private $correo;
    private $nombre;
    private $activo;
    private $aulas;
    
    //--------------------------CONSTRUCTOR
    function __construct($id, $rol, $correo, $nombre, $activo, $aulas) {
        $this->id = $id;
        $this->rol = $rol;
        $this->correo = $correo;
        $this->nombre = $nombre;
        $this->activo = $activo;
        $this->aulas = $aulas;
    }

    //--------------------------GETTER
    function getId() {
        return $this->id;
    }

    function getRol() {
        return $this->rol;
    }

    function getCorreo() {
        return $this->correo;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getActivo() {
        return $this->activo;
    }
    
    function getAulas() {
        return $this->aulas;
    }
    
    function setAulas($aulas) {
        $this->aulas = $aulas;
    }

    //--------------------------TO STRING
    public function __toString() {
        return '[USUARIO] Id: ' . $this->id . ' Rol: ' . $this->rol . ' Correo: ' . $this->correo . ' Nombre: ' . $this->nombre . ' Activo: ' . $this->activo;
    }
    
}
