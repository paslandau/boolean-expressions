<?php

use paslandau\BooleanExpressions;
use paslandau\BooleanExpressions\Or_;
use paslandau\BooleanExpressions\ExpressionInterface;

class Or_Test extends PHPUnit_Framework_TestCase{
	
	public function testOrTrue()
	{
		$or = new Or_();
		$e1 = $this->getMock(ExpressionInterface::class);
		$e1->expects($this->any())->method('Solve')->will($this->returnValue(true));
		$e2 = $this->getMock(ExpressionInterface::class);
		$e2->expects($this->any())->method('Solve')->will($this->returnValue(false));
		$or[] = $e1;
		$or[] = $e2;
		$res = $or->solve();
		$this->assertTrue($res);
	}
	
	public function testOrFalse()
	{
		$e1 = $this->getMock(ExpressionInterface::class);
		$e1->expects($this->any())->method('Solve')->will($this->returnValue(false));
		$e2 = $this->getMock(ExpressionInterface::class);
		$e2->expects($this->any())->method('Solve')->will($this->returnValue(false));
		$or = new Or_(array($e1,$e2));
		$res = $or->solve();
		$this->assertFalse($res);
	}
	
	public function testOrEmpty()
	{
		$this->setExpectedException(UnexpectedValueException::class);
		$or = new Or_();
		$res = $or->solve();
	}
	
	public function testOrWrongInput()
	{
		$this->setExpectedException(InvalidArgumentException::class);
		$or = new Or_();
		$or[] = 1;
		$res = $or->Solve();
	}
}
