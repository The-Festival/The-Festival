<?php
include __DIR__ . '/../header.php';
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">v
    <script src="https://cdn.tiny.cloud/1/ba8tt12qvwmzgm8ag72c3lzzxelgel1rfe49kcn6lne2k3a0/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        const image_upload_handler_callback = (blobInfo, progress) => new Promise((resolve, reject) => {
            const xhr = new XMLHttpRequest();
            xhr.withCredentials = false;
            xhr.open('POST', 'upload');

            xhr.upload.onprogress = (e) => {
                progress(e.loaded / e.total * 100);
            };

            xhr.onload = () => {
                if (xhr.status === 403) {
                    reject({ message: 'HTTP Error: ' + xhr.status, remove: true });
                    return;
                }

                if (xhr.status < 200 || xhr.status >= 300) {
                    reject('HTTP Error: ' + xhr.status);
                    return;
                }
                console.log(xhr.responseText);
                const json = JSON.parse(xhr.responseText);

                if (!json || typeof json.location != 'string') {
                    reject('Invalid JSON: ' + xhr.responseText);
                    return;
                }

                // Add prefix to image URL
                const imageUrlWithPrefix = '../' + json.location;
                resolve(imageUrlWithPrefix);
            };

            xhr.onerror = () => {
                reject('Image upload failed due to a XHR Transport error. Code: ' + xhr.status);
            };

            const formData = new FormData();
            formData.append('file', blobInfo.blob(), blobInfo.filename());

            xhr.send(formData);
        });
        tinymce.init({
            selector: '#editor',
            plugins: [
                'image', 'table', 'codesample'
            ],
            toolbar: 'undo redo | styles | bold italic | alignleft aligncenter alignright alignjustify | outdent indent | image | table codesample',
            images_upload_url: 'custompageadmin/editpage',
            images_upload_handler: image_upload_handler_callback,
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
<h1>Edit Page <?php echo $name?></h1>
<form method="POST" action = "/custompageadmin/editpage?id=<?php echo $id?>">
    <input type="hidden" name = "editpage">
    <textarea class="col-10" id = "editor" name = "content">
              <?php echo $pageContent ?>
        </textarea>
    <input class = "btn btn-success m-2" type="submit" value="Submit Changes">
</form>
</body>
</html>
<?php
include __DIR__ . '../../footer/footer.php';
?>
