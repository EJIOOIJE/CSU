<?php
    namespace App\Model;

    class Person
    {
        public $firstName;
        public $lastName;

        function __construct($firstname, $lastname) {
            $this->firstName = $firstname;
            $this->lastName = $lastname;
        }

        public static function CreateTestList() {
            return [
              new Person('a', 'b'),
              new Person('c', 'd'),
              new Person('e', 'f'),
            ];
        }
    }