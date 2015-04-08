<?php

class DiscountManager {
	protected $discounts = array();
	
	public function setDiscounts(...$discounts)
    {
		$discounts = array();
		foreach ($discounts as &$d) {
			$this->discounts[] = &$d;
		}
    }
	
	public function addDiscount($discount)
    {
        $this->discounts[]=$discount;
    }
	
    public function getDiscounts()
    {
        return $this->discounts;
    }
	
}

?>