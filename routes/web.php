<?php

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
    return view("home",["google_ad_id"=>env("GOOGLE_AD_ID"),"google_anal_id"=>env("GOOGLE_ANAL_ID")]);
});
Route::post('/',"MainController@paste");
Route::get("/p/{id}",function($id){
    if((int)($id) and (int)$id <= 148 and config("app.env")!="beta") {
        $p = \App\Models\Paste::findOrFail($id);
        if($p->obfs) $p->code = implode("&#x200D;",preg_split('/(?<!^)(?!$)/u',$p->code));
        return view("paste", ['p' =>$p,"google_ad_id" => env("GOOGLE_AD_ID"),"google_anal_id" => env("GOOGLE_ANAL_ID")]);
    }
    if(\App\Models\Paste::where("index",$id)->first()){
        $p = \App\Models\Paste::where("index",$id)->first();
        if($p->obfs) $p->code = implode("&#x200D;",preg_split('/(?<!^)(?!$)/u',$p->code));
        return view("paste", ['p' =>$p,"google_ad_id" => env("GOOGLE_AD_ID"),"google_anal_id" => env("GOOGLE_ANAL_ID")]);
    }
    throw new \Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
});
