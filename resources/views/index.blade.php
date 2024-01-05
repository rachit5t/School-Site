@extends("layout")

@section('content')
<!-- Slider  -->
<div class="container" style="width: 100vw;">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
            @php
            $count = 1;
            @endphp
            @foreach ( $row as $key=>$d)
            @if ($d->active == "true")
            @php
                $path = "images/".$d->photo;
                
            @endphp
            
            @if ($count == 1)
            <div class="carousel-item active">
                    <img class="d-block w-100" src="{{asset($path)}}" alt="First slide">
                </div>
            @else
            <div class="carousel-item">
                    <img class="d-block w-100" src="{{asset($path)}}" alt="First slide">
                </div>
            @endif
                
                @php
                $count = $count + 1;
                @endphp
                @endif
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <!-- End Slider -->


    <!-- Notice message-->
    <div class="noticeContainer">
        <div class="title">
            Notice
        </div>
    
        <div class="message">
            Yesto vyo re
        </div>
    </div>
    <!-- End of notice -->


    <!-- Section Cards -->
    <div class="quotes">
        <h1>विद्याधनं सर्वधनप्रधानम् ||</h1>
        <p>हाम्रो विधालय विगत १० बर्ष देखि सैछिक क्षेत्र मा योगदान दिंदै आएको छ र हाम्रो पहिचान भनेको नै रामो सैछिक बतावारड र नतिजा हो चेतना भया</p>     
    </div>


    <div class="cardContainer">

        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="{{asset('img/test.jpg')}}" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">शिक्षा</h5>
                <p class="card-text">एका देश को कथा हो रामु बाख्रा हेर्न गएको थियो तर बाख्रा नभेटे पछि गोरु हेर्न गयो | </p>
                <a href="/services" class="btn btn-primary">थप जानकारी</a>
            </div>
        </div>


        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="{{asset('img/test.jpg')}}" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">शिक्षक</h5>
                <p class="card-text">एका देश को कथा हो रामु बाख्रा हेर्न गएको थियो तर बाख्रा नभेटे पछि गोरु हेर्न गयो | </p>
                <a href="teacher" class="btn btn-primary">थप जानकारी</a>
            </div>
        </div>


        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="{{asset('img/test.jpg')}}" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">कक्षा तालिका</h5>
                <p class="card-text">एका देश को कथा हो रामु बाख्रा हेर्न गएको थियो तर बाख्रा नभेटे पछि गोरु हेर्न गयो | </p>
                <a href="classSchedule" class="btn btn-primary">थप जानकारी</a>
            </div>
        </div>
    </div>
    <!-- End of cards -->

    <!-- Notice Container -->
    <div class="notice"> 
    <div class="noticeHeader">
        <h1>सूचनाहरु</h1>
    </div>

    <div class="notices">
          <x-noticeReader renderAll="false"/>
          
    </div>
</div>
    <!-- End of notice container -->

@endsection