<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chirp extends Model
{
    //สามารถใส่ข้อมูลอะไรได้บ้าง fillable 
    protected $fillable = [         //ถ้าไม่ใส่ จะ insert เข้าไปไม่ได้
        'message',                  //
    ];
}
