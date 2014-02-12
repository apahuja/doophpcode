<?php
Doo::loadCore('db/DooModel');

class Users extends DooModel{

    /**
     * @var int Max length is 11.
     */
    public $user_id;

    /**
     * @var varchar Max length is 50.
     */
    public $username;

    /**
     * @var varchar Max length is 55.
     */
    public $first_name;

    /**
     * @var varchar Max length is 55.
     */
    public $last_name;

    /**
     * @var date
     */
    public $date_joined;

    /**
     * @var varchar Max length is 75.
     */
    public $email;

    /**
     * @var varchar Max length is 8.
     */
    public $password;

    /**
     * @var text
     */
    public $about;

    public $_table = 'users';
    public $_primarykey = 'user_id';
    public $_fields = array('user_id','username','first_name','last_name','date_joined','email','password','about');

    public function getVRules() {
        return array(
                'user_id' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'optional' ),
                ),

                'username' => array(
                        array( 'maxlength', 50 ),
                        array( 'notnull' ),
                ),

                'first_name' => array(
                        array( 'maxlength', 55 ),
                        array( 'optional' ),
                ),

                'last_name' => array(
                        array( 'maxlength', 55 ),
                        array( 'optional' ),
                ),

                'date_joined' => array(
                        array( 'date' ),
                        array( 'optional' ),
                ),

                'email' => array(
                        array( 'maxlength', 75 ),
                        array( 'optional' ),
                ),

                'password' => array(
                        array( 'maxlength', 8 ),
                        array( 'optional' ),
                ),

                'about' => array(
                        array( 'optional' ),
                )
            );
    }

}