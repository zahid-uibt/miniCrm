<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Company extends Model
{
    use Notifiable;
    protected $guarded=[];
    
    public function Employees()
    {
        return $this->hasMany(Employee::class);
    }
}
