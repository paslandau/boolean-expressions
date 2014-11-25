<?php

namespace paslandau\BooleanExpressions;

class Not_ implements ExpressionInterface {
	
	/**
	 * 
	 * @var ExpressionInterface
	 */
	private $expression;
	
	public function __construct(ExpressionInterface $expression){
		$this->expression = $expression;
	}

	public function solve($input = null) {
		if($this->expression === null){
			throw new \UnexpectedValueException("Expression must not be null.");
		}
		$result = $this->expression->solve($input);
		return !$result;
	}

    /**
     * @return ExpressionInterface
     */
    public function getExpression()
    {
        return $this->expression;
    }

    /**
     * @param ExpressionInterface $expression
     */
    public function setExpression($expression)
    {
        $this->expression = $expression;
    }
}
?>