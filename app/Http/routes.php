<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

/*
It









s hard to make a point
When youre living so loud -- vulfpeck
*/

$app->get('/status', function () use ($app) {
  return response()->json(array('success' => true,
    'message'=>'The API is up ' . $app->version()),
    200);
});

/*
-----------------------------
Route for user authentication
-----------------------------
*/
$app->post('register', 'UserController@register');
$app->post('loginByEmail', 'UserController@loginByEmail');
$app->post('loginByPhone', 'UserController@loginByPhone');
$app->post('login', 'UserController@login');
$app->get('user/{id}', 'UserController@show');

/*
-----------------------------
Route for user feedback
-----------------------------
*/
$app->post('postFeedback', 'FeedbackController@post');
$app->get('viewAllFeedback', 'FeedbackController@viewAll');
$app->get('viewFeedback/{id}', 'FeedbackController@view');
$app->put('updateFeedback/{id}', 'FeedbackController@update');

/*
-----------------------------------
Route for frequently asked question
-----------------------------------
*/
$app->get('viewAllFaq', 'FaqController@viewAll');
$app->get('viewFaq/{id}', 'FaqController@view');
$app->post('postFaq', 'FaqController@post');
$app->put('updateFaq/{id}', 'FaqController@update');

//route for img generate
$app->post('generateImg', 'ImageGeneratorController@generateImg');
$app->post('generateImg2', 'ImageGeneratorController@generateImg2');
$app->post('generateImg3', 'ImageGeneratorController@generateImg3');
$app->post('generateNewMotif', 'ImageGeneratorController2@generateNewMotif');
$app->post('motif', 'ImageGeneratorController@motif');
$app->post('motif-test', 'ImageGenerator4Controller@motif');
$app->post('buatMotifBaru', 'ImageGeneratorController@buatMotifBaru');
$app->post('testing', 'ImageGeneratorController@testing');

//route for tenun
// $app->post('tenun', 'TenunItemController@createNewTenunItem');
$app->get('tenun', 'TenunItemController@getListTenun');
$app->get('tenun/{id}', 'TenunItemController@view');

//route for motif_tenun
$app->post('motifTenun', 'MotifItemController@createNewMotifItem');
$app->get('motifTenun', 'MotifItemController@getListMotif');
$app->get('motifTenun/{id}', 'MotifItemController@view');

//route for algoritma
$app->get('algoritma', 'AlgoritmaController@getListAlgoritma');
$app->get('algoritmaParameter', 'AlgoritmaController@getListAlgoritmaParameter');
$app->get('algoritmaWithParameter', 'AlgoritmaController@getListAlgoritmaWithParameter');

//route for modul img quality
$app->post('uploadImage', 'ImageQualityController@uploadImage');
$app->post('checkNoise', 'ImageQualityController@checkNoise');
$app->post('checkBlur', 'ImageQualityController@checkBlur');

$app->post('kristikDigital', 'KristikDigitalController@createImages');

$app->post('kristik-hitam-putih', 'KristikDigitalController@kristikHitamPutih');
$app->post('kristik-hitam-putih-web', 'KristikDigitalController@kristikHitamPutihRemoveGrid');

$app->post('kristikDigitalAwal', 'KristikDigitalController@createImagesAwal');
$app->post('kristik', 'KristikDigitalController@kristik');

$app->post('kristiks', 'KristikDigitalController@kristiks');
$app->post('kristiksWeb', 'KristikDigitalController@kristiksRemoveGrid');

$app->post('kristik-to-edit', 'KristikDigitalController@kristikToEdit');
$app->get('listGenerate', 'GenerateController@getListGenerate');

$app->post('ulosclassify', 'UlosController@ulosClassification');

$app->get('grayscale','KristikDigitalController@greyScale');

$app->get('{path:.*}', 'CustomController@stuff');
