<?php

namespace App\Http\Controllers;

use App\Models\Paste;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Str;

class MainController extends Controller
{
    public function paste(Request $r){
        if($r->language == "c" or $r->language == "c++"){
            $p = new Paste();
            $p->language = "cpp";
            $p->code = "";
            $p->syntax = "";
            $p->index = Str::random(8);
            while(Paste::where("index",$p->index)->first()){
                $p->index = Str::random(8);
            }
            $p->save();
            $code = base64_decode($r->code);
            Storage::disk("local")->put($p->id.".cpp",$code);
            if($r->get("format") == 'on'){
                exec("clang-format -style=\"{BasedOnStyle: llvm, IndentWidth: 4}\" ".storage_path("app/".$p->id.".cpp")." 2>&1",$code);
                $code = join("\n", $code);
            }
            Storage::disk("local")->put($p->id.".cpp",$code);
            exec("clang -fsyntax-only ".storage_path("app/".$p->id.".cpp")." 2>&1",$syntax);
            $syntax = join("\n", $syntax);
            $syntax = str_replace(storage_path("app/".$p->id.".cpp"),"程序中",$syntax);
            $p->code = $code;
            $p->syntax = $syntax;
            $p->save();
            Storage::disk("local")->delete($p->id.".cpp");
            return redirect("/p/".$p->index);
        }
        $p = new Paste();
        $p->language = $r->language != "-1" ? $r->language : "js";
        $p->code = base64_decode($r->code);
        $p->syntax = "";
        $p->index = Str::random(8);
        while(Paste::where("index",$p->index)->first()){
            $p->index = Str::random(8);
        }
        $p->save();
        return redirect("/p/".$p->index);
    }
}
