<?php
    class Stylist
    {
        private $name;
        private $id;

        function __construct($name, $id = null)
        {
            $this->name = $name;
            $this->id = $id;
        }

        function save()
        {
            $GLOBAL['DB']->exec("INSERT INTO stylists (name) VALUES ('{$this->getStylist()}');");
        }
    }
?>
