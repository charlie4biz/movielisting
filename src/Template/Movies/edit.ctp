<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Movie $movie
 */
?>
<nav class="twelve columns" id="actions-sidebar">
    <ul class="side-nav">
      <style>
      .side-nav li{
        display:inline-block;
        width: 24%;
        display: inline-block;
      }
      </style>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $movie->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $movie->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Movies'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="movies index large-9 medium-8 columns content">
    <?= $this->Form->create($movie) ?>
    <fieldset>
        <legend><?= __('Edit Movie') ?></legend>
        <?php
            echo $this->Form->control('title');
            echo $this->Form->control('synopsis');
            echo $this->Form->control('status');
            echo $this->Form->control('ticket');
            echo $this->Form->control('kids');
            echo $this->Form->control('duration');
            echo $this->Form->control('start');
            echo $this->Form->control('end');
            echo $this->Form->control('time');
            echo $this->Form->control('cast');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
</div>
