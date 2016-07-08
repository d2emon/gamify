<?php
use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="body-content">

        <div class="row">
            <div class="col-lg-7" id="profile-level">
		<div class="d2-box">
		    <div class="head">
                        <h2>Магазин</h2>
                    </div>
		    <div>
			<div>
		     	    У вас <span class="score"><?= $profile->wallet->value; ?> очков</span> вы можете потратить их:
                        </div>
			<div>
			    <?php if (count($items)) { ?>
			    <ul>
                            <?php foreach($items as $item) { ?>
			    <li><img src="<?= $item->avatar; ?>"> <?= $item->title; ?> <a href="<?= Url::to(['dummy/buy', 'id' => $item->id]); ?>"><?= $item->cost; ?> очков</a></li>
                            <?php } ?>
                            </ul>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
