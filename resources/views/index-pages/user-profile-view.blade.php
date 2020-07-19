@extends('front-layout.master')
@section('content')
<div id="page">
    <div class="columns-container">
        <div id="columns" class="container">
            <div class="row" style="padding-top: 20px;">

                <div id="center_column" class="center_column col-xs-12 col-sm-12 col-md-12">
                    <h1 id="cart_title" class="page-heading"> Your Profile <span class="heading-counter">

                            <style>
                                /* Style The Dropdown Button */
                                .dropbtn {
                                    background-color: #00CDCD;
                                    color: white;
                                    padding: 16px;
                                    font-size: 16px;
                                    border: none;
                                    cursor: pointer;
                                    margin-top: -20px;
                                }

                                /* The container <div> - needed to position the dropdown content */
                                .dropdown {
                                    position: relative;
                                    display: inline-block;
                                }

                                /* Dropdown Content (Hidden by Default) */
                                .dropdown-content {
                                    display: none;
                                    position: absolute;
                                    min-width: 160px;
                                    background-color: #f9f9f9;
                                    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                                    z-index: 1;
                                }

                                /* Links inside the dropdown */
                                .dropdown-content a {
                                    color: black;
                                    padding: 12px 16px;
                                    text-decoration: none;
                                    display: block;
                                }

                                /* Change color of dropdown links on hover */
                                .dropdown-content a:hover {background-color: #f2f2f2}

                                /* Show the dropdown menu on hover */
                                .dropdown:hover .dropdown-content {
                                    display: block;
                                }

                                /* Change the background color of the dropdown button when the dropdown content is shown */
                                .dropdown:hover .dropbtn {
                                    background-color: #3e8e41;
                                }
                            </style>







                            Welcome  : <span id="summary_products_quantity" style="padding-right: 20px;">{{Auth::user()->name}}</span>

                            <div class="dropdown">
                                <button class="dropbtn">Profile <i class="fa fa-arrow-down"></i></button>
                                <div class="dropdown-content">
                                    <a href="{{url('customer-profile/view')}}">View Profile</a>
                                    <a href="{{url('customer-profile/edit')}}">Edit Profile</a>
                                </div>
                            </div>

                        </span></h1>


                    <div class="row">

                        <div class="container">
                            <form class="form-horizontal" method="post" action="{{url('customer-profile/save')}}">
                                <fieldset>
                                    <input id="textinput" name="id"  value="{{Auth::user()->id}}" type="hidden" placeholder="trade show name" class="form-control input-md">
                                    <!-- Form Name -->
                                    <!-- Text input-->
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="textinput">Full Name</label>  
                                        <div class="col-md-4">
                                            <input id="textinput" name="name"  value="{{Auth::user()->name}}" type="text" placeholder="trade show name" class="form-control input-md">

                                        </div>
                                    </div>
                                    {{csrf_field()}}
                                    <!-- Text input-->
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="textinput">Email Address</label>  
                                        <div class="col-md-4">
                                            <input id="textinput" value="{{Auth::user()->email}}" name="email" type="text" placeholder="date attended" class="form-control input-md">

                                        </div>
                                    </div>

                                    <!-- Text input-->
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="textinput">Password</label>  
                                        <div class="col-md-4">
                                            <input id="textinput" name="password" type="text" placeholder="Type New Password" class="form-control input-md">
                                            <code>Type New Password if You Want To Change</code>
                                        </div>
                                    </div>

                                    

                                    <!-- Button -->
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="singlebutton"></label>
                                        <div class="col-md-4">
                                            <button id="singlebutton" type="submit" name="save" class="btn btn-primary">Update Info</button>
                                        </div>
                                    </div>

                                </fieldset>
                            </form>

                        </div>

                    </div>



                    <div class="col-md-12 text-center">
                        <p class="cart_navigation">
                            <a href="{{url('user-dashboard')}}" class="button-exclusive btn btn-default" title="Continue shopping"> <i class="icon-chevron-left"></i>Continue Dashboard </a>
                        </p>
                    </div>




                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@include('front-include.titleseo')
@include('front-include.index_js')
