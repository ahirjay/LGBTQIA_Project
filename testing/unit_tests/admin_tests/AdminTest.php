<!--Page Name: AdminTest.php
    By: Huy Vo.
    Student ID: 040993746.
    Professor: Leanne Seaward
	Client: Charlie Dazé 
    Prototype: 2
    Purpose: Test adding, updating and deleting an admin.
 -->

<?php

class AdminTest extends PHPUnit\Framework\TestCase
{
    private static $link;

    public static function setUpBeforeClass(): void
    {
        require "./config.php";
    }

    public function testAddAdmin()
    {
        $sql = "SELECT * FROM Admins";
        $stmt = mysqli_prepare(AdminTest::$link, $sql);
        $beforeAdd = 0;
        $afterAdd = 0;

        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);
            $beforeAdd = mysqli_num_rows($result);  
        }

        $sql = "INSERT INTO Admins (FirstName, LastName, Username, Password) VALUES ('Huy', 'Vo', 'test', 'Validpassword123')";
        $stmt = mysqli_prepare(AdminTest::$link, $sql);
        if (mysqli_stmt_execute($stmt)) {
            $sql = "SELECT * FROM Admins";
            $stmt = mysqli_prepare(AdminTest::$link, $sql);

            if (mysqli_stmt_execute($stmt)) {
                $result = mysqli_stmt_get_result($stmt);
                $afterAdd = mysqli_num_rows($result);  
            }
        }

        $this->assertEquals($beforeAdd + 1, $afterAdd);    
    }

    public function testUpdateAdmin()
    {
        $password = "Huy712420";
        $sql = "UPDATE Admins SET Password = '".$password."' WHERE Username = 'test'";
        $stmt = mysqli_prepare(AdminTest::$link, $sql);
        $passwordAfterUpdate = "";


        if (mysqli_stmt_execute($stmt)) {
            $sql = "SELECT * FROM Admins WHERE Username = 'test'";
            $stmt = mysqli_prepare(AdminTest::$link, $sql);

            if (mysqli_stmt_execute($stmt)) {
                $result = mysqli_stmt_get_result($stmt);
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                $passwordAfterUpdate = $row['Password'];
            }
        }

       
        $this->assertEquals($passwordAfterUpdate, $password);    
    }

    public function testDeleteAdmin() {
        $sql = "SELECT * FROM Admins";
        $stmt = mysqli_prepare(AdminTest::$link, $sql);
        $beforeDelete = 0;
        $afterDelete = 0;

        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);
            $beforeDelete = mysqli_num_rows($result);  
        }

        $sql = "DELETE FROM Admins WHERE Username = 'test'";
        $stmt = mysqli_prepare(AdminTest::$link, $sql);
        if (mysqli_stmt_execute($stmt)) {
            $sql = "SELECT * FROM Admins";
            $stmt = mysqli_prepare(AdminTest::$link, $sql);

            if (mysqli_stmt_execute($stmt)) {
                $result = mysqli_stmt_get_result($stmt);
                $afterDelete = mysqli_num_rows($result);  
                $sql = "SET @count = 0; UPDATE Admins SET AdminID = @count:= @count + 1; ALTER TABLE Admins AUTO_INCREMENT = 1;";
                $result = mysqli_multi_query(AdminTest::$link, $sql);
            }
        }
        $this->assertEquals($beforeDelete, $afterDelete + 1);  
    }

}
