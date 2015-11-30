<h1>Edit Lfg</h1>
<?php
    echo $this->Form->create($lfg);
    echo $this->Form->input('title');
    echo $this->Form->input('body', ['rows' => '3']);
    echo $this->Form->button(__('Save Article'));
    echo $this->Form->end();
?>