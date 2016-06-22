<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="body-content">

    	<div id="profile-summary" class="row">
            <div class="col-lg-2">
		<a href="#" class="profile-link">
		    <img src="<?= $profile->avatar; ?>" alt="<?=$profile->fullname; ?>" class="user-avatar" />
                </a>
		<a href="<?= $profile->profile["job"]["url"]; ?>" class="job-link">
		    <img src="<?= $profile->profile["job"]["avatar"]; ?>?seed=<?= rand(); ?>" alt="<?= $profile->profile["job"]["workspace"]; ?>" class="job-avatar" />
	            <span><?= $profile->profile["job"]["workspace"]; ?> &gt;</span>	
                </a>
            </div>
            <div class="col-lg-10">
                <h3 class="col-lg-8"><?= $profile->fullname; ?></h3>
		<a href="#" class="col-lg-4">Профили коллег &gt;</a>
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
                    <h2>Heading</h2>

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                        ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                        fugiat nulla pariatur.</p>

                    <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
                </div>
            </div>
    	</div>
        <div class="row">
            <div class="col-lg-8">
		<div class="d2-box">
                    <h2>Heading</h2>

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                        ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                        fugiat nulla pariatur.</p>

                    <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
                </div>
		<div class="d2-box">
                    <h2>Heading</h2>

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                        ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                        fugiat nulla pariatur.</p>

                    <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
                </div>
            </div>
            <div class="col-lg-4">
		<div class="d2-box">
                    <h2>Heading</h2>

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                        ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                        fugiat nulla pariatur.</p>

                    <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
