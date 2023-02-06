<!--Page Name: UsernameTest.php
    By: Huy Vo.
    Student ID: 040993746.
    Professor: Leanne Seaward
	Client: Charlie Dazé 
    Prototype: 2
    Purpose: Test multiple username, including valid and invalid.
 -->

<?php

class UsernameTest extends PHPUnit\Framework\TestCase
{
    private static $link;

    public static function setUpBeforeClass(): void
    {
        require "./config.php";
    }

    public function checkUsername($username)
    {
        $sql = "SELECT * FROM Admins";
        $stmt = mysqli_prepare(UsernameTest::$link, $sql);
        $username_arr = array();

        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    array_push($username_arr, $row['Username']);
                }
            }
        }

        return in_array($username, $username_arr);
    }

    public function testUsernameInList()
    {
        $username = "username";
        $this->assertTrue($this->checkUsername($username));
    }

    public function testEmptyUsernameNotInList()
    {
        $username = "";
        $this->assertFalse($this->checkUsername($username));
    }

    public function testUsernameNotInList()
    {
        $username = "masteruser123";
        $this->assertFalse($this->checkUsername($username));
    }
}
