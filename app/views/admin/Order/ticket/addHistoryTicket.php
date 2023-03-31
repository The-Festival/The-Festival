<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link type = "text/css" rel="stylesheet" href="css/userDashboard.css">
    <title>Order Dashboard</title>
  </head>
  <body>
    <h1 class = "d-flex justify-content-center">Add history ticket to order : <?php echo $order_id ?></h1>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    <div class  = "container">
        <div class = "row">
            <div class = "col-12">
                <form action = "/admin/ticketdashboard" method = "post">
                    <input type="hidden" name  = "addHistoryTicketToOrder">
                    <input type="hidden" name="order_id" value="<?php echo $order_id ?>">
                    <div class = "form-group">
                        <label for = "event_id">History event :</label>
                    <select name="event_id" class = "form-select" Required>
                        <?php foreach($historyEvents as $event){?>
                            <option value="<?php echo $event['tour_id']?>">ID : <?php echo $event['tour_id']?> Language: <?php echo $event['name']?> Start date time : <? echo $event['datetime'] ?></option>
                            <?
                            }
                            ?>
                    </select>
                    </div>
                    <div class = "form-group">
                        <label for = "ticket_quantity">Ticket Quantity</label>
                        <input type = "number" class = "form-control" name = "quantity" placeholder = "Enter Ticket Quantity" Required>
                    </div>
                    <div>
                        <label for = "vat_percentage">VAT Percentage</label>
                        <select name="vat_percentage" class = "form-select" Required>
                            <option value="9">9%</option>
                            <option value="21">21%</option>
                        </select>
                    </div>
                    <div class = "form-group">
                        <label for = "isChecked">Checked</label>
                        <select name="is_checked" class = "form-select" Required>
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>
                        <button class = "btn btn-danger mt-2" onclick="window.location.href = `/admin/ticketdashboard?ticketsOrder=${<?php echo $order_id; ?>}`">Cancel</button>
                        <button type = "submit" class = "btn btn-primary mt-2">Add History Ticket</button>
                    </div>

    </div>