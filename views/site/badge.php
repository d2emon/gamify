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
                        <h2>Бейджи</h2>
                    </div>

		    <?php if (count($badges)) { ?>
		    <ul class="badges">
		        <?php foreach ($badges as $badge) { ?>
			<li>
			    <a href="<?= Url::to(['site/badges', 'badge_id' => $badge->id]); ?>"><img src="<?= $badge->image; ?>" />
			    <span><?= $badge->text; ?></a></span>
			    <?php if ($badge->id == $badge_id) { ?>
			    <div>
                            <?= $badge->description; ?>
                            </div>
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
