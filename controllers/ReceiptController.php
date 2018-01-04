<?php
/**
 * Created by PhpStorm.
 * User: RONIN
 * Date: 11/4/2017
 * Time: 9:25 PM
 */

namespace app\controllers;


use app\helpers\APP_UTILS;
use app\helpers\ReceiptItem;
use app\model_extended\VW_ORDER_ITEMS;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\Printer;
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
     * @return string
     */
    public function actionPrintReceipt($order_id)
    {
        $order_id = 1051;
        //get the order information
        $order = VW_ORDER_ITEMS::CreateReceiptObjects($order_id);

        return VW_ORDER_ITEMS::CreateReceiptTax($order_id, 16);

        return $this->renderPartial('error', ['message' => 'hello sammy']);
    }

    /**
     * @return int
     * @throws \Exception
     * @throws \yii\base\InvalidConfigException
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

    /**
     * This is a demo script for the functions of the PHP ESC/POS print driver,
     * Escpos.php.
     *
     * Most printers implement only a subset of the functionality of the driver, so
     * will not render this output correctly in all cases.
     *
     * @author Michael Billington <michael.billington@gmail.com>
     * @throws \Exception
     */
    public function actionDemo()
    {
        $connector = new FilePrintConnector("php://stdout");
        $printer = new Printer($connector);
        /* Initialize */
        $printer->initialize();
        /* Text */
        $printer->text("Hello world\n");
        $printer->cut();
        /* Line feeds */
        $printer->text("ABC");
        $printer->feed(7);
        $printer->text("DEF");
        $printer->feedReverse(3);
        $printer->text("GHI");
        $printer->feed();
        $printer->cut();
        /* Font modes */
        $modes = array(
            Printer::MODE_FONT_B,
            Printer::MODE_EMPHASIZED,
            Printer::MODE_DOUBLE_HEIGHT,
            Printer::MODE_DOUBLE_WIDTH,
            Printer::MODE_UNDERLINE);
        for ($i = 0; $i < pow(2, count($modes)); $i++) {
            $bits = str_pad(decbin($i), count($modes), "0", STR_PAD_LEFT);
            $mode = 0;
            for ($j = 0; $j < strlen($bits); $j++) {
                if (substr($bits, $j, 1) == "1") {
                    $mode |= $modes[$j];
                }
            }
            $printer->selectPrintMode($mode);
            $printer->text("ABCDEFGHIJabcdefghijk\n");
        }
        $printer->selectPrintMode(); // Reset
        $printer->cut();
        /* Underline */
        for ($i = 0; $i < 3; $i++) {
            $printer->setUnderline($i);
            $printer->text("The quick brown fox jumps over the lazy dog\n");
        }
        $printer->setUnderline(0); // Reset
        $printer->cut();
        /* Cuts */
        $printer->text("Partial cut\n(not available on all printers)\n");
        $printer->cut(Printer::CUT_PARTIAL);
        $printer->text("Full cut\n");
        $printer->cut(Printer::CUT_FULL);
        /* Emphasis */
        for ($i = 0; $i < 2; $i++) {
            $printer->setEmphasis($i == 1);
            $printer->text("The quick brown fox jumps over the lazy dog\n");
        }
        $printer->setEmphasis(false); // Reset
        $printer->cut();
        /* Double-strike (looks basically the same as emphasis) */
        for ($i = 0; $i < 2; $i++) {
            $printer->setDoubleStrike($i == 1);
            $printer->text("The quick brown fox jumps over the lazy dog\n");
        }
        $printer->setDoubleStrike(false);
        $printer->cut();
        /* Fonts (many printers do not have a 'Font C') */
        $fonts = array(
            Printer::FONT_A,
            Printer::FONT_B,
            Printer::FONT_C);
        for ($i = 0; $i < count($fonts); $i++) {
            $printer->setFont($fonts[$i]);
            $printer->text("The quick brown fox jumps over the lazy dog\n");
        }
        $printer->setFont(); // Reset
        $printer->cut();
        /* Justification */
        $justification = array(
            Printer::JUSTIFY_LEFT,
            Printer::JUSTIFY_CENTER,
            Printer::JUSTIFY_RIGHT);
        for ($i = 0; $i < count($justification); $i++) {
            $printer->setJustification($justification[$i]);
            $printer->text("A man a plan a canal panama\n");
        }
        $printer->setJustification(); // Reset
        $printer->cut();
        /* Barcodes - see barcode.php for more detail */
        $printer->setBarcodeHeight(80);
        $printer->setBarcodeTextPosition(Printer::BARCODE_TEXT_BELOW);
        $printer->barcode("9876");
        $printer->feed();
        $printer->cut();
        /* Graphics - this demo will not work on some non-Epson printers */
        try {
            $logo = EscposImage::load("images/app_images/logo.png", false);
            $imgModes = array(
                Printer::IMG_DEFAULT,
                Printer::IMG_DOUBLE_WIDTH,
                Printer::IMG_DOUBLE_HEIGHT,
                Printer::IMG_DOUBLE_WIDTH | Printer::IMG_DOUBLE_HEIGHT
            );
            foreach ($imgModes as $mode) {
                $printer->graphics($logo, $mode);
            }
        } catch (Exception $e) {
            /* Images not supported on your PHP, or image file not found */
            $printer->text($e->getMessage() . "\n");
        }
        $printer->cut();
        /* Bit image */
        try {
            $logo = EscposImage::load("resources/escpos-php.png", false);
            $imgModes = array(
                Printer::IMG_DEFAULT,
                Printer::IMG_DOUBLE_WIDTH,
                Printer::IMG_DOUBLE_HEIGHT,
                Printer::IMG_DOUBLE_WIDTH | Printer::IMG_DOUBLE_HEIGHT
            );
            foreach ($imgModes as $mode) {
                $printer->bitImage($logo, $mode);
            }
        } catch (Exception $e) {
            /* Images not supported on your PHP, or image file not found */
            $printer->text($e->getMessage() . "\n");
        }
        $printer->cut();
        /* QR Code - see also the more in-depth demo at qr-code.php */
        $testStr = "Testing 123";
        $models = array(
            Printer::QR_MODEL_1 => "QR Model 1",
            Printer::QR_MODEL_2 => "QR Model 2 (default)",
            Printer::QR_MICRO => "Micro QR code\n(not supported on all printers)");
        foreach ($models as $model => $name) {
            $printer->qrCode($testStr, Printer::QR_ECLEVEL_L, 3, $model);
            $printer->text("$name\n");
            $printer->feed();
        }
        $printer->cut();
        /* Pulse */
        $printer->pulse();
        /* Always close the printer! On some PrintConnectors, no actual
         * data is sent until the printer is closed. */
        $printer->close();
    }

}