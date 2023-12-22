@section('title')
 <title>Login</title>
 @endsection
 <x-dashboard_head_link></x-dashboard_head_link> 

   <section class="register-form">
       <div class="inner-registration-form">
           <div style="display: flex; justify-content: center; margin-top: -75px;">
                <img src="assets/images/user/user.png" style="border-radius: 100px; border-top: 5px solid blue;
                    width: 80px;"/>
           </div>
          
           <form action="{{url('submit-login')}}" method="post">
                @csrf
                <div class="mb-3">
                    <input type="email" name="email" id="email" class="form-control is-email"  placeholder="Enter Email">
                    @if($errors->has('email'))
                        <div class="text-danger email-valid-text">{{$errors->first('email')}}</div>
                    @endif
                </div>
                
                <div class="mb-3">
                    <input type="password" name="password" id="password" class="form-control is-password"  placeholder="password">
                    @if($errors->has('password'))
                        <div class="text-danger email-valid-text">{{$errors->first('password')}}</div>
                    @endif                    
                </div>
                
                <div class="mb-3 d-flex justify-content-center submit_btn">
                    <button type="submit" class="btn btn-primary btn-sm">Sign up</button>
                </div>
                    <!-- <P class="text-center">If you already account click Login</P> -->
                 <div id="preloader" class="mt-3 d-flex justify-content-center d-none">
                    <i class="fa fa-refresh fa-spin h3"></i>
                 </div>
                 <!-- <div class="alert alert-danger" role="alert"> -->
                  
                </div>
            </form>
       </div>
   </section>

<x-dashboard_foot_link></x-dashboard_foot_link>


