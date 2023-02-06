<!--Page Name: SectionInputTest.php
    By: Huy Vo.
    Student ID: 040993746.
    Professor: Leanne Seaward
	Client: Charlie Dazé 
    Prototype: 2
    Purpose: Test multiple sections, including valid and invalid.
 -->

<?php

class SectionInputTest extends PHPUnit\Framework\TestCase
{
    private static $link;

    public static function setUpBeforeClass(): void
    {
        require "./config.php";
    }

    public function checkSection($sectionID)
    {
        $sql = "SELECT * FROM Sections ";
        $stmt = mysqli_prepare(SectionInputTest::$link, $sql);
        $sectionID_arr = array();

        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    array_push($sectionID_arr, $row['SectionID']);
                }
            }
        }

        return in_array($sectionID, $sectionID_arr);
    }

    public function testSectionInList()
    {
        $sectionID = 1;
        $this->assertTrue($this->checkSection($sectionID));
    }

    public function testEmptySectionNotInList()
    {
        $sectionID = "";
        $this->assertFalse($this->checkSection($sectionID));
    }

    public function testSectionNotInList()
    {
        $sectionID = 12;
        $this->assertFalse($this->checkSection($sectionID));
    }
}
