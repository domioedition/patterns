<pre>
<?php

class Sheep
{
    protected $name;
    protected $category;

    public function __construct(string $name, string $category = 'Schootland sheep')
    {
        $this->name = $name;
        $this->category = $category;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setCategory(string $category)
    {
        $this->category = $category;
    }

    public function getCategory()
    {
        return $this->category;
    }
}


$original = new Sheep('Jolly');
echo $original->getName()."\n"; // Jolly
echo $original->getCategory()."\n"; // Schootland ship

// Клонируем и модифицируем то что нужно
$cloned = clone $original;
$cloned->setName('Dummmy');
$cloned->setCategory('Mountain sheep');
echo $cloned->getName()."\n"; 
echo $cloned->getCategory()."\n"; 