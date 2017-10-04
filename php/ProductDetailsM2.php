<?php
protected $product;
public function __construct(
	\Magento\Framework\View\Element\Template\Context $context,
	\Magento\Catalog\Model\ProductFactory $product
	) {
		$this->product = $product;
		parent::__construct($context);
	}
	public function getProduct($id)
	{
		return $this->product->create()->load($id);
	}
}

//Call the function in template(.phtml) files like below:
$productId = "10"; //Product Id
$product = $this->getProduct($productId);
echo $product->getName(); //Get Product Name
