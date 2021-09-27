<?php

namespace Limpa\Arquitetura;

class Telefone
{
    private string $ddd;
    private string $numero;
    
    public function __construct(string $ddd, string $numero)
    {
        $this->setDDD($ddd);
        $this->setNumero($numero);
    }
    
    private function setDDD(string $ddd): void
    {
        if (preg_match('/\(?\d{2}\)?/', $ddd) !== 1) {
            throw new \InvalidArgumentException("Formato de DDD inválido!");
        }
        
        $this->ddd = $ddd;
    }
    
    private function setNumero(string $numero): void
    {
        if (preg_match("/[0-9]?\s?[0-9]{4}-?[0-9]{4}/", $numero) !== 1) {
            throw new \InvalidArgumentException("Formato de numero inválido!");
        }
        
        $this->numero = $numero;
    }
    
    public function __toString(): string
    {
        return $this->ddd . " " . $this->numero;
    }
    
    public function getDdd(): string
    {
        return $this->ddd;
    }
    
    public function getNumero(): string
    {
        return $this->numero;
    }
    
    
}