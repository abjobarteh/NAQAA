@extends('layouts.auth')
@section('page-title','Registration')

@section('styles')
<link rel="stylesheet" href="/css/signup.css">
@endsection

@section('content')
<div class="container-fluid register h-100">
  <div class="row">
      <div class="col-md-3 register-left">
          <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt="" />
          <h3>Welcome</h3>
          <p>You are just a step from Onboarding to the NAQAA!</p>
          <a href="/login" class="btn rounded-pill px-5 bg-light">Login</a><br />
      </div>
      <div class="col-md-9 register-right">
          <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
              <li class="nav-item">
                  <a class="nav-link active" id="institution-tab" data-toggle="tab" href="#institution" role="tab" aria-controls="institution" aria-selected="true">Institution</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" id="trainer-tab" data-toggle="tab" href="#trainer" role="tab" aria-controls="trainer" aria-selected="false">Trainer</a>
              </li>
          </ul>
          <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="institution" role="tabpanel" aria-labelledby="institution-tab">
                  <h3 class="register-heading">Register as Institution</h3>
                  <form action="{{route('register')}}" method="post">
                    @csrf
                  <div class="row register-form">
                      <div class="col-md-6">
                          <div class="form-group">
                              <input type="text" class="form-control" placeholder="Enter username *" name="username" />
                              @error('username')  
                                <div>
                                  <span class="text-danger mt-1">{{$message}}</span>
                                </div>
                              @enderror
                          </div>
                          <div class="form-group">
                              <input type="text" class="form-control" placeholder="Institution Name *" name="institution_name" />
                              @error('institution_name')  
                                <div>
                                  <span class="text-danger mt-1">{{$message}}</span>
                                </div>
                              @enderror
                          </div>
                          <div class="form-group">
                              <input type="password" class="form-control" placeholder="Password *" name="password" />
                              @error('password')  
                                <div>
                                  <span class="text-danger mt-1">{{$message}}</span>
                                </div>
                              @enderror
                          </div>
                          <div class="form-group">
                              <input type="password" class="form-control" placeholder="Confirm Password *" name="password_confirmation" />
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <input type="email" class="form-control" placeholder="Institution Email *" name="email" />
                              @error('email')  
                                <div>
                                  <span class="text-danger mt-1">{{$message}}</span>
                                </div>
                              @enderror
                          </div>
                          <div class="form-group">
                              <input type="text" name="phone_number" class="form-control" placeholder="Contact Number *" />
                              @error('phone_number')  
                                <div>
                                  <span class="text-danger mt-1">{{$message}}</span>
                                </div>
                              @enderror
                          </div>
                          <div class="form-group">
                              <select class="form-control custom-select" name="classification">
                                  <option class="hidden" selected disabled>Please select institution classification</option>
                                  @foreach ($classifications as $id => $classification)
                                      <option value="{{$id}}">{{$classification}}</option>
                                  @endforeach
                              </select>
                              @error('classification')  
                                <div>
                                  <span class="text-danger mt-1">{{$message}}</span>
                                </div>
                              @enderror
                          </div>
                          <input type="hidden" name="user_type" value="institution">
                          <input type="submit" class="btnRegister" value="Register" />
                      </div>
                    </div>
                  </form>
              </div>
              <div class="tab-pane fade show" id="trainer" role="tabpanel" aria-labelledby="trainer-tab">
                  <h3 class="register-heading">Register as a Trainer</h3>
                  <form action="{{route('register')}}" method="post">
                    @csrf
                  <div class="row register-form">
                      <div class="col-md-6">
                          <div class="form-group">
                              <input type="text" class="form-control" placeholder="First Name *" name="firstname" />
                              @error('firstname')  
                                <div>
                                  <span class="text-danger mt-1">{{$message}}</span>
                                </div>
                              @enderror
                          </div>
                          <div class="form-group">
                              <input type="text" class="form-control" placeholder="Middle Name *" name="middlename" />
                              @error('middlename')  
                                <div>
                                  <span class="text-danger mt-1">{{$message}}</span>
                                </div>
                              @enderror
                          </div>
                          <div class="form-group">
                              <input type="text" class="form-control" placeholder="Last Name *" name="lastname" />
                              @error('lastname')  
                                <div>
                                  <span class="text-danger mt-1">{{$message}}</span>
                                </div>
                              @enderror
                          </div>
                          <div class="form-group">
                              <input type="email" class="form-control" placeholder="Email *" name="email" />
                              @error('email')  
                                <div>
                                  <span class="text-danger mt-1">{{$message}}</span>
                                </div>
                              @enderror
                          </div>
                          <div class="form-group">
                              <input type="text" class="form-control" placeholder="Phone Number *" name="trainer_phone_number" />
                              @error('trainer_phone_number')  
                                <div>
                                  <span class="text-danger mt-1">{{$message}}</span>
                                </div>
                              @enderror
                          </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <input type="text" class="form-control" placeholder="Enter username *" name="username" />
                          @error('username')  
                            <div>
                              <span class="text-danger mt-1">{{$message}}</span>
                            </div>
                          @enderror
                        </div>
                          <div class="form-group">
                              <input type="password" class="form-control" placeholder="Password *" value="" name="trainerpassword"/>
                              @error('trainerpassword')  
                                <div>
                                  <span class="text-danger mt-1">{{$message}}</span>
                                </div>
                              @enderror
                          </div>
                          <div class="form-group">
                              <input type="password" class="form-control" placeholder="Confirm Password *" name="trainerpassword_confirmation" />
                          </div>
                          <div class="form-group">
                              <select class="form-control custom-select" name="trainer_type">
                                  <option class="hidden" selected disabled>Please select trainer type</option>
                                  @foreach ($trainer_types as $type)
                                      <option value="{{$type->slug}}">{{$type->name}}</option>
                                  @endforeach
                              </select>
                              @error('trainer_type')  
                                <div>
                                  <span class="text-danger mt-1">{{$message}}</span>
                                </div>
                              @enderror
                          </div>
                          <input type="hidden" name="user_type" value="trainer">
                          <input type="submit" class="btnRegister" value="Register" />
                      </div>
                  </div>
                  </form>
              </div>
          </div>
      </div>
  </div>

</div>
@endsection