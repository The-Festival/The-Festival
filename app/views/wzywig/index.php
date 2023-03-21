<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://cdn.tiny.cloud/1/ba8tt12qvwmzgm8ag72c3lzzxelgel1rfe49kcn6lne2k3a0/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
      tinymce.init({
        selector: '#mytextarea',
        plugins: [
          'a11ychecker','advlist','advcode','advtable','autolink','checklist','export',
          'lists','link','image','charmap','preview','anchor','searchreplace','visualblocks',
          'powerpaste','fullscreen','formatpainter','insertdatetime','media','table','help','wordcount'
        ],

        content_css: [
          "css/styleNav.css",
          "css/footer-style.css",
          "css/styleHome.css",
          "https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css",
          "https://fonts.googleapis.com/css?family=Poppins"
        ],
      });
    </script>

  </head>

  <body>
    <h1>Edit Homepage</h1>
    <form method="post">
      <textarea id="mytextarea" name="body"><?php echo $body?></textarea>
      <br>
      <input type="submit" value="Submit">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $body = $_POST['body'];
        writeToFile('app/views/home/index.php', $body);
    }

    function writeToFile($filename, $content) {
      // Open the file for writing (and create it if it doesn't exist)
      $file = fopen($filename, 'w');
    
      // Write the new content to the file
      fwrite($file, $content);
    
      // Close the file handle
      fclose($file);
    }
    ?>
  </body>
</html>