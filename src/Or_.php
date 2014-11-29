<?php
namespace paslandau\BooleanExpressions;

class Or_ extends \ArrayObject implements ExpressionInterface{
	
	public function solve($input = null){
		if($this->count() == 0){
			throw new \UnexpectedValueException("No expressions are set. At least one expression is required.");
		}
		foreach($this as $key => $expression){
			$result = $expression->Solve($input);
			if($result){
				return true;
			}
		}
		return false;
	}

    /**
     *
     * @param ExpressionInterface $expression
     * @see ArrayObject::append()
     */
	public function append($expression) {
		parent::append ( $expression );
	}

    /**
     *
     * @todo Make this pretty (ExpressionInterface<Type>) when/if generics are supported in PHP... http://stackoverflow.com/a/13583495/413531
     * @param mixed $index
     * @param ExpressionInterface $expression
     * @throws \InvalidArgumentException
     * @see ArrayObject::append()
     */
	public function offsetSet($index, $expression) {
		if(!$expression instanceof ExpressionInterface){
			throw new \InvalidArgumentException("expression must be of type ".ExpressionInterface::class);
		}
		parent::offsetSet ( $index, $expression );
	}
}
?>