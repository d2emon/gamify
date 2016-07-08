<?php
use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="body-content">

        <div class="row">
            <div class="col-lg-6">
		<div class="d2-box">
		    <div class="head">
                        <h2>Лидерборды</h2>
                    </div>

		    <?php if (count($profiles)) { ?>
		    <table class="profiles">
			<tr>
			    <td>Место</td>
			    <td>Кто</td>
			    <td>Рейтинг</td>
			</tr>
			<?php 
			$id = 1;
			foreach ($profiles as $profile) { 
			?>
			<tr>
	                    <td><?= $id; ?></td>
			    <td><a href="<?= Url::to(['site/profile', 'profile_id' => $profile->user_id]); ?>">
				<div><?= $profile->fullname; ?></div>
				<?php if($profile->job) { ?>
				<div><?= $profile->job->title; ?></div>
		        	<?php } ?>
				</a></td>
			    <td><img src="<?= $profile->avatar; ?>" /></td>
	                    <td><?= $profile->rating; ?></td>
                        </tr>
		        <?php $id++; } ?>
		    </table>
		    <?php } ?>
                </div>
            </div>
            <div class="col-lg-6">
                <h2>Совет</h2>
		<div>
		<?= nl2br($advice->description); ?>
		</div>
            </div>
    	</div>
    </div>
</div>
