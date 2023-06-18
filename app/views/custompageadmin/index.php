<?php
include __DIR__ . '/../header.php';
?>
<div class = "container">
    <div class = "row">
        <div class = "col">
            <h1 class="text-center">Custom Page Management</h1>
        </div>
        <div class="container mx-2">
            <form method = "POST" action = "/custompageadmin/createpage">
                <input type="hidden" name="createPage">
                <div class="mb-3">
                    <label for="nameInput" class="form-label">Name</label>
                    <input type="text" class="form-control" id="nameInput" name="name">
                </div>
                <button type="submit" class="btn btn-primary" id = "btnSubmitPage">Submit</button>
            </form>
        </div>
    </div>

    <div class="d-flex align-items-center justify-content-center">
        <div class="container">
            <table class="table table-bordered mx-auto text-center">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($customPages as $customPage): ?>
                <tr>
                    <td><?php echo $customPage->getId()?></td>
                    <td><?php echo $customPage->getName()?></td>
                    <td>

                        <a href="/custompageadmin/editpage?id=<?php echo $customPage->getId(); ?>" class="btn btn-primary">Edit</a>
                        <a href="/custompageadmin/deletepage?id=<?php echo $customPage->getId(); ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

<?php
include __DIR__ . '../../footer/footer.php';
?>
<style>
    #nameInput {
        width: 30%;
    }
</style>
