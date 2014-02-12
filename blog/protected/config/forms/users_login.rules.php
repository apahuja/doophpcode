<?php

//rules for Login form'
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
        )
    );
?>