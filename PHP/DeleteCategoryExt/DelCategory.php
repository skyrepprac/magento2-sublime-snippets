<?php
require dirname(__FILE__) . '/../app/bootstrap.php';
$bootstrap = \Magento\Framework\App\Bootstrap::create(BP, $_SERVER);
require dirname(__FILE__) . '/Abstract.php';

class CreateCategoriesApp extends AbstractApp
{
    public function run()
    {
        $this->_objectManager->get('Magento\Framework\Registry')
            ->register('isSecureArea', true);

        $category = $this->_objectManager->create('\Magento\Catalog\Model\Category');
        $category = $category->load(343);

        $category->delete();
    }
}

/** @var \Magento\Framework\App\Http $app */
$app = $bootstrap->createApplication('CreateCategoriesApp');
$bootstrap->run($app);
