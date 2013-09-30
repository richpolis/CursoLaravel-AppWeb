<?php

class AdminController extends BaseController {

	public function index()
	{
		return View::make('admin.index');
	}

	public function posts_all()
	{
		$posts = Post::all();
		return View::make('admin.posts.all')->with('posts', $posts);
	}

	public function post($id)
	{
		$post = Post::find($id);
		$categories = Category::all()->lists('name', 'id');
		return View::make('admin.posts.post')->with('post', $post)->with('categories', $categories);
	}

	public function get_add()
	{
		$categories = Category::all()->lists('name', 'id');
		return View::make('admin.posts.post')->with('categories', $categories);
	}

	public function post_add()
	{
		$input = Input::all();

		$rules = array(
			'title' => 'required',
			'url' => 'required',
			'categories' => 'required',
			'status' => 'required',
		);

		$validator = Validator::make($input, $rules);

		if($validator->fails())
		{
			return Redirect::back()->withErrors($validator);
		}
		else
		{
			$post = new Post;
				$post->title 	= Input::get('title');
				$post->url 		= Input::get('url');
				$post->content 	= Input::get('content');
				$post->status 	= Input::get('status');
				$post->user_id	= Session::get('user_id');
				$post->comments = 0;
			$post->save();

			$categories = Input::get('categories');

			foreach($categories as $category)
			{
				$relation = new Relation;
					$relation->post_id = $post->id;
					$relation->category_id = $category;
				$relation->save();
			}

			return Redirect::to('/admin/posts');
		}
	}

	public function post_edit($id)
	{
		$input = Input::all();

		$rules = array(
			'title' => 'required',
			'url' => 'required',
			'categories' => 'required',
			'status' => 'required',
		);

		$validator = Validator::make($input, $rules);

		if($validator->fails())
		{
			return Redirect::back()->withErrors($validator);
		}
		else
		{
			$post = Post::find($id);
				$post->title 	= Input::get('title');
				$post->url 		= Input::get('url');
				$post->content 	= Input::get('content');
				$post->status 	= Input::get('status');
			$post->save();

			$categories = Input::get('categories');

			$old_relations = Relation::where('post_id', '=', $id)->delete();

			foreach($categories as $category)
			{
				$relation = new Relation;
					$relation->post_id = $id;
					$relation->category_id = $category;
				$relation->save();
			}

			return Redirect::to('/admin/posts');
		}
	}

	public function categories()
	{
		$categories = Category::all();
		return View::make('admin.categories.categories')->with('categories', $categories);
	}

	public function categories_add()
	{
		$input = Input::all();

		$rules = array(
			'name' => 'required',
			'url' => 'required',
		);

		$validator = Validator::make($input, $rules);

		if($validator->fails())
		{
			return Redirect::back()->withErrors($validator);
		}
		else
		{
			$category = new Category;
				$category->name = Input::get('name');
				$category->url = Input::get('url');
				$category->description = Input::get('description');
			$category->save();

			return Redirect::to('/admin/categories');
		}
	}

	public function categories_get_edit($id)
	{
		$categories = Category::all();
		$category = Category::find($id);
		return View::make('admin.categories.categories')->with('categories', $categories)->with('category', $category);
	}

	public function categories_post_edit($id)
	{
		$input = Input::all();

		$rules = array(
			'name' => 'required',
			'url' => 'required',
		);

		$validator = Validator::make($input, $rules);

		if($validator->fails())
		{
			return Redirect::back()->withErrors($validator);
		}
		else
		{
			$category = Category::find($id);
				$category->name = Input::get('name');
				$category->url = Input::get('url');
				$category->description = Input::get('description');
			$category->save();

			return Redirect::to('/admin/categories');
		}
	}

	public function categories_delete($id)
	{
		$category = Category::find($id);
		$category->delete();
		return Redirect::to('/admin/categories');
	}


}