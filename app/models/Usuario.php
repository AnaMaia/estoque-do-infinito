<?php

class Usuario
{
    private $id_Usuario;
    private $telefone;
    private $email;
    public $senha;

    public function getIdUsuario()
    {
        return $this->id_Usuario;
    }
    public function getTelefone()
    {
        return $this->telefone;
    }

    public function setTelefone($telefone): void
    {
        $this->telefone = $telefone;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email): void
    {

        $this->email = $email;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function setSenha($senha): void
    {
        $this->senha = $senha;
    }

}
