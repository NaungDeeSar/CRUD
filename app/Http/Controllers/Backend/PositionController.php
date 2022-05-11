<?php

namespace App\Http\Controllers\Backend;
use App\Postion;
use App\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PositionController extends Controller
{


    public function index(){
        $positions= Postion::get();        
        return view('backend.admin_position.index',compact('positions'));
    }

   

    public function create(){
        $deps= Department::all();
        return view('backend.admin_position.create',compact('deps'));
    }

    public function store(Request $request){
        $pos= new Postion();
        $pos->name =$request->name;
        $pos->price=$request->price;
        $pos->dep_id =$request->dep_id;           
        $pos->save();
        return redirect()->route('admin.position.index')->with('create','Successfully');

    }
    public function edit($id){
        $deps=Department::all();
        $pos=Postion::findOrFail($id);
        return view('backend.admin_position.edit',compact('deps','pos'));
    }

    public function update($id,Request $request){
        $pos=Postion::findOrFail($id);
        $pos->name =$request->name; 
        $pos->price =$request->price; 
        $pos->dep_id =$request->dep_id;        
        $pos->update();
        return redirect()->route('admin.position.index')->with('update','Successfully Updated');
    
    }

    public function destroy($id){
        $dep=Postion::findOrFail($id);
        $dep->delete();
        return redirect()->route('admin.position.index');
    }

}
