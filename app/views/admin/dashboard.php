<?php
$var = 'dashboard';
include __DIR__ . '/../header.php';
?>

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
</style>