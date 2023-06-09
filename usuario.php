<?php

class Usuario {
    
    public $username;
    public $primerApellido;
    public $segundoApellido;
    public $email;
    public $login;
    public $password;



function __construct ( $username, $primerApellido, $segundoApellido, $email, $login, $password) {

    
    $this->username = $username;
    $this->primerApellido = $primerApellido;
    $this->segundoApellido = $segundoApellido;
    $this->email = $email;
    $this->login = $login;
    $this->password = $password;

}


}


?>