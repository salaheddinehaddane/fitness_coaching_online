<?php

use App\Http\Controllers\BilanHebdoController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CoachController;
use App\Http\Controllers\EntrainementController;
use App\Http\Controllers\EvolutionController;
use App\Http\Controllers\FormatInitialController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\NutritionController;
use App\Http\Controllers\SuivreEntrainementController;
use App\Http\Controllers\SuivreNutritionController;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\LoginsController;
use App\Http\Controllers\PayementController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/coach-entrainement', [ItemController::class, 'index']);
Route::post('/store-entrainement', [EntrainementController::class, 'store']);
Route::get('/get-entrainements/{id}', [EntrainementController::class, 'index']);
// Route::get('/get-entrainement/{id}', [EntrainementController::class, 'getEntrainementByCoach']);
Route::put('/update-entrainement/{id}', [EntrainementController::class, 'update']);
Route::delete('/delete-entrainement/{id}', [EntrainementController::class, 'destroy']);
Route::get('get-ent/{id}', [EntrainementController::class, 'show']);

Route::post('/store-nutrition', [NutritionController::class, 'store']);
Route::get('/get-nutrition/{id}', [NutritionController::class, 'index']);
// Route::get('/get-nutrition/{id}', [NutritionController::class, 'getNutritioByCoach']);
Route::put('/update-nutrition/{id}', [NutritionController::class, 'update']);
Route::delete('/delete-nutrition/{id}', [NutritionController::class, 'destroy']);
Route::get('get-nut/{id}', [NutritionController::class, 'show']);

Route::get('/get-client/{id}', [ClientController::class, 'index']);
Route::get('/get-cl/{id}', [ClientController::class, 'show']);

Route::get('/get-info-client/{id}', [ClientController::class, 'getAllInfoClient']);

Route::post('/store-plan', [SuivreNutritionController::class, 'store']);
Route::get('/get_nutrition_pd/{id}/{date}', [SuivreNutritionController::class, 'pd']);
Route::get('/get_nutrition_de/{id}/{date}', [SuivreNutritionController::class, 'de']);
Route::get('/get_nutrition_di/{id}/{date}', [SuivreNutritionController::class, 'di']);
Route::post('/store_plan_nut', [SuivreNutritionController::class, 'store']);

Route::get('/get_entrainement/{id}/{date}', [SuivreEntrainementController::class, 'index']);
Route::post('/store_plan_ent', [SuivreEntrainementController::class, 'storeEnt']);

Route::post('/store-evolution', [EvolutionController::class, 'store']);

Route::post('/store-hebdo', [BilanHebdoController::class, "store"]);
Route::get('verifier', [BilanHebdoController::class, 'verifier']);

Route::post('/login', [LoginsController::class, 'login']);

Route::get('/clients', [ClientController::class, 'clients']);

Route::get('/coachs', [CoachController::class, 'index']);
Route::get('/delete_coach/{id_coach}/{id_payement}', [CoachController::class, 'destroy']);
Route::get('/delete_coach/{id_coach}', [CoachController::class, 'destroy2']);
Route::get('/delete_client/{id}', [ClientController::class, 'destroy']);

Route::get('/coachs_pending', [CoachController::class, 'pending']);
Route::get('/clients_de_coach/{id}', [ClientController::class, 'getCoach']);
Route::get('/valider/{id_coach}/{id_abonnement}', [CoachController::class, 'valider']);
Route::get('valider_client/{id_client}/{id_abonnement}', [ClientController::class, 'valider']);

Route::get('/abonnement/{id}', [CoachController::class, 'getAbonnement']);
Route::post('/store_coach', [CoachController::class, 'store']);

Route::get('store_date_abonnement/{id}', [PayementController::class, 'store']);

Route::get('renouveler/{id_coach}/{id_abonnement}/{id_payement}', [CoachController::class, 'renouveler']);

Route::post('store_client', [ClientController::class, 'store']);

Route::post('store_initial', [FormatInitialController::class, 'store']);

Route::get('get_coach/{id}', [CoachController::class, 'get']);
Route::get('client_pending/{id}', [ClientController::class, 'pending']);
Route::get('client_pending2/{id}', [ClientController::class, 'pending2']);
Route::get('mot_pass_oublie/{email}', [ClientController::class, 'motPasse']);
Route::get('changer_password/{id}/{pwd}/{npwd}', [CoachController::class, 'changerMotPasse']);
