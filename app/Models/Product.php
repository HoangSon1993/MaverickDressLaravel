<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';

    //Khai báo các cột cần lấy dữ liệu trong bảng
     protected $fillable = [
         'name',
         'price',
         'img',
         'detail',
         'description',
         'cat_id',
         'brand_id'
    ];

     //Disable
     public $timestamps = false;

//     public function user(){
//         return $this->belongsTo(User::class,'user_id','id');
//     }
//
//      // Noi dung cua cot content se bi thay doi thanh chuoi 'content_edit'
//      public function getContentAttribute(){
//         return 'content_edit';
//      }
//
//      public function  setContentAttribute ($value){
//         $this->attributes['content'] = $value . "Dep trai";
//      }
}
