<?php
    class Client
    {
        private $name;
        private $id;
        private $stylist_id;

        function __construct($name, $id = null, $stylist_id)
        {
            $this->name = $name;
            $this->id = $id;
            $this->stylist_id = $stylist_id;
        }

        function getName()
        {
            return $this->name;
        }

        function getId()
        {
            return $this->id;
        }

        function getStylistId()
        {
            return $this->stylist_id;
        }

        function setName($new_name)
        {
            $this->name = $new_name;
        }

        function setStylistId($new_sylist_id)
        {
            $this->stylist_id = $new_stylist_id;
        }

        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO client (name, stylist_id) VALUES ('{$this->getName()}', {$this->getStylistId()});");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        static function getAll()
        {
            $returned_clients = $GLOBALS['DB']->query("SELECT * FROM client");
            $clients = array();
            foreach($returned_clients as $client) {
                $name = $client['name'];
                $id = $client['id'];
                $stylist_id = $client['stylist_id'];
                $new_client = new Client($name, $id, $stylist_id);
                array_push($clients, $new_client);
            }
            return $clients;
        }

    }
?>
