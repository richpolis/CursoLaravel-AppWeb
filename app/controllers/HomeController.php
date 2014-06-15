<?php

use Richpolis\Repositories\CandidateRepository;

class HomeController extends BaseController
{
    protected $candidateRepo;
    public function __construct(CandidateRepository $candidateRepo)
    {
        $this->candidateRepo = $candidateRepo;
    }
    
    public function index()
    {
        $lasted_candidates = $this->candidateRepo->findLasted();
        return View::make('home',compact('lasted_candidates'));
    }
}