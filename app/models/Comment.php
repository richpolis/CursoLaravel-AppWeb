<?php

class Comment extends Eloquent {

	protected $table = 'comments';
	public $timestamps = false;

	public function post()
	{
		return $this->belongsTo('Post', 'post_id');
	}

}