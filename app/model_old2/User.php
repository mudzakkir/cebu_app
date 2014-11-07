<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface
{

    use UserTrait,
        RemindableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';
    public $timestamps = false;
    protected $guarded = array("id");
    protected $hidden = array("password", "remember_token");
    public static $unguarded = true;
    public static $rules = array("username" => "required", "email" => "required|email");


    public function posts()
    {
        return $this->hasMany('Post');
    }

    public function contacts()
    {
        return $this->hasMany('Contact');
    }

}