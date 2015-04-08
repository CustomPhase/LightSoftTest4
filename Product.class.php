<?php

class Product {
	protected $name;
	protected $price
	
	public function __construct($n, $p) {
		$this->name = $n;
		$this->price = $p;
	}
	
	public function getName()
    {
        return $this->name;
    }
    public function getPrice()
    {
        return $this->price;
    }
}

?>