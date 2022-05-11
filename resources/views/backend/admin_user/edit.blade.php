@extends('backend.layouts.app')
@section('title','Edit Employee')
@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="fas fa-edit"></i>
            </div>
            <div>Edit Employee              
            </div>
        </div>
    </div>
</div> 
<div class="content">
    <div class="card">        
        <div class="card-body">
          <form action="{{route('admin.user.update',$user->id)}}" method="post" id="update" enctype="multipart/form-data">
            @csrf
            @method('PUT')
              <div class="form-group">
                  <label for="">Name</label>
                  <input type="text" class="form-control" name="name" value="{{$user->name}}">
              </div>
              
              <div class="form-group">
                <label for="">Email</label>
                <input type="email" class="form-control" name="email" value="{{$user->email}}">
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="form-group">
                <label for="">Phone</label>
                <input type="number" class="form-control" name="phone" value="{{$user->phone}}">
            </div>
            <div class="form-group">
                <label for="">Address</label>
                <textarea  cols="2" rows="3" class="form-control" name="address">
                    {{$user->address}}
                </textarea>              
            </div>
            <div class="form-group">
                <label class="control-label">Position</label>
                <select name="position_id" class="form-control">
                    <option value="">selected Option</option>
                    @foreach ($pos as $ps)
                    <option  value="{{$ps->id}}" {{ $ps->id == $user->position_id ? 'selected':'' }}>{{$ps->name}}</option>
              
                    @endforeach

                </select>
            </div>
            <div class="form-group">
                <label for="">Photo</label><br>
                
                <input type="file"  name="photo">
                <img src="{{asset($user->photo)}}" alt="image" class="img-fluid" width="90px">
           
            </div>            
                         
            <div class="d-flex">
                <button class="btn btn-danger back-btn">Cancel</button>
                <button type="submit" class="btn btn-primary ml-2">edit</button>
            </div>

          </form>

        </div>
    </div>
</div>
@endsection
