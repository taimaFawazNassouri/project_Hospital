<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Interfaces\Sections\SectionRepositoryInterface;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    private $SectionRepository;
  
    public function __construct(SectionRepositoryInterface $SectionRepository)
    {
        $this->Section = $SectionRepository;
    }   


    public function index()
    {
       return $this->Section->index();
    
    }


   
    public function store(Request $request)
    {
        return $this->Section->store($request);
    }

  
    public function show(string $id)
    {
        //
    }

 
    public function edit(string $id)
    {
        //
    }

  
    public function update(Request $request)
    {
        return $this->Section->update($request);
        
    }

    public function destroy(Request $request)
    {
        return $this->Section->destroy($request);
    }
}
