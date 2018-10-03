<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Movie $movie
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Movies'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="movies form large-9 medium-8 columns content">
    <?= $this->Form->create($movie,['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Add Movie') ?></legend>
        <?php
            echo $this->Form->control('photo',['type' => 'file']);
            echo $this->Form->control('title');
            echo $this->Form->control('synopsis');
            echo $this->Form->control('status');
            echo $this->Form->control('start');
            echo $this->Form->control('end');
            echo $this->Form->control('time');
            echo $this->Form->control('duration');
            echo $this->Form->control('ticket');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
</div>
