<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ticket Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .ticket-info {
            width: 50%;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            text-align: center;
            box-shadow: 0 0 10px rgba(0, 0, 0, .1);
        }
        .ticket-info h2 {
            margin: 0 0 15px;
            color: #333;
        }
        .ticket-info p {
            margin: 0 0 10px;
            color: #666;
        }
    </style>
</head>
<body>
<div class="ticket-info">
    <h2>Ticket Information</h2>
    <p><strong>Type: History</strong></p>
    <p><strong>Language:</strong> <?php echo htmlspecialchars($name); ?></p>
<p><strong>Start Location:</strong> <?php echo htmlspecialchars($start_location); ?></p>
<p><strong>Start Date & Time:</strong> <?php echo htmlspecialchars($datetime); ?></p>
<p><strong>Quantity:</strong> <?php echo htmlspecialchars($quantity); ?></p>
<p><strong>Price:</strong> <?php echo htmlspecialchars($price); ?></p>
</div>
</body>
</html>

