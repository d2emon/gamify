<?php
use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="body-content">

        <div class="row">
            <div class="col-lg-12">
		<div class="d2-box">
		    <div class="head">
                        <h2>Квесты</h2>
                    </div>

		    <?php if (count($campaigns)) { ?>
		    <ul>
		        <?php foreach ($campaigns as $campaign) { ?>
			<li>
			    <h3><?= $campaign->title; ?></h3>
		    <?php if (count($campaign->tasks)) { ?>
		    <ul>
		        <?php foreach ($campaign->tasks as $quest) { ?>
			<li><?php print_r($quest->task); ?></li>
		        <?php } ?>
		    </ul>
		    <?php } ?>
		    <?php if (count($campaign->bonuses)) { ?>
			<h4>Награда:</h4>
		    <ul>
		        <?php foreach ($campaign->bonuses as $bonus) { ?>
			<li><?= $bonus; ?></li>
		        <?php } ?>
		    </ul>
		    <?php } ?>
                        </li>
		        <?php } ?>
		    </ul>
		    <?php } ?>
                </div>
            </div>
    	</div>
    </div>
</div>
