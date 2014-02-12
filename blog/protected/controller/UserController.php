<?php
/* This is our new Controller which extends the DooPHP default DooController class */
class UserController extends DooController {

	/* This array will hold data we want to expose to the templates we return to users later */
    protected $data = array();

	/* This function is called by DooPHP before we run an action */
	public function beforeRun($resouce, $action) {
		// Get the sites base url i.e. http://localhost/ (includes the / at the end)
		$this->data['app_url'] = Doo::conf()->APP_URL;
$this->data['rootUrl'] = Doo::conf()->APP_URL;
	}

    /* This function is our "Signup Action" which we will call when a user visits /signup/ */
    public function signup() {

		/* Set the pages title */
        $this->data['pagetitle'] = 'Signup';
       // $data['rootUrl'] = Doo::conf()->APP_URL;
        /* This will instruct DooPHP that we want to render the template file in public_html\protected\view\registration\signup.html */
        $this->view()->render('signup', $this->data);
    }

    public function login() {
		session_start();
		if(isset($_SESSION['user']))
		{
			$userarray = $_SESSION['user'];
			$this->data['pagetitle'] = 'Login details';
			$this->data['username'] = $_SESSION['user']['username'];//$userarray['username'];
			$this->view()->render('loginstatus', $this->data);
		}
		else
		{
			/* Set the pages title */
			$this->data['pagetitle'] = 'Login';
		   // $data['rootUrl'] = Doo::conf()->APP_URL;
			/* This will instruct DooPHP that we want to render the template file in public_html\protected\view\registration\login.html */
			$this->view()->render('login', $this->data);
		}
    }

	public function logout(){
		session_start();
		unset($_SESSION['user']);
		session_destroy();
		//return Doo::conf()->APP_URL;
		$this->data['pagetitle'] = 'Login';
		$this->view()->render('login', $this->data);
	}

/**
     * Delete user
     */
    function deleteUser(){
		session_start();
        $username = $_SESSION['user']['username'];
        if($username != ""){
            Doo::loadModel('Users');
            $user = new Users;
            $user->username = $username;
            $user->delete();

			unset($_SESSION['user']);
			session_destroy();

            Doo::cache('front')->flushAllParts();

            $data['rootUrl'] = Doo::conf()->APP_URL;
            $data['title'] =  'User Deleted!';
            $data['content'] =  "<p>User  $username is deleted successfully!</p>";
            $this->render('userdeleted_msg', $data);
        }
    }

	function checkUserLogin()
	{
        Doo::loadHelper('DooValidator');

	//get defined rules and add show some error messages
        $validator = new DooValidator;
        $validator->checkMode = DooValidator::CHECK_SKIP;

        if($error = $validator->validate($_POST, 'users_login.rules')){
            $data['rootUrl'] = Doo::conf()->APP_URL;
            $data['title'] =  'Error Occured!';
            $data['content'] =  '<p style="color:#ff0000;">'.$error.'</p>';
            $data['content'] .=  '<p>Go <a href="javascript:history.back();">back</a> to try again.</p>';
            $this->render('login_msg', $data);
        }
        else{
					if(isset($_POST['username']) && isset($_POST['password']) ){
								$_POST['username'] = trim($_POST['username']);
								$_POST['password'] = trim($_POST['password']);

								$user = Doo::loadModel('Users', true);
								$user->username = $_POST['username'];
								$user->password = $_POST['password'];
								$user = $this->db()->find($user, array('limit'=>1));
								if($user){
										session_start();
										unset($_SESSION['user']);
										$_SESSION['user'] = array(
													'user_id'=>$user->user_id,
													'username'=>$user->username,
													'first_name'=>$user->first_name,
													'last_name'=>$user->last_name,
													'email'=>$user->email,
												);
										//return Doo::conf()->APP_URL;
										$data['rootUrl'] = Doo::conf()->APP_URL;
										$data['title'] =  'Login Successful!';
										$data['username'] = $_SESSION['user']['username'];
										$data['content'] =  '<p style="color:#ff0000;">You are now logged in!</p>';
										$data['content'] =  '<p>Congratulations! Now buy me a Pizza for learning DooPHP so fast! </p>';
										$this->render('login_msg', $data);
									}
									else
									{
										$data['rootUrl'] = Doo::conf()->APP_URL;
										$data['title'] =  'Login Unsuccessful';
										$data['content'] =  '<p style="color:#ff0000;">Wrong username or password</p>';
										$data['content'] .=  '<p>Go <a href="javascript:history.back();">back</a> to try again.</p>';
										 $this->render('login_msg', $data);
									}
						}
			}



	}


    function saveNewUser(){
        Doo::loadHelper('DooValidator');

	//get defined rules and add show some error messages
        $validator = new DooValidator;
        $validator->checkMode = DooValidator::CHECK_SKIP;

        if($error = $validator->validate($_POST, 'users_create.rules')){
            $data['rootUrl'] = Doo::conf()->APP_URL;
            $data['title'] =  'Error Occured!';
            $data['content'] =  '<p style="color:#ff0000;">'.$error.'</p>';
            $data['content'] .=  '<p>Go <a href="javascript:history.back();">back</a> to edit.</p>';
            $this->render('signup_msg', $data);
        }
        else{
            Doo::loadModel('Users');
            Doo::autoload('DooDbExpression');
            $u = new Users($_POST);
            $u->date_joined = new DooDbExpression('NOW()');


                $id = $u->insert();

            //clear the sidebar cache
            Doo::cache('front')->flushAllParts();

            $data['rootUrl'] = Doo::conf()->APP_URL;
            $data['title'] =  'Signup Completed!';
            $data['content'] =  '<p>Signup successful!</p>';
//            if($p->status==1)
//                $data['content'] .=  '<p>Click  <a href="'.$data['rootUrl'].'article/'.$id.'">here</a> to view the published post.</p>';
            $this->render('signup_msg', $data);
        }
    }

public function signup_action() {
		/* Set the pages title */
		$this->data['pagetitle'] = 'Signup';

		if (isset($_POST['txt_username']) && isset($_POST['txt_password']) && isset($_POST['txt_name'])) {

			$username = $_POST['txt_username'];
			$password = $_POST['txt_password'];
			$name = $_POST['txt_name'];

			// Save the username and password so we can use them in the template
			$this->data['username'] = $username;
			$this->data['name'] = $name;

			if (empty($username) || empty($password) || empty($name)) {
				// Assign an errorMsg to be picked up by the template
				$this->data['errorMsg'] = 'At least one field was empty';
			} else {
				if (strtolower($username) === "signup") {
					$this->data['errorMsg'] = 'The username Signup is not allowed';
				} else {

					// Load the User Model (in public_html\protected\model\User.php)
					Doo::loadModel('User');

					// Get a new User Model Instance
					$user = new User;

					// Assign the user object the requested username
					$user->username = $username;

					// Try and find a User with the specified username
					$result = Doo::db()->find($user, array('limit' => 1));

					if ($result == false) {
						// finish populating the users data
						$user->password = md5('salt' . $password . 'moresalt');
						$user->name = $name;

						// Try saving the result
						$result = $this->db()->insert($user);

						// Determin if this went okay and let user know
						if ($result == true) {
							// Set a success message we can pick up and use in the template
							$this->data['successMsg'] = 'Account Created!';
						} else {
							$this->data['errorMsg'] = 'Unknown error when trying to create account';
						}
					} else {
						$this->data['errorMsg'] = 'This username is already in use';
					}
				}
			}
		} else {
			$this->data['errorMsg'] = 'Not all fields where provided';
		}

		$this->view()->render('signup', $this->data);
	}

}
?>
