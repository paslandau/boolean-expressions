<?php
namespace paslandau\BooleanExpressions;

interface ExpressionInterface{
	
	/**
	 * Solve this expression an returns either true or false
	 * @param mixed $input [optional]. Default: null. Optional input that is used for the evaluation
	 * @return boolean
	 */
	public function solve($input = null);
}