<div id="banner_form" >
        <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="card" style="background-color: #0000007a;">
                  <ul class="nav nav-pills mb-3 ms-auto me-auto" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                      <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">One Way</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Round Trip</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Local</button>
                    </li>
                  </ul>
                  <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                      <!-- Form First -->
                      <form class="p-3" method="" action="{{url('search-package')}}">
                            <div class="row mb-3">
                              <div class="col-md-3 autocomplete">
                                  <label for="exampleInputEmail1" class="form-label" style="margin-bottom:-12px;">From :</label>
                                  @csrf
                                  <input  type="hidden" name="category_id" value="1">
                                  <input type="text" name="from_city" id="autocomplete" class="form-control custom-form-input autocomplete" placeholder="Type countries here"/>
                              </div>
                              <div class="col-md-3"> 
                                <label for="exampleInputEmail1" class="form-label" style="margin-bottom:-12px;">To :</label>
                                <input type="text" name="to_city" id="autocomplete" class="form-control custom-form-input autocomplete" placeholder="Type countries here"/>
                              </div>
                              <div class="col-md-3">
                                <label for="exampleInputEmail1" class="form-label" style="margin-bottom:-12px;">Date :</label>
                                <input type="date" name="date"  class="form-control custom-form-input" id="exampleInputEmail1" aria-describedby="emailHelp" min="<?php echo date(
                                    'Y-m-d'
                                ); ?>" value="<?=date('Y-m-d')?>"> 
                              </div>
                              <div class="col-md-3">
                                <label for="exampleInputEmail1" class="form-label" style="margin-bottom:-12px;">Pickup At :</label>
                                <input type="text" name="time" class="timepicker">
                              </div>                            
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <form class="p-3" method="" action="{{url('search-package')}}">
                              <div class="row mb-3">
                                  <div class="col-md-3">
                                      <label for="exampleInputEmail1" class="form-label" style="margin-bottom:-12px;">From :</label>
                                      @csrf
                                      <input  type="hidden" name="category_id" value="2">
                                      <input type="text" name="from_city" id="autocomplete" class="form-control custom-form-input autocomplete" placeholder="Type countries here"/>
                                  </div>
                                  <div class="col-md-3"> 
                                    <label for="exampleInputEmail1" class="form-label" style="margin-bottom:-12px;">To :</label>
                                    <input type="text" name="to_city" id="autocomplete" class="form-control custom-form-input autocomplete" placeholder="Type countries here"/>
                                  </div>
                                  <div class="col-md-2">
                                    <label for="exampleInputEmail1" class="form-label" style="margin-bottom:-12px;">Pickup :</label>
                                    <input type="date" name="date"  class="form-control custom-form-input" id="exampleInputEmail1" aria-describedby="emailHelp" min="<?php echo date(
                                        'Y-m-d'
                                    ); ?>" value="<?=date('Y-m-d')?>"> 
                                  </div>
                                  <div class="col-md-2">
                                    <label for="exampleInputEmail1" class="form-label" style="margin-bottom:-12px;">Return :</label>
                                    <input type="date" name="date"  class="form-control custom-form-input" id="exampleInputEmail1" aria-describedby="emailHelp" min="<?php echo date(
                                        'Y-m-d'
                                    ); ?>" value="<?=date('Y-m-d')?>"> 
                                  </div>
                                  <div class="col-md-2">
                                    <label for="exampleInputEmail1" class="form-label" style="margin-bottom:-12px;">Pickup At :</label>
                                    <input type="text" name="time" class="timepicker">
                                  </div>                            
                              </div>
                              <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                          <form class="p-3" method="" action="{{url('search-package')}}">
                              <div class="row mb-3">
                                  <div class="col">
                                      <label for="exampleInputEmail1" class="form-label" style="margin-bottom:-12px;">City :</label>
                                      @csrf
                                      <input  type="hidden" name="category_id" value="3">
                                      <input type="text" name="from_city" id="autocomplete" class="form-control custom-form-input autocomplete" placeholder="Type countries here"/>
                                  </div>
                                  <div class="col">
                                    <label for="exampleInputEmail1" class="form-label" style="margin-bottom:-12px;">Pickup :</label>
                                    <input type="date" name="date"  class="form-control custom-form-input" id="exampleInputEmail1" aria-describedby="emailHelp" min="<?php echo date(
                                        'Y-m-d'
                                    ); ?>" value="<?=date('Y-m-d')?>"> 
                                  </div>                                 
                                  <div class="col">
                                    <label for="exampleInputEmail1" class="form-label">Pickup At :</label>
                                    <input type="text" name="time" class="timepicker w-100">
                                  </div>                            
                              </div>
                              <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                  </div>                                     
                </div>    
              </div>
            </div>
        </div>
    </div>