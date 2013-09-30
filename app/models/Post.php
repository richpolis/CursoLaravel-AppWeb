<?php

class Post extends Eloquent {

	protected $table = 'posts';

	public static function onCategories($id)
	{
		$categories = Post::find($id)->categories()->lists('id');
		return $categories;
	}

	public function user()
	{
		return $this->belongsTo('User', 'user_id');
	}

	public function comments()
	{
		return $this->hasMany('Comment');
	}

	public function categories()
	{
		return $this->belongsToMany('Category', 'relationships')->withPivot('post_id', 'category_id');
	}

}