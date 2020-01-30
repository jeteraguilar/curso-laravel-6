<?php


Route::get('/login', function () {
    return 'Login';
})->name('login');
//^^^^ ('podendo ser um array^dentro dos paraneteses');^^^^

Route::middleware([])->group (function(){
//(['auth']) responsável pela validação de segurança. Se estiver vazio([]) não autentica a segurança.

    Route::prefix('panel')->group(function(){
        Route::get ("/dashboard", function (){
             return 'Home Admin';
        });
        
        Route::get ("/financeiro", function (){
            return 'Financeiro Admin';
        });
        
        Route::get ("/produtos", function (){
            return 'Produtos Admin';
        });

        Route::get ("/", function (){
            return 'Admin';
       });
    });
});



//Route::get ("/admin/dashboard", function (){
//return 'Home Admin';
//})->middleware('auth');

//Route::get ("/admin/financeiro", function (){
  //  return 'Financeiro Admin';
//})->middleware('auth');

//Route::get ("/admin/produtos", function (){
 //   return 'Produtos Admin';
//})->middleware('auth');



Route::get('redirect3', function(){
    return redirect()->route('url.name');
});

//route('url.name');

Route::get('/nome-url', function () {
    return 'Hey hey hey';
})->name('url.name');

Route::view('/view','welcome',['id'=> 'teste']);

//Route::get('/view', function(){
//    return view('welcome');
//});

Route::redirect('redirect1','/redirect2');

//Route::get('redirect1', function(){
//   return redirect('/redirect2');
//});

Route::get('/redirect2', function(){
    return 'Redirect 02';
});

Route::get('/produtos/{idProduct?}/details', function ($idProduct = '') {
    return "Produtos(s) {$idProduct}";
});

Route::get('/categoria/{flag}/posts', function ($flag) {
    return "Posts da categoria: {$flag}";
});

Route::get('/categorias/{flag}', function ($flag) {
    return "Produtos da categoria: {$flag}";
});

Route::match(['post','get'],'/match',function() {
    return 'match';
});

Route::any('/any',function() {
    return 'Any';
});


Route::post('/register', function(){
    return '';
});

Route::get('/empresa', function (){
    return view('site.contact');
});

Route::get('/contato', function (){
    return 'Contato';
});

Route::get('/', function () {
    return view('welcome');
});

