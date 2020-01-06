<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $guarded=[];

    public function Company()
    {
        return $this->belongsTo(Company::class);
    }
}
