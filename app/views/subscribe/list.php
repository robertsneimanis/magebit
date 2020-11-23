<?php require APPROOT . '/views/inc/header.php'; ?>

<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>email</th>
            <th>email provider</th>
            <th>date</th>
            <th>delete</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach($data['subscribers'] as $subscriber) : ?>
        <tr>
            <td><?= $subscriber->id ?></td>
            <td><?= $subscriber->email ?></td>
            <td><?=  explode("@", $subscriber->email )[1] ?></td>
            <td><?= $subscriber->created_at ?></td>
            <td>
                <form action="<?= URLROOT; ?>/subscribes/delete/<?= $subscriber->id; ?>" method="post">
                    <input type="submit" value="Delete">
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot>
        <tr>
            <th>Id</th>
            <th>email</th>
            <th>email provider</th>
            <th>date</th>
            <th class='d-none'>delete</th>
        </tr>
    </tfoot>

</table>

<?php require APPROOT . '/views/inc/footer.php'; ?>