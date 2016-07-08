<?php
use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="body-content">

    	<div id="profile-summary" class="row">
            <div id="profile-images" class="col-lg-2">
		<a href="<?= Url::to(['site/profile', 'id' => $profile->user_id]); ?>" class="profile-link">
		    <img src="<?= $profile->avatar; ?>" alt="<?=$profile->fullname; ?>" class="user-avatar" />
                </a>
		<a href="<?= Url::to(['dummy/workspace', 'id' => $profile->job->id]); ?>" class="job-link">
		    <img src="<?= $profile->job->workspace->avatar; ?>" alt="<?= $profile->job->workspace->title; ?>" class="job-avatar" />
	            <span class="more-button"><?= $profile->job->workspace->title; ?></span>	
                </a>
            </div>
            <div id="profile-description" class="col-lg-10">
                <h3><?= $profile->fullname; ?></h3>
		<a href="<?= Url::to(['site/userlist']); ?>" id="related-profiles" class="more-button more-float">Профили коллег</a>
		<table>
		    <tr>
		        <td class="profile-row">Увлечение:</td>
			<td><?= $profile->hobby; ?></td>
		    </tr>
		    <tr>
		        <td class="profile-row">Образование:</td>
			<td><?= $profile->education; ?></td>
		    </tr>
		    <tr>
		        <td class="profile-row">Контакты:</td>
			<td>
			<?php if (count($profile->contacts)) { ?>
			<ul>
			<?php foreach ($profile->contacts as $contact) { ?>
			<li><img src="/images/contacts/<?= $contact->image; ?>" /><?= $contact->value; ?></li>
			<?php } ?>
			</ul>
			<?php } ?>
			</td>
		    </tr>
		    <tr>
		        <td class="profile-row">Должность:</td>
			<td><?= $profile->job->title; ?></td>
		    </tr>
		    <tr>
		        <td class="profile-row">Рабочие обязанности:</td>
			<td><?= $profile->job->responsibilities; ?></td>
		    </tr>
		</table>
            </div>
    	</div>
        <div class="row">
            <div class="col-lg-12">
		<div class="d2-box">
		    <div class="head">
                        <h2>Бейджи</h2>
			<a href="<?= Url::to(['/badge/default/index', 'user_id' => $profile->user_id]); ?>" id="badges" class="more-button more-float">Смотреть все достижения</a>
                    </div>

		    <?php if (count($profile->badges)) { ?>
		    <ul class="badges">
		        <?php foreach ($profile->badges as $badge) { ?>
			<li>
			    <a href="<?= Url::to(['/badge', 'badge_id' => $badge->id]); ?>"><img src="/images/badge/<?= $badge->avatar; ?>" />
			    <span><?= $badge->title; ?></a></span>
                        </li>
		        <?php } ?>
		    </ul>
		    <?php } ?>
                </div>
            </div>
    	</div>
        <div class="row">
            <div class="col-lg-7" id="profile-level">
		<div class="d2-box">
		    <div class="head">
                        <h2>Уровень</h2>
                    </div>
		    <div class="row">
            		<div class="col-lg-6 level-columns">
        		    <div class="row">
            		        <div class="col-lg-3 level-image">
				    <img src="<?= $profile->level->avatar; ?>" />
                                </div>
            		        <div class="col-lg-9 level-name">
				    <h2><?= $profile->level->title; ?></h2>
				    <span><a href="<?= Url::to(['site/levels']); ?>">Смотреть систему уровней</a></span>
                                </div>
                            </div>
                        </div>
            		<div class="col-lg-6">
			    <h4>До следующего осталось:</h4>
			    <?php if (count($profile->level->tasks)) { ?>
                            <ul>
			    <?php foreach ($profile->level->tasks as $task) { ?>
			    <li><?= $task->title; ?></li>
			    <?php } ?>
			    </ul>
			    <?php } ?>
                        </div>
                    </div>
                </div>
		<div class="d2-box">
		    <div class="head">
                        <h2>Очки</h2>
			<a href="<?= Url::to(['site/shop']); ?>" id="badges" class="more-button more-float">Перейти в магазин</a>
                    </div>
		    <div class="row">
            		<div id="scorebox" class="col-lg-4">
			    <span class="score"><?= $profile->wallet->value; ?></span>
                        </div>
			<div class="col-lg-8">
                            <h5>На них можно купить:</h5>
			    <a href="<?= Url::to(['dummy/buy', 'id' => 100]); ?>" class="buy"><?= $random_item['count']; ?> <?= $random_item['item']->title; ?></a> <a href="<?= Url::to(['dummy/shop_random']); ?>">O</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
		<div class="d2-box">
		    <div class="head">
                        <h2>Статистика</h2>
			<a href="<?= Url::to(['dummy/stats']); ?>" id="badges" class="more-button more-float">Подробнее</a>
                    </div>
		    <?php if (count($profile->stats)) { ?>
                    <ul>
		    <?php foreach ($profile->stats as $stat) { ?>
		    <li><img src="<?= $stat->avatar; ?>" /> <?= $stat->value; ?> <?= $stat->title; ?></li>
		    <?php } ?>
		    </ul>
		    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
