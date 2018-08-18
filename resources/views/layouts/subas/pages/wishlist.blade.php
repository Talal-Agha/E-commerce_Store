@extends('layouts.subas.master')
@section('mainContent')
<!-- BREADCRUMBS SETCTION START -->
        <div class="breadcrumbs-section plr-200 mb-80">
            <div class="breadcrumbs overlay-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="breadcrumbs-inner">
                                <ul class="breadcrumb-list">
                                    <li><a href="index.html">Home</a></li>
                                    <li>Wishlist</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- BREADCRUMBS SETCTION END -->

        <!-- Start page content -->
        <section id="page-content" class="page-wrapper">

            <!-- SHOP SECTION START -->
            <div class="shop-section mb-80">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2">
                            <ul class="cart-tab">
                                <li>
                                    <a class="active" href="#shopping-cart">
                                        <span>01</span>
                                        Shopping cart
                                    </a>
                                </li>
                                <li>
                                    <a class="active" href="/mywishlist">
                                        <span>02</span>
                                        Wishlist
                                    </a>
                                </li>
                                <li>
                                    <a href="/checkout" >
                                        <span>03</span>
                                        Checkout
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <span>04</span>
                                        Order complete
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-10">
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <!-- wishlist start -->
                                <div class="tab-pane active" id="wishlist">
                                 <div class="wishlist-content">
                                        @if(!count($products))
                                         <center><h1>Your WishList is Empty.</h1></center>
                                        @else                                    
                                         @foreach($products as $recentProduct)
                                          @include('layouts.subas.elements.product-list-box-for-wishlist')  
                                         @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- SHOP SECTION END -->             

        </section>
        <!-- End page content -->
        @endsection
