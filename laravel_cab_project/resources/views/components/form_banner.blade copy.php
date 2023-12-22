<div style="display: flex; justify-content: center; height: 550px; align-items: center;">
        <div class="container" style="z-index: 100; position: absolute;">
            <div class="row">
              <div class="col-md-12">
                <div class="card" style="box-shadow: 0px 1px 11px 0px rgb(26 166 218); background-color: #fff9;">
                    <div class="d-flex justify-content-center">
                      <button class="tablink" onclick="openPage('Oneway', this)" id="defaultOpen">ONE WAY</button>
                      <button class="tablink" onclick="openPage('roundtrip', this)" >ROUND TRIP</button>
                      <button class="tablink" onclick="openPage('local', this)">LOCAL</button>
                      <button class="tablink" onclick="openPage('airport', this)">AIRPORT</button>
                    </div>
                    <div id="Oneway" class="tabcontent">
                      <form class="p-3">
                            <div class="row mb-3">
                              <div class="col-md-3">
                                <label for="exampleInputEmail1" class="form-label" style="margin-bottom:-12px;">From :</label>
                              </div>
                              <div class="col-md-9">
                                <input type="email" class="form-control custom-form-input" id="exampleInputEmail1" aria-describedby="emailHelp">                                      
                              </div>
                            </div>
                            <div class="row mb-3">
                              <div class="col-md-3">
                                <label for="exampleInputEmail1" class="form-label" style="margin-bottom:-12px;">To :</label>
                              </div>
                              <div class="col-md-9">
                                <input type="email" class="form-control custom-form-input" id="exampleInputEmail1" aria-describedby="emailHelp">                                      
                              </div>
                            </div>
                            <div class="row mb-3">
                              <div class="col-md-3">
                                <label for="exampleInputEmail1" class="form-label" style="margin-bottom:-12px;">Date :</label>
                              </div>
                              <div class="col-md-9">
                                <input type="date" class="form-control custom-form-input" id="exampleInputEmail1" aria-describedby="emailHelp" min="<?php echo date(
                                    'Y-m-d'
                                ); ?>">                                                       
                              </div>
                            </div>
                            <div class="row mb-3">
                              <div class="col-md-3">
                                <label for="exampleInputEmail1" class="form-label" style="margin-bottom:-12px;">Pickup At :</label>
                              </div>
                              <div class="col-md-9">
                                <!-- <input type="time" class="form-control custom-form-input" id="exampleInputEmail1" aria-describedby="emailHelp">                                       -->
                                <input type="time" class="timepicker">
                              </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                      </form>                      
                    </div>

                    <div id="roundtrip" class="tabcontent">
                      <form class="p-3">
                            <div class="row mb-3">
                              <div class="col-md-3">
                                <label for="exampleInputEmail1" class="form-label" style="margin-bottom:-12px;">From :</label>
                              </div>
                              <div class="col-md-9">
                                <input type="email" class="form-control custom-form-input" id="exampleInputEmail1" aria-describedby="emailHelp">                                      
                              </div>                          
                            </div>
                            <div class="row mb-3">
                              <div class="col-md-3">
                                <label for="exampleInputEmail1" class="form-label" style="margin-bottom:-12px;">To :</label>
                              </div>
                              <div class="col-md-9">
                                <input type="email" class="form-control custom-form-input" id="exampleInputEmail1" aria-describedby="emailHelp">                                      
                              </div>                          
                            </div>
                            <div class="row mb-3">
                              <div class="col-md-3">
                                <label for="exampleInputEmail1" class="form-label" style="margin-bottom:-12px;">Picup :</label>
                              </div>
                              <div class="col-md-9">
                                <input type="date" class="form-control custom-form-input" id="exampleInputEmail1" aria-describedby="emailHelp" min="<?php echo date(
                                    'Y-m-d'
                                ); ?>">                                      
                              </div>                          
                            </div>
                            <div class="row mb-3">
                              <div class="col-md-3">
                                <label for="exampleInputEmail1" class="form-label" style="margin-bottom:-12px;">Return :</label>
                              </div>
                              <div class="col-md-9">
                                <input type="date" class="form-control custom-form-input" id="exampleInputEmail1" aria-describedby="emailHelp" min="<?php echo date(
                                    'Y-m-d'
                                ); ?>">                                      
                              </div>                          
                            </div>
                            <div class="row mb-3">
                              <div class="col-md-3">
                                <label for="exampleInputEmail1" class="form-label" style="margin-bottom:-12px;">Pickup At :</label>
                              </div>
                              <div class="col-md-9">
                                <input type="time" class="form-control custom-form-input" id="exampleInputEmail1" aria-describedby="emailHelp">                                      
                              </div>                          
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                      </form>  
                    </div>

                    <div id="local" class="tabcontent">
                      <form class="p-3">
                            <div class="row mb-3">
                              <div class="col-md-3">
                                <label for="exampleInputEmail1" class="form-label" style="margin-bottom:-12px;">City :</label>
                              </div>
                              <div class="col-md-9">
                                <input type="email" class="form-control custom-form-input" id="exampleInputEmail1" aria-describedby="emailHelp">                                      
                              </div>                          
                            </div>                         
                            <div class="row mb-3">
                              <div class="col-md-3">
                                <label for="exampleInputEmail1" class="form-label" style="margin-bottom:-12px;">Picup :</label>
                              </div>
                              <div class="col-md-9">
                                <input type="date" class="form-control custom-form-input" id="exampleInputEmail1" aria-describedby="emailHelp" min="<?php echo date(
                                    'Y-m-d'
                                ); ?>">                                      
                              </div>                          
                            </div>                           
                            <div class="row mb-3">
                              <div class="col-md-3">
                                <label for="exampleInputEmail1" class="form-label" style="margin-bottom:-12px;">Pickup At :</label>
                              </div>
                              <div class="col-md-9">
                                <input type="time" class="form-control custom-form-input" id="exampleInputEmail1" aria-describedby="emailHelp">                                      
                              </div>                          
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                      </form> 
                    </div>

                    <div id="airport" class="tabcontent">
                      <form class="p-3">
                            <div class="row mb-3">
                              <div class="col-md-3">
                                <label for="exampleInputEmail1" class="form-label" style="margin-bottom:-12px;">City :</label>
                              </div>
                              <div class="col-md-9">
                                <input type="email" class="form-control custom-form-input" id="exampleInputEmail1" aria-describedby="emailHelp">                                      
                              </div>                          
                            </div>                         
                            <div class="row mb-3">
                              <div class="col-md-3">
                                <label for="exampleInputEmail1" class="form-label" style="margin-bottom:-12px;">Picup :</label>
                              </div>
                              <div class="col-md-9">
                                <input type="date" class="form-control custom-form-input" id="exampleInputEmail1" aria-describedby="emailHelp" min="<?php echo date(
                                    'Y-m-d'
                                ); ?>">                                      
                              </div>                          
                            </div>                           
                            <div class="row mb-3">
                              <div class="col-md-3">
                                <label for="exampleInputEmail1" class="form-label" style="margin-bottom:-12px;">Pickup At :</label>
                              </div>
                              <div class="col-md-9">
                                <input type="time" class="form-control custom-form-input" id="exampleInputEmail1" aria-describedby="emailHelp">                                      
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