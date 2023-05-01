<?php include __DIR__ . '/../../header.php'; ?>

<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link type="text/css" rel="stylesheet" href="/css/adminstyle.css">
    <title>Yummy session Dashboard</title>
</head>

<body>
    <h1 class="d-flex justify-content-center">Yummy session Dashboard</h1>

    <div class="container">
        <div class="menu col d-flex flex-row-reverse ">
            <div>
                <form action="/yummy/sessionDashboard" method="POST">
                    <button type="submit" class="btn btn-primary m-1">Search</button>
            </div>
            <div>
                <input class="form-control form-control-dark w-100 m-1" type="text" placeholder="Search on name" name="search" aria-label="Search">
                </form>
            </div>
            <div>
                <button type="button" onclick="window.location.href = '/yummy/addSession'" class="btn btn-success m-1">Create Session</button>
            </div>
        </div>
        <div class=" col d-flex justify-content-center">
            <table class="table table-bordered table-hover w-75">
                <thead>
                    <tr>
                        <th>Restaurant id</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($sessionList as $session) : ?>
                        <form method="post">
                            <tr>
                                <td><?php echo $session->session_id; ?></td>
                                
                                <td>
                                    <button formaction="/yummy/editSession" type="submit" class="btn btn-primary w-100 m-1" id="btn-edit" name="edit" value="<?= $restaurant->restaurant_id ?>">Edit</button>
                                    <button formaction="/yummy/deleteSession" type="submit" class="btn btn-danger w-100 m-1" id="btn-edit" name="delete" value="<?= $restaurant->restaurant_id ?>">Delete</button>
                                </td>
                            </tr>
                        </form>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</body>
<?php include __DIR__ . '/../../footer/footer.php'; ?>
</html>