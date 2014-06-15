<?php



use Richpolis\Repositories\CategoryRepository;
use Richpolis\Repositories\CandidateRepository;


class CandidatesController extends BaseController
{
    private $categoryRepo;
    private $candidateRepo;
    
    public function __construct(CategoryRepository $categoryRepo, CandidateRepository $candidateRepo)
    {
        $this->categoryRepo = $categoryRepo;
        $this->candidateRepo = $candidateRepo;
    }
        
    /*
     * Action of category
     * 
     * @params string $slug
     * @params integer $id
     * 
     * @return Template: categoy.blade.html
     */
    public function category($slug,$id)
    {
        $category = $this->categoryRepo->find($id);
        
        return View::make('candidates/category',compact('category'));
    }
    
    /*
     * Action show
     * 
	 * @params string $slug
     * @params integer $id
     * 
     * @return Template: show.blade.html
    */
    
    public function show($slug,$id)
    {
        $candidate = $this->candidateRepo->find($id);
        
        return View::make('candidates/show',compact('candidate'));
    }
    
}