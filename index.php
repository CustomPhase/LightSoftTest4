<?php 
$productA = new Product('A', 100);
$productB = new Product('B', 100);
$productC = new Product('C', 100);
$productD = new Product('D', 100);
$productE = new Product('E', 100);
$productF = new Product('F', 100);
$productG = new Product('G', 100);
$productH = new Product('H', 100);
$productI = new Product('I', 100);
$productJ = new Product('J', 100);
$productK = new Product('K', 100);
$productL = new Product('L', 100);
$productM = new Product('M', 100);

$order = new Order();
$order->addProduct($productA);
$order->addProduct($productB);
$order->addProduct($productC);
$order->addProduct($productD);
$order->addProduct($productE);
$order->addProduct($productF);
$order->addProduct($productG);
$order->addProduct($productH);
$order->addProduct($productI);
$order->addProduct($productJ);
$order->addProduct($productD);
$order->addProduct($productE);
$order->addProduct($productK);
$order->addProduct($productL);
$order->addProduct($productM);
$order->addProduct($productD);
$order->addProduct($productD);
$order->addProduct($productE);

$discount1 = new DiscountPrimaryProducts();
$discount1->setProducts($productA, $productB);
$discount1->setDiscount(10);

$discount2 = new DiscountPrimaryProducts();
$discount2->setProducts($productD, $productE);
$discount2->setDiscount(5);

$discount3 = new DiscountPrimaryProducts();
$discount3->setProducts($productE, $productF, $productG);
$discount3->setDiscount(5);

$discount4 = new DiscountPrimaryAndSecondaryProducts();
$discount4->setPrimaryProducts($productA);
$discount4->setSecondaryProducts($productK, $productL, $productM);
$discount4->setDiscount(5);

$discount5 = new DiscountCountProducts();
$discount5->setCount(3);
$discount5->setExceptions($productA, $productC);
$discount5->setDiscount(5);

$discount6 = new DiscountCountProducts();
$discount6->setCount(4);
$discount6->setExceptions($productA, $productC);
$discount6->setDiscount(10);

$discount7 = new DiscountCountProducts();
$discount7->setCount(5);
$discount7->setExceptions($productA, $productC);
$discount7->setDiscount(20);

$discountManager = new DiscountManager();
$discountManager->addDiscount($discount1);
$discountManager->addDiscount($discount2);
$discountManager->addDiscount($discount3);
$discountManager->addDiscount($discount4);
$discountManager->addDiscount($discount5);
$discountManager->addDiscount($discount6);
$discountManager->addDiscount($discount7);

$calculator = new Calculator();
$calculator->setOrder($order);
$calculator->setDiscountManager($discountManager);
$priceTotal = $calculator->calculate();

?>