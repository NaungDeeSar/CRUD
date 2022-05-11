<?php

namespace App\Http\Controllers\Backend;
use App\Postion;
use App\Employee;
use App\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    
    public function index(){
        $users= Employee::all();
        return view('backend.admin_user.index',compact('users'));
    }

    public function create(){
        $deps=Department::all();
        $pos=Postion::get();
        return view('backend.admin_user.create',compact('pos','deps'));
       
    }

    public function store(Request $request){
        $user=new Employee();      
        $user->name=$request->name;
        $user->email =$request->email;    
        $user->phone =$request->phone; 
        $user->address =$request->address;       
        $user->position_id =$request->position_id;
        $user->password=Hash::make($request->password);
        if($request->file()) {          
            $fileName = time().'_'.$request->photo->getClientOriginalName();          
            $filePath = $request->file('photo')->storeAs('images', $fileName, 'public');
            $path = '/storage/'.$filePath;
        }
        //$image = $request->file('photo')->store('public');
        //Save url to image
        //$user->photo = asset($image);
        $user->photo=$path;
        $user->save();
        return redirect()->route('admin.user.index')->with('create','Successfully');
    }
    
    public function edit($id){
        $pos=Postion::all();
        $user=Employee::findOrFail($id);
        return view('backend.admin_user.edit',compact('pos','user'));
    }

    public function update($id,Request $request){
        $user=Employee::findOrFail($id);
        $user->name=$request->name;
        $user->email =$request->email;    
        $user->phone =$request->phone; 
        $user->address =$request->address;       
        $user->position_id =$request->position_id;
        $user->password=$request->password ? Hash::make($request->password) :$user->password;
        
        if($request->file()) {          
            $fileName = time().'_'.$request->photo->getClientOriginalName();          
            $filePath = $request->file('photo')->storeAs('images', $fileName, 'public');
            $path = '/storage/'.$filePath;
        }
        //$image = $request->file('photo')->store('public');
        //Save url to image
        //$user->photo = asset($image);
        $user->photo=$path;
        $user->update();
        return redirect()->route('admin.user.index')->with('update','update Successfully');
        
    
    }
    public function show(Employee $user){
       return view('backend.admin_user.show',compact('user'));
    }
    
    public function destroy($id){
        $user=Employee::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.user.index');
    }

}
