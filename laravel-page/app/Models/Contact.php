<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contacts';


    protected $fillable = [

        'name',
        'email',
        'message',
        'email_check',
        'reply_check',

    ];

    public function categories(){
        return $this->belongsToMany(Category::class);
    }
    public function replymails(){
        return $this->belongsToMany(Replymail::class);
    }

}
