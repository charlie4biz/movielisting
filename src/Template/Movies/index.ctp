<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Movie[]|\Cake\Collection\CollectionInterface $movies
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
        <li><?= $this->Html->link(__('Users'), ['controller'=>'users','action' => 'index']) ?> </li>
          <li><?= $this->Html->link(__('New Movie'), ['action' => 'add']) ?> </li>
          <li><?= $this->Html->link(__('Log Out'), ['controller'=>'users','action' => 'logout']) ?> </li>
      </ul>
  </nav>
<div class="movies index large-9 medium-8 columns content">
    <h3><?= __('Movies') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('start') ?></th>
                <th scope="col"><?= $this->Paginator->sort('end') ?></th>
                <th scope="col"><?= $this->Paginator->sort('time') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($movies as $movie): ?>
            <tr>
                <td><?= $this->Number->format($movie->id) ?></td>
                <td><?= h($movie->title) ?></td>
                <td><?= h($movie->start) ?></td>
                <td><?= h($movie->end) ?></td>
                <td><?= h($movie->time) ?></td>
                <td><?= h($movie->status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $movie->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $movie->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $movie->id], ['confirm' => __('Are you sure you want to delete # {0}?', $movie->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
</div>
