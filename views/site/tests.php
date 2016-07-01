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
                        <h2>Tесты</h2>
                    </div>

		    <?php if (count($tests)) { ?>
		    <ul>
		        <?php foreach ($tests as $test) { ?>
			<li>
			    <h3><?= $test->title; ?></h3>
		    <?php if (count($test->tasks)) { ?>
		    <ul>
		        <?php foreach ($test->tasks as $quest) { ?>
			<li><?= $quest->title; ?></li>
		        <?php } ?>
		    </ul>
		    <?php } ?>
		    <?php if (count($test->bonuses)) { ?>
			<h4>Награда:</h4>
		    <ul>
		        <?php foreach ($test->bonuses as $bonus) { ?>
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
