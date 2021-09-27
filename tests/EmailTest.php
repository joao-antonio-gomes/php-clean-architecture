<?php

use Limpa\Arquitetura\Email;
use PHPUnit\Framework\TestCase;

class EmailTest extends TestCase
{
    public function testEmailFormatoInvalidoLancaErro()
    {
        $this->expectException(\InvalidArgumentException::class);
        new Email("um email incorreto");
    }
    
    public function testEmailFormatoValidoComoString()
    {
        $email = new Email("exemplo@exemplo.com");
        $this->assertSame("exemplo@exemplo.com", (string) $email);
    }
}