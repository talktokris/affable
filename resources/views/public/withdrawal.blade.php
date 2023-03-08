@extends('public.layouts.master')
@section('title','Home')

@section('contents')


  
    <!-- Start Hero Area -->
    <section class="hero-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-12">
                    <div class="row">

                        <div class="col-lg-12 col-md-6 col-12">
                            <!-- Start Small Banner -->
                            <div class="row" style="margin-left:3px; margin-right:3px;">
                                <div class="col-12 col-sm-12 heading">
                                    <span>MAKE WITHDRAWAL</span>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 widthdrawal-area">
                
                                <form>
                                    <div class="mb-20 row" style="margin-top:20px;">
                                        <label for="inputPassword" class="col-6 col-sm-6 col-form-label top-lebel">Balance Amount : </label>
                                        <div class="col-6 col-sm-6">
                                            <input type="text" class="form-control top-input disabled" id="balance-amount" value="{{ $userInfo['matic'] }}">
                                        </div>
                                    </div>
                                    <div class="mb-20 row">
                                        <div id="error-div" >
                                        </div>
                                        <div>
                                            <p class="withNote">Note : Min withdrawal amount should be <?php echo $userInfo['minWithAmount']; ?></p>
                                        </div>

                                        <label for="inputPassword" class="col-6 col-sm-6 col-form-label top-lebel">Withdrawal Amount  :
                                        </label>
                                        <div class="col-6 col-sm-6">
                                            <input type="text" class="form-control top-input " id="withdrawal-amount" onkeyup="withdrawal(<?php echo $userInfo['reDisPer'] ;?>,<?php echo $userInfo['minWithAmount'] ;?>);" value="0">
                                        </div>
                                    </div>

                                    <div class="mb-20 row">
                                        <label for="inputPassword" class="col-6 col-sm-6 col-form-label top-lebel">Cashout Amount :
                                        </label>
                                        <div class="col-6 col-sm-6">
                                            <input type="text" class="form-control top-input disabled" id="cashout-amount" value="0">
                                        </div>
                                    </div>

                                    <div class="mb-20 row">
                                        <label for="inputPassword" class="col-6 col-sm-6 col-form-label top-lebel">Distribution  Amount:
                                        </label>
                                        <div class="col-6 col-sm-6">
                                            <input type="text" class="form-control top-input disabled" id="redistribution-amount" value="0">
                                        </div>
                                    </div>
                          
                                    <div class=" mb-10 row">
                                        <label for="inputPassword" class="col-6 col-sm-4 col-form-label top-lebel">
                                        </label>
                                        <div class="col-6 col-sm-8">
                                            <input type="submit" class="buttonWith" id="withdrawal-btn" value="Withdraw">
                                        </div>
                                    
                                    </div>
                                </form>
                            </div>
                            <!-- Start Small Banner -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-12">
                    <div class="row">

                        <div class="col-lg-12 col-md-6 col-12">
                            <!-- Start Small Banner -->
                            <div class="row" style="margin-left:3px; margin-right:3px;">
                                <div class="col-12 col-sm-12 heading">
                                    <span>WITHDRAWALY</span>
                                </div>
                            </div>
                            <div class="table-bg">

                                <div class="table-responsive">
                                    <table class="table table-dark">

                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Amount</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Transaction Hash</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>123</td>
                                                <td>123456</td>
                                                <td>21/01/2023</td>
                                                <td>0xdac17f958d2ee523a2206206994597c13d831ec70xdac17f958d2ee523a2 </td>
                                            </tr>
                                            <tr>
                                                <td>123</td>
                                                <td>123456</td>
                                                <td>21/01/2023</td>
                                                <td>0xdac17f958d2ee523a2206206994597c13d831ec70xdac17f958d2ee523a2 </td>
                                            </tr>
                                            <tr>
                                                <td>123</td>
                                                <td>123456</td>
                                                <td>21/01/2023</td>
                                                <td>0xdac17f958d2ee523a2206206994597c13d831ec70xdac17f958d2ee523a2 </td>
                                            </tr>

                                            <tr>
                                                <td>123</td>
                                                <td>123456</td>
                                                <td>21/01/2023</td>
                                                <td>0xdac17f958d2ee523a2206206994597c13d831ec70xdac17f958d2ee523a2 </td>
                                            </tr>
                                            <tr>
                                                <td>123</td>
                                                <td>123456</td>
                                                <td>21/01/2023</td>
                                                <td>0xdac17f958d2ee523a2206206994597c13d831ec70xdac17f958d2ee523a2 </td>
                                            </tr>
                                            <tr>
                                                <td>123</td>
                                                <td>123456</td>
                                                <td>21/01/2023</td>
                                                <td>0xdac17f958d2ee523a2206206994597c13d831ec70xdac17f958d2ee523a2 </td>
                                            </tr>

                                            <tr>
                                                <td>123</td>
                                                <td>123456</td>
                                                <td>21/01/2023</td>
                                                <td>0xdac17f958d2ee523a2206206994597c13d831ec70xdac17f958d2ee523a2 </td>
                                            </tr>
                                            <tr>
                                                <td>123</td>
                                                <td>123456</td>
                                                <td>21/01/2023</td>
                                                <td>0xdac17f958d2ee523a2206206994597c13d831ec70xdac17f958d2ee523a2 </td>
                                            </tr>
                                            <tr>
                                                <td>123</td>
                                                <td>123456</td>
                                                <td>21/01/2023</td>
                                                <td>0xdac17f958d2ee523a2206206994597c13d831ec70xdac17f958d2ee523a2 </td>
                                            </tr>

                                            <tr>
                                                <td>123</td>
                                                <td>123456</td>
                                                <td>21/01/2023</td>
                                                <td>0xdac17f958d2ee523a2206206994597c13d831ec70xdac17f958d2ee523a2 </td>
                                            </tr>
                                            <tr>
                                                <td>123</td>
                                                <td>123456</td>
                                                <td>21/01/2023</td>
                                                <td>0xdac17f958d2ee523a2206206994597c13d831ec70xdac17f958d2ee523a2 </td>
                                            </tr>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- Start Small Banner -->
                        </div>
                    </div>
                </div>

            </div>
    </section>
    <!-- End Hero Area -->


    @endsection


