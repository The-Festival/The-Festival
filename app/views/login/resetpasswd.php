<?php
include __DIR__ . '/../header.php';
?>

<head>
    <title>Reset Password</title>
</head>
<body>
    <form action="/resetpasswd/newpasswd" method="POST">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" placeholder="Email">
        </div>
        <button type="submit" class="btn btn-primary" name="buttonReset">Submit</button>
    </form>
</body>


<?php
require __DIR__ . '/../footer/footer.php';
?>