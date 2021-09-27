<?php

namespace Limpa\Arquitetura;

class Cpf
{
    private string $numero;
    
    public function __construct(string $numero)
    {
        $this->setNumero($numero);
    }
    
    private function setNumero($cpf)
    {
        if (!Cpf::validaCPF($cpf)) {
            throw new \InvalidArgumentException("Cpf inválido!");
        }
        
        $this->numero = $cpf;
    }
    
    static private function validaCPF($cpf) {
        $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
    
        // Verifica se foi informado todos os digitos corretamente
        if (strlen($cpf) != 11) {
            return false;
        }
    
        // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }
    
        // Faz o calculo para validar o Cpf
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }
        return true;
    }
    
    public function __toString(): string
    {
        return $this->numero;
    }
}