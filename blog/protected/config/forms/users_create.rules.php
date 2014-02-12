<?php

//rules for New user signup form'
return array(
        'username' => array(
            array( 'maxlength', 50, 'Username cannot be longer than the 50 characters.' ),
            array( 'notnull' ),
            array( 'notEmpty', 'Username cannot be empty.' ),
        ),
        'password' => array(
            array( 'maxlength', 8, 'Password cannot be longer than the 8 characters.' ),
            array( 'notnull' ),
            array( 'notEmpty', 'Password cannot be empty.' ),
        ),
        'first_name' => array(
            array( 'maxlength', 55, 'First Name cannot be longer than the 55 characters.' ),
            array( 'notnull' ),
            array( 'notEmpty', 'First Name cannot be empty.' ),
        ),
        'last_name' => array(
            array( 'maxlength', 55, 'Last Name cannot be longer than the 55 characters.' ),
            array( 'notnull' ),
            array( 'notEmpty', 'Last Name cannot be empty.' ),
        ),
        'email' => array(
            array( 'maxlength', 145, 'Email cannot be longer than the 75 characters.' ),
            array( 'notnull' ),
            array( 'notEmpty', 'Email cannot be empty.' ),
        )
    );
?>