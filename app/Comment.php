<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Student;
use App\User;
class Comment extends Model
{
    //
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function student(){
        return $this->belongsTo(Student::class);
    }
}