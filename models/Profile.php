<?php

namespace app\models;

class Profile extends \yii\base\Object
{
    public $id;
    public $firstname;
    public $middlename;
    public $lastname;

    public $profile;
    private static $profiles = [
        '100' => [
            'id' => '100',
	    'firstname' => 'Михаил',
	    'middlename' => 'Сергеевич',
	    'lastname' => 'Маргарин',
	    'hobby' => 'Болеть за зертак, отмечать новый год в Кушевеле, читать Кафку.',
	    'education' => 'Неполное высшее экономическое образование.',
	    'contacts' => [
		['contact_type' => 'email', 'value' => 'margarin_240@gmail.com', ],
		['contact_type' => 'phone', 'value' => '89072415396',            ],
		['contact_type' => 'skype', 'value' => 'marg_240',               ],
	    ],
	    'image' => "150/150",
	    'job' => [
		'avatar' => "http://lorempixel.com/150/150",
		"url" => "#",
		'workspace' => "2 этаж",
		'position' => "Менеджер по теплым звонкам",
	    	'responsibilities' => "Увеличивать количество клиентов на девятом этапе воронки продаж",
	    ],
	    'bages' => [
		[
		    'image' => "http://lorempixel.com/150/150/",
		    'text' => "Лучший чебурек недели",
		],
		[
		    'image' => "http://lorempixel.com/150/150/",
		    'text' => "Почетный гвоздь",
		],
		[
		    'image' => "http://lorempixel.com/150/150/",
		    'text' => "3 года в компании",
		],
		[
		    'image' => "http://lorempixel.com/150/150/",
		    'text' => "Просто космос",
		],
	    ],

        ],
    ];

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Forms full name
     * @return string
     */
    public function getFullname()
    {
	return join(' ', [
	    $this->profile["firstname"],
	    $this->profile["middlename"],
	    $this->profile["lastname"],
	]);
    }

    /**
     * Forms avatar
     *
     * @return string
     */
    public function getAvatar()
    {
	$avatar = sprintf("http://lorempixel.com/%s?seed=%s", $this->profile["image"], rand());
	return $avatar;
    }

    /**
     * Finds by User
     *
     * @return Profile
     */
    public static function findByUser($user)
    {
	return self::findById[$user->id];
    }

    /**
     * Finds by ID
     *
     * @return Profile
     */
    public static function findById($user_id)
    {
	$profile = new Profile();
	return $profile->load($user_id);
    }

    /**
     * Loads by ID
     *
     * @return Profile
     */
    public function load($user_id)
    {
	$this->profile = self::$profiles[$user_id];
	return $this;
    }
}
