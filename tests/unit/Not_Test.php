<?php

use paslandau\BooleanExpressions;
use paslandau\BooleanExpressions\Not_;
use paslandau\BooleanExpressions\ExpressionInterface;
class Not_Test extends PHPUnit_Framework_TestCase{
	
	public function testNotTrue()
	{
		$e1 = $this->getMock(ExpressionInterface::class);
		$e1->expects($this->any())->method('solve')->will($this->returnValue(false));
		$not = new Not_($e1);
		$res = $not->solve();
		$this->assertTrue($res);
	}
	
	public function testNotFalse()
	{
		$e1 = $this->getMock(ExpressionInterface::class);
		$e1->expects($this->any())->method('solve')->will($this->returnValue(true));
		$not = new Not_($e1);
		$res = $not->solve();
		$this->assertFalse($res);
	}
	
	public function testNotEmpty()
	{
		$this->setExpectedException(UnexpectedValueException::class);
		$e1 = $this->getMock(ExpressionInterface::class);
		$e1->expects($this->any())->method('solve')->will($this->returnValue(true));
		$not = new Not_($e1);
		$not->setExpression(null);
		$res = $not->solve();
	}
}
