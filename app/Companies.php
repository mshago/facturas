<?php

namespace App;

use App\User;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'address','rfc'
    ];

    public function users(){
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
