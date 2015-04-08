<?php

class Order {
    private $products = array();
	
    public function addProduct(&$product)
    {
		$this->products[] = array(
			'product' => &$product,
			'discounted' => false,
		);
    }
	
    public function getProducts() {
        return $this->products;
    }
	
    public function getCount() {
        return count($this->products);
    }
}

?>