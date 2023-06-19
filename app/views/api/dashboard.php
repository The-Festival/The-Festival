<?php include_once __DIR__ . "/../header.php"?>
<body>
<h1 class="d-flex justify-content-center">Dashboard</h1>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<div class="container">
    <div class="row">
        <div class="col-md-10 "> <!-- 80% width for medium screens and up -->
            <h1>Token Information</h1>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Token ID</th>
                    <th scope="col">Token</th>
                    <th scope="col">Company Name</th>
                    <th scope="col">Delete</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($data as $token):?>
                <tr>
                    <td><? echo $token->getTokenID()?></td>
                    <td><? echo $token->getToken() ?></td>
                    <td><? echo $token->getCompanyName() ?></td>
                    <td><a href="/api/deleteToken?id=<? echo $token->getTokenID()?>" class="btn btn-danger">Delete</a></td>
                </tr>
                <?php endforeach;?>
                </tbody>
            </table>
        </div>
        <div class="col-md-2"> <!-- 20% width for medium screens and up -->
            <div class="text-center">
                <h3>New Company</h3>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col">
                            <form action="/api/addCompany" class="p-4 border rounded-3" method = "POST">
                                <div class="mb-3">
                                    <input type="hidden" name = "addCompany">
                                    <label for="companyName" class="form-label">Company Name</label>
                                    <input type="text" class="form-control" id="companyName" name="companyName" required>
                                </div>
                                <div class="d-grid gap-2">
                                    <button class="btn btn-success" type="submit">Add Company For Api</button>
                                    <button class="btn btn-primary" type="reset">Reset</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- use Bootstrap's button classes for better styling -->
            </div>
        </div>
    </div>
</div>
</body>
