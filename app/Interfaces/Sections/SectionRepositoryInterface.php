<?php
namespace App\Interfaces\Sections;
use Illuminate\Http\Request;

interface SectionRepositoryInterface
{
  // ###############  CRUD Section   ############################
    public function index();
    public function store(Request $request);
    public function update(Request $request);
    public function destroy(Request $request);




}