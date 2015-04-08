<?php

class Discount {
	protected $discount;
	protected $order;
	
	public function setDiscount($discount)
    {
        $this->discount = $discount;
    }
	
    public function getDiscount()
    {
        return $this->discount;
    }
	
	public function setOrder($order)
    {
        $this->order = $order;
    }
	
	abstract function loopThrough($orderProducts);
	
	public function calculate() {
		$discount = 0;
        $orderProducts = $this->order->getProducts();
        $discount = $this->loopThrough($orderProducts);
        return $discount;
	}
}

?>