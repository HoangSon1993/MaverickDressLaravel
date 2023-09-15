<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MyController extends Controller
{
    private $age;
    public function __construct(){
        $this->age = 10;
    }



    public function getData(Request $request , $name){
        echo 'xin chao '.$name;
        echo '<br> Tuoi: '.$this->age;
        echo '<br>'.$request->path();
        dd($request);
    }

    public function getForm(){
        return view ('form');
    }
    public function takeForm(Request $request){
        dd($request);
    }


    public function uploadFile(Request $request){
        return view('upload-file');
    }
    public function handleFile(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'image'=> 'required',

        ],[
            'name.required' => 'Ban chua nhap ten',
            'image.required' => 'Ban chua upload anh'
        ]);

        if($request->hasFile('image')){
            $file = $request->file('image');
            $name_file = $file->getClientOriginalName('image');
            $extention = $file->getClientOriginalExtension('image');

            if(strcasecmp($extention, 'jpg') === 0  || strcasecmp($extention, 'png' ) === 0|| strcasecmp($extention, 'jpeg') === 0){
                    $name = Str::random(5)."_".$name_file;
                    while(file_exists("image/".$name)){
                        $name = Str::random(5)."_".$name_file;
                    }
                    $file -> move('image', $name);
                    return redirect()->route('upload-file')->with('success','Upload hình thành công!');
            }
            dd($name_file);
        } else{
            return redirect()->route('upload-file')->with('error','Bạn chưa chọn hình');
        }
    }
}
