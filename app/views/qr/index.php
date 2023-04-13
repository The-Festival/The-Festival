<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>QR-result</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='stylesheet.css'>
</head>
<body>
    <h1>QR-result</h1>
    <img src="<?php echo $qrCodeUrl; ?>" alt="QR-code">

    <form action="index.php?controller=qr&action=generateQRCode" method="get">
        <input type="text" name="link" placeholder="Enter link">
        <input type="submit" value="Generate QR-code">
    </form>

    
</body>
</html>