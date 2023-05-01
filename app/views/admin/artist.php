<section>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Artist</th>
                <th>About</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($this->artists as $artist) : ?>
                <form method="post">
                    <tr>
                        <td><?php echo $artist->getID(); ?></td>
                        <td><?php echo $artist->getName(); ?></td>
                        <td><?php echo $artist->getAbout(); ?></td>
                        <td>&euro;<?php echo $artist->getPrice(); ?></td>
                        <td>
                            <button formaction="/admin/edit" name="id" value="<?= $artist->getID() ?>" class="btn btn-primary w-100 m-1">Edit</button>
                            <button formaction="/admin/delete" name="id" value="<?= $artist->getID() ?>" class="btn btn-danger w-100 m-1">Delete</button>
                        </td>
                    </tr>
                </form>
            <?php endforeach; ?>
        </tbody>
</section>
