<?php

namespace App;

use App\Traits\EventManager;
use App\Traits\UuidTrait;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use jeremykenedy\LaravelRoles\Traits\HasRoleAndPermission;

class User extends Authenticatable
{
    use Notifiable, UuidTrait, EventManager, HasRoleAndPermission;

    /**
     * Allow uuid as primary key on users table
     *
     * @var bool
     */
    protected $allowUuid = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];



    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = [
        'full_name'
    ];

    /**
     * @return string
     */
    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function subjects()
    {
        return $this->belongsToMany(Subject::class);
    }

    /**
     * @return array
     */
    public static function getColumnsTable(){
        return [
            ['data' => 'first_name', 'name' => 'first_name', 'title' => __('models/user.fillable.first_name')],
            ['data' => 'last_name', 'name' => 'last_name', 'title' => __('models/user.fillable.last_name')],
            ['data' => 'phone', 'name' => 'phone', 'title' => __('models/user.fillable.phone')],
            ['data' => 'email', 'name' => 'email', 'title' => __('models/user.fillable.email')],
        ];
    }
}
