<?php

namespace Limpa\Arquitetura;

class Email
{
    private string $endereco;
    
    public function __construct(string $endereco)
    {
        $this->setEndereco($endereco);
    }
    
    private function setEndereco($endereco)
    {
        if (!filter_var($endereco, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException("Endereço de e-mail inválido!");
        }
        $this->endereco = $endereco;
    }
    
    public function __toString(): string
    {
        return $this->endereco;
    }
}