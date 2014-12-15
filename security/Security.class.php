<?php 
class Security{
	static function sec_session_start()
	{
		$session_name = 'sec_session_id';
		$secure = false;
		$httponly = true;
		ini_set('session.use_only_cookies', 1);
		$cookieParams = session_get_cookie_params();
		session_set_cookie_params($cookieParams["lifetime"], $cookieParams["path"], $cookieParams["domain"], $secure, $httponly); 
		session_name($session_name);
		session_start();
		session_regenerate_id();
	}

	static function login()
	{
		if(isset($_POST['username'], $_POST['password']) == false)
		{
			return false;
		}

		$username = $_POST['username'];
		$password = $_POST['password'];
		$password = hash("sha256", $password);
		
		$user = User::withUser($username);
		if($user and $user->password == $password)
		{
			self::sec_session_start();

			#$username = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $username);
			$_SESSION['id'] = $user->id;
			$_SESSION['username'] = $user->username;
			$_SESSION['user_type'] = $user->user_type;

			if($user->user_type == 3)
			{
				$lab = Lab::withUserId($user->id);
				$_SESSION['lab_id'] = $lab[0]->id;
			}
			return true;    
		}
		else
		{
			return false;
		}	
	}

	static function log_out()
	{
		self::sec_session_start();
		$_SESSION = array();#Borro todos los params de la sesion.
		$params = session_get_cookie_params();#Traigo los parametros de la sesion.
		setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);#Borro la cookie.
		session_destroy(); #Destruyo la sesion.
	} 

	static function isLogged()
	{
		self::sec_session_start();
		$stat = session_status();
		return isset($_SESSION['username']);
	}

	static function hasAccess($controller,$action)
	{
		$admin = array('UsersController' => array('add','view','login','home','logout','delete','update','disable','enable'), 'LabsController' => array('view','delete'),
			'CalibratorsController' => array('add','view','delete','enable','disable','update'), 'DecisionsController' => array('add','view','delete','enable','disable','update'),
			'FilterPapersController' => array('add','view','delete','enable','disable','update'), 'InterpretationsController' => array('add','view','delete','enable','disable','update'),
			'MethodsController' => array('add','view','delete','enable','disable','update'), 'ReactivesController' => array('add','view','delete','enable','disable','update'));
		$personnel = array('TestController' => array('add'), 'LabsController' => array('add','view','deactivate','reactivate','showMap'),
			'LabMovementsController' => array('view'),'UsersController' => array('login','home','logout'),'TestsController' => array('add','view'),
			'AnalyteResultsController' => array('add','view'),'StatsController' => array('labs','analytes','tests','labels','charts'));
		$labs = array('TestResultsController' =>array('add'), 'UsersController' => array('login','home','logout'), 'LabsController' => array('update'),
			'AnalyteResultsController' => array('add','view'), 'StatsController' => array('stats'));
		$guest = array('UsersController' => array('login'));
		$permissions = array(0=>$guest, 1=>$admin, 2=>$personnel,3=>$labs);


		$user_type = isset($_SESSION['user_type'])?$_SESSION['user_type']:0;

		#Debugging:
		// echo "Sos de tipo $user_type. ";
		// echo 'Tenes permiso para esto? ';
		// echo in_array($action, $permissions[$user_type][$controller])?'SI!':'NO :(';
		#End Debugging.
		if (isset($permissions[$user_type][$controller]))
		{
			return in_array($action, $permissions[$user_type][$controller]);
		}
		else
		{
			return false;
		}		
	}
}