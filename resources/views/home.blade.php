@extends('layouts.master') 

@section('title')
    welcome!
@endsection

@section('content')
@include('includes.message-block')
<div class="container">
   <div class="row justify-content-center">
        <div class="col-md-6">
            <h3>Sing Up</h3>
            <form action="{{ route('signup') }}" method="post">
                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                   <label for="email">Your E-Mail</label>
                   <input  class="form-control" type="text" name="email" id="email" value="{{ Request::old('email') }}"> 
                </div>

                <div class="form-group {{ $errors->has('first-name') ? 'has-error' : '' }}">
                    <label for="first_name">Your First Name</label>
                    <input  class="form-control" type="text" name="first_name" id="first_name" value="{{ Request::old('first_name') }}"> 
                 </div>

                 <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                    <label for="password">Your Password</label>
                    <input  class="form-control" type="password" name="password" id="password" value="{{ Request::old('password') }}"> 
                 </div>
            
                 <button type="submit" class="btn btn-primary"> Submit </button>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
             </form>
        </div>
    

     <div class="col-md-6">
         <h3>Sing In</h3>
        <form action="{{ route('signin') }}" method="post">
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
               <label for="email">Your E-Mail</label>
               <input  class="form-control" type="text" name="email" id="email" value="{{ Request::old('email') }}"> 
            </div>

            

             <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                <label for="password">Your Password</label>
                <input  class="form-control" type="password" name="password" id="password" value="{{ Request::old('password') }}"> 
             </div>
             <button type="submit" class="btn btn-primary"> Submit </button>
             <input type="hidden" name="_token" value="{{ Session::token() }}">
        </form>
     </div> 
   </div>
</div>
@endsection