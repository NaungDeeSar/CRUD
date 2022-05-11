@extends('backend.layouts.app')
@section('title','admin User')
@section('user-active','mm-active')
@section('content')

<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="fas fa-users"></i>
            </div>
            <div>
                Employee            
            </div>
        </div>
    </div>
</div> 
<a href="{{route('admin.user.create')}}" class="btn btn-primary my-2">
    <i class="fas fa-plus-circle"></i>
    Create Employee
</a>
<div class="content">
  
    <div class="card">
        
        <div class="card-body">
            <table id="Datatable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        
                        <th>ID</th>
                        <th>Name</th>      
                        <th>Email</th> 
                        <th>Phone</th>     
                        <th>Address</th>            
                        <th>Action</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php 
                      $i=1;
                      ?>
                    @foreach ($users as $user)
                    <tr>
                       <td>{{$i++}}</td>
                         <td>{{$user->name}}</td>
                         <th>{{$user->email}}</th>
                         <td>{{$user->phone}}</td>
                         <th>{{$user->address}}</th>
                         <td>
                            <a href="{{route('admin.user.show',$user->id)}}">
                                <i class="fas fa-eye"></i>
                            </a>    |
                             <a href="{{route('admin.user.edit',$user->id)}}">
                                 <i class="fas fa-edit"></i>
                             </a>                           |
                    
                            <form  method="post" action="{{route('admin.user.destroy',$user->id)}}" class="d-inline-block">
                                @csrf
                                @method('DELETE')    
                                <button type="submit" name="onsubmit" class="btn btn-outline-info" >
                                    <i class="fas fa-trash-alt"></i>    
                                </button>
                            </form>
                         </td>

                    </tr>
                        
                    @endforeach
                   
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection

@section('scripts')

@endsection