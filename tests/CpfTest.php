<?php

use Limpa\Arquitetura\Cpf;
use PHPUnit\Framework\TestCase;

class CpfTest extends TestCase
{
    public function testCpfRepetido()
    {
        $this->expectException(\InvalidArgumentException::class);
        new Cpf("11111111111");
    }
    
    public function testCpfIncorreto()
    {
        $this->expectException(\InvalidArgumentException::class);
        new Cpf("56512198477");
    }
    
    public function testCpfMenosDeOnzeDigitos()
    {
        $this->expectException(\InvalidArgumentException::class);
        new Cpf("565121984");
    }
    
    public function testCpfCorreto()
    {
        $cpf = new Cpf("093.558.729-25");
        $this->assertSame("093.558.729-25", (string)$cpf);
    }
}