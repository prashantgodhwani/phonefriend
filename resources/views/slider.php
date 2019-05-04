@extends('layouts.other')

@section('content')
    <link href="https://phonefriend.in/slider1/thumbs2.css" rel="stylesheet" />
    <link href="https://phonefriend.in/slider1/thumbnail-slider.css" rel="stylesheet" />
    <script src="https://phonefriend.in/slider1/thumbnail-slider.js" type="text/javascript"></script>


    <div>
        <div id="thumbnail-slider1">
            <div class="inner">
                <ul>
                    <li><h1>sdf</h1>
                        <img class="thumb" href="https://phonefriend.in/slider1/img/1.jpg">
                    </li>
                    <li><h1>sdf</h1>
                        <img class="thumb" href="https://phonefriend.in/slider1/img/1.jpg">
                    </li>
                    <li><h1>sdf</h1>
                         <img class="thumb" href="https://phonefriend.in/slider1/img/1.jpg">
                    </li>
                    <li><h1>sdf</h1>
                        <img class="thumb" href="https://phonefriend.in/slider1/img/1.jpg">
                    </li>
                    <li><h1>sdf</h1>
                         <img class="thumb" href="https://phonefriend.in/slider1/img/1.jpg">
                    </li>
                    <li><h1>sdf</h1>
                         <img class="thumb" href="https://phonefriend.in/slider1/img/1.jpg">
                    </li>
                    <li><h1>sdf</h1>
                        <img class="thumb" href="https://phonefriend.in/slider1/img/1.jpg">
                    </li>
                    <li><h1>sdf</h1>
 <img class="thumb" href="https://phonefriend.in/slider1/img/1.jpg">                    </li>
                    <li><h1>sdf</h1>
                         <img class="thumb" href="https://phonefriend.in/slider1/img/1.jpg">
                    </li>
                    <li><h1>sdf</h1>
                       <img class="thumb" href="https://phonefriend.in/slider1/img/1.jpg">
                    </li>
                    <li><h1>sdf</h1>
                        <img class="thumb" href="https://phonefriend.in/slider1/img/1.jpg">
                    </li>
                    
                </ul>
            </div>
        </div>
        
        <script>
            //Note: this script should be placed at the bottom of the page, or after the slider11 markup. It cannot be placed in the head section of the page.
            var thumbs1 = document.getElementById("thumbnail-slider");
            var thumbs2 = document.getElementById("thumbs2");
            var closeBtn = document.getElementById("closeBtn");
            var slides = thumbs1.getElementsByTagName("li");
            for (var i = 0; i < slides.length; i++) {
                slides[i].index = i;
                slides[i].onclick = function (e) {
                    var li = this;
                    var clickedEnlargeBtn = false;
                    if (e.offsetX > 220 && e.offsetY < 25) clickedEnlargeBtn = true;
                    if (li.className.indexOf("active") != -1 || clickedEnlargeBtn) {
                        thumbs2.style.display = "block";
                        mcThumbs2.init(li.index);
                    }
                };
            }

            thumbs2.onclick = closeBtn.onclick = function (e) {
                //This event will be triggered only when clicking the area outside the thumbs or clicking the CLOSE button
                thumbs2.style.display = "none";
            };
        </script>
    </div>
    <!--end-->
@endif
@endsection


@section('scripts')
@endsection