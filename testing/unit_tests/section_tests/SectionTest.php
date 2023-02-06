<!--Page Name: AdminTest.php
    By: Huy Vo.
    Student ID: 040993746.
    Professor: Leanne Seaward
	Client: Charlie Dazé 
    Prototype: 2
    Purpose: Test adding, updating and deleting a section.
 -->

<?php

class SectionTest extends PHPUnit\Framework\TestCase
{
    private static $link;

    public static function setUpBeforeClass(): void
    {
        require "./config.php";
    }

    public function testAddSection()
    {
        $sql = "SELECT * FROM Sections";
        $stmt = mysqli_prepare(SectionTest::$link, $sql);
        $beforeAdd = 0;
        $afterAdd = 0;

        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);
            $beforeAdd = mysqli_num_rows($result);  
        }

        $sql = "INSERT INTO Sections (SectionName, SectionDescription) VALUES ('Test Name', 'Test Description')";
        $stmt = mysqli_prepare(SectionTest::$link, $sql);
        if (mysqli_stmt_execute($stmt)) {
            $sql = "SELECT * FROM Sections";
            $stmt = mysqli_prepare(SectionTest::$link, $sql);

            if (mysqli_stmt_execute($stmt)) {
                $result = mysqli_stmt_get_result($stmt);
                $afterAdd = mysqli_num_rows($result);  
            }
        }

        $this->assertEquals($beforeAdd + 1, $afterAdd);    
    }

    public function testUpdateSection()
    {
        $description = "Test Second Description";
        $sql = "UPDATE Sections SET SectionDescription = '".$description."' WHERE SectionName = 'Test Name'";
        $stmt = mysqli_prepare(SectionTest::$link, $sql);
        $descriptionAfterUpdate = "";


        if (mysqli_stmt_execute($stmt)) {
            $sql = "SELECT * FROM Sections WHERE SectionName = 'Test Name'";
            $stmt = mysqli_prepare(SectionTest::$link, $sql);

            if (mysqli_stmt_execute($stmt)) {
                $result = mysqli_stmt_get_result($stmt);
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                $descriptionAfterUpdate = $row['SectionDescription'];
            }
        }
 
        $this->assertEquals($descriptionAfterUpdate, $description);    
    }

    public function testDeleteSection() {
        $sql = "SELECT * FROM Sections";
        $stmt = mysqli_prepare(SectionTest::$link, $sql);
        $beforeDelete = 0;
        $afterDelete = 0;

        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);
            $beforeDelete = mysqli_num_rows($result);  
        }

        $sql = "DELETE FROM Sections WHERE SectionName = 'Test Name'";
        $stmt = mysqli_prepare(SectionTest::$link, $sql);
        if (mysqli_stmt_execute($stmt)) {
            $sql = "SELECT * FROM Sections";
            $stmt = mysqli_prepare(SectionTest::$link, $sql);

            if (mysqli_stmt_execute($stmt)) {
                $result = mysqli_stmt_get_result($stmt);
                $afterDelete = mysqli_num_rows($result);  
                $sql = "SET @count = 0; UPDATE Sections SET SectionID = @count:= @count + 1; ALTER TABLE Sections AUTO_INCREMENT = 1;";
                $result = mysqli_multi_query(SectionTest::$link, $sql);
            }
        }
        $this->assertEquals($beforeDelete, $afterDelete + 1);  
    }
}
