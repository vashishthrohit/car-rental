<div id="banner_form" >
        <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="card" style="background-color: #ffffff9c">
                  <ul class="nav nav-pills ms-auto me-auto" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                      <button class="nav-link custom-nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">One Way</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link custom-nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Round Trip</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link custom-nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Local</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link custom-nav-link" id="pills-airport-tab" data-bs-toggle="pill" data-bs-target="#pills-airport" type="button" role="tab" aria-controls="pills-airport" aria-selected="false">Airport</button>
                    </li>
                  </ul>
                  <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                      <!-- Form First -->
                      <form class="p-3" method="" action="{{url('search-package')}}">
                            <div class="row mb-3">
                              <div class="col-md-3 autocomplete">
                                  <label for="exampleInputEmail1" class="form-label fw-bold" style="margin-bottom:-12px;">From </label>
                                  @csrf
                                  <input  type="hidden" name="category_id" value="1">
                                  <input type="text" name="from_city" id="autocomplete" class="form-control-sm border-0 w-100 custom-form-input autocomplete" placeholder="Type countries here"/>
                              </div>
                              <div class="col-md-3"> 
                                <label for="exampleInputEmail1" class="form-label fw-bold" style="margin-bottom:-12px;">To :</label>
                                <input type="text" name="to_city" id="autocomplete" class="form-control-sm border-0 w-100 custom-form-input autocomplete" placeholder="Type countries here"/>
                              </div>
                              <div class="col-md-3">
                                <label for="exampleInputEmail1" class="form-label fw-bold" style="margin-bottom:-12px;">Date :</label>
                                <input type="date" name="date"  class="form-control-sm border-0 w-100 custom-form-input" id="exampleInputEmail1" aria-describedby="emailHelp" min="<?php echo date(
                                    'Y-m-d'
                                ); ?>" value="<?=date('Y-m-d')?>"> 
                              </div>
                              <div class="col-md-3">
                                <label for="exampleInputEmail1" class="form-label fw-bold" style="margin-bottom:-12px;">Pickup At :</label>
                                <select class="form-select form-select-sm w-100" aria-label="Default select example" name="time">
                                  <option value="">--Select time--</option>
                                  <option selected value="7:00 AM">7:00 AM</option>
                                  <option value="7:15 AM">7:15 AM</option>
                                  <option value="7:30 AM">7:30 AM</option>
                                  <option value="7:45 AM">7:45 AM</option>
                                  <option value="8:00 AM">8:00 AM</option>
                                  <option value="8:15 AM">8:15 AM</option>
                                  <option value="8:30 AM">8:30 AM</option>
                                  <option value="8:45 AM">8:45 AM</option>
                                  <option value="9:00 AM">9:00 AM</option>
                                  <option value="9:15 AM">9:15 AM</option>
                                  <option value="9:30 AM">9:30 AM</option>
                                  <option value="9:45 AM">9:45 AM</option>
                                  <option value="10:00 AM">10:00 AM</option>
                                  <option value="10:15 AM">10:15 AM</option>
                                  <option value="10:30 AM">10:30 AM</option>
                                  <option value="10:45 AM">10:45 AM</option>
                                  <option value="11:00 AM">11:00 AM</option>
                                  <option value="11:15 AM">10:15 AM</option>
                                  <option value="11:30 AM">11:30 AM</option>
                                  <option value="11:45 AM">11:45 AM</option>
                                  <option value="12:00 AM">12:00 AM</option>
                                </select>
                              </div>
                            </div>
                            <div class="text-center"> 
                              <button type="submit" class="btn btn-sm btn-custom">Submit</button>
                            </div>
                      </form>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <form class="p-3" method="" action="{{url('search-package')}}">
                              <div class="row mb-3">
                                  <div class="col-md-3">
                                      <label for="exampleInputEmail1" class="form-label fw-bold" style="margin-bottom:-12px;">From :</label>
                                      @csrf
                                      <input  type="hidden" name="category_id" value="2">
                                      <input type="text" name="from_city" id="autocomplete" class="form-control custom-form-input autocomplete" placeholder="Type countries here"/>
                                  </div>
                                  <div class="col-md-3"> 
                                    <label for="exampleInputEmail1" class="form-label fw-bold" style="margin-bottom:-12px;">To :</label>
                                    <input type="text" name="to_city" id="autocomplete" class="form-control custom-form-input autocomplete" placeholder="Type countries here"/>
                                  </div>
                                  <div class="col-md-2">
                                    <label for="exampleInputEmail1" class="form-label fw-bold" style="margin-bottom:-12px;">Pickup :</label>
                                    <input type="date" name="date"  class="form-control custom-form-input" id="exampleInputEmail1" aria-describedby="emailHelp" min="<?php echo date(
                                        'Y-m-d'
                                    ); ?>" value="<?=date('Y-m-d')?>"> 
                                  </div>
                                  <div class="col-md-2">
                                    <label for="exampleInputEmail1" class="form-label fw-bold" style="margin-bottom:-12px;">Return :</label>
                                    <input type="date" name="date"  class="form-control custom-form-input" id="exampleInputEmail1" aria-describedby="emailHelp" min="<?php echo date(
                                        'Y-m-d'
                                    ); ?>" value="<?=date('Y-m-d')?>"> 
                                  </div>
                                  <div class="col-md-2">
                                    <label for="exampleInputEmail1" class="form-label fw-bold" style="margin-bottom:-12px;">Pickup At :</label>
                                    <select class="form-select" aria-label="Default select example" name="time">
                                      <option value="">--Select time--</option>
                                      <option selected value="7:00 AM">7:00 AM</option>
                                      <option value="7:15 AM">7:15 AM</option>
                                      <option value="7:30 AM">7:30 AM</option>
                                      <option value="7:45 AM">7:45 AM</option>
                                      <option value="8:00 AM">8:00 AM</option>
                                      <option value="8:15 AM">8:15 AM</option>
                                      <option value="8:30 AM">8:30 AM</option>
                                      <option value="8:45 AM">8:45 AM</option>
                                      <option value="9:00 AM">9:00 AM</option>
                                      <option value="9:15 AM">9:15 AM</option>
                                      <option value="9:30 AM">9:30 AM</option>
                                      <option value="9:45 AM">9:45 AM</option>
                                      <option value="10:00 AM">10:00 AM</option>
                                      <option value="10:15 AM">10:15 AM</option>
                                      <option value="10:30 AM">10:30 AM</option>
                                      <option value="10:45 AM">10:45 AM</option>
                                      <option value="11:00 AM">11:00 AM</option>
                                      <option value="11:15 AM">10:15 AM</option>
                                      <option value="11:30 AM">11:30 AM</option>
                                      <option value="11:45 AM">11:45 AM</option>
                                      <option value="12:00 AM">12:00 AM</option>
                                    </select>
                                  </div>                            
                              </div>
                              <div class="text-center">
                                <button type="submit" class="btn btn-sm btn-custom">Submit</button>
                              </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                          <form class="p-3" method="" action="{{url('search-package')}}">
                              <div class="row mb-3">
                                  <div class="col-md-4">
                                      <label for="exampleInputEmail1" class="form-label fw-bold" style="margin-bottom:-12px;">City :</label>
                                      @csrf
                                      <input  type="hidden" name="category_id" value="3">
                                      <input type="text" name="from_city" id="autocomplete" class="form-control custom-form-input autocomplete" placeholder="Type countries here"/>
                                  </div>
                                  <div class="col-md-4">
                                    <label for="exampleInputEmail1" class="form-label fw-bold" style="margin-bottom:-12px;">Pickup :</label>
                                    <input type="date" name="date"  class="form-control custom-form-input" id="exampleInputEmail1" aria-describedby="emailHelp" min="<?php echo date(
                                        'Y-m-d'
                                    ); ?>" value="<?=date('Y-m-d')?>"> 
                                  </div>                                 
                                  <div class="col-md-4">
                                    <label for="exampleInputEmail1" class="form-label fw-bold" style="margin-bottom: -12px;">Pickup At :</label>
                                    <select class="form-select" aria-label="Default select example" name="time">
                                      <option value="">--Select time--</option>
                                      <option selected value="7:00 AM">7:00 AM</option>
                                      <option value="7:15 AM">7:15 AM</option>
                                      <option value="7:30 AM">7:30 AM</option>
                                      <option value="7:45 AM">7:45 AM</option>
                                      <option value="8:00 AM">8:00 AM</option>
                                      <option value="8:15 AM">8:15 AM</option>
                                      <option value="8:30 AM">8:30 AM</option>
                                      <option value="8:45 AM">8:45 AM</option>
                                      <option value="9:00 AM">9:00 AM</option>
                                      <option value="9:15 AM">9:15 AM</option>
                                      <option value="9:30 AM">9:30 AM</option>
                                      <option value="9:45 AM">9:45 AM</option>
                                      <option value="10:00 AM">10:00 AM</option>
                                      <option value="10:15 AM">10:15 AM</option>
                                      <option value="10:30 AM">10:30 AM</option>
                                      <option value="10:45 AM">10:45 AM</option>
                                      <option value="11:00 AM">11:00 AM</option>
                                      <option value="11:15 AM">10:15 AM</option>
                                      <option value="11:30 AM">11:30 AM</option>
                                      <option value="11:45 AM">11:45 AM</option>
                                      <option value="12:00 AM">12:00 AM</option>
                                    </select>
                                  </div>                            
                              </div>
                              <div class="text-center">
                                <button type="submit" class="btn btn-sm btn-custom">Submit</button>
                              </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="pills-airport" role="tabpanel" aria-labelledby="pills-airport-tab">
                      <form class="p-3" method="" action="{{url('search-package')}}">
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <label for="exampleInputEmail1" class="form-label fw-bold" style="margin-bottom:-12px;">From :</label>
                                    @csrf
                                    <input  type="hidden" name="category_id" value="2">
                                    <input type="text" name="from_city" id="autocomplete" class="form-control custom-form-input autocomplete" placeholder="Type countries here"/>
                                </div>
                                <div class="col-md-3"> 
                                  <label for="exampleInputEmail1" class="form-label fw-bold" style="margin-bottom:-12px;">To :</label>
                                  <input type="text" name="to_city" id="autocomplete" class="form-control custom-form-input autocomplete" placeholder="Type countries here"/>
                                </div>
                                <div class="col-md-2">
                                  <label for="exampleInputEmail1" class="form-label fw-bold" style="margin-bottom:-12px;">Pickup :</label>
                                  <input type="date" name="date"  class="form-control custom-form-input" id="exampleInputEmail1" aria-describedby="emailHelp" min="<?php echo date(
                                      'Y-m-d'
                                  ); ?>" value="<?=date('Y-m-d')?>"> 
                                </div>
                                <div class="col-md-2">
                                  <label for="exampleInputEmail1" class="form-label fw-bold" style="margin-bottom:-12px;">Return :</label>
                                  <input type="date" name="date"  class="form-control custom-form-input" id="exampleInputEmail1" aria-describedby="emailHelp" min="<?php echo date(
                                      'Y-m-d'
                                  ); ?>" value="<?=date('Y-m-d')?>"> 
                                </div>
                                <div class="col-md-2">
                                  <label for="exampleInputEmail1" class="form-label fw-bold" style="margin-bottom:-12px;">Pickup At :</label>
                                  <select class="form-select" aria-label="Default select example" name="time">
                                    <option value="">--Select time--</option>
                                    <option selected value="7:00 AM">7:00 AM</option>
                                    <option value="7:15 AM">7:15 AM</option>
                                    <option value="7:30 AM">7:30 AM</option>
                                    <option value="7:45 AM">7:45 AM</option>
                                    <option value="8:00 AM">8:00 AM</option>
                                    <option value="8:15 AM">8:15 AM</option>
                                    <option value="8:30 AM">8:30 AM</option>
                                    <option value="8:45 AM">8:45 AM</option>
                                    <option value="9:00 AM">9:00 AM</option>
                                    <option value="9:15 AM">9:15 AM</option>
                                    <option value="9:30 AM">9:30 AM</option>
                                    <option value="9:45 AM">9:45 AM</option>
                                    <option value="10:00 AM">10:00 AM</option>
                                    <option value="10:15 AM">10:15 AM</option>
                                    <option value="10:30 AM">10:30 AM</option>
                                    <option value="10:45 AM">10:45 AM</option>
                                    <option value="11:00 AM">11:00 AM</option>
                                    <option value="11:15 AM">10:15 AM</option>
                                    <option value="11:30 AM">11:30 AM</option>
                                    <option value="11:45 AM">11:45 AM</option>
                                    <option value="12:00 AM">12:00 AM</option>
                                  </select>
                                </div>                            
                            </div>
                            <div class="text-center">
                              <button type="submit" class="btn btn-sm btn-custom">Submit</button>
                            </div>
                      </form>
                    </div>
                  </div>                                     
                </div>    
              </div>
            </div>
        </div>
    </div>