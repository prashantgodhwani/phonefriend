<style>

    .topnavnew {
        overflow: hidden;
        background-color: #e85561;
    }

    .topnavnew a {
        float: right;
        display: block;
        color: #f2f2f2;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        font-size: 17px;
    }

    .topnavnew a:hover {
        background-color: #ddd;
        color: black;
    }

    .topnavnew .icon {
        display: none;
    }

    @media screen and (max-width: 600px) {
        .topnavnew a:not(:first-child) {
            display: none;
        }

        .topnavnew a.icon {
            float: left;
            display: block;
        }
    }

    @media screen and (max-width: 600px) {
        a.restmenu {
            margin-top: 50px;
        }

        .topnavnew.responsive {
            position: relative;
        }

        .topnavnew.responsive .icon {
            position: absolute;
            left: 0;
            top: 0;
        }

        #mytopnavnew a.active {
            float: right;
        }

        .topnavnew.responsive a {
            float: none;
            display: block;
            text-align: left;
        }
    }

    .col-xs-4.someicons {
        text-align: center;
        padding: 5px;
        font-size: 10px;
    }
</style>

<div id="app">
    <ais-index
            app-id="Q5IYJ43XF9"
            api-key="eb9bda691044aed1d217db64608643dc"
            index-name="phones"
            @if($model)
            :query-parameters="{
    numericFilters:['units_rem != 0','sold != 2'],
    query : '{{$model}}'
}"
            @else
            :query-parameters="{
numericFilters:['units_rem != 0','sold != 2'],
}"
            @endif
    >




        <div id="content" class="site-content" tabindex="-1">
            <div class="container">

                <nav class="woocommerce-breadcrumb"><a href="https://phonefriend.in">Home</a><span class="delimiter"><i
                                class="fa fa-angle-right"></i></span>Smart Phones &amp; Tablets
                </nav>
                <div id="updateDiv">
                    <div id="primary" class="content-area">
                        <main id="main" class="site-main">

                            <header class="page-header">
                                <h1 class="page-title">Smart Phones &amp; Tablets</h1>
                                <p class="woocommerce-result-count">
                                    <ais-stats></ais-stats>
                                </p>
                            </header>

                            <div class="shop-control-bar">
                                <ul class="shop-view-switcher nav nav-tabs" role="tablist">
                                    <li class="nav-item"><a class="nav-link active" data-toggle="tab" title="Grid View"
                                                            href="#grid"><i class="fa fa-th"></i></a></li>
                                    @if(\Jenssegers\Agent\Facades\Agent::isMobile())
                                        <li class="nav-item"><a class="nav-link" data-toggle="modal"
                                                                data-target="#filters" title="Refine Results"><i
                                                        class="fa fa-filter"></i></a></li>
                                    @endif
                                </ul>


                                <form class="woocommerce-ordering" method="get" action="{{route('store.sort')}}">
                                    <ais-results-per-page-selector :options="[25, 50, 100]" :class-names="{
                            'ais-results-per-page-selector': 'orderby',
                        }"></ais-results-per-page-selector>
                                </form>
                            </div>

                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" aria-expanded="true">
                                    <ul class="products columns-3">
                                        <ais-results>
                                            <template scope="{ result }">


                                                <li class="product col-md-4">
                                                    <div class="product-outer">
                                                        <div class="product-inner highlight">
                                                            <span class="loop-product-categories"><a href="" rel="tag">Smartphones</a></span>

                                                            <a :href='result.url'>

                                                                <h3>
                                                                    <ais-highlight
                                                                            :class-names="{'ais-highlight': 'highlight'}"
                                                                            :result="result"
                                                                            attribute-name="company"></ais-highlight>
                                                                    <ais-highlight :result="result"
                                                                                   attribute-name="model"></ais-highlight>
                                                                    - @{{ result.storage }} GB
                                                                </h3>
                                                                <div class="product-thumbnail">

                                                                    <img :src="result.photo" alt=""
                                                                         class="img img-responsive">

                                                                </div>
                                                            </a>
                                                            <del><span class="amount amttt"><i class="fa fa-inr"></i> @{{ result.original_price }}</span>
                                                            </del>
                                                            <br>
                                                            <span class="onsale pad" style="background: #e85561;"
                                                                  data-toggle="tooltip" title="Price Marked Down"><i
                                                                        class="fa fa-check"
                                                                        style="color: white !important;"></i>&nbsp;@{{ result.discount }} % OFF</span><br>
                                                            <div class="price-add-to-cart">
                                                    <span class="price">
                                                        <span class="electro-price">

                                                            <ins><span class="amount pricee"><i class="fa fa-inr"></i> @{{ result.price }}</span></ins>




                                                        </span>
                                                    </span>

                                                            </div><!-- /.price-add-to-cart -->

                                                            <div class="hover-area" style=" display: block !important;
                                                padding-top: 0.214em !important;
                                                border-top: 1px solid #eaeaea !important;">
                                                                <div class="action-buttons buyn" onload="check();"
                                                                     :data-id="result.units">
                                                                    @if(Auth::check())
                                                                        @if(Auth::user()->role == 2)
                                                                            <a :href='result.buy_url'><b class="buynow"><i
                                                                                            class="fa fa-bolt"
                                                                                            aria-hidden="true"></i>
                                                                                    &nbsp; Buy Now</b></a>
                                                                        @endif
                                                                    @else
                                                                        <a :href='result.buy_url'><b class="buynow"><i
                                                                                        class="fa fa-bolt"
                                                                                        aria-hidden="true"></i>
                                                                                &nbsp; Buy Now</b></a>
                                                                    @endif

                                                                </div>
                                                            </div>
                                                        </div><!-- /.product-inner -->
                                                    </div><!-- /.product-outer -->
                                                </li>

                                            </template>
                                        </ais-results>
                                    </ul>
                                    <ais-no-results></ais-no-results>


                                </div>

                            </div>

                            <div class="shop-control-bar-bottom">
                                <p class="woocommerce-result-count">
                                    <ais-stats></ais-stats>
                                </p>
                                <nav class="woocommerce-pagination">

                                    <ais-pagination class="woocommerce-pagination" v-on:page-change="onPageChange"
                                                    :class-names="{
                    'ais-pagination': 'page-numbers',
                    'ais-pagination__item--active': 'page-numbers current',
                    'ais-pagination__item--disabled': 'disabled'

                }"></ais-pagination>

                                </nav>
                            </div>


                        </main><!-- #main -->
                        <div class="pull-right">
                            <ais-powered-by></ais-powered-by>
                        </div>
                    </div><!-- #primary -->
                </div>

                @include('layouts.sidebar')

            </div><!-- .container -->
        </div><!-- #content -->
        @if(\Jenssegers\Agent\Facades\Agent::isMobile())
            <div id="filters" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Refine Results</h4>
                        </div>
                        <div class="modal-body">
                            <aside class="widget woocommerce">
                                <h5 class="widget-title">Brands</h5>
                                <ul>
                                    <div class="companies" id="company">
                                        <ais-refinement-list attribute-name="company" :class-names="{
                            'ais-refinement-list__count': 'badge',
                            'ais-refinement-list__item': 'checkbox'
                        }">
                                        </ais-refinement-list>
                                    </div>
                                </ul>

                            </aside>
                            <hr>
                            <aside class="widget woocommerce">
                                <h5 class="widget-title">Storage</h5>
                                <ul>
                                    <div class="storages">
                                        <ais-refinement-list attribute-name="storage" :class-names="{
                    'ais-refinement-list__count': 'badge',
                    'ais-refinement-list__item': 'checkbox'
                }">
                                        </ais-refinement-list>
                                    </div>
                                </ul>

                            </aside>


                        </div>

                    </div>

                </div>
            </div>
        @endif
    </ais-index>

</div>
</div>
</div><!-- .container -->
@if(\Jenssegers\Agent\Facades\Agent::isMobile())
    <a class="nav-link" href="#" data-toggle="modal" data-target="#filters" title="Refine Results"
       style="color: white;">
        <div id="navbar" style="padding-top:3%;">

            <i class="fa fa-filter" style="color: white; font-size: 2em;"></i>&nbsp;&nbsp; Refine Results

        </div>
    </a>
@endif


<!-- <script src="{{ asset('js/app.js') }}"></script> -->
<script type="text/javascript" rel="script" src="{{asset('js/app.js')}}"></script>
<script>
    function onPageChange(page) {
        window.scrollTo(0, 0);
    }
</script>


<script>
    window.onload = function (e) {
        window.location.hash = '#main';
    }
    window.onscroll = function () {
        myFunction()
    };

    var navbar = document.getElementById("navbar");
    var sticky = navbar.offsetTop;

    function myFunction() {
        if (window.pageYOffset >= sticky) {
            navbar.classList.add("sticky")
        } else {
            navbar.classList.remove("sticky");
        }
    }

    function search() {
        window.location = 'https://phonefriend.in/store/' + document.getElementById('searchtxt').value.split(' ').join('-');
    }

    function searchh(e) {
        //See notes about 'which' and 'key'
        if (e.keyCode == 13) {
            window.location = 'https://phonefriend.in/store/' + document.getElementById('searchtxt').value.split(' ').join('-');

        }
    }

</script>

<div id="repairModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
    {{ csrf_field() }}
    <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Fill the form we will receive your phone for repair</h4>
            </div>
            {!! Form::open(array('url' => 'home/repair', 'method' => 'post','class'=>'row','name'=>'repairform','id'=>'repairform','file'=>true, 'enctype'=>"multipart/form-data" )) !!}
            <div class="modal-body col-md-12">
                <div class="form-group col-md-12">
                    <label>Enter Name:</label>
                    <input type="text" name="name" id="name" class="form-control"
                           style="border-radius: 5px;padding: 7px;">

                </div>
                <div class="form-group col-md-12">
                    <label>Enter Email:</label>
                    <input type="email" name="email" id="email" class="form-control"
                           style="border-radius: 5px;padding: 7px;">

                </div>
                <div class="form-group col-md-6">
                    <label>Select Location:</label>
                    <select id="city" class="form-control" name="city"
                            style="border-radius: 5px;padding: 7px;border: 1px solid #3333 !important;">
                        <option value="1">Delhi/NCR</option>
                        <option value="2">Bangalore</option>
                        <option value="3">Pune</option>
                        <option value="4">Chennai</option>
                        <option value="5">Hydrabad</option>
                        <option value="6">Mumbai</option>
                        <option value="7">Gurugram</option>
                        <option value="8">Ghaziabad</option>
                    </select>

                </div>
                <div class="form-group col-md-6">
                    <label>Enter Mobile No:</label>
                    <input type="number" name="mobile" id="mobile" class="form-control"
                           style="border-radius: 5px;padding: 7px;">

                </div>
                <div class="form-group col-md-12">
                    <label>Enter Description:</label>
                    <textarea class="form-control" name="description" id="description" style="    border: 1px solid #3333;
        border-radius: 5px;"></textarea>

                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Submit</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>

    </div>
</div>
<script>
    $(document).ready(function () {

        $("#repairform").submit(function () {
            if ($("#name").val() == '') {
                alert("Please enter name");
                return false;


            }
            if ($("#email").val() == '') {
                alert("Please enter email");
                return false;


            }

            if ($("#city").val() == '') {
                alert("Please select location");
                return false;


            }
            if ($("#city").val() != '1' && $("#city").val() != '8') {
                alert("Repair service is available for Delhi/NCR only");
                return false;


            }
            if ($("#mobile").val() == '') {
                alert("Please enter mobile no");
                return false;


            }
            if ($("#description").val() == '') {
                alert("Please enter description/issue");
                return false;


            } else {

                return true
            }


        });

    });

    function check() {
        alert("sd");

    }
</script>