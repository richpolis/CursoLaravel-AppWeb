<?php

class WebController extends BaseController {

	public function index()
	{
		$posts = Post::where('status', '=', 1)->paginate(3);
		return View::make('index')->with('posts', $posts);
	}

	public function get_contact()
	{
		return View::make('contact');
	}

	public function post_contact()
	{
		$input = Input::all();

		$rules = array(
			'nombre' => 'required',
			'email' => 'required|email',
			'mensaje' => 'required',
		);

		$validator = Validator::make($input, $rules);

		if($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->with('estado', 'No enviado. Comprueba los datos');
		}
		else
		{
			$datos = array(
				'nombre' => Input::get('nombre'),
				'email' => Input::get('email'),
				'asunto' => Input::get('asunto'),
				'mensaje' => Input::get('mensaje')
			);

			Mail::send('emails.contact', $datos, function($message)
			{
			    $message->from('email@web.com', 'Laravel');

			    $message->to(Input::get('email'))->subject(Input::get('asunto'));
			});

			return Redirect::to('/contact')->with('estado', 'Mensaje enviado correctamente');
		}
	}

}