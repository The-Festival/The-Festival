<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelLow;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Writer\ValidationException;

class QrController
{
    private $data;
    private $writer;

    function index()
    {
        $this->writer = new PngWriter();
        $this->generateQRCode();
    }

    function generateQRCode()
    {
        !isset($_GET['link']) ? $qrLink = "http://62.250.182.52/" : $qrLink = $_GET['link'];
        
        // Create QR code
        $qrCode = QrCode::create($qrLink)
            ->setEncoding(new Encoding('UTF-8'))
            ->setErrorCorrectionLevel(new ErrorCorrectionLevelLow())
            ->setSize(500)
            ->setMargin(10)
            ->setRoundBlockSizeMode(new RoundBlockSizeModeMargin())
            ->setForegroundColor(new Color(0, 0, 0))
            ->setBackgroundColor(new Color(255, 255, 255));

        $result = $this->writer->write($qrCode);

        // Directly output the QR code
        header('Content-Type: ' . $result->getMimeType());
        echo $result->getString();

        // Save it to a file
        $result->saveToFile(__DIR__ . '/../public/img/qr/qrcode.png');

        // Generate a data URI to include image data inline (i.e. inside an <img> tag)
        $dataUri = $result->getDataUri();
    }
}
