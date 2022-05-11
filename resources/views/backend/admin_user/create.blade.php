@extends('backend.layouts.app')
@section('title','create user')
@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="fas fa-user-plus"></i>
            </div>
            <div>Create Employee              
            </div>
        </div>
    </div>
</div> 
<div class="content">
    <div class="card">
        
        <div class="card-body">

          <form action="{{route('admin.user.store')}}" method="post" id="create" enctype="multipart/form-data">
            @csrf
              <div class="form-group">
                  <label for="">Name</label>
                  <input type="text" class="form-control" name="name">
              </div>

              <div class="form-group">
                <label for="">Email</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="form-group">
                <label for="">Phone</label>
                <input type="number" class="form-control" name="phone">
            </div>
            <div class="form-group">
                <label for="">Address</label>
                <textarea  cols="2" rows="3" class="form-control" name="address"></textarea>              
            </div>
           <div class="form-group">
               <label for="">Department</label>
               <select name="dep_id" class="form-control" id="dep_id">
                   <option value="">selected Option</option>
                   @foreach ($deps as $dep)
                   <option value="{{$dep->id}}">{{$dep->name}}</option>
                   @endforeach                   
               </select>
           </div>
           <div class="form-group">
                <select name="position_id" class="form-control" id="position">
                </select>
           </div>    
            <div class="form-group">
                <label for="">Photo</label><br>
                <input type="file"  name="photo">
            </div>            
            <div class="d-flex">              
                <button type="submit" class="btn btn-primary ml-2">Confirm</button>
            </div>
          </form>

        </div>
    </div>
</div>
@endsection
@section('scripts')

{!! JsValidator::formRequest('App\Http\Requests\UserStore','#create') !!}
<script>
    $(document).ready(function() {
            $('#dep_id').on('change', function() {
               let dep_id = $(this).val();
               if(dep_id) {
                   $.ajax({
                       url: '/position/'+dep_id,
                       type: "GET",
                       data : {"_token":"{{ csrf_token() }}"},
                       dataType: "json",
                       success:function(data)                       
                       {
                        
                         if(data){
                            $('#position').empty();
                            $('#position').append('<option hidden>Choose Position</option>');
                            $.each(data, function(key , position){
                                $('#position').append('<option value="'+ position.id +'">' + position.name + '</option>');
                            });
                        }else{
                            $('#position').empty();
                        }
                     }
                   });
               }else{
                 $('#position').empty();
               }
            });
            });
        </script>
@endsection