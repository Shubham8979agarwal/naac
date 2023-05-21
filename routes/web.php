<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

#admin
Route::get('/', [UIController::class, 'login'])->name('login');
Route::post('/make-login', [UIController::class, 'make_login'])->name('make-login');
Route::group(['middleware' => 'disable_back_btn'], function () {    
Route::group(['middleware' => ['auth']], function()
{ 
    Route::get('/dashboard', [UIController::class, 'dashboard'])->name('dashboard');
    Route::get('/upload-file', [UIController::class, 'upload_file'])->name('upload-file');
    Route::get('/create-new-folder', [UIController::class, 'createnewfolder'])->name('create-new-folder');
    Route::post('/publish-file', [UIController::class, 'publish_file'])->name('publish-file');
    Route::post('/makeafolder', [UIController::class, 'makeafolder'])->name('makeafolder');
    Route::get('/delete-pdf/{id}', [UIController::class, 'delete_pdf'])->name('delete-pdf');
    Route::get('/view-all-folders', [UIController::class, 'viewallfolders'])->name('view-all-folders');
    Route::get('/get-pdfs-from-folders/{foldername}', [UIController::class, 'get_pdfs_from_folders'])->name('get-pdfs-from-folders');
    Route::get('/delete-folder/{foldername}', [UIController::class, 'delete_folder'])->name('delete-folder');
    Route::get('signout', [UIController::class, 'signout'])->name('signout');
});
});


/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/
