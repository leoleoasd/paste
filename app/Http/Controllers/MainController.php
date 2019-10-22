<?php

namespace App\Http\Controllers;

use App\Models\Paste;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Str;

class MainController extends Controller
{
    public function paste(Request $r){
        if(substr($r->language,0,3) == "c++"){
            $p = new Paste();
            $p->language = "cpp";
            $p->code = "";
            $p->syntax = "";
            $p->obfs = $r->get("obfs") == 'on';
            $p->index = Str::random(8);
            while(Paste::where("index",$p->index)->count()){
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
            exec("docker run -v=".storage_path("app/".$p->id.".cpp").":/a.cpp  --rm clangbuiltlinux/ubuntu:latest /usr/lib/llvm-9/bin/clang /a.cpp -fsyntax-only -std=".$r->language." 2>&1",$syntax);
            $syntax = join("\n", $syntax);
            $syntax = str_replace("/a.cpp","程序中",$syntax);
            $p->obfs = $r->get("obfs") == 'on';
            $p->code = $code;
            $p->syntax = $syntax;
            $p->save();
            Storage::disk("local")->delete($p->id.".cpp");
            return redirect("/p/".$p->index);
        }
        if(substr($r->language,0,1) == "c"){
            $p = new Paste();
            $p->language = "c";
            $p->code = "";
            $p->syntax = "";
            $p->obfs = $r->get("obfs") == 'on';
            $p->index = Str::random(8);
            while(Paste::where("index",$p->index)->count()){
                $p->index = Str::random(8);
            }
            $p->save();
            $code = base64_decode($r->code);
            Storage::disk("local")->put($p->id.".c",$code);
            if($r->get("format") == 'on'){
                exec("clang-format -style=\"{BasedOnStyle: llvm, IndentWidth: 4}\" ".storage_path("app/".$p->id.".c")." 2>&1",$code);
                $code = join("\n", $code);
            }
            Storage::disk("local")->put($p->id.".c",$code);
            exec("docker run -v=".storage_path("app/".$p->id.".c").":/a.c  --rm clangbuiltlinux/ubuntu:latest /usr/lib/llvm-9/bin/clang /a.c -fsyntax-only -std=".$r->language." 2>&1",$syntax);
            $syntax = join("\n", $syntax);
            $syntax = str_replace("/a.c","程序中",$syntax);
            $p->obfs = $r->get("obfs") == 'on';
            $p->code = $code;
            $p->syntax = $syntax;
            $p->save();
            Storage::disk("local")->delete($p->id.".c");
            return redirect("/p/".$p->index);
        }
        $p = new Paste();
        $p->language = $r->language != "-1" ? $r->language : "js";
        $code = base64_decode($r->code);
        if($r->get("obfs") == 'on'){
            $code = str_split($code);
            $code = implode('‍‍‍',$code);
        }
        $p->code= $code;
        $p->obfs = $r->get("obfs") == 'on';
        $p->syntax = "";
        $p->index = Str::random(8);
        while(Paste::where("index",$p->index)->count()){
            $p->index = Str::random(8);
        }
        $p->save();
        return redirect("/p/".$p->index);
    }
}
