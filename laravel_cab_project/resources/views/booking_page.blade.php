<x-header title="Booking Page"></x-header>

@php
    $form = [
                ['lable'=>'Name', 'type'=>'text', 'name'=>'name'],
                ['lable'=>'Email', 'type'=>'email', 'name'=>'email'],
                ['lable'=>'Mobile', 'type'=>'number', 'name'=>'mobile'],
                ['lable'=>'Pickup', 'type'=>'text', 'name'=>'pickup'],
                ['lable'=>'Drop', 'type'=>'text', 'name'=>'drop'],
            ];
@endphp

<section class="bg-info bg-gradient py-2" style="margin-top: 80px;">
    <div class="container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                <li class="breadcrumb-item">Booking Page</li>
            </ol>
        </nav>
    </div>    
</section>

<section class="py-4">
    <div class="container">
        <div class="row">
            <!-- <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-info">
                        <h5 class="text-center text-uppercase text-danger">contact and pickup detail</h5>
                    </div>
                    <div class="cord-body p-3">
                        @php($i=0)
                        @foreach($form as $row)
                            <div class="row g-3 align-items-center @if($i>0) mt-3 @endif()">
                                <div class="col-md-2">
                                    <label for="inputPassword6" class="col-form-label text-dark fw-bold">{{$row['lable']}} :</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="{{$row['type']}}" id="inputPassword6" name="{{$row['name']}}" class="form-control w-100" aria-describedby="passwordHelpInline">
                                </div>
                            </div>
                            @php($i++)
                        @endforeach()
                    </div>
                </div>
            </div> -->
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header bg-info">
                        <h5 class="text-center text-uppercase text-danger">cab Detail</h5>
                    </div>
                    <div class="card-body">
                        <p><span class="fw-bold me-3">Itinerary :</span> {{$from_city}} > {{$to_city}}</p>
                        <p><span class="fw-bold me-3">Pickup Date :</span> {{$time_date}}</p>
                        <p><span class="fw-bold me-3">Car Type :</span> {{$cab_name}}</p>
                        <p><span class="fw-bold me-3">KMs Included : </span> {{$distance}}</p>
                        <p><span class="fw-bold me-3">Total Fare :</span> {{$amount}}</p>
                    </div>
                    <div class="card-footer"><button class="btn btn-success btn-sm w-100">Book Now</button></div>
                </div>
            </div>
        </div>        
    </div>
</section>






<x-footer></x-footer>