<!-- Jazz Dashboard -->

<!-- Form to create an artist to read in all artists update a specific artist and delete a specific artist -->

<!-- Bootstrap card -->
<div class="card card-background">
    <div class="card-body">
        <h2 class="card-title">Artists</h2>
        <ul>
            <? foreach ($this->artists as $artist) : ?>
                <li>
                    <!-- Name of the artist a edit button and a delete button -->
                    <h3><?= $artist->name ?></h3>
                    
                    <a href="/admin/editArtist/<?= $artist->id ?>" class="btn btn-primary">Edit</a>
                    <a href="/admin/deleteArtist/<?= $artist->id ?>" class="btn btn-danger">Delete</a>
                </li>
            <? endforeach; ?>
        </ul>
    </div>
</div>