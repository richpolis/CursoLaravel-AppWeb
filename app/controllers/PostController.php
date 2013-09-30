<?php

class PostController extends BaseController {

	public function post($url)
	{	
		$post = Post::where('url', '=', $url)->first();
		$comments = Post::find($post->id)->comments()->get();
		return View::make('posts.post')->with('post', $post)->with('comments', $comments);
	}

	public function comment($id)
	{
		$input = Input::all();

		$rules = array(
			'comment' => 'required',
		);

		$validator = Validator::make($input, $rules);

		if($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->with('estado', 'No enviado. Comprueba los datos');
		}
		else
		{
			$comment = new Comment;
				$comment->post_id = $id;
				$comment->user_id = Session::get('user_id');
				$comment->comment = Input::get('comment');
			$comment->save();

			$post = Post::find($id);

			return Redirect::to('/articulo/'.$post->url);
		}
			
	}

}