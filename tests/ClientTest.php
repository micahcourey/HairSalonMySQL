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

    class ClientTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Client::deleteAll();
            Stylist::deleteAll();
        }

        function test_save()
        {
            //Arrange
            $name = "Tom Dwan";
            $id = null;
            $stylist_id = 1;
            $test_client = new Client($name, $id, $stylist_id);
            //Act
            $test_client->save();
            //Assert
            $result = Client::getAll();
            $this->assertEquals([$test_client], $result);
        }

        function test_getAll()
        {
            //Arrange
            $id = null;
            $name = "Tom Dwan";
            $stylist_id = 1;
            $test_client = new Client($name, $id, $stylist_id);
            $test_client->save();
            $name2 = "Phil Galfond";
            $stylist_id2 = 2;
            $test_client2 = new Client($name2, $id, $stylist_id2);
            $test_client2->save();
            //Act
            $result = Client::getAll();
            //Assert
            $this->assertEquals([$test_client, $test_client2], $result);
        }

        function test_deleteAll()
        {
            //Arrange
            $id = null;
            $name = "Tom Dwan";
            $sylist_id = 1;
            $test_client = new Client($name, $id, $stylist_id);
            $test_client->save();
            $name2 = "Phil Galfond";
            $stylist_id2 = 2;
            $test_client2 = new Client($name2, $id, $stylist_id2);
            $test_client2->save();
            //Act
            $result = Client::deleteAll();
            //Assert
            $result = Client::getAll();
            $this->assertEquals([], $result);
        }

        function test_find()
        {
            //Arrange
            $id = null;
            $name = "Tom Dwan";
            $stylist_id = 1;
            $test_client = new Client($name, $id, $stylist_id);
            $test_client->save();
            $name2 = "Phil Galfond";
            $stylist_id2 = 2;
            $test_client2 = new Client($name2, $id, $stylist_id2);
            $test_client2->save();
            //Act
            $result = Client::find($test_client->getId());
            //Assert
            $this->assertEquals($test_client, $result);
        }

        function test_updateName()
        {
            //Arrange
            $id = null;
            $name = "Tom Dwan";
            $stylist_id = 1;
            $test_client = new Client($name, $id, $stylist_id);
            $test_client->save();
            $new_name = "Durrrr";
            $name = $new_name;
            //Act
            $test_client->update($name, $new_name);
            //Assert
            $clients = Client::getAll();
            $result = $clients[0]->getName();
            $this->assertEquals($new_name, $result);
        }

        function test_delete()
        {
            //Arrange
            $id = null;
            $name = "Tom Dwan";
            $stylist_id = 1;
            $test_client = new Client($name, $id, $stylist_id);
            $test_client->save();
            $name2 = "Phil Galfond";
            $stylist_id2 = 2;
            $test_client2 = new Client($name2, $id, $stylist_id2);
            $test_client2->save();
            //Act
            $test_client->delete();
            //Assert
            $result = Client::getAll();
            $this->assertEquals([$test_client2], $result);
        }
    }
?>
