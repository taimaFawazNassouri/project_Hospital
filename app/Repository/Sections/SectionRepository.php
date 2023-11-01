<?php
namespace App\Repository\Sections;
use App\Models\Section;
use Illuminate\Http\Request;

use App\Interfaces\Sections\SectionRepositoryInterface;

class SectionRepository implements SectionRepositoryInterface{
    public function index(){
        $sections = Section::all();
        return view('Dashboard.Sections.index',compact('sections'));
    }
    public function store(Request $request){
        Section::create([
           'name'=>$request->input('name'),
        ]);
        session()->flash('add');
        return redirect()->route('Sections.index');
    }
    public function update(Request $request){
        $sections = Section::findorfail($request->id);
        $sections->update([
            'name'=>$request->input('name'),
        ]);
          session()->flash('edit');
        return redirect()->route('Sections.index');
    }
    public function destroy(Request $request){
        $sections = Section::findorfail($request->id)->delete();
        session()->flash('delete');
        return redirect()->route('Sections.index');
    }
}