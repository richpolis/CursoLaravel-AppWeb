<?php



use Richpolis\Repositories\CategoryRepository;

class CandidatesController extends BaseController
{
    private $repository;
    
    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
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
        $category = $this->repository->find($id);
        
        return View::make('candidates/category',compact('category'));
    }
}