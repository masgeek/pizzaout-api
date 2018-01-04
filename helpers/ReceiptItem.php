<?php
/**
 * Created by PhpStorm.
 * User: RONIN
 * Date: 1/4/2018
 * Time: 11:32 AM
 */

namespace app\helpers;


class ReceiptItem
{
    private $name;
    private $price;
    private $addCurrencySymbol;
    private $currency;

    public $SUBTOTAL;
    public $TAX_AMOUNT;

    /**
     * ReceiptItem constructor.
     * @param string $name
     * @param string $price
     * @param bool $addCurrencySymbol
     * @param string $currency
     */
    public function __construct($name = '', $price = '', $addCurrencySymbol = false, $currency = 'USD')
    {
        $this->name = $name;
        $this->price = $price;
        $this->currency = $currency;

        $this->addCurrencySymbol = $addCurrencySymbol;
        $this->SUBTOTAL = $price;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $rightCols = 10;
        $leftCols = 38;
        if ($this->addCurrencySymbol) {
            $leftCols = $leftCols / 2 - $rightCols / 2;
        }
        $left = str_pad($this->name, $leftCols);

        $sign = ($this->addCurrencySymbol ? $this->currency : '');
        $right = str_pad($sign . $this->price, $rightCols, ' ', STR_PAD_LEFT);
        return "$left$right\n";
    }
}