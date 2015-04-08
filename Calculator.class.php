<?php

class Calculator {
	private $order;
	private $discountManager;
	
	public function setOrder($order) {
		$this->order = $order;
	}
	
	public function setDiscountManager($discountManager) {
		$this->discountManager = $discountManager;
	}
	
	public function calculate() {
		$totalWithoutDiscount = 0;
		$products = $order->getProducts();
		foreach ($products as $p) {
			$totalWithoutDiscount += $p['product']->getPrice();
		}
		$discount = 0;
		$discounts = $discountManager->getDiscounts();
		foreach($discounts as $d) {
			$discount+=$d->calculate();
		}
        return $totalWithoutDiscount-$discount;
	}
}
?>