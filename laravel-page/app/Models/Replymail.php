<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Replymail extends Model
{
    use HasFactory;
    protected $table = 'replymails';


    protected $fillable = [

        'title',
        'message',

    ];

    public function contacts(){
        return $this->belongsToMany(Contact::class);
    }

}
