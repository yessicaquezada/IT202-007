<?php
require_once(__DIR__ . "/../../partials/nav.php");

//TODO create lookup query and fetch results, set them to $results
?>
<h1>Accounts</h1>
<?php if (count($results) == 0) : ?>
    <p>No results to show</p>
<?php else : ?>
    <table class="table">
        <?php foreach ($results as $index => $record) : ?>
            <?php if ($index == 0) : ?>
                <thead>
                    <?php foreach ($record as $column => $value) : ?>
                        <th><?php se($column); ?></th>
                    <?php endforeach; ?>
                    <th>Actions</th>
                </thead>
            <?php endif; ?>
            <tr>
                <?php foreach ($record as $column => $value) : ?>
                    <td><?php se($value, null, "N/A"); ?></td>
                <?php endforeach; ?>
                <td>
                    <!-- other action buttons can go here-->
                    <a href="<?php echo get_url('account_history.php?id=') . se($record, "id"); ?>">History</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>
<?php
require_once(__DIR__ . "/../../partials/flash.php");
?>