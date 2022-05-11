@extends('backend.layouts.app')
@section('title','admin detail')
@section('user-active','mm-active')
@section('content')

<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="fas fa-eye"></i>
            </div>
            <div>
                Employee  detail           
            </div>
        </div>
    </div>
</div> 

<a href="{{route('admin.user.index')}}" class="btn btn-primary my-2">
    <i class="fas fa-angle-double-left"></i>
    Black
</a>
<div class="content">
  
    <div class="card">
        
        <div class="card-body">
            <table id="Datatable" class="table table-striped table-bordered" style="width:100%">
             
                <tbody>
                  
                    <tr>
                        <td>Name</td>
                        <td>{{$user->name}}</td>
                       
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>{{$user->email}}</td>                      
                        
                    </tr>
                    <tr>                      
                        <td>Phone</td>
                        <td>{{$user->phone}}</td>                      
                    </tr>
                    <tr> 
                        <td>Address</td>                       
                        <td>{{$user->address}}</td>                       
                       
                    </tr>
                    <tr> 
                        <td>Position</td>                       
                        <td>{{$user->Postion->name}}</td>                       
                       
                    </tr>
                    
                    <tr> 
                        <td>Photo</td>                       
                        <td>
                            <img src="{{asset($user->photo)}}" alt="image" width="250px" height="200px">
                            </td>                       
                       
                    </tr>
                    
                 
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection

@section('scripts')

@endsection