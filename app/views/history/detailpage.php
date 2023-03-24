<?php
$var = 'history';
require __DIR__ . '/../header.php';
?>
<div class="hero-image" id="hero-image"></div>

<?php 
require __DIR__ . '/../footer/footer.php';

?>
<script>
    function heroBackground() {
        document.getElementById("hero-image").style.backgroundImage = "url('<?php echo $banner[0]->getFilepath(); ?>')";
    }
    window.onload = heroBackground();
    
</script>