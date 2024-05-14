@extends('blademaster.blademaster')
@section('content')
    
<div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card p-3 bg-info">
            <h2 class="text-center mb-4" >Login Form</h2>
            <form>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1">
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary w-25">Submit</button>  
              </div>
              
            </form>
        </div>
        
      </div>
    </div>
  </div>

@endsection