<!--Page Name: AdminTest.php
    By: Huy Vo.
    Student ID: 040993746.
    Professor: Leanne Seaward
	Client: Charlie Dazé 
    Prototype: 2
    Purpose: Test adding, updating and deleting a resource.
 -->

<?php

class ResourceTest extends PHPUnit\Framework\TestCase
{
    private static $link;

    public static function setUpBeforeClass(): void
    {
        require "./config.php";
    }

    public function testAddResource()
    {
        $sql = "SELECT * FROM Resources";
        $stmt = mysqli_prepare(ResourceTest::$link, $sql);
        $beforeAdd = 0;
        $afterAdd = 0;

        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);
            $beforeAdd = mysqli_num_rows($result);  
        }

        $sql = "INSERT INTO Resources (ResourceName, Description) VALUES ('Test Name', 'Test Description')";
        $stmt = mysqli_prepare(ResourceTest::$link, $sql);
        if (mysqli_stmt_execute($stmt)) {
            $sql = "SELECT * FROM Resources";
            $stmt = mysqli_prepare(ResourceTest::$link, $sql);

            if (mysqli_stmt_execute($stmt)) {
                $result = mysqli_stmt_get_result($stmt);
                $afterAdd = mysqli_num_rows($result);  
            }
        }

        $this->assertEquals($beforeAdd + 1, $afterAdd);    
    }

    public function testUpdateResource()
    {
        $description = "Test Second Description";
        $phone = "111-111-1111";
        $email = "email@test.com";
        $website = "test.com";
        $advocacy = "advocacy@test.com";
        $outreach = "outreach@test.com";
        $programming = "programming@test.com";
        $communitycare = "care@test.com";;
        $text = "222-222-2222";
        $sectionID = 1;

        $sql = "UPDATE Resources SET Description = '".$description."', Phone = '".$phone."', Email = '".$email."', Website = '".$website."', Phone = '".$phone."', Advocacy = '".$advocacy."', Outreach = '".$outreach."', Programming = '".$programming."', CommunityCare = '".$communitycare."', Text = '".$text."', SectionID = '".$sectionID."' WHERE ResourceName = 'Test Name'";
        $stmt = mysqli_prepare(ResourceTest::$link, $sql);
        $descriptionAfterUpdate = $phoneAfterUpdate = $emailAfterUpdate = $websiteAfterUpdate = $advocacyAfterUpdate = $outreachAfterUpdate = $programmingAfterUpdate = $communitycareAfterUpdate = $textAfterUpdate = $sectionIDAfterUpdate = "";


        if (mysqli_stmt_execute($stmt)) {
            $sql = "SELECT * FROM Resources WHERE ResourceName = 'Test Name'";
            $stmt = mysqli_prepare(ResourceTest::$link, $sql);

            if (mysqli_stmt_execute($stmt)) {
                $result = mysqli_stmt_get_result($stmt);
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                $descriptionAfterUpdate = $row['Description'];
                $phoneAfterUpdate = $row['Phone'];
                $emailAfterUpdate = $row['Email'];
                $websiteAfterUpdate = $row['Website'];
                $advocacyAfterUpdate = $row['Advocacy'];
                $outreachAfterUpdate = $row['Outreach'];
                $communitycareAfterUpdate = $row['CommunityCare'];
                $textAfterUpdate = $row['Text'];
                $sectionIDAfterUpdate = $row['SectionID'];
            }
        }
 
        $this->assertEquals($descriptionAfterUpdate, $description);   
        $this->assertEquals($phoneAfterUpdate, $phone);   
        $this->assertEquals($emailAfterUpdate, $email);   
        $this->assertEquals($websiteAfterUpdate, $website);   
        $this->assertEquals($advocacyAfterUpdate, $advocacy);   
        $this->assertEquals($outreachAfterUpdate, $outreach);   
        $this->assertEquals($communitycareAfterUpdate, $communitycare);   
        $this->assertEquals($textAfterUpdate, $text);   
        $this->assertEquals($sectionIDAfterUpdate, $sectionID);    
   
    }

    public function testDeleteResource() {
        $sql = "SELECT * FROM Resources";
        $stmt = mysqli_prepare(ResourceTest::$link, $sql);
        $beforeDelete = 0;
        $afterDelete = 0;

        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);
            $beforeDelete = mysqli_num_rows($result);  
        }

        $sql = "DELETE FROM Resources WHERE ResourceName = 'Test Name'";
        $stmt = mysqli_prepare(ResourceTest::$link, $sql);
        if (mysqli_stmt_execute($stmt)) {
            $sql = "SELECT * FROM Resources";
            $stmt = mysqli_prepare(ResourceTest::$link, $sql);

            if (mysqli_stmt_execute($stmt)) {
                $result = mysqli_stmt_get_result($stmt);
                $afterDelete = mysqli_num_rows($result);  
                $sql = "SET @count = 0; UPDATE resources SET ResourceID = @count:= @count + 1; ALTER TABLE Resources  AUTO_INCREMENT = 1;";
                $result = mysqli_multi_query(ResourceTest::$link, $sql);
            }
        }
        $this->assertEquals($beforeDelete, $afterDelete + 1);  
    }
}
