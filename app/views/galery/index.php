<table class="table">
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Image</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($galleries as $gallery): ?>
        <tr>
            <td><?= $gallery->id; ?></td>
            <td><?= $gallery->name; ?></td>
            <td><img src="/uploads/<?= $gallery->file; ?>" /></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>