<?php
require dirname(__FILE__) . '/../app/bootstrap.php';
$bootstrap = \Magento\Framework\App\Bootstrap::create(BP, $_SERVER);
require dirname(__FILE__) . '/Abstract.php';

class Getapp extends AbstractApp
{
    public function run()
    {
        $this->_objectManager->get('Magento\Framework\Registry')
            ->register('isSecureArea', true);

        $datas = $this->_objectManager->create('\Magento\Sales\Model\ResourceModel\Order\Collection');

       // $products = $this->_objectManager->create('\Sugarcode\Test\Model\Test'); // custom Module 
       //$products = $this->_objectManager->create('\Magento\Catalog\Model\Product');
     //   $products = $products->getCollection();
        foreach($datas as $data){
            echo $data->getIncrementId().'<br>';
        }
    }
}

/** @var \Magento\Framework\App\Http $app */
$app = $bootstrap->createApplication('Getapp');
$bootstrap->run($app);
