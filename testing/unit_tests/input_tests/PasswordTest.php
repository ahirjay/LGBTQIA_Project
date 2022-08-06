<!--Page Name: PasswordTest.php
    By: Huy Vo.
    Student ID: 040993746.
    Professor: Leanne Seaward
	Client: Charlie Dazé 
    Prototype: 2
    Purpose: Test multiple passwords, including valid and invalid.
 -->

<?php

class PasswordTest extends PHPUnit\Framework\TestCase
{

    public function checkPassword($input)
    {
        if (empty($input)) {
            return "Please enter a password";
        } else if (strlen($input) < '8') {
            return "Your Password Must Contain At Least 8 Characters!";
        } elseif (!preg_match("#[0-9]+#", $input)) {
            return "Your Password Must Contain At Least 1 Number!";
        } elseif (!preg_match("#[A-Z]+#", $input)) {
            return "Your Password Must Contain At Least 1 Capital Letter!";
        } elseif (!preg_match("#[a-z]+#", $input)) {
            return "Your Password Must Contain At Least 1 Lowercase Letter!";
        } else {
            return $input;
        }
    }

    public function testEmptyPassword()
    {
        $password = "";
        $this->assertEquals(strcmp($this->checkPassword($password), "Please enter a password"), 0);
    }

    public function testShortPassword()
    {
        $password = "asdf";
        $this->assertEquals(strcmp($this->checkPassword($password), "Your Password Must Contain At Least 8 Characters!"), 0);
    }

    public function testMissingCapitalLetterPassword()
    {
        $password = "1asdfasdf";
        $this->assertEquals(strcmp($this->checkPassword($password), "Your Password Must Contain At Least 1 Capital Letter!"), 0);
    }

    public function testMissingNumberPassword()
    {
        $password = "asdfasdf";
        $this->assertEquals(strcmp($this->checkPassword($password), "Your Password Must Contain At Least 1 Number!"), 0);
    }

    public function testMissingSmallLetterPassword()
    {
        $password = "A123321123";
        $this->assertEquals(strcmp($this->checkPassword($password), "Your Password Must Contain At Least 1 Lowercase Letter!"), 0);
    }

    public function testValidPassword()
    {
        $password = "Validpassword123";
        $this->assertEquals(strcmp($this->checkPassword($password), $password), 0);
    }

    public function testMatchingHashedPassword()
    {
        $hashed_password = password_hash("Validpassword123", PASSWORD_BCRYPT);
        $this->assertTrue(password_verify("Validpassword123", $hashed_password));
    }

    public function testNotMatchingHashedPassword()
    {
        $hashed_password = password_hash("Validpassword123", PASSWORD_BCRYPT);
        $this->assertFalse(password_verify("Validpassword12", $hashed_password));
    }
}
