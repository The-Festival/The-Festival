<?php
$var = 'history';
require __DIR__ . '/../header.php';
?>
<div class="hero-image mb-3" id="hero-image"></div>

<?php foreach($pagePOI as $poi) { ?>
    <div class="detailSection containter w-75 mx-auto mb-5">
        <p class="detailTXT"><?php echo $poi->getText(); ?></p>
        <img src="<?php echo $poi->getPhoto(); ?>" alt="image" class="detailIMG">
    </div>
<?php } ?>

<?php 
require __DIR__ . '/../footer/footer.php';

?>
<script>
    function heroBackground() {
        document.getElementById("hero-image").style.backgroundImage = "url('<?php echo $banner[0]->getFilepath(); ?>')";
    }
    window.onload = heroBackground();
    
</script>