<?php
use Illuminate\Support\Facades\Route;
/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

// $router->get('/', function () use ($router) {
//     return $router->app->version();
// });
Route::get('/', function () use ($router) {
    return $router->app->version();
});
// Route::get('/', function () {
//     // return view('page_not_found');
//     return "hiii";
//     //return view('welcome');
// });

// $router->group(['prefix' => 'api/'], function () use ($router){
	// $router->post('demo-test',  ['uses' => 'UsersController@demoTest']);
	Route::post('login', ['uses' => 'UsersController@login']);
	Route::post('logout', ['uses' => 'UsersController@logout']);
	Route::post('forget-password',  ['uses'=>'UsersController@forgetPassword']);
	Route::post('verify-otp',  ['uses'=>'UsersController@verifyOtp']);
	Route::post('reset-password',  ['uses'=>'UsersController@resetPassword']);
	Route::post('signup',  ['uses'=>'UsersController@signup']);
	Route::post('addStudentTestDetail', ['uses' => 'TestsController@addStudentTestDetail']);
	Route::get('states',['uses'=>'UsersController@getStates']);
	
// });
$router->group(['middleware'=>'auth'], function () use ($router){
	Route::post('profile-update',['uses'=>'UsersController@profileUpdate']);
	Route::post('premission',['uses'=>'UsersController@getModule']);
	
	Route::post('getNotifications', ['uses' => 'NotificationsController@getNotifications']);
	
	Route::post('certificates', ['uses' => 'CertificatesController@getCertificate']);

	Route::post('getTest', ['uses' => 'TestsController@getTest']);
	Route::post('getCompletedPendingTest', ['uses' => 'TestsController@getCompletedPendingTest']);
	
	Route::post('testResults', ['uses' => 'TestResultsController@getTestResult']);
	Route::post('getQuestions', ['uses' => 'TestsController@getQuestions']);

	/*getResult api use for all section with questions,testresult*/
	Route::post('getSectionResults', ['uses' => 'SectionsController@getSectionTestResult']);
	Route::post('getStudentResults', ['uses' => 'TestResultsController@getStudentResults']);
	Route::post('getStudentGivenTestAnswer', ['uses' => 'TestResultsController@getStudentGivenTestAnswer']);
	
	
	Route::post('sections', ['uses' => 'SectionsController@getSection']);
	Route::post('sectionsDesign', ['uses' => 'SectionsController@sectionWiseDesign']);

	Route::post('video', ['uses' => 'VideosController@getVideo']);
	Route::post('predictionfiles', ['uses' => 'PredictionFilesController@getPrediction']);
});