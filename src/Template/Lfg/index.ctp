<h1>LFG Home</h1>
<p><?= $this->Html->link('Add Article', ['action' => 'add']) ?></p>
<table>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Created</th>
        <th>Actions</th>
    </tr>

<!-- Here's where we loop through our $lfg query object, printing out article info -->

    <?php foreach ($lfg as $item): ?>
    <tr>
        <td><?= $item->id ?></td>
        <td>
            <?= $this->Html->link($item->title, ['action' => 'view', $item->id]) ?>
        </td>
        <td>
            <?= $item->created->format(DATE_RFC850) ?>
        </td>
        <td>
            <?= $this->Form->postLink(
                'Delete',
                ['action' => 'delete', $item->id],
                ['confirm' => 'Are you sure?'])
            ?>
            <?= $this->Html->link('Edit', ['action' => 'edit', $item->id]) ?>
        </td>
    </tr>
    <?php endforeach; ?>

</table>