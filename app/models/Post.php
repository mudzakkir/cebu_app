<?php

class Post extends Eloquent
{
    protected $guarded = array("id");
    public static $unguarded = true;
    public static $rules = array("title" => "required");
    protected $table = 'posts';
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function contacts()
    {
        return $this->hasMany('Contact');
    }

}