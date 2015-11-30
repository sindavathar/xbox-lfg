<script>
$( document ).ready(function() {
//do sth when click on #btPrice
   $('#btPrice').click(function(){  
        $.ajax({        
            type:"POST",
            //the function u wanna call
            url:"<?php echo $webroot;?>lfg/add/",
            /* data you wanna pass, as your $param1 is serverSide variable, 
               you need to first assign to js variable then you can pass: 
               var param1 =      '<?php echo $param1;?>';*/                  
            data:{increase_price:param1},               
            success:function(data)
            {
                //update your div
            }
        });
   });
});
</script>

<h1>LFG Home</h1>
<p><?= $this->Html->link('Add Article', ['action' => 'add']) ?></p>
<p>
	<!-- File: src/Template/Lfg/add.ctp -->

	<h1>Add LFG</h1>
	<?php
		echo $this->Form->create($lfg);
		// just added the categories input
		echo $this->Form->input('category_id');
		echo $this->Form->input('title');
		echo $this->Form->input('body', ['rows' => '3']);
		echo $this->Form->button(__('Save Article'));
		echo $this->Form->end();
	?>
</p>
<table>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Created</th>
        <th>Actions</th>
    </tr>

<!-- Here's where we loop through our $lfg query object, printing out article info -->

    <?php foreach ($lfg_all as $item): ?>
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