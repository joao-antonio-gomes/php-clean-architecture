<?php

namespace Limpa\Arquitetura;

class Aluno
{
    private Cpf $cpf;
    private string $nome;
    private Email $email;
    private array $telefones;
    
    public function adicionarTelefone(string $ddd, string $numero)
    {
        $this->telefones[] = new Telefone($ddd, $numero);
    }
}