<?php
use PHPUnit\Framework\TestCase;
require __DIR__ . "/../src/Validator.php";

class ValidatorTest extends TestCase{
    public function testValidEmail()
    {
        $this->assertTrue(Validator::validateEmail('test@example.com'));
        $this->assertFalse(Validator::validateEmail('invalid-email'));
    }

    public function testValidAge()
    {
        $this->assertTrue(Validator::validateAge(25));
        $this->assertFalse(Validator::validateAge(-3));
        $this->assertFalse(Validator::validateAge('abc'));
    }

    public function testValidName()
    {
        $this->assertTrue(Validator::validateName('Іван'));
        $this->assertFalse(Validator::validateName('   '));
    }
}