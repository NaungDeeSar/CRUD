<?php

namespace App\Http\Controllers\Backend;
use App\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class DepartmentController extends Controller
{


    public function index(){
        $deps= Department::all();
        return view('backend.admin_dep.index',compact('deps'));
    }

    public function create(){
        return view('backend.admin_dep.create');
    }

    public function store(Request $request){

        $dep= new Department();
        $dep->name =$request->name;        
        $dep->save();
        return redirect()->route('admin.admin-dep.index')->with('create','Successfully');

    }


    public function edit($id){
        $dep=Department::findOrFail($id);
        return view('backend.admin_dep.edit',compact('dep'));
    }

    public function update($id,Request $request){
        $dep=Department::findOrFail($id);
        $dep->name =$request->name;       
        $dep->update();
        return redirect()->route('admin.admin-dep.index')->with('update','Successfully Updated');
    
    }

    public function destroy($id){
        $dep=Department::findOrFail($id);
        $dep->delete();
        return redirect()->route('admin.admin-dep.index');
    }

}
