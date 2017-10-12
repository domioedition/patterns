<pre>
<?php


class Pizza{ 
    protected $size;
    protected $tomato = false;
    protected $cheese = false;
    protected $meat = false;
    protected $olive = false;
    protected $greenery = false;

    function __construct(PizzaBuilder $builder) {
        $this->size = $builder->size;
        $this->tomato = $builder->tomato;
        $this->cheese = $builder->cheese;
        $this->meat = $builder->meat;
        $this->olive = $builder->olive;
        $this->greenery = $builder->greenery;
    }
}

class PizzaBuilder {
    public $size;
    public $tomato = false;
    public $cheese = false;
    public $meat = false;
    public $olive = false;
    public $greenery = false;

    function __construct($size) {
        $this->size = $size;
    }
    
    public function setTomato() {
        $this->tomato = true;
        return $this;
    }
    public function setCheese() {
        $this->cheese = true;
        return $this;
    }
    public function setMeat() {
        $this->meat = true;
        return $this;
    }
    public function setOlive() {
        $this->olive = true;
        return $this;
    }
    public function setGreenery() {
        $this->greneery = true;
        return $this;
    }
    function build() {
        return new Pizza($this);
    }

}

$pizza1 = (new PizzaBuilder(12))->setMeat()->setCheese()->build();

var_dump($pizza1);