<!-- header top start -->
<div class="container-fluid header-top">
    <div class="row">
        <div class="col-sm-3 justify-content-center" style="text-align:center;">
            <div class="logo-img justify-content-center">
                <a class="navbar" href="index.html">
                    <img src="assets/images/logo/logo.png" alt="Logo">
                </a>
            </div>
        </div>
        <div class="col-sm-9 align-self-end">
            <div class="row justify-content-end">
                <!-- three start -->
                <div class="col-12 col-sm-3">
                    <div class="mb-2 row">
                        <label for="inputPassword" class="col-4 col-sm-5 col-form-label top-lebel">User ID : </label>
                        <div class="col-8 col-sm-7">
                            <input type="text" class="form-control top-input" id="inputPassword" value="{{ $userInfo['userID'] }}">
                        </div>
                    </div>

                </div>
                <!-- three end -->
            </div>
            <div class="row">
                <!-- one start -->
                <div class="col-12 col-sm-3">
                    <div class="mb-2 row">
                        <label for="inputPassword" class="col-4 col-sm-5 col-form-label top-lebel">Total User : </label>
                        <div class="col-8 col-sm-7">
                            <input type="text" class="form-control top-input" id="inputPassword" value="{{ $userInfo['totalUser'] }}">
                        </div>
                    </div>
                    <div class=" mb-2 row">
                        <label for="inputPassword" class="col-4 col-sm-5 col-form-label top-lebel">Total Matic :
                        </label>
                        <div class="col-8 col-sm-7">
                            <input type="text" class="form-control top-input" id="inputPassword" value="{{ $userInfo['totalMatic'] }}">
                        </div>
                    </div>
                </div>
                <!-- one end -->


                <!-- two start -->
                <div class="col-12 col-sm-6">
                    <div class="mb-2 row">
                        <label for="inputPassword" class="col-4 col-sm-3 col-form-label top-lebel">Reff Link : </label>
                    
                          <div class="col-8 col-sm-9">

                            <div class="input-group">
                              
                                <input type="text" class="form-control top-input" id="reff-link-value" name="reff-link-value" value="{{ $userInfo['reffLink'] }}">
                                <div class="input-group-append"  id="reffLinkDiv4">
                                  <button class="input-group-text icon-btn" onclick="reffCopy();" data-bs-toggle="tooltip" data-bs-placement="right" title="Copy"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard-check-fill" viewBox="0 0 16 16">
                                    <path d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3Zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3Z"/>
                                    <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5v-1Zm6.854 7.354-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708.708Z"/>
                                  </svg></button>
                                </div>
                              </div>


                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="inputPassword" class="col-4 col-sm-3 col-form-label top-lebel">Wallet : </label>
                        <div class="col-8 col-sm-9">

                            <div class="input-group">
                              
                                <input type="text" class="form-control top-input" id="wallet-address" name="wallet-address" value="{{ $userInfo['wallet'] }}">
                                <div class="input-group-append">
                                  <button class="input-group-text icon-btn" onclick="walletCopy();" data-bs-toggle="tooltipOne" data-bs-placement="right" title="Copy"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard-check-fill" viewBox="0 0 16 16">
                                    <path d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3Zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3Z"/>
                                    <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5v-1Zm6.854 7.354-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708.708Z"/>
                                  </svg></button>
                                  
                                </div>
                              </div>


                        </div>
                    </div>
                </div>
                <!-- two end -->


                <!-- three start -->
                <div class="col-12 col-sm-3">
                    <div class="mb-2 row">
                        <label for="inputPassword" class="col-4 col-sm-5 col-form-label top-lebel">Upline ID : </label>
                        <div class="col-8 col-sm-7">
                            <input type="text" class="form-control top-input" id="inputPassword" value="{{ $userInfo['uplineID'] }}">
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="inputPassword" class="col-4 col-sm-5 col-form-label top-lebel">Balance : </label>
                        <div class="col-8 col-sm-7">
                            <input type="text" class="form-control top-input" id="inputPassword" value="{{ $userInfo['matic'] }}">
                        </div>
                    </div>
                </div>
                <!-- three end -->
            </div>
        </div>
    </div>
</div>
<!-- header top end -->



<?php /*
<div class="header-middle" style="background-color: #081828;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-3 col-7">
                <!-- Start Header Logo -->
                <a class="navbar" href="index.html">
                    <img src="assets/images/logo/logo-white.png" alt="Logo">
                </a>
                <!-- End Header Logo -->
            </div>

            <div class="col-lg-3 col-md-2 col-5">
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-4 col-form-label">Total User</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="inputPassword">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-4 col-form-label">Total Matic</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="inputPassword">
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-2 col-5">
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-4 col-form-label">Reff Link</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="inputPassword">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-4 col-form-label">Wallet</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="inputPassword">
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-2 col-5">
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-4 col-form-label">User ID</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="inputPassword">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-4 col-form-label">Upline ID</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="inputPassword">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-4 col-form-label">Matic</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="inputPassword">
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>

*/?>