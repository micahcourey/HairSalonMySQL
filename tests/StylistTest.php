<?php
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once 'src/Stylist.php';

    $server = 'mysql:host=localhost:8889;dbname=hair_salon_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class StylistTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Stylist::deleteAll();
        }

        function testGetName()
        {
            //Arrange
            $name = "Candice";
            $id = null;
            $test_stylist = new Stylist($name, $id);
            $test_stylist->save();
            //Act
            $result = $test_stylist->getName();
            //Assert
            $this->assertEquals($name, $result);
        }

        function testSetName()
        {
            //Arrange
            $name = "Candice";
            $id = null;
            $test_stylist = new Stylist($name, $id);
            $test_stylist->save();
            //Act
            $new_name = "Siting";
            $test_stylist->setName($new_name);
            //Assert
            $result = $test_stylist->getName();
            $this->assertEquals($new_name, $result);
        }

        function test_save()
        {
            //Arrange
            $name = "Candice";
            $test_stylist = new Stylist($name);
            //Act
            $test_stylist->save();
            //Assert
            $result = Stylist::getAll();
            $this->assertEquals($test_stylist, $result[0]);
        }

    }
?>
