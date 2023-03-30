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
    <h1 class = "d-flex justify-content-center">Ticket of Order : <?php echo $order_id ?></h1>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    
  <div class="container">
  <button class = "btn btn-info mb-5" onclick = "window.location.href = '/admin/orderdashboard'">Back to orders</button>
          <div class="row d-flex justify-content-center">
            <h3>Tickets of Yummy</h3>
              <hr>
              <button class = "btn btn-success" onclick="window.location.href='/admin/ticketdashboard?addYummyTicketToOrder=<? echo $order_id ?>'">Add Yummy Ticket</button>
            <div class="col d-flex justify-content-center">
              
            <table class="table table-bordered table-striped widened w-75 p-3">
            <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Start Date And Time</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Is Checked</th>
                                            <th>Actions</th>
                                        </tr>
            </thead>
            <tbody>
                <?php foreach($yummyTickets as $yummyTicket): ?>
                    <tr>
                        <td><?php echo $yummyTicket["ticket_id"]?></td>
                        <td><?php echo $yummyTicket["name"]?></td>
                        <td><?php  echo $yummyTicket["start_datetime"]?></td>
                        <td><?php echo $yummyTicket["quantity"]?></td>
                        <td><?php echo $yummyTicket["price"]?></td>
                        <td><?php echo $yummyTicket["ischecked"]?></td>
                        <td>
                            <a href="/admin/ticketdashboard?deleteTicket=<?php echo $yummyTicket["ticket_id"] ?>&order=<?php echo $order_id ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
          </table>
            </div>
          </div>
      <div class="row">
        <h3>Tickets of Jazz</h3>
        <hr>
        <button class = "btn btn-success" onclick="window.location.href='/admin/ticketdashboard?addJazzTicketToOrder=<? echo $order_id ?>'">Add Jazz Ticket</button>
        <div class="col d-flex justify-content-center">
        <table class="table table-bordered table-striped widened w-75 p-3">
            <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Date And Time</th>
                                            <th>Hall</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Is Checked</th>
                                            <th>Actions</th>
                                        </tr>
            </thead>
            <tbody>
                <?php foreach($jazzTickets as $jazzTicket): ?>
                    <tr>
                        <td><?php echo $jazzTicket["ticket_id"]?></td>
                        <td><?php echo$jazzTicket["name"] ?></td>
                        <td><?php echo$jazzTicket["datetime"] ?></td>
                        <td><?php echo$jazzTicket["hall"]?></td>
                        <td><?php echo$jazzTicket["quantity"]?></td>
                        <td><?php echo$jazzTicket["price"]?></td>
                        <td><?php echo$jazzTicket["ischecked"]?></td>
                        <td>
                            <a href="/admin/ticketdashboard?deleteTicket=<?php echo $jazzTicket["ticket_id"]?>&order=<?php echo $order_id ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="row">
        <h3>Tickets of History</h3>
        <button class = "btn btn-success" onclick="window.location.href='/admin/ticketdashboard?addHistoryTicketToOrder=<? echo $order_id ?>'">Add History Ticket</button>
        <div class="col d-flex justify-content-center">
        <table class="table table-bordered table-striped widened w-75 p-3">
            <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Start Date And Time</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Is Checked</th>
                                            <th>Actions</th>
                                        </tr>
            </thead>
            <tbody>
                <?php foreach($historyTickets as $historyTicket): ?>
                    <tr>
                        <td><?php echo $historyTicket["ticket_id"]?></td>
                        <td><?php echo $historyTicket["name"]?></td>
                        <td><?php echo $historyTicket["datetime"]?></td>
                        <td><?php echo $historyTicket["start_location"]?></td>
                        <td><?php echo $historyTicket["price"]?></td>
                        <td><?php echo $historyTicket["ischecked"]?></td>
                        <td>
                            <a href="/admin/ticketdashboard?deleteTicket=<?php echo $historyTicket["ticket_id"]?>&order=<?php echo $order_id ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div> 
    
  </body>
</html>