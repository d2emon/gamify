<?php

namespace app\models;

class Profile extends \yii\base\Object
{
    public $id;
    public $firstname;
    public $middlename;
    public $lastname;

    private static $profiles = [
        '100' => [
            'id' => '100',
	    'firstname' => 'Михаил',
	    'middlename' => 'Сергеевич',
	    'lastname' => 'Маргарин',
	    'hobby' => 'Болеть за зертак, отмечать новый год в Кушевеле, читать Кафку.',
	    'educaton' => 'Неполное высшее экономическое образование.',
	    'contacts' => [
		['contact_type' => 'email', 'value' => 'margarin_240@gmail.com', ],
		['contact_type' => 'phone', 'value' => '89072415396',            ],
		['contact_type' => 'skype', 'value' => 'marg_240',               ],
	    ],
	    'avatar' => "http://lorempixel.com/400/200",
	    'job' => [
		'avatar' => "http://lorempixel.com/400/200",
		'workspace' => "2 этаж",
		'position' => "Менеджер по теплым звонкам",
	    	'responsibilities' => "Увеличивать количество клиентов на девятом этапе воронки продаж",
	     ]
        ],
    ];

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }
}
