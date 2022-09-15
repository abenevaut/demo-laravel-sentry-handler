<?php

use Illuminate\Support\Facades\Route;

/**
 *
 */
Route::get('/report-std-exception', function () {
    $exception = new \Exception('report-std-exception');

    report($exception);

    // Example purpose only
    return response()->json(['message' => $exception->getMessage()]);
});

/**
 *
 */
Route::get('/throw-std-exception-to-handler', function () {
    throw new \App\Exceptions\NotCaughtStandardException('throw-std-exception-to-handler');
});

/**
 *
 */
Route::get('/report-scoped-exception', function () {
    $exception = new \App\Exceptions\NotCaughtScopedException('report-scoped-exception', 418);

    // $exception->addScope(/* add scope */);

    report($exception);

    // Example purpose only
    return response()->json(['message' => $exception->getMessage()]);
});

/**
 * Exception based on HTTPExceptionAbstract render alone his json response.
 */
Route::get('/throw-scoped-exception-to-handler', function () {
    $exception = new \App\Exceptions\HttpNotCaughtScopedException('throw-scoped-exception-to-handler', 418);

    // $exception->addScope(/* add scope */);

    throw $exception;
});
