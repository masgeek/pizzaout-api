<?php
/**
 * Created by PhpStorm.
 * User: RONIN
 * Date: 11/4/2017
 * Time: 9:58 PM
 */

namespace app\helpers;


/* A wrapper to do organise item names & prices into columns */

class item
{
	private $name;
	private $price;
	private $dollarSign;

	public function __construct($name = '', $price = '', $dollarSign = false)
	{
		$this->name = $name;
		$this->price = $price;
		$this->dollarSign = $dollarSign;
	}

	public function __toString()
	{
		$rightCols = 10;
		$leftCols = 38;
		if ($this->dollarSign) {
			$leftCols = $leftCols / 2 - $rightCols / 2;
		}
		$left = str_pad($this->name, $leftCols);

		$sign = ($this->dollarSign ? '$ ' : '');
		$right = str_pad($sign . $this->price, $rightCols, ' ', STR_PAD_LEFT);
		return "$left$right\n";
	}
}