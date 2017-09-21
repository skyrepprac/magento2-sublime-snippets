<?php
//Product Collection Status & Visibility Filters start
//Add below code in your block file responsible for displaying products:
protected $_coreRegistry = null;

public function __construct(
    \Magento\Framework\View\Element\Template\Context $context,
    \Magento\Framework\Registry $registry,
    \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,
    \Magento\Catalog\Model\Product\Attribute\Source\Status $productStatus,
    \Magento\Catalog\Model\Product\Visibility $productVisibility,
    array $data = []
)
{

    $this->_coreRegistry = $registry;
    $this->_productCollectionFactory = $productCollectionFactory;
    $this->productStatus = $productStatus;
    $this->productVisibility = $productVisibility;
    parent::__construct($context, $data);
}

public function getProductCollection()
{
    $collection = $this->_productCollectionFactory->create();
    $collection->addAttributeToFilter('manufacturer', ['eq' => '20']);
    $collection->addAttributeToFilter('status', ['in' => $this->productStatus->getVisibleStatusIds()]);
    $collection->setVisibility($this->productVisibility->getVisibleInSiteIds());

    return $collection;
}
//Product Collection Status & Visibility Filters finish
