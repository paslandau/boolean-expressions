<?php

use paslandau\BooleanExpressions;
use paslandau\BooleanExpressions\And_;
use paslandau\BooleanExpressions\ExpressionInterface;
class And_Test extends PHPUnit_Framework_TestCase{
	
	public function testAndTrue()
	{
		$and = new And_();
		$e1 = $this->getMock(ExpressionInterface::class);
		$e1->expects($this->any())->method('Solve')->will($this->returnValue(true));
		$and[] = $e1;
		$res = $and->Solve();
		$this->assertTrue($res);
	}
	
	public function testAndFalse()
	{
		$e1 = $this->getMock(ExpressionInterface::class);
		$e1->expects($this->any())->method('Solve')->will($this->returnValue(true));
		$e2 = $this->getMock(ExpressionInterface::class);
		$e2->expects($this->any())->method('Solve')->will($this->returnValue(true));
		$e3 = $this->getMock(ExpressionInterface::class);
		$e3->expects($this->any())->method('Solve')->will($this->returnValue(true));
		$e4 = $this->getMock(ExpressionInterface::class);
		$e4->expects($this->any())->method('Solve')->will($this->returnValue(false));
		$and = new And_(array($e1,$e2,$e3,$e4));
		$res = $and->solve();
		$this->assertFalse($res);
	}
	
	public function testAndEmpty()
	{
		$this->setExpectedException(UnexpectedValueException::class);
		$and = new And_();
		$and->solve();
	}
	
	public function testAndWrongInput()
	{
		$this->setExpectedException(InvalidArgumentException::class);
		$and = new And_();
		$and[] = 1;
		$and->Solve();
	}
}
