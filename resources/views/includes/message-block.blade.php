@if (count($errors) > 0)
<div class="row">
   <center>
   <div class="col-md-6 col-md-offset-3 error">
      <ul>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
       </ul> 
    </div>
   </center>
 </div>
@endif
@if (Session::has('message'))
<div class="row">
   <center>
    <div class="col-md-6 col-md-offset-3 success">
       {{Session::get('message')}}
     </div>
   </center>
  </div>
@endif