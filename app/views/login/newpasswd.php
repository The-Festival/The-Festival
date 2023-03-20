<?php
include __DIR__ . '/../header.php';
?>

<head>
<meta charset="UTF-8"
        rel="stylesheet" 
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" 
        crossorigin="anonymous">
    <link type="text/css"
        rel = "stylesheet"
        href = "/css/passwdstyle.css"/>
    <title>New Password</title>
</head>
<body>
<div class="container-fluid text-center">
    <div class="row justify-content-center">
        <form class="formPasswd" action="/login" method="POST">
            <div class="form-group">
                <label class="form-label" for="password">New Password</label>
                <input type="password" class="form-control inputField" name="password" placeholder="New password">
                <input type="password" class="form-control inputField" name="password" placeholder="Repeat new password">
            </div>
            <button type="submit" class="btn btn-primary submit-btn " name="buttonNewPasswd">Submit</button>
        </form>
    </div>
</div>
</body>


<?php
require __DIR__ . '/../footer/footer.php';
?>