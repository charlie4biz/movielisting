<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Movie $movie
 */
?>

<div class="content-wrapper twelve columns b0"><h1><?= h($movie->title) ?><small>(<?= h($movie->status) ?>)</small></h1></div>
<div class="content-wrapper four columns b0">
<?=  $this->Html->image("../files/Movies/photo/".$movie->photo,['fullbase' => true]) ?>
<?= h($movie->duration) ?>
</div>
<div class="content-wrapper six columns b0">
<ul>
<li><strong><?= __('Synopsis:') ?></strong> <?= h($movie->synopsis) ?></li>
<li><strong><?= __('Starts:') ?></strong> <?= h($movie->start) ?></li>
<li><strong><?= __('Ends:') ?></strong> <?= h($movie->end) ?></li>
<li><strong><?= __('Time:') ?></strong> <?= h($movie->time) ?></li>
<li><strong><?= __('Cast:') ?></strong> <?= h($movie->cast) ?></li>
</ul>
</div>
<div class="content-wrapper two columns b0">
<strong><?= __('Ticket:') ?></strong> <br>&#8358; <?= h($movie->ticket) ?>
</div>
</div>
