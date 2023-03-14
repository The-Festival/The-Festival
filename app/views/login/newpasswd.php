<?php
include __DIR__ . '/../header.php';
?>

<head>
    <title>New Password</title>
</head>
<body>
    <form action="resetpasswd/newpasswd" method="POST">
        <div class="form-group">
            <label for="password">New Password</label>
            <input type="password" class="form-control" name="password" placeholder="New password">
            <label for="passwordRepeat">Repeat new password</label>
            <input type="password" class="form-control" name="password" placeholder="New password">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</body>


<?php
require __DIR__ . '/../footer/footer.php';
?>