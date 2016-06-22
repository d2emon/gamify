<?php

namespace app\models;

class Profile extends \yii\base\Object
{
    public $firstname;
    public $middlename;
    public $lastname;

    private $_contacts;
    private $_job;

    public $profile;
    private static $profiles = [
        '100' => [
            'id' => '100',
	    'firstname' => 'Михаил',
	    'middlename' => 'Сергеевич',
	    'lastname' => 'Маргарин',
	    'hobby' => 'Болеть за зертак, отмечать новый год в Кушевеле, читать Кафку.',
	    'education' => 'Неполное высшее экономическое образование.',
	    'image' => "150/150",
	    /*
	    'contacts' => [
		['contact_type' => 'email', 'value' => 'margarin_240@gmail.com', ],
		['contact_type' => 'phone', 'value' => '89072415396',            ],
		['contact_type' => 'skype', 'value' => 'marg_240',               ],
	    ],

	    'job' => [
		'avatar' => "http://lorempixel.com/150/150",
		"url" => "#",
		'workspace' => "2 этаж",
		'position' => "Менеджер по теплым звонкам",
	    	'responsibilities' => "Увеличивать количество клиентов на девятом этапе воронки продаж",
	    ],
	    */
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
	    'level' => [
		'id' => 7,
	        'image' => "http://lorempixel.com/40/40/",
                "title" => "Warmaster",
		'to_next' => [
		    ['done' => False, 'task' => 'Сдать тест на знание библии.',],
		    ['done' => False, 'task' => 'Сделать 7 успешных теплых звонков.',],
		    ['done' => False, 'task' => 'Сделать прививку.',],
		],
	    ],
	    'score' => 120,
	    'shop' => '3 отпуска',
	    'stats' => [
	        [
		    'image' => "http:://lorempixel.com/36/36/",
		    'value' => 121,
		    'text' => 'теплых звонков',
		],
	        [
		    'image' => "http:://lorempixel.com/36/36/",
		    'value' => 63,
		    'text' => 'привлеченных клиента',
		],
	        [
		    'image' => "http:://lorempixel.com/36/36/",
		    'value' => 3,
		    'text' => 'отказа от печенек',
		],
	        [
		    'image' => "http:://lorempixel.com/36/36/",
		    'value' => 1315,
		    'text' => 'дней проработано',
		],
	    ],

        ],
    ];

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->profile["id"];
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
     * Loads contacts
     *
     * @return array
     */
    public function getContacts()
    {
	if(!isset($this->_contacts))
	{
	    $this->_contacts = Contact::findByProfileId($this->id);
	}
	return $this->_contacts;
    }
    
    /**
     * Loads job
     *
     * @return Job
     */
    public function getJob()
    {
	if(!isset($this->_job))
	{
	    $this->_job = Job::findByProfileId($this->id);
	}
	return $this->_job;
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
