<?php
/**
 * Created by PhpStorm.
 * User: RONIN
 * Date: 11/4/2017
 * Time: 9:25 PM
 */

namespace app\controllers;


use app\helpers\APP_UTILS;
use app\helpers\item;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\Printer;
use yii\web\Controller;

class ReceiptController extends Controller
{
	public function actionPrint()
	{
		//$connector = new WindowsPrintConnector("COM1");
		$connector = new FilePrintConnector('sammy.txt');

		/* Information for the receipt */
		$items = array(
			new item("Example item #1", "4.00"),
			new item("Another thing", "3.50"),
			new item("Something else", "1.00"),
			new item("A final item", "4.45"),
		);

		$subtotal = new item('Subtotal', '12.95');
		$tax = new item('A local tax', '1.30');
		$total = new item('Total', '14.25', true);
		/* Date is kept the same for testing */
//$date = date('l jS \of F Y h:i:s A');
		$date = APP_UTILS::GetCurrentDateTime(true);
		/* Start the printer */
		$logo = EscposImage::load("assets2/images/device.png", false);
		$printer = new Printer($connector);

		/* Print top logo */
		$printer->setJustification(Printer::JUSTIFY_CENTER);
		//$printer->graphics($logo);
		/* Name of shop */
		$printer->selectPrintMode(Printer::MODE_DOUBLE_WIDTH);
		$printer->text("ExampleMart Ltd.\n");
		$printer->selectPrintMode();
		$printer->text("Shop No. 42.\n");
		$printer->feed();
		/* Title of receipt */
		$printer->setEmphasis(true);
		$printer->text("SALES INVOICE\n");
		$printer->setEmphasis(false);
		/* Items */
		$printer->setJustification(Printer::JUSTIFY_LEFT);
		$printer->setEmphasis(true);
		$printer->text(new item('', '$'));
		$printer->setEmphasis(false);
		foreach ($items as $item) {
			$printer->text($item);
		}
		$printer->setEmphasis(true);
		$printer->text($subtotal);
		$printer->setEmphasis(false);
		$printer->feed();
		/* Tax and total */
		$printer->text($tax);
		$printer->selectPrintMode(Printer::MODE_DOUBLE_WIDTH);
		$printer->text($total);
		$printer->selectPrintMode();
		/* Footer */
		$printer->feed(2);
		$printer->setJustification(Printer::JUSTIFY_CENTER);
		$printer->text("Thank you for shopping at ExampleMart\n");
		$printer->text("For trading hours, please visit example.com\n");
		$printer->feed(2);
		$printer->text($date . "\n");
		/* Cut the receipt and open the cash drawer */
		$printer->cut();
		$printer->pulse();
		$printer->close();

		return 1;

	}


}