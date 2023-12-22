
<div class="container">
    <div id="section-header" class="section-header">
        <div class="sm-open-button">
            <a class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="openbtn1" checked>
            </a>
        </div>
        <div class="logo-header">
            <img src="assets/images/logo/logo.png" />
        </div>
        <div class="section-header1">
            <div class="box-1">
                <a class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="openbtn" checked>
                </a>
            </div>        
            <div class="box-2 ">
                <div class="bell-icon">
                    <i class="fa fa-bell"></i>
                </div>
                <div class="dropdown">
                    <div class="" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        <img width="50px" style="border-radius: 100px;" src="assets/images/user/user.png"/>
                    </div>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li><a class="dropdown-item" href="{{url('logout')}}">Log Out</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </div>
            </div>
        </div>
   </div>
</div>


<div id="mySidebar" class="sidebar">
    <a class="" href="{{url('loged_in')}}"><i class="fa fa-desktop" style="font-size:24px"></i> Dashboard</a>
    <a href="{{url('add-cities')}}"><i class="fa fa-taxi" style="font-size:24px"></i> Add Cities</a>
    <a href="{{url('add-package')}}"><i class="fa fa-taxi" style="font-size:24px"></i> Add Package</a>

    <!-- <a href="#"><i class="fa fa-tag" style="font-size:24px"></i>  Services</a>
    <a  id="dropdown-trigger" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample1" aria-expanded="false" aria-controls="collapseExample">
        Button  <i id="angle" class="fa fa-angle-right" style="font-size:24px"></i>
    </a>
        <div class="collapse " id="collapseExample1">
            <a href="#"> Clients</a>
            <a href="#"> Contact</a>
            <a href="#"> Clients</a>
            <a href="#"> Contact</a>
        </div>
    <a href="#"><i class="fa fa-tag" style="font-size:24px"></i>  Clients</a>
    <a href="#"><i class="fa fa-tag" style="font-size:24px"></i>  Contact</a>
    <a  id="" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
        Button  <i id="angle" class="fa fa-angle-right" style="font-size:24px"></i>
    </a>
        <div class="collapse " id="collapseExample">
            <a href="#"> Clients</a>
            <a href="#"> Contact</a>
            <a href="#"> Clients</a>
            <a href="#"> Contact</a>
        </div> -->

</div>

<div id="main" class="main_content_side">

