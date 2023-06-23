<!DOCTYPE html>
<html>
<head>
    <title>Payment Failed</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex align-items-center justify-content-center" style="height: 100vh;">
<div class="text-center">
    <h1>Failure</h1>
    <h3><?php echo $errorMessage ?></h3>
    <p>Your payment failed. Please try again.</p>
    <a href="/" class="btn btn-primary">Go back to the homepage</a>
</div>
</body>
</html>
