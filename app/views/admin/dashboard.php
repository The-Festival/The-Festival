<?php
$var = 'dashboard';
include __DIR__ . '/../header.php';
?>

<div class="row dashboard-button-background">
    <button type="" name="submitButton" value="" class="col active text-light dashboard-button ">Jazz</button>
    <button type="" name="submitButton" value="" class="col text-light dashboard-button ">Yummy</button>
    <button type="" name="submitButton" value="" class="col text-light dashboard-button ">History</button>
</div>
<div class="container-lg">
    <div class="row">
        <div class="col mt-3">
            <div class="card card-background d-flex align-items-center">
                <h4 class="card-title"> List of Artists </h4>
                <div class="card-body">
                    {Artist name} <button class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .card-background {
        background: rgba(255, 251, 251, 0.3);
        box-shadow: 10px 10px 4px rgba(0, 0, 0, 0.25);
        border-radius: 0px;
    }

    .dashboard-button {
        background: none;
        border: 0;
        height: 3em;
    }

    .active {
        background-color: rgba(0, 0, 0, 0.25);
    }

    .dashboard-button-background {
        background: #6716C7;
    }
</style>

<script>
    var buttons = document.getElementsByClassName('dashboard-button');
    for (var i = 0; i < buttons.length; i++) {
        buttons[i].addEventListener('click', function() {
            for (var j = 0; j < buttons.length; j++) {
                if (buttons[j] !== this && buttons[j].classList.contains('active')) {
                    buttons[j].classList.remove('active');
                }
            }
            this.classList.add('active');
        });
    }
</script>