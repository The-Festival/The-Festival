<?php
$var = 'dashboard';
include __DIR__ . '/../header.php';
?>

<!-- Buttons to switch what dashboard the admin wants to see -->

<div class="row dashboard-button-background">
    <button class="col active text-light dashboard-button ">Jazz</button>
    <button class="col text-light dashboard-button ">Yummy</button>
    <a href="admin/historyDashboard" class="col text-light dashboard-button ">History</a>

</div>

<!-- End -->

<!-- This part of the dashboard needs to be dynamically loaded depending on what button is active -->

<div id="dashboard-content">
    <?php include __DIR__ . "/jazz.php"; ?>
</div>

<!-- End -->

<!-- This part needs to go to it's own file in the future -->



<script>
    var buttons = document.getElementsByClassName('dashboard-button');
    var dashboardContent = document.getElementById('dashboard-content');
    for (var i = 0; i < buttons.length; i++) {
        buttons[i].addEventListener('click', function() {
            // Remove the "active" class from all buttons except the clicked one
            for (var j = 0; j < buttons.length; j++) {
                if (buttons[j] !== this && buttons[j].classList.contains('active')) {
                    buttons[j].classList.remove('active');
                }
            }
            // Add the "active" class to the clicked button
            this.classList.add('active');

            // Update the content of the dashboard based on the clicked button
            var dashboardContentText;
            switch (this.innerText) {
                case 'Jazz':
                    dashboardContentText = "\<?php include __DIR__ . "/jazz.php"; ?>";
                    break;
                case 'Yummy':
                    dashboardContentText = '<h2>Yummy Dashboard</h2>';
                    break;
                // case 'History':
                //     dashboardContentText = '<h2>History Dashboard</h2>';
                //     break;
                default:
                    dashboardContentText = '<h2>Unknown Dashboard!<br>Please try to log in again</h2>';
            }
            dashboardContent.innerHTML = dashboardContentText;
        });
    }
</script>

<!-- End -->