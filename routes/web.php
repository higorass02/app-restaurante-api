<?php
use App\Http\Controllers\SolicitacoesController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    if(auth()->user()){
        return redirect()->route('Solicitacao_listagem');
    }else{
        return view('auth.login');
    }
});

Route::get('/login2', function () {
    return view('welcome');
});

Route::get('/solicitacoes', function(){
    if(auth()->user()){
        $SolicitacoesController = new SolicitacoesController();
        return $SolicitacoesController->index();
    }else{
        return view('auth.login');
    }
})->name('Solicitacao_listagem');

Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', function () {
    return redirect()->route('Solicitacao_listagem');
});

