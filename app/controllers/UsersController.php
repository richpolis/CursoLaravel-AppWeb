<?php

use Richpolis\Entities\User;
use Richpolis\Managers\RegisterManager;
use Richpolis\Repositories\CandidateRepository;

class UsersController extends BaseController
{
    protected $categoriaRepo;
    
    public function __construct(CandidateRepository $candidateRepo)
    {
        $this->candidateRepo = $candidateRepo;
    }
    
	public function signUp()
    {
    	return View::make("users/sign-up");    
    } 
    
    public function register()
    {
        // metodo para traer todos los campos enviados por el formulario
        //$data = Input::all();
        
        //proceso sin manager
        //$data = Input::only(['full_name','email','password','password_confirmation']);
        /*$rules = [
            'full_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ];*/
        
        $user = $this->candidateRepo->newCandidate();
        
        $manager = new RegisterManager($user,Input::all());
        
        if($manager->save())
        {
            //creacion automatica de laravel con datos masivos permitidos
            //User::create($data);
            
            //metodo para agregar un campo que no este en el formulario sin manager
			/*$user = new User($data);
            $user->type = 'candidate';
            $user->save();*/
            
            return Redirect::route('home');
        }
        
        return Redirect::back()->withInput()->withErrors($manager->getErrors());
    }
}