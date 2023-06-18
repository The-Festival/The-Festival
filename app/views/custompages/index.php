<?php
include __DIR__ . '/../header.php';

?>

<div>
    <h1 class="text-center">Custom Pages</h1>
</div>

<div class="container py-4 d-flex align-items-center justify-content-center" style="height: 80vh;">
    <div>
        <?php foreach ($customPages as $customPage ) {
            echo '<div class="row g-3 py-2 border-bottom text-center"> 
                <div class="col-12">
                    <h5>' . $customPage->getName() . '</h5>
                </div>
                <div class="col-12">
                    <a href="/custompages/page?id=' . $customPage->getId() . '" class="btn btn-primary">Go to Page</a>
                </div>
            </div>';
        }?>
    </div>
</div>




<?php
include __DIR__ . '/../footer/footer.php';
?>
</body>


