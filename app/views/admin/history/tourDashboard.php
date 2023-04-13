<?php
$var = 'dashboard';
include __DIR__ . '/../../header.php';
?>

<!-- Buttons to switch what dashboard the admin wants to see -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<div class="row dashboard-button-background m-0 mw-100">
    <button class="col text-light dashboard-button ">Jazz</button>
    <button class="col text-light dashboard-button ">Yummy</button>
    <a href="admin/historyDashboard" class="col text-light dashboard-button active">History</a>

</div>
    <h1 class = "d-flex justify-content-center">tour's</h1>

    <div class="container">
  <div class="col d-flex flex-row-reverse">
       
        <div>
        <button type="button" onclick = "window.location.href = '/admin/addTour'" class="btn btn-success m-1">Add tour</button>
        </div>
        <div class="dropdown m-1">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                Filter
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="/admin/userdashboard">Historical Events</a></li>
                <li><a class="dropdown-item" href="/admin/tourdashboard">Tours</a></li>
            </ul>
            </div>
   
  </div>
</div>
    <div class = "d-flex justify-content-center">
    <table class="table table-bordered table-striped widened w-75 p-3">
        <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Date Time</th>
                                        <th>Languages</th>
                                        <th>Spaces left</th>
                                        <th>Guide</th>
                                    </tr>
        </thead>
        <tbody>
            <?php foreach($tours as $tour){ ?>
                <tr>
                    <td><?php echo $tour->getTourID(); ?></td>
                    <td><?php echo $tour->getDatetime(); ?></td>
                    <td><?php echo $tour->getName(); ?></td>
                    <td><?php echo $tour->getSpacesLeft(); ?></td>
                    <td><?php echo $tour->getGuide(); ?></td>
                    <td>
                        <a href="/admin/editHistoryEvent?id=<?php echo $tour->getTourID(); ?>" class="btn btn-primary">Edit</a>
                        <a href="#" class="btn btn-danger" onclick="check();">Delete</a>    
                </tr>
            <?php } ?>
        
    </div>
  </body>
</html>

<script>
    function check() {
        if(confirm('Are you sure you want to delete that?')){
            window.location.href = '/admin/deleteHistoryEvent?id=<?php echo $tour->getTourID(); ?>'
        }
    }
</script>