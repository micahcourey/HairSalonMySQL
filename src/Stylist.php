<?php
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Cuisine.php";
    require_once "src/Restaurant.php";

    $server = 'mysql:host=localhost;dbname=hair_salon_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class StylistTest extends PHPUnit_Framework_TestCase
    {
        function tearDown()
        {
            Stylist::deleteAll();
        }

        function test_save()
        {
            //Arrange
            $name = "Candice"
            test_stylist = new Stylist($name);
            //Act
            $test_stylist->save();
            //Assert
            $result = Stylist::getAll();
            $this->assertEquals($test_stylist, $result[0]);            
        }
    }
