<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://cdn.tiny.cloud/1/ba8tt12qvwmzgm8ag72c3lzzxelgel1rfe49kcn6lne2k3a0/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
      tinymce.init({
        selector: '#editor',
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
      tinymce.init({
        selector: '#editorAboutText',
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
    <h2>Events on Homepage</h2>
    <form method="post" >
      <input type="hidden" name = "eventText">
    <div class="row justify-content-center" id = "editor">
        <div class="col-10" id="eventCalender">
            <div class="row justify-content-center">
                <div class="col-4 events">
                    <h class="event-heading">Thursday 27th June</h>
                    <ul>
                        <li class="event" name = "firstJazz"></li>
                        <li class="event">event</li>
                        <li class="event">event</li>
                    </ul>
                </div>
                <div class="col-4 events">
                    <h class="event-heading">Friday 28th June</h>
                    <ul>
                        <li class="event">event</li>
                        <li class="event">event</li>
                        <li class="event">event</li>
                    </ul>
                </div>
    	    </div>
            <div class="row justify-content-center">
                <div class="col-4 events">
                    <h class="event-heading">Saturday 29th June</h>
                    <ul>
                        <li class="event">event</li>
                        <li class="event">event</li>
                        <li class="event">event</li>
                    </ul>
                </div>
                <div class="col-4 events">
                    <h class="event-heading">Sunday 30th June</h>
                    <ul>
                        <li class="event">event</li>
                        <li class="event">event</li>
                        <li class="event">event</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <input class = "btn btn-success"type="submit" value="Submit Changes">
    </form>
    <h2>About Text</h2>
    <form method="POST" >
      <input type="hidden" name = "aboutText">
        <textarea class="col-10" id = "editorAboutText" name = "text">
            <?php echo $aboutText['about']; ?>
        </textarea>
    <input class = "btn btn-success" type="submit" value="Submit Changes">
    </form>
  </body>
</html>