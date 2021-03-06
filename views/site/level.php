<?php
use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="body-content">

        <div>
		    <?php if (count($levels)) { ?>
		    <ul class="levels">
		        <?php foreach ($levels as $l) { ?>
			<li class="<?php if ($l->id >= $level->id) { ?>non-<?php } ?>finished" >
			    <a href="<?= Url::to(['site/levels', 'level_id' => $l->id]); ?>"><img src="<?= $l->avatar; ?>" />
			    <span>Уровень <?= $l->id; ?></a></span>
			    <?php if ($l->id < $level->id) { ?>
			    <span>Пройден</span>
			    <?php } ?>
                        </li>
		        <?php } ?>
		    </ul>
		    <?php } ?>
    	</div>
	<div class="row">
            <div class="col-lg-6">
                <h3>Для перехода на <span><?= $level->id + 1 ?></span> уровень вам нужно:</h3>
	        <?php if (count($level->tasks)) { ?>
                <ul>
		<?php foreach ($level->tasks as $task) { ?>
		<li<?php if($task->completed) {?> class="finished"<?php } ?>><?= $task->title; ?></li>
		<?php } ?>
		</ul>
		<?php } ?>
            </div>
	    <?php if (count($level->bonuses)) { ?>
            <div class="col-lg-3">
		<h3>Награда:</h3>
		<span><?= $level->bonus_score; ?> очков</span>
		<?php foreach ($level->bonuses as $bonus) { ?>
		<div>
                <?= $bonus->bonus->title; ?>
		</div>
		<?php } ?>
            </div>
	    <?php } ?>
	    <?php if (count($level->megabonuses)) { ?>
            <div class="col-lg-3">
		<h3>Меганаграда:</h3>
		<?php foreach ($level->megabonuses as $bonus) { ?>
		<div>
                <?= $bonus->bonus->title; ?>
		</div>
		<?php } ?>
            </div>
	    <?php } ?>
    	</div>
    </div>
</div>
