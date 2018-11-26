<?php
require '../vendor/autoload.php';
require '../generated-conf/config.php';

//////////////////////
// Slim Setup
//////////////////////

$settings = ['displayErrorDetails' => true];

$app = new \Slim\App(['settings' => $settings]);

$container = $app->getContainer();
$container['view'] = function($container) {
	$view = new \Slim\Views\Twig('../templates');
	
	$basePath = rtrim(str_ireplace('index.php', '', 
	$container->get('request')->getUri()->getBasePath()), '/');

	$view->addExtension(
	new Slim\Views\TwigExtension($container->get('router'), $basePath));
	
	return $view;
};
// home page route
$app->get('/', function ($request, $response, $args) {
	$this->view->render($response, "index.html");
	return $response;
});


//////////////////////////////
/////////LOGIN ROUTES/////////
//////////////////////////////
// The route for testing out the new login page
$app->get('/login', function ($request, $response, $args) {
	$this->view->render($response, "login.html");
	return $response;
});

//login verification route
$app->post('/login_verification', function ($request, $response, $args) {
	// get the data from the post body
	$email = $this->request->getParam('email');
	$password = $this->request->getParam('password');
	//find user object in database
	$email = EmailQuery::create()->findOneByEmail($email);
	// If null is not caught, the following query will return a 500 error
	if (is_null($email)){
		$arr["verified"]="false";
		return json_encode($arr);
	}

	$user = UserQuery::create()->findPk($email->getUserid());
	if($user && $user->login($password)){
		$arr["verified"]="true";
		$arr["userID"] = $user->getPrimaryKey();
		$arr["userFName"] = $user->getFirstName();
	}
	else{
		$arr["verified"]="false";
	}
	return json_encode($arr);
});

$app->post("/success_login",function($request,$response,$args){
	$userID = $this->request->getParam('userID');
	$this->view->render($response, "index.html", ['user'=>UserQuery::create()->findPk($userID)]);
	return $response;
});

//////////////////////////////
///////REGISTER ROUTES////////
//////////////////////////////
function createUser($firstName, $lastName, $email, $password){
	$user = new User();
	$user->setFirstName($firstName);
	$user->setLastName($lastName);
	$user->setPassword($password);

	$email = new Email();
	$email->setEmail($email);
	$email->setUserid($user->getId());
	$email->setDescription("tenant");
	$user->save();
	$email->save();
}
$app->get('/register_verification', function ($request, $response, $args) {
	$firstName = $this->request->getParam("firstName");
	$lastName = $this->request->getParam("lastName");
	$email = $this->request->getParam("email");
	$password = $this->request->getParam("password");
	$confirm = $this->request->getParam("confirm");

	$fields = array($firstName, $lastName, $email , $password ,$confirm);
	//CHECK IF ALL FIELDS ARE SET
	foreach($fields as $field){
		if(empty($field)){
			//echo $field. " is empty!";
			return json_encode( ['invalid' =>'true']);
		}
	}
	//CHECK THAT PASSWORDS MATCH
	if($password != $confirm){
		//$code["invalid"]='true';
		return json_encode( ["mismatch"=>'true'] );
	}
	//CHECK IF EMAIL IS ALREADY IN USE
	$email = EmailQuery::create()->findOneByEmail($email);
	if($email){
		//$code["duplicate"]='true';
		return json_encode(["duplicate"=>'true']);
	}
	createUser($firstName,$lastName,$email,$password);
	return json_encode(["verified"=>"true"]);
});

$app->get('/success_register', function ($request, $response, $args) {
	//echo "Success!</br>";
	$this->view->render($response, "login.html");
	return $response;
});

$app->run();
?>