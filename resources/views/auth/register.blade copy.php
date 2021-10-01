<!doctype html>
<html lang="en">
 <head>
 <!-- Required meta tags -->
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">

 <!-- CoreUI CSS -->
 <link rel="stylesheet" href="/css/coreui/styles.css" crossorigin="anonymous">
 <link rel="stylesheet" href="https://unpkg.com/@coreui/icons@2.0.0-beta.3/css/free.min.css">
 <link rel="stylesheet" href="https://unpkg.com/@coreui/icons@2.0.0-beta.3/css/brand.min.css">
 <link rel="stylesheet" href="https://unpkg.com/@coreui/icons@2.0.0-beta.3/css/flag.min.css">

 <title>Registration</title>
 </head>
 <body class="c-app flex-row align-items-center">
   <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card mx-4">
            <div class="card-body p-4">
                <h1>Register</h1>
                <p class="text-muted">Create your account</p>
                <form action="{{ route('register') }}" method="POST">
                  @csrf
                  <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="cil-energy"></i>
                        </span>
                      </div>
                      <input class="form-control" type="text" placeholder="Enter Username" name="username" required>
                      @error('username')  
                        <div>
                          <span class="text-danger mt-1">{{$message}}</span>
                        </div>
                      @enderror
                  </div>
                  <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="cil-energy"></i>
                        </span>
                      </div>
                      <input class="form-control" type="email" placeholder="Enter Email" name="email" required>
                      @error('email')  
                        <div>
                          <span class="text-danger mt-1">{{$message}}</span>
                        </div>
                      @enderror
                  </div>
                  <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="cil-energy"></i>
                        </span>
                      </div>
                      <input class="form-control" type="password" name="password" placeholder="Enter Password">
                      @error('password')
                        <div>
                          <span class="text-danger mt-1">{{$message}}</span>
                        </div>  
                      @enderror
                  </div>
                  <div class="input-group mb-4">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="cil-energy"></i>
                        </span>
                      </div>
                      <input class="form-control" type="password" name="password_confirmation" placeholder="Confirm password" required>
                  </div>
                  <div class="input-group mb-4">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="cil-energy"></i>
                      </span>
                    </div>
                    <select name="user_type" id="user_type" class="custom-select" required>
                      <option value="">--- select type of user ---</option>
                      <option value="institution">Institution</option>
                      <option value="trainer">Trainer</option>
                    </select>
                      @error('user_type')  
                        <div>
                          <span class="text-danger mt-1">{{$message}}</span>
                        </div>
                      @enderror
                  </div>
                  <button class="btn btn-block btn-success" type="submit">Create Account</button>
                </form>
            </div>
            <div class="card-footer">
                <div class="row">
                  <div class="col-12 p-4  d-flex justify-content-center">
                    <p>Already have an account ?</p>
                    <a href="/login" class="text-primary pl-2 align-items-center"><span>Login</span> <i class="cil-arrow-right"></i></a>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
      </div>

 <!-- Optional JavaScript -->
 <!-- Popper.js first, then CoreUI JS -->
 <script src="/js/coreui/coreui.bundle.min.js"></script>
 </body>
</html>