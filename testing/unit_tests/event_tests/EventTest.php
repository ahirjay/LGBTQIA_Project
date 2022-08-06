<!--Page Name: EventTest.php
    By: Huy Vo.
    Student ID: 040993746.
    Professor: Leanne Seaward
	Client: Charlie Dazé 
    Prototype: 2
    Purpose: Test adding, updating and deleting an event.
 -->

<?php

class EventTest extends PHPUnit\Framework\TestCase
{
    private static $link;

    public static function setUpBeforeClass(): void
    {
        require "./config.php";
    }

    public function testAddEvent()
    {
        $sql = "SELECT * FROM Events";
        $stmt = mysqli_prepare(EventTest::$link, $sql);
        $beforeAdd = 0;
        $afterAdd = 0;

        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);
            $beforeAdd = mysqli_num_rows($result);  
        }

        $sql = "INSERT INTO Events (EventName, EventDescription, EventImage, EventDate) VALUES ('Test Name', 'Test Description', 'TestImagejpg', '2022-12-21 08:00')";
        $stmt = mysqli_prepare(EventTest::$link, $sql);
        if (mysqli_stmt_execute($stmt)) {
            $sql = "SELECT * FROM Events";
            $stmt = mysqli_prepare(EventTest::$link, $sql);

            if (mysqli_stmt_execute($stmt)) {
                $result = mysqli_stmt_get_result($stmt);
                $afterAdd = mysqli_num_rows($result);  
            }
        }

        $this->assertEquals($beforeAdd + 1, $afterAdd);    
    }

    public function testUpdateEvent()
    {
        $description = "Test Second Description";
        $image = "TestSecondImagejpg";
        $date = "2023-01-01 08:00:00";
        $sql = "UPDATE Events SET EventDescription = '".$description."', EventImage = '".$image."', EventDate = '".$date."' WHERE EventName = 'Test Name'";
        $stmt = mysqli_prepare(EventTest::$link, $sql);
        $descriptionAfterUpdate = $imageAfterUpdate = $dateAfterUpdate = "";


        if (mysqli_stmt_execute($stmt)) {
            $sql = "SELECT * FROM Events WHERE EventName = 'Test Name'";
            $stmt = mysqli_prepare(EventTest::$link, $sql);

            if (mysqli_stmt_execute($stmt)) {
                $result = mysqli_stmt_get_result($stmt);
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                $descriptionAfterUpdate = $row['EventDescription'];
                $imageAfterUpdate = $row['EventImage'];
                $dateAfterUpdate = $row['EventDate'];
            }
        }
 
        $this->assertEquals($descriptionAfterUpdate, $description);    
        $this->assertEquals($imageAfterUpdate, $image);    
        $this->assertEquals($dateAfterUpdate, $date);  
    }

    public function testDeleteEvent() {
        $sql = "SELECT * FROM Events";
        $stmt = mysqli_prepare(EventTest::$link, $sql);
        $beforeDelete = 0;
        $afterDelete = 0;

        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);
            $beforeDelete = mysqli_num_rows($result);  
        }

        $sql = "DELETE FROM Events WHERE EventName = 'Test Name'";
        $stmt = mysqli_prepare(EventTest::$link, $sql);
        if (mysqli_stmt_execute($stmt)) {
            $sql = "SELECT * FROM Events";
            $stmt = mysqli_prepare(EventTest::$link, $sql);

            if (mysqli_stmt_execute($stmt)) {
                $result = mysqli_stmt_get_result($stmt);
                $afterDelete = mysqli_num_rows($result);  
                $sql = "SET @count = 0; UPDATE Events SET EventID = @count:= @count + 1; ALTER TABLE Events AUTO_INCREMENT = 1;";
                $result = mysqli_multi_query(EventTest::$link, $sql);

            }
        }
        $this->assertEquals($beforeDelete, $afterDelete + 1);  
    }
}
