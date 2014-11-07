<?php
class Post extends Eloquent{


    protected $table = 'posts';
    public $timestamps = false;
    protected $guarded = array("id");
    public static $unguarded = true;
    public static $rules = array("title"=>"required");

	protected $fillable = ['title', 'content', 'category', 'area'];

	public function user(){
		return $this->belongsTo('User');
	}
}
