<!--Page Name: PhoneTest.php
    By: Huy Vo.
    Student ID: 040993746.
    Professor: Leanne Seaward
	Client: Charlie Dazé 
    Prototype: 2
    Purpose: Test multiple phone numbers, including valid and invalid.
 -->

<?php

class PhoneTest extends PHPUnit\Framework\TestCase
{

    public function checkPhone($input)
    {
        $regex = "/(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]\d{3}[\s.-]\d{4}( ext. \d{3,4})?/";
        return preg_match($regex, $input);
    }

    public function testEmptyPhone()
    {
        $phone = "";
        $this->assertEquals($this->checkPhone($phone), 0);
    }

    public function testContainLetterphone()
    {
        $phone = "123-456-789a";
        $this->assertEquals($this->checkPhone($phone), 0);
    }

    public function testFirstValidPhone()
    {
        $phone = "123-456-7890";
        $this->assertEquals($this->checkPhone($phone), 1);
    }

    public function testSecondValidPhone()
    {
        $phone = "(123) 456-7890";
        $this->assertEquals($this->checkPhone($phone), 1);
    }

    public function testThirdValidPhone()
    {
        $phone = "123.456.7890";
        $this->assertEquals($this->checkPhone($phone), 1);
    }

    public function testFourthValidPhone()
    {
        $phone = "+91 (123) 456-7890";
        $this->assertEquals($this->checkPhone($phone), 1);
    }

    public function testFirstExtensionPhone()
    {
        $phone = "+1 (123) 456-7890 ext. 123";
        $this->assertEquals($this->checkPhone($phone), 1);
    }

    public function testSecondExtensionPhone()
    {
        $phone = "123-456-7890 ext. 1234";
        $this->assertEquals($this->checkPhone($phone), 1);
    }
}
