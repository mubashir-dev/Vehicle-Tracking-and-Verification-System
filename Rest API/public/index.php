<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';
require '../include/db_connection.php';
require '../include/bus_timings.php';
require '../include/map_param.php';
require '../include/alert.php';
require '../include/login.php';
require '../include/fee.php';

$app = new \Slim\App;

$app->get('/', function (Request $request, Response $response, array $args) {

	echo "<h4>VV-TRACKING_REST_API</h4>";
});


$app->post('/login', function (Request $request, Response $response, array $args) {

	$login = new Login();
	$_input = $request->getParsedBody();
	pr
	// if(isset($_input))
	// {
	// 	$role = $_input['role'];
	// 	if ($role == 'student') {
	// 		$data = $login->Auth_Student($_input);
	// 		echo json_encode($data);
	// 	} else if ($role == 'faculty') {
	// 		$data = $login->Auth_Faculty($_input);
	// 		echo json_encode($data);
	// 	}
	// }
	// else
	// {
	// 	echo "Access denied";
	// }

	
});

$app->get('/student_fee/{id}', function (Request $request, Response $response, array $args) {

	$id = $args['id'];
	$fee_obj = new fee();
	$data = $fee_obj->fee_status_STUDENT($id);
	echo json_encode($data);
});

$app->get('/faculty_fee/{id}', function (Request $request, Response $response, array $args) {

	$id = $args['id'];
	$fee_obj = new fee();
	$data = $fee_obj->fee_status_FACULTY($id);
	echo json_encode($data);
});

$app->get('/bus_timings/{id}', function (Request $request, Response $response, array $args) {

	$id = $args['id'];
	$bus_time = new bus_timings();
	$data = $bus_time->get_bus_schedule($id);

	echo json_encode($data);
});

// Bus_Token
$app->get('/bus_token/{id}', function (Request $request, Response $response, array $args) {

	$id = $args['id'];
	$bus_time = new bus_timings();

	$data = $bus_time->bus_token($id);

	echo json_encode($data);
});

// Driver_Profile
$app->get('/driver/{id}', function (Request $request, Response $response, array $args) {

	$id = $args['id'];
	$bus_time = new bus_timings();

	$data = $bus_time->driver_profile($id);

	echo json_encode($data);
});

//Bus Location on Map
$app->get('/location/{id}', function (Request $request, Response $response, array $args) {

	$id = $args['id'];

	$bus_loc = new map_param();
	$data = $bus_loc->bus_location($id);

	echo json_encode($data);
});

//Alerts 
$app->get('/alerts', function (Request $request, Response $response, array $args) {

	$alert_msg = new alert();
	$data = $alert_msg->get_alerts();

	echo json_encode($data);
});


$app->run();
