<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'age', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function payments()
    {
        return $this->belongsToMany(Payment::class, 'payment_user');
    }

    public function getUsersFavorite($id)
    {
        return User::whereIn('id', function($query) use ($id) {
            $query->select('favoriteuser')
                ->from('favoriteusers')
                ->where('user_id','=',$id);
        })->get();
    }

    public function getNotFavoriteUsers($id)
    {
        return User::whereNotIn('id', function($query) use ($id) {
            $query->select('favoriteuser')
                ->from('favoriteusers')
                ->where('user_id','=',$id);
        })->get();
    }


}
