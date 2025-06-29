{{-- <section class="slider">
    <div class="container">
        <div class="columns is-justify-content-center">
            <div class="column is-9-desktop is-10-tablet">
				<div class="block has-text-centered">
					<span class="is-block mb-4 text-white is-capitalized">Small help can make change</span>
					<h1 class="mb-5">New hope for <br>near future</h1>
					<p class="mb-6">Your small contribution means a lot. Natus officia amet <br>accusamus repellat magni reprehenderit dolorem.</p>
					<a href="#" target="_blank" class="btn btn-main is-rounded">Donate Now</a>
				</div>
			</div>

   
        </div>
    </div>
</section> --}}

<section class="slider">
    <div class="container">
        <div class="slider-wrapper">
            <div class="hero-slider">
                @foreach ($sliders as $item)
                    <div class="slide-item has-text-centered">
                        <img src="{{(!empty($item->photo))?URL::to('storage/'.$item->photo):URL::to('image/no_image.png')}}" alt="Slide 1" class="slider-img" />
                        <span class="is-block mb-4 text-white is-capitalized">{{ $item->title }}</span>
                  
                        <p >{{$item->subtitle}}</p>
                    
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</section>

<style>
    .slider-wrapper {
        position: relative;
        width: 100%;
    }

    .hero-slider .slide-item {
        padding: 40px 20px 50px 20px;
        background: #222;
        color: #fff;
    }

    .slider-img {
        width: 100%;
        max-height: 350px;
        object-fit: cover;
        margin-bottom: 24px;
        border-radius: 10px;
    }

    @media (max-width: 768px) {
        .hero-slider .slide-item {
            padding: 30px 5px 40px 5px;
        }

        .slider-img {
            max-height: 180px;
        }
    }
</style>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>

<script>
    $(document).ready(function() {
        $('.hero-slider').slick({
            dots: true,
            arrows: true,
            autoplay: true,
            autoplaySpeed: 4000,
            slidesToShow: 1,
            slidesToScroll: 1,
            adaptiveHeight: true
        });
    });
</script>
