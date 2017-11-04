<?php
/**
 * Created by PhpStorm.
 * User: RONIN
 * Date: 11/4/2017
 * Time: 9:25 PM
 */

namespace app\controllers;


use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\Printer;
use yii\web\Controller;

class ReceiptController extends Controller
{
	public function actionPrint()
	{
		//$connector = new WindowsPrintConnector("COM1");
		$connector = new FilePrintConnector('sammy.txt');
		$printer = new Printer($connector);
		$printer->text("Hello World!\n");
		$printer->cut();
		$printer->close();

		return 1;

	}
}