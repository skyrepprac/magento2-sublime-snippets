<?php
/*
Create the file

dev/tests/unit/quicktest.php

with 
*/

class QuickTest extends \PHPUnit_Framework_TestCase
{
	public function testExample()
	{
		//instantiate your class
		$context = new Magento\Framework\Object();

		$context->setData('param', 'value');

		//test whatever you want to test
		$this->assertEquals('value', $context->getData('param'));

		//you could even output to console
		echo $context->getData('param');
	}
}

/*
then from the directory dev/tests/unit/ run phpunit quicktest.php which will execute your code. This all works since the file dev/tests/unit/phpunit.xml.dist is automatically loaded and prepares the environment.

In a lot of cases you might have to supply input to the classes' constructor. Please see the existing tests under dev/tests/unit/testsuite/ for further examples of how this could look, including mocking objects.
*/
