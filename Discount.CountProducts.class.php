<?php

class DiscountCountProducts extends Discount {
	private $discountCount;
	private $exceptions = array();
	
	public function setCount($c)
    {
		$this->discountCount = c;
    }
	
	public function getCount() {
		return $this->discountCount;
	}
	
	public function setExceptions(...$products) {
		foreach ($products as &$p) {
			$exceptions[] = &$p;
		}
	}
	
	public function loopThrough(&$orderProducts) {
		$count = 0;
		$countedProducts = array();
		$sum = 0;
		foreach ($orderProducts as &$op) {
			if (!in_array($op['product'], $this->exceptions) && !$op['discounted']) {
				$count++;
				$countedProducts[] = &$op;
				$sum+= $op['product']->getPrice();
			}
		}
		$discount_ = 0;
		if ($count==$discountCount) {
			foreach ($countedProducts as &$cp) {
				$cp['discounted'] = true;
			}
			$discount_ = $sum * ($this->discount/100);
		}
		return $discount_;
	}
	
}

?>