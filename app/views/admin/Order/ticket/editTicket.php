<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link type = "text/css" rel="stylesheet" href="css/userDashboard.css">
    <title>Order Dashboard</title>
  </head>
  <body>
    <h1 class = "d-flex justify-content-center">Edit ticket to order : <?php echo $ticket->getOrderId()?></h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <div class  = "container">
        <div class = "row">
            <div class = "col-12">
                <form action = "/admin/ticketdashboard" method = "post">
                    <input type="hidden" name  = "editTicket">
                    <input type="hidden" name="order_id" value="<?php echo $ticket->getOrderId() ?>">
                    <input type="hidden" name="event_id" value="<?php echo $ticket->getEventId() ?>">
                    <input type="hidden" name="event_type" value="<?php echo $ticket->getEventType() ?>">
                    <div class = "form-group">
                        <label for = "ticket_name">Ticket ID</label>
                        <input type = "text" class = "form-control" name = "ticket_id" value = "<? echo $ticket->getTicketId()?>" readonly>
                    </div>
                    <div class = "form-group">
                        <label for = "ticket_quantity">Ticket Quantity</label>
                        <input type = "number" class = "form-control" name = "quantity" value = "<? echo $ticket->getQuantity()?>" Required>
                    </div>
                    <div>
                        <label for = "vat_percentage">VAT Percentage</label>
                        <select name="vat_percentage" class = "form-select" Required>
                            <option value="9" <?if($ticket->getVatPercentage() == 9){ echo "selected" ; }?>>9%</option>
                            <option value="21" <?if($ticket->getVatPercentage() == 21){ echo "selected" ; }?>>21%</option>
                        </select>
                    </div>
                    <div class = "form-group">
                        <label for = "isChecked">Checked</label>
                        <select name="is_checked" class = "form-select" Required>
                            <option value="0" <?if($ticket->getIsChecked() == 0){echo "selected" ; }?>>No</option>
                            <option value="1" <?if($ticket->getIsChecked() == 1){echo "selected" ; }?>>Yes</option>
                        </select>
                    </div>
                        <button class = "btn btn-danger mt-2" onclick="window.location.href = `/admin/ticketdashboard?ticketsOrder=${<?php echo $ticket->getOrderId(); ?>}`">Cancel</button>
                        <button type = "submit" class = "btn btn-primary mt-2">Edit Ticket</button>
                    </div>

    </div>