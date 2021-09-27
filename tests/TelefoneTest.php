<?php

use Limpa\Arquitetura\Telefone;
use PHPUnit\Framework\TestCase;

class TelefoneTest extends TestCase
{
    public function testDddFormatoIncorreto()
    {
        $this->expectException(InvalidArgumentException::class);
        new Telefone("a", "96390657");
    }
    
    public function testNumeroFormatoIncorreto()
    {
        $this->expectException(InvalidArgumentException::class);
        new Telefone("48", "0657");
    }
    
    public function testTelefoneFormatoCorreto()
    {
        $telefone = new Telefone("48", "996390657");
        $this->assertSame("48", $telefone->getDdd());
        $this->assertSame("996390657", $telefone->getNumero());
    }
}