<?php

use Illuminate\Http\Request;


// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::apiResource('/class', 'Api\ClassController');
Route::apiResource('/subject', 'Api\SubjectController');
