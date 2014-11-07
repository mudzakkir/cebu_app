<?php
class Contact extends Eloquent{

    protected $table = 'posts';
    public $timestamps = false;
    protected $guarded = array("id");
    public static $unguarded = true;
    public static $rules = array("title"=>"required");

	public function post(){
		return $this->belongsTo('Post');
	}

	public function user(){
		return $this->belongsTo('User');
	}

}
