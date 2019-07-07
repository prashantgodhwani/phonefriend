@extends('layouts.other')

@section('content')
    <div class="site-content" tabindex="-1">
        <div class="container">


            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <article class="post-2508 page type-page status-publish hentry" id="post-2508">
                        <div itemprop="mainContentOfPage" class="entry-content">
                            <div class="map" style="width: 100vw; position: relative; margin-left: -50vw; left: 50%; margin-bottom: 3em;" id="mapView">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3490.383741794929!2d79.39370831452194!3d28.975997675204592!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39a07fecc6c00001%3A0x880ce2f610138e5c!2sSTN+Infotech+Pvt.+Ltd.!5e0!3m2!1sen!2sin!4v1521388976594" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                            </div>
                            <div class="vc_row-full-width vc_clearfix"></div>
                            <div class="vc_row wpb_row vc_row-fluid">
                                <div class="contact-form wpb_column vc_column_container vc_col-sm-9 col-sm-9">
                                    <div class="vc_column-inner ">
                                        <div class="wpb_wrapper">
                                            <div class="wpb_text_column wpb_content_element ">
                                                <div class="wpb_wrapper">
                                                    <h2 class="contact-page-title">Leave us a Message</h2>
                                                </div>
                                            </div>
                                            <div lang="en-US" dir="ltr" id="wpcf7-f2507-p2508-o1" class="wpcf7" role="form">
                                                <div class="screen-reader-response"></div>
                                                <form class="wpcf7-form" method="post" action="{{route('contact')}}">
                                                    {{csrf_field()}}
                                                    @include('layouts.error')
                                                    @include('layouts.success')
                                                    <div class="form-group row">
                                                        <div class="col-xs-12 col-md-6">
                                                            <label>First name*</label><br>
                                                            <span class="wpcf7-form-control-wrap first-name"><input type="text" aria-invalid="false" aria-required="true" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required input-text" size="40" value="" name="fname"></span>
                                                        </div>
                                                        <div class="col-xs-12 col-md-6">
                                                            <label>Last name*</label><br>
                                                            <span class="wpcf7-form-control-wrap last-name"><input type="text" aria-invalid="false" aria-required="true" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required input-text" size="40" value="" name="lname"></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Phone</label><br>
                                                        <span class="wpcf7-form-control-wrap subject"><input type="text" aria-invalid="false" class="wpcf7-form-control wpcf7-text input-text" size="40" value="" name="phone"></span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Subject</label><br>
                                                        <span class="wpcf7-form-control-wrap subject"><input type="text" aria-invalid="false" class="wpcf7-form-control wpcf7-text input-text" size="40" value="" name="subject"></span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Your Message</label><br>
                                                        <span class="wpcf7-form-control-wrap your-message"><textarea aria-invalid="false" class="wpcf7-form-control wpcf7-textarea" rows="10" cols="40" name="message"></textarea></span>
                                                    </div>
                                                    <div class="form-group clearfix">

                                                        <p><input type="submit" value="Send Message"></p>

                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="store-info wpb_column vc_column_container vc_col-sm-3 col-sm-3">
                                    <div class="vc_column-inner ">
                                        <div class="wpb_wrapper">
                                            <div class="wpb_text_column wpb_content_element ">
                                                <div class="footer-call-us">
                                                    <div class="media">
                                                        <span class="media-left call-us-icon media-middle"><i class="ec ec-support"></i></span>
                                                        <div class="media-body">
                                                            <span class="call-us-text">Got Questions ? Call us 24/7!</span>
                                                            <span class="call-us-number">+91-8448444313</span>
                                                        </div>
                                                    </div>
                                                </div><!-- /.footer-call-us -->
                                                <li class="menu-box" style="margin-bottom: 13%;"><a target="_blank" href="https://www.tidio.com/talk/f8xkns3a5mgrctwnti65j0gmh93lffrh" style="font-weight: bold;     text-decoration: none;">Chat with us</a>
                                                    <i class="fa fa-chevron-right" style="float: right;"></i></li>
                                                <div class="wpb_wrapper">
                                                    <h2 class="contact-page-title">Our HQ's</h2>
                                                    <address><b>Phone Friend</b><br>
                                                        Plot No.6, Himgiri Enclave Chander Vihar, Near Tilak Nagar Metro Station, Nilothi Ext., New delhi - 110041<br>
                                                        India | CIN : U74999UR2018PTC008664<BR>
                                                        PAN : ABACS2219K | TAN : MRTS15190A<BR>
                                                        +91-8448444313 , +91 1204318432 | help@phonefriend.in
                                                    </address>
                                                    <h3>Merchant Enquiries</h3>
                                                    <p class="inner-right-md">If you’re interested in employment opportunities at Phone Friend, please email us: <a href="mailto:merchant@phonefriend.in">merchant@phonefriend.in</a></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                </main><!-- #main -->
            </div><!-- #primary -->
        </div><!-- .container -->
    </div><!-- #content -->
@endsection

@section('scripts')

    <script
            src="https://code.jquery.com/jquery-2.2.4.js"
    ></script>
@endsection




