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
    <title>Reset Password</title>
</head>
<body>
    <div class="container-fluid text-center">
        <div class="row justify-content-center">
            <form class="formPasswd" action="resetpasswd/newpasswd" method="POST">
                <div class="form-group">
                    <label class="form-label" for="email">Enter your code</label>
                    <input type="code" class="form-control inputField" name="code" placeholder="Code">
                </div>
                <button type="submit" class="btn btn-primary submit-btn" name="buttonCheck">Check code</button>
            </form>
        </div>
    </div>

</body>


<?php
require __DIR__ . '/../footer/footer.php';
?>