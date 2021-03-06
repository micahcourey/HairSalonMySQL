<?php
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once 'src/Stylist.php';
    require_once 'src/Client.php';

    $server = 'mysql:host=localhost:8889;dbname=hair_salon_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class StylistTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Stylist::deleteAll();
            Client::deleteAll();
        }

        function test_getName()
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

        function test_setName()
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

        function test_getAll()
        {
            //Arrange
            $id = null;
            $name = "Candice";
            $test_stylist = new Stylist($name, $id);
            $test_stylist->save();
            $name2 = "Micah";
            $test_stylist2 = new Stylist($name2, $id);
            $test_stylist2->save();
            //Act
            $result = Stylist::getAll();
            //Assert
            $this->assertEquals([$test_stylist, $test_stylist2], $result);
        }

        function test_deleteAll()
        {
            //Arrange
            $id = null;
            $name = "Candice";
            $test_stylist = new Stylist($name, $id);
            $test_stylist->save();
            $name2 = "Micah";
            $test_stylist2 = new Stylist($name2, $id);
            $test_stylist2->save();
            //Act
            Stylist::deleteAll();
            //Assert
            $result = Stylist::getAll();
            $this->assertEquals([], $result);
        }

        function test_find()
        {
            //Arrange
            $id = null;
            $name = "Candice";
            $test_stylist = new Stylist($name, $id);
            $test_stylist->save();
            $name2 = "Micah";
            $test_stylist2 = new Stylist($name2, $id);
            $test_stylist2->save();
            //Act
            $result = Stylist::find($test_stylist->getId());
            //Assert
            $this->assertEquals($test_stylist, $result);
        }

        function test_update()
        {
            //Arrange
            $id = null;
            $name = "Candice";
            $test_stylist = new Stylist($name, $id);
            $test_stylist->save();
            $new_name = "Siting";
            //Act
            $test_stylist->update($new_name);
            //Assert
            $result = $test_stylist->getName();
            $this->assertEquals($new_name, $result);
        }

        function test_delete()
        {
            //Arrange
            $id = null;
            $name = "Candice";
            $test_stylist = new Stylist($name, $id);
            $test_stylist->save();
            $name2 = "Micah";
            $test_stylist2 = new Stylist($name2, $id);
            $test_stylist2->save();
            //Act
            $test_stylist->delete();
            //Assert
            $result = Stylist::getAll();
            $this->assertEquals([$test_stylist2], $result);
        }

        function testGetClients()
        {
            //Arrange
            $id = null;
            $name = "Micah Courey";
            $test_stylist = new Stylist($name, $id);
            $test_stylist->save();

            $test_stylist_id = $test_stylist->getId();

            $client_name = "Tom Dwan";
            $test_client = new Client($client_name, $id, $test_stylist_id);
            $test_client->save();

            $client_name2 = "Phil Hellmuth";
            $test_client2 = new Client($client_name2, $id, $test_stylist_id);
            $test_client2->save();
            //Act
            $result = $test_stylist->getClients();
            //Assert
            $this->assertEquals([$test_client, $test_client2], $result);
        }
    }
?>
