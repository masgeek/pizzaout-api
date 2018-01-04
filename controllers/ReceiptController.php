<?php
/**
 * Created by PhpStorm.
 * User: RONIN
 * Date: 11/4/2017
 * Time: 9:25 PM
 */

namespace app\controllers;


use app\helpers\APP_UTILS;
use app\helpers\ORDER_HELPER;
use app\helpers\ReceiptItem;
use app\model_extended\VW_ORDER_ITEMS;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\Printer;
use Yii;
use yii\helpers\Url;
use yii\web\Controller;

class ReceiptController extends Controller
{
    /**
     * @return string
     */
    public function actionIndex()
    {
        return "Receipt printing";
    }


    /**
     * @param $order_id
     * @return int
     * @throws \Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function actionPrintReceipt($order_id)
    {
        $this->view->title = 'Sample Print Receipt';
        //get the order information
        /* Information for the receipt */
        $orderitems = VW_ORDER_ITEMS::CreateReceiptObjects($order_id);


        $subtotal = VW_ORDER_ITEMS::CreateReceiptSubtotal($order_id);
        $tax = VW_ORDER_ITEMS::CreateReceiptTax($subtotal->SUBTOTAL);
        $total = VW_ORDER_ITEMS::CreateReceiptTotal($subtotal->SUBTOTAL, $tax->TAX_AMOUNT);


        $file = $this->PrintReceipt(Yii::$app->name . 'Order Number ' . $order_id, $orderitems, $subtotal, $tax, $total);
        //let us prepare the receipt
        //return $this->renderPartial('error', ['message' => 'hello sammy']);

        $baseUrl = Url::to([null], true);
        $cleanBaseURL = substr($baseUrl, 0, strpos($baseUrl, "receipt"));

        $readFile = $cleanBaseURL . '/' . $file;

        $contents = file_get_contents($readFile);

        return $this->render('receipt', ['message' => $contents]);
    }

    /**
     * @param $shopName
     * @param $items
     * @param $subtotal
     * @param $tax
     * @param $total
     * @param string $fileName
     * @return int
     * @throws \Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function PrintReceipt($shopName, $items, $subtotal, $tax, $total, $fileName = "sammy.txt")
    {
        $tagLine = ORDER_HELPER::getTagLine();
        $printDate = APP_UTILS::GetCurrentDateTime('medium');

        //$connector = new CupsPrintConnector('pizza');
        $connector = new FilePrintConnector($fileName);

        /* Start the printer */
        $printer = new Printer($connector);

        /* Print top logo */
        $printer->setJustification(Printer::JUSTIFY_CENTER);
        //$printer->graphics($logo);
        /* Name of shop */
        $printer->selectPrintMode(Printer::MODE_DOUBLE_WIDTH);
        $printer->text("$shopName\n");
        $printer->selectPrintMode();
        //$printer->text("Shop No. 42.\n");
        //$printer->feed();


        /* Title of receipt */
        $printer->setEmphasis(true);
        $printer->text("SALES RECEIPT\n");
        $printer->setEmphasis(false);


        /* Items */
        //$printer->setJustification(Printer::JUSTIFY_LEFT);
        //$printer->setEmphasis(true);
        //$printer->text(new ReceiptItem('', '$'));
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
        // $printer->text("$shopName\n");
        $printer->text("$tagLine\n");
        $printer->feed(2);
        $printer->text($printDate . "\n");


        /* Cut the receipt and open the cash drawer */
        $printer->cut();
        $printer->pulse();
        $printer->close();

        return $fileName;

    }

    /**
     * @return int
     * @throws \Exception
     * @throws \yii\base\InvalidConfigException
     *
     * @deprecated
     */
    public function actionPrint()
    {
        //$connector = new WindowsPrintConnector("COM1");
        $connector = new FilePrintConnector('sammy.txt');

        /* Information for the receipt */
        $items = array(
            new ReceiptItem("Example item #1", "4.00"),
            new ReceiptItem("Another thing", "3.50"),
            new ReceiptItem("Something else", "1.00"),
            new ReceiptItem("A final item", "4.45"),
        );

        $subtotal = new ReceiptItem('Subtotal', '12.95');
        $tax = new ReceiptItem('A local tax', '1.30');
        $total = new ReceiptItem('Total', '14.25', true);
        /* Date is kept the same for testing */
//$date = date('l jS \of F Y h:i:s A');
        $date = APP_UTILS::GetCurrentDateTime('full');
        /* Start the printer */
        $logo = EscposImage::load("images/app_images/logo.png", true);
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
        $printer->text(new ReceiptItem('', '$'));
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