<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="body-content">

    	<div id="profile-summary" class="row">
            <div id="profile-images" class="col-lg-2">
		<a href="#" class="profile-link">
		    <img src="<?= $profile->avatar; ?>" alt="<?=$profile->fullname; ?>" class="user-avatar" />
                </a>
		<a href="<?= $profile->profile["job"]["url"]; ?>" class="job-link">
		    <img src="<?= $profile->profile["job"]["avatar"]; ?>?seed=<?= rand(); ?>" alt="<?= $profile->profile["job"]["workspace"]; ?>" class="job-avatar" />
	            <span class="more-button"><?= $profile->profile["job"]["workspace"]; ?></span>	
                </a>
            </div>
            <div id="profile-description" class="col-lg-10">
                <h3><?= $profile->fullname; ?></h3>
		<a href="#" id="related-profiles" class="more-button more-float">Профили коллег</a>
		<table>
		    <tr>
		        <td class="profile-row">Увлечение:</td>
			<td><?= $profile->profile["hobby"]; ?></td>
		    </tr>
		    <tr>
		        <td class="profile-row">Образование:</td>
			<td><?= $profile->profile["education"]; ?></td>
		    </tr>
		    <tr>
		        <td class="profile-row">Контакты:</td>
			<td>
			<?php if (count($profile->profile["contacts"])) { ?>
			<ul>
			<?php foreach ($profile->profile["contacts"] as $contact) { ?>
			<li><img src="http://lorempixel.com/24/24?seed=<?= rand(); ?>" title="<?= $contact["contact_type"]; ?>" /><?= $contact["value"]; ?></li>
			<?php } ?>
			</ul>
			<?php } ?>
			</td>
		    </tr>
		    <tr>
		        <td class="profile-row">Должность:</td>
			<td><?php print_r($profile->profile["job"]["position"]); ?></td>
		    </tr>
		    <tr>
		        <td class="profile-row">Рабочие обязанности:</td>
			<td><?php print_r($profile->profile["job"]["responsibilities"]); ?></td>
		    </tr>
		</table>
            </div>
    	</div>
        <div class="row">
            <div class="col-lg-12">
		<div class="d2-box">
		    <div class="head">
                        <h2>Бейджи</h2>
			<a href="#" id="bages" class="more-button more-float">Смотреть все достижения</a>
                    </div>

		    <?php if (count($profile->profile["bages"])) { ?>
		    <ul class="bages">
		        <?php foreach ($profile->profile["bages"] as $bage) { ?>
			<li>
			    <a href="#"><img src="<?= $bage["image"]; ?>" />
			    <span><?= $bage["text"]; ?></a></span>
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
				    <img src="<?= $profile->profile["level"]["image"]; ?>" />
                                </div>
            		        <div class="col-lg-9 level-name">
				    <h2><?= $profile->profile["level"]["title"]; ?></h2>
				    <span><a href="#">Смотреть систему уровней</a></span>
                                </div>
                            </div>
                        </div>
            		<div class="col-lg-6">
			    <h4>До следующего осталось:</h4>
			    <?php if (count($profile->profile["level"]["to_next"])) { ?>
                            <ul>
			    <?php foreach ($profile->profile["level"]["to_next"] as $task) { ?>
			    <li><?= $task["task"]; ?></li>
			    <?php } ?>
			    </ul>
			    <?php } ?>
                        </div>
                    </div>
                </div>
		<div class="d2-box">
		    <div class="head">
                        <h2>Очки</h2>
			<a href="#" id="bages" class="more-button more-float">Перейти в магазин</a>
                    </div>
		    <div class="row">
            		<div id="scorebox" class="col-lg-4">
			    <span class="score"><?= $profile->profile["score"]; ?></span>
                        </div>
			<div class="col-lg-8">
                            <h5>На них можно купить:</h5>
			    <a class="buy"><?= $profile->profile["shop"]; ?></a> <a href="#">O</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
		<div class="d2-box">
		    <div class="head">
                        <h2>Статистика</h2>
			<a href="#" id="bages" class="more-button more-float">Подробнее</a>
                    </div>
		    <?php if (count($profile->profile["stats"])) { ?>
                    <ul>
		    <?php foreach ($profile->profile["stats"] as $stat) { ?>
		    <li><img src="<?= $stat["image"]; ?>" /> <?= $stat["value"]; ?> <?= $stat["text"]; ?></li>
		    <?php } ?>
		    </ul>
		    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
