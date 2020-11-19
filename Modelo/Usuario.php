<?php

class Usuario {
    
    //--------------------------PROPIEDADES
    private $id;
    private $rol;
    private $correo;
    private $nombre;
    private $activo;
    
    //--------------------------CONSTRUCTOR
    function __construct($id, $rol, $correo, $nombre, $activo) {
        $this->id = $id;
        $this->rol = $rol;
        $this->correo = $correo;
        $this->nombre = $nombre;
        $this->activo = $activo;
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

    //--------------------------TO STRING
    public function __toString() {
        return '[USUARIO] Id: ' . $this->id . ' Rol: ' . $this->rol . ' Correo: ' . $this->correo . ' Nombre: ' . $this->nombre . ' Activo: ' . $this->activo;
    }
    
}
