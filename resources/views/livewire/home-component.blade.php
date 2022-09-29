<div>
    <div 
    id="carouselExampleCaptions"
    class="carousel slide"
    data-bs-ride="carousel" data-aos="fade-right"
    data-aos-duration="2000">
    <div class="carousel-indicators">
        <button
            type="button"
            data-bs-target="#carouselExampleCaptions"
            data-bs-slide-to="0"
            class="active"
            aria-current="true"
            aria-label="Slide 1"></button>
        <button
            type="button"
            data-bs-target="#carouselExampleCaptions"
            data-bs-slide-to="1"
            aria-label="Slide 2"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img
                src="assets/images/mega_accessories_2.jpg"
                class="d-block w-100"
                alt="..."
                />
            <div class="carousel-caption bg-black d-none d-md-block">
                <h5>First slide label</h5>
                <p>
                    Some representative placeholder content for the
                    first
                    slide.
                </p>
            </div>
        </div>
        <div class="carousel-item">
            <img
                src="assets/images/mega_accessories_3.jpg"
                class="d-block w-100"
                alt="..."
                />
            <div class="carousel-caption bg-black d-none d-md-block">
                <h5>Third slide label</h5>
                <p>
                    Some representative placeholder content for the
                    third
                    slide.
                </p>
            </div>
        </div>
    </div>
    <button
        class="carousel-control-prev"
        type="button"
        data-bs-target="#carouselExampleCaptions"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button
        class="carousel-control-next"
        type="button"
        data-bs-target="#carouselExampleCaptions"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
    </div>
    
    <!-- our services section -->
    <div class="container py-2" id="service">
    <h1 class="text-center py-3" data-aos="fade-left"
        data-aos-duration="2000" style="color: rgb(175, 146, 73);">
        <strong>Our Services</strong>
        <hr />
    </h1>
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 mb-4
            text-white" data-aos="fade-right" data-aos-duration="2000">
            <div class="text-center photo-logo">
                <i class="fa fa-camera fa-2x"></i>
            </div>
            <h3 class="text-center"><strong>Photography</strong></h3>
            <p class="text-center">
                Lorem ipsum, dolor sit amet consectetur adipisicing
                elit.
                Expedita doloremque alias sed culpa possimus suscipit
                quam
                reiciendis dicta rerum necessitatibus pariatur,
                veritatis,
                recusandae ullam facere mollitia libero similique ab
                maxime?
            </p>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 mb-4
            text-white" data-aos="fade-down" data-aos-duration="2000">
            <div class="text-center photo-logo">
                <i class="fa fa-video-camera fa-2x"></i>
            </div>
            <h3 class="text-center"><strong>Videography</strong></h3>
            <p class="text-center">
                Lorem ipsum, dolor sit amet consectetur adipisicing
                elit.
                Expedita doloremque alias sed culpa possimus suscipit
                quam
                reiciendis dicta rerum necessitatibus pariatur,
                veritatis,
                recusandae ullam facere mollitia libero similique ab
                maxime?
            </p>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 mb-4
            text-white" data-aos="fade-left" data-aos-duration="2000">
            <div class="text-center photo-logo">
                <i class="fa fa-users fa-2x"></i>
            </div>
            <h3 class="text-center"><strong>Event Coverage</strong></h3>
            <p class="text-center">
                Lorem ipsum, dolor sit amet consectetur adipisicing
                elit.
                Expedita doloremque alias sed culpa possimus suscipit
                quam
                reiciendis dicta rerum necessitatibus pariatur,
                veritatis,
                recusandae ullam facere mollitia libero similique ab
                maxime?
            </p>
        </div>
    </div>
    <hr />
    </div>
    
    <!-- photo Galleries -->
    <div class="container py-2">
    <h1 class="text-center py-3" data-aos="fade-right"
        data-aos-duration="2000" style="color: rgb(175, 146, 73);">
        <strong>Photo Galleries</strong>
        <hr />
    </h1>
    <div class="row">
    
        <img data-aos="zoom-in" data-aos-duration="2000"
            src="assets/images/CollageFrame_1663154036129.png" alt="">
        <img data-aos="flip-down" data-aos-duration="2000"
            src="assets/images/CollageFrame_1663268087476.png" alt="">
    </div>
    <hr />
    </div>
    
    <!-- our collection -->
    <div class="container py-2">
    <h1 class="text-center py-3" data-aos="fade-left"
        data-aos-duration="2000" style="color: rgb(175, 146, 73);">
        <strong>Our Collections</strong>
        <hr />
    </h1>

    <!-- <span class="float-left"><a href="">More Galleries</a></span> -->
    <div class="row">
        <a href="" class="text-end" style="text-decoration: none; color:
            rgb(175, 146, 73);">More
            Galleries <i class="fa fa-angle-double-right"></i></a>
        <div class="col" data-aos="fade-left" data-aos-duration="2000">
            <div class="owl-carousel property-carousel owl-theme">
               @foreach ($photos as $photo)
                    <div class="card" >
                        <a href="{{route('view-photo-details',$photo->slug)}}">
                            <img src="{{asset('storage/cover-photos/'.$photo->main_image)}}" alt="image"  />
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div><hr>
    </div>
</div>
@push('scripts')
<script>
    $('.property-carousel').owlCarousel({
           loop:true,
           margin:10,
           nav:true,
           responsive:{
               0:{
                   items:1
               },
               600:{
                   items:3
               },
               1000:{
                   items:3
               }
           }
       })
      
              </script>
           <script>
                   function scrollToTop(){
           window.scrollTo(0,0);
       }
              </script>
           
           <script>
               AOS.init();
             </script>
@endpush
