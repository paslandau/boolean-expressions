<?php

use paslandau\BooleanExpressions;
use paslandau\BooleanExpressions\And_;
use paslandau\BooleanExpressions\ExpressionInterface;
use paslandau\BooleanExpressions\Or_;
use paslandau\BooleanExpressions\Not_;

class Misc_Test extends PHPUnit_Framework_TestCase{
	
	public function testMiscFalse()
	{
		$e1 = $this->getMock(ExpressionInterface::class);
		$e1->expects($this->any())->method('Solve')->will($this->returnValue(true));
		$e2 = $this->getMock(ExpressionInterface::class);
		$e2->expects($this->any())->method('Solve')->will($this->returnValue(true));
		$and = new And_(array($e1,$e2));
		
		$e3 = $this->getMock(ExpressionInterface::class);
		$e3->expects($this->any())->method('Solve')->will($this->returnValue(false));
		$e4 = $this->getMock(ExpressionInterface::class);
		$e4->expects($this->any())->method('Solve')->will($this->returnValue(true));
		$and2 = new And_(array($e3,$e4));
		
		$or = new Or_(array($and,$and2));
		$not = new Not_($or);
		$res = $not->solve();
		$this->assertFalse($res);
	}
	
	public function testMiscTrue()
	{
		$e1 = $this->getMock(ExpressionInterface::class);
		$e1->expects($this->any())->method('Solve')->will($this->returnValue(true));
		$e2 = $this->getMock(ExpressionInterface::class);
		$e2->expects($this->any())->method('Solve')->will($this->returnValue(true));
		$or = new Or_(array($e1,$e2));
		
		$e3 = $this->getMock(ExpressionInterface::class);
		$e3->expects($this->any())->method('Solve')->will($this->returnValue(false));
		$e4 = $this->getMock(ExpressionInterface::class);
		$e4->expects($this->any())->method('Solve')->will($this->returnValue(true));
		$or2 = new Or_(array($e3,$e4));
		
		$and = new And_(array($or,$or2));
		$not = new Not_($and);
		$not2 = new Not_($not);
		$res = $not2->solve();
		$this->assertTrue($res);
	}
}
