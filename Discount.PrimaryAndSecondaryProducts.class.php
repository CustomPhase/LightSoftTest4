<?php

class DiscountPrimaryAndSecondaryProducts extends Discount {
	private $primaryProducts = array();
	private $secondaryProducts = array();
	
	public function setPrimaryProducts(...$products)
    {
		$this->primaryProducts = array();
		foreach ($products as &$p) {
			$this->primaryProducts[] = &$p;
		}
    }
	
	public function getPrimaryProducts()
    {
        return $this->primaryProducts;
    }
	
	public function setSecondaryProducts(...$products)
    {
		$this->secondaryProducts = array();
		foreach ($products as &$p) {
			$this->secondaryProducts[] = &$p;
		}
    }
	
	public function getSecondaryProducts()
    {
        return $this->secondaryProducts;
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
			if (in_array($op['product'], $this->secondaryProducts) && !$op['discounted']) {
				$count[$secondary]++;
				$countedProducts['secondary'][] = &$op;
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
		$count['secondary'] = 0;
		return $count;
	}
	
}

?>