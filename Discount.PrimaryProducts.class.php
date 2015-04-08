<?php

class DiscountPrimaryProducts extends Discount {
	private $primaryProducts = array();
	
	public function setProducts(...$products)
    {
		$this->primaryProducts = array();
		foreach ($products as &$p) {
			$this->primaryProducts[] = &$p;
		}
    }
	
	public function getProducts()
    {
        return $this->primaryProducts;
    }
	
	private function loopThrough(&$orderProducts) {
		$count = countPlaceholder();
		$countedProducts = array();
		foreach ($orderProducts as &$op) {
			if (in_array($op['product'], $this->primaryProducts) && !$op['discounted']) {
				$hash = spl_object_hash(&$op['product']);
				$count[$hash]++;
				$countedProducts[$hash][] = &$op;
			}
		}
		//How many full sets found?
		$min = min($count);
		$discount_ = 0;
		for ($i = 0; $i<$min; $i++) {
			foreach ($countedProducts as &$cp) {
				$prod = array_pop(&$cp);
				$prod['discounted'] = true;
				$sum+=$prod['product']->getPrice();
			}
		}
		$discount_ = $sum * ($this->discount/100);
		return $discount_;
	}
	
	private function countPlaceholder() {
		$count = array();
		foreach ($this->primaryProducts as &$p) {
			$hash = spl_object_hash(&$p);
			$count[$hash] = 0;
		}
		return $count;
	}

}

?>