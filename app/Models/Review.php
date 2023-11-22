<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function getCreatedAtAttribute($date)
    {
        return \Carbon\Carbon::createFromTimeStamp(strtotime($date))->diffForHumans();
    }

    public function getUsernameAttribute($value){
        return ucwords($value);
    }

    public function getStatusAttribute($value){
        return (int)$value;
    }

    protected function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }
}
