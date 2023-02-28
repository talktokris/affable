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
                <div class="col-12 col-sm-4">
                    <div class="mb-2 row">
                        <label for="inputPassword" class="col-4 col-sm-4 col-form-label top-lebel">User ID : </label>
                        <div class="col-8 col-sm-8">
                            <input type="text" class="form-control top-input" id="inputPassword" value="{{ $userInfo['userID'] }}">
                        </div>
                    </div>

                </div>
                <!-- three end -->
            </div>
            <div class="row">
                <!-- one start -->
                <div class="col-12 col-sm-4">
                    <div class="mb-2 row">
                        <label for="inputPassword" class="col-4 col-sm-4 col-form-label top-lebel">Total User : </label>
                        <div class="col-8 col-sm-8">
                            <input type="text" class="form-control top-input" id="inputPassword" value="{{ $userInfo['totalUser'] }}">
                        </div>
                    </div>
                    <div class=" mb-2 row">
                        <label for="inputPassword" class="col-4 col-sm-4 col-form-label top-lebel">Total Matic :
                        </label>
                        <div class="col-8 col-sm-8">
                            <input type="text" class="form-control top-input" id="inputPassword" value="{{ $userInfo['totalMatic'] }}">
                        </div>
                    </div>
                </div>
                <!-- one end -->


                <!-- two start -->
                <div class="col-12 col-sm-4">
                    <div class="mb-2 row">
                        <label for="inputPassword" class="col-4 col-sm-4 col-form-label top-lebel">Reff Link : </label>
                        <div class="col-8 col-sm-8">
                            <input type="text" class="form-control top-input" id="inputPassword"
                                value="{{ $userInfo['reffLink'] }}">
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="inputPassword" class="col-4 col-sm-4 col-form-label top-lebel">Wallet : </label>
                        <div class="col-8 col-sm-8">
                            <input type="text" class="form-control top-input" id="inputPassword" value="{{ $userInfo['wallet'] }}">
                        </div>
                    </div>
                </div>
                <!-- two end -->


                <!-- three start -->
                <div class="col-12 col-sm-4">
                    <div class="mb-2 row">
                        <label for="inputPassword" class="col-4 col-sm-4 col-form-label top-lebel">Upline ID : </label>
                        <div class="col-8 col-sm-8">
                            <input type="text" class="form-control top-input" id="inputPassword" value="{{ $userInfo['uplineID'] }}">
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="inputPassword" class="col-4 col-sm-4 col-form-label top-lebel">Matic : </label>
                        <div class="col-8 col-sm-8">
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