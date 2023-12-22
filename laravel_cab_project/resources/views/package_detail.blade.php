<x-header title="Package Details"></x-header>

<section class="bg-info bg-gradient py-2" style="margin-top:80px;">
    <div class="container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                <li class="breadcrumb-item">Package Detail</li>
            </ol>
        </nav>
    </div>
</section>

<section class="py-4 bg-light bg-gradient">
    <div class="container">       
        <div class="row mt-2">
            <div class="col-md-6">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">{{$from_city}}</li>
                        <li class="breadcrumb-item">{{$to_city}} ({{$category_name}})</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-3">
                <h6>Pickup At : {{$time}}</h5>
            </div>
            <div class="col-md-3">
                <h6>Date : {{date('d-m-Y', strtotime($date))}}</h5>
            </div>
        </div>
    </div>
</section>

<section class="py-4">
    <div class="container">
        <div class="row">
            @if(!empty($package_detail))
                @foreach($package_detail as $detail)
                <div class="col-md-4">
                    <form method="" action="{{url('booking-form')}}">
                        <input type="hidden" name="from_city" value="{{$from_city}}">
                        <input type="hidden" name="to_city" value="{{$to_city}} ({{$category_name}})">
                        <input type="hidden" name="time_date" value="{{date('d-m-Y', strtotime($date))}} At {{$time}}">
                        <input type="hidden" name="cab_name" value="{{$detail['cab_name']}}">
                        <input type="hidden" name="amount" value="{{$detail['total_amount']}}">
                        <input type="hidden" name="distance" value="{{$detail['distance']}}">
                        
                        <div class="listing d-block  align-items-stretch card">
                            <div class="listing-img h-100 mr-4">
                                <img src="{{url('storage/images/cab_detail_img/'.$detail['cab_image'])}}" alt="Image" class="img-fluid" style="height: 250px; width:100%;">
                            </div>
                            <div class="listing-contents h-100">
                                <h3>{{$detail['cab_name']}}</h3>
                                <div class="rent-price">
                                <strong><h5 class="text-info">Rs. {{$detail['total_amount']}}</h5></strong>                                </div>
                                <div class="d-block d-md-flex mb-3 border-bottom pb-3">
                                <div class="listing-feature pr-4">
                                    <span class="caption">Distance:</span>
                                    <span class="number">{{$detail['distance']}}</span>
                                </div>
                                <!-- <div class="listing-feature pr-4">
                                    <span class="caption">Doors:</span>
                                    <span class="number">4</span>
                                </div>
                                <div class="listing-feature pr-4">
                                    <span class="caption">Passenger:</span>
                                    <span class="number">4</span>
                                </div> -->
                                </div>
                                <div>
                                <p>{{$detail['cab_detail']}}</p>
                                <p>
                                    <button type="submit" class="btn btn-primary btn-sm">Select</button>
                                </p>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                
                    <!-- <div class="card my-3">
                        <div class="row">
                                <div class="col-md-5 d-flex justify-content-between border-secondary border-end">
                                    <div>
                                        <img src="{{url('storage/images/cab_detail_img/'.$detail['cab_image'])}}" style="width: 100px;"/>
                                    </div>
                                    <div>
                                        <h6>{{$detail['cab_name']}}</h6>
                                        <h6>{{$detail['cab_detail']}}</h6>
                                    </div>                        
                                </div>
                                <div class="col-md-5 d-flex justify-content-between border-secondary border-end">
                                    <div>
                                        <h6 class="text-success">Rs. <del>{{$detail['delete_amount']}}</del></h6>
                                        <h6 class="text-danger">Save {{$detail['save_amount']}}</h6>
                                    </div>
                                    <div>
                                        <h5 class="text-info">Rs. {{$detail['total_amount']}}</h5>
                                        <h6 class="text-dark">{{$detail['distance']}} Km</h6>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-primary">Select</button>
                                </div>
                            </form>
                        </div>
                    </div> -->
                @endforeach()
            @endif()
        </div>
    </div>
</section>

<x-footer></x-footer>