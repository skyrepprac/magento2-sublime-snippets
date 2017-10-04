<?php
/*
Because in Magento 2.1 got the error as Area code not set when using that code. So the intension of this answer is to fix that error on Magento 2.1

What you have to do in order to fix this error is define the area in your test.php file. (see the modified file below).
*/
?>

<?php
require __DIR__ . '/app/bootstrap.php';
$bootstrap = \Magento\Framework\App\Bootstrap::create(BP, $_SERVER);
$obj = $bootstrap->getObjectManager();

$state = $obj->get('Magento\Framework\App\State');
$state->setAreaCode('frontend');
/** @var \Magento\Framework\App\Http $app */
$app = $bootstrap->createApplication('TestApp');
$bootstrap->run($app);
/*
And the TestApp.php file will remains the same.
*/
?>

<?php

class TestApp
    extends \Magento\Framework\App\Http
    implements \Magento\Framework\AppInterface {
    public function launch()
    {
        //dirty code goes here.
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $product = $objectManager->get('Magento\Catalog\Model\Product')->load(71);
        var_dump($product->getData());

        return $this->_response;
    }

    public function catchException(\Magento\Framework\App\Bootstrap $bootstrap, \Exception $exception)
    {
        return false;
    }

}
