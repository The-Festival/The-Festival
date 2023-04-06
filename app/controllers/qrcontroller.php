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
    public function index()
    {
        $this->renderQRCode($this->generateQRCode());
    }

    public function generateQRCode()
    {
        $writer = new PngWriter();

        // Create QR code
        $qrCode = QrCode::create('Life is too short to be generating QR codes')
            ->setEncoding(new Encoding('UTF-8'))
            ->setErrorCorrectionLevel(new ErrorCorrectionLevelLow())
            ->setSize(300)
            ->setMargin(10)
            ->setRoundBlockSizeMode(new RoundBlockSizeModeMargin())
            ->setForegroundColor(new Color(0, 0, 0))
            ->setBackgroundColor(new Color(255, 255, 255));

        // Create generic logo
        $logo = Logo::create(__DIR__ . '/assets/symfony.png')
            ->setResizeToWidth(50);

        // Create generic label
        $label = Label::create('Label')
            ->setTextColor(new Color(255, 0, 0));

        $result = $writer->write($qrCode, $logo, $label);

        // Validate the result
        $writer->validateResult($result, 'Life is too short to be generating QR codes');

        return $result;
    }

    public function renderQRCode($result)
    {
        // Directly output the QR code
        header('Content-Type: ' . $result->getMimeType());
        echo $result->getString();

        // Save it to a file
        $result->saveToFile(__DIR__ . '/qrcode.png');

        // Generate a data URI to include image data inline (i.e. inside an <img> tag)
        $dataUri = $result->getDataUri();
    }
}
