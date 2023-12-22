<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class state extends Model
{
    use HasFactory;

    public $table = 'tbl_state';

    // function get_data(){
    //     return $this->hasMany('App\Models\city');
    // }
}
