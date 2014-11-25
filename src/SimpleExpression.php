<?php

namespace paslandau\BooleanExpressions;


class SimpleExpression implements ExpressionInterface{
    /**
     * @var bool
     */
    private $val;

    function __construct($val)
    {
        $this->val = $val;
    }

    /**
     * Solve this expression an returns either true or false
     * @param mixed $input [optional]. Default: null. Optional input that is used for the evaluation
     * @return boolean
     */
    public function solve($input = null)
    {
        return $this->val;
    }


} 