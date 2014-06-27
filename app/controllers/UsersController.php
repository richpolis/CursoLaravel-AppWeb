<?php

use Richpolis\Entities\User;
use Richpolis\Managers\RegisterManager;
use Richpolis\Managers\AccountManager;
use Richpolis\Managers\ProfileManager;
use Richpolis\Repositories\CandidateRepository;
use Richpolis\Repositories\CategoryRepository;

class UsersController extends BaseController {

    protected $categoriaRepo;
    protected $candidateRepo;

    public function __construct(CandidateRepository $candidateRepo, 
                                CategoryRepository $categoriaRepo) 
    {
        $this->candidateRepo = $candidateRepo;
        $this->categoriaRepo = $categoriaRepo;
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
        /* $rules = [
          'full_name' => 'required',
          'email' => 'required|email|unique:users,email',
          'password' => 'required|confirmed',
          'password_confirmation' => 'required',
          ]; */

        $user = $this->candidateRepo->newCandidate();

        $manager = new RegisterManager($user, Input::all());

        if ($manager->save()) {
            //creacion automatica de laravel con datos masivos permitidos
            //User::create($data);
            //metodo para agregar un campo que no este en el formulario sin manager
            /* $user = new User($data);
              $user->type = 'candidate';
              $user->save(); */

            return Redirect::route('home');
        }

        return Redirect::back()->withInput()->withErrors($manager->getErrors());
    }

    public function account()
    {
        $user = Auth::user();
        //return View::make('users/account')->with('user',$user); esta forma es la que usan en laravel mas frecuentemente.
        return View::make('users/account',compact('user'));
        
    }
    
    public function updateAccount() 
    {
        $user = Auth::user();

        $manager = new AccountManager($user, Input::all());

        if ($manager->save()) {

            return Redirect::route('home');
        }

        return Redirect::back()->withInput()->withErrors($manager->getErrors());
    }

    public function profile()
    {
        $user = Auth::user();
        $candidate = $user->candidate;
        $categories = $this->categoriaRepo->getList();
        $job_types = \Lang::get('utils.job_types');

        return View::make('users/profile',compact('user','candidate','categories','job_types'));
        
    }
    
    public function updateProfile() 
    {
        $user = Auth::user();

        $candidate = $user->getCandidate();

        $manager = new ProfileManager($candidate, Input::all());

        if ($manager->save()) {

            return Redirect::route('home');
        }

        return Redirect::back()->withInput()->withErrors($manager->getErrors());
    }
}
