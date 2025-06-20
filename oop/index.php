<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>物件導向</title>
</head>

<body>
    <?php
    class Person
    {

        //屬性，成員
        protected $name;
        protected $age;

        //方法，行為，建構函式
        public function __construct($name, $age)
        {
            $this->name = $name;
            $this->age = $age;
        }

        //方法
        public function greet()
        {
            echo "Hello,my name is {$this->name} and I am {$this->age} old.";
        }

        public function getName()
        {
            return $this->name;
        }

        public function setName($name)
        {
            return $this->name = $name;
        }

        public function getAge()
        {
            return $this->age;
        }
    }

    $jason = new Person('jason', 18);

    var_dump($jason);
    echo "<br>";

    echo $jason->getName('rita');
    echo "<br>";
    echo $jason->setName('rita');

    ?>

    <hr>

    <h2>繼承</h2>

    <?php

    class Man extends Person {
        private $gender='男性';

        function getGender() {
            return $this->gender;
        }
    }

    class Woman extends Person {
        private $gender='女性';

        function getGender() {
            return $this->gender;
        }
    }

    $man = new Man('john', 25);
    echo $man->getName();
    echo "<br>";
    echo $man->getGender();
    echo "<br>";
    $man->greet();
    echo "<br>";

    $woman = new Woman('rita', 28);
    echo $woman->getName();
    echo "<br>";
    echo $woman->getGender();
    echo "<br>";
    $woman->greet();
    ?>
</body>

</html>