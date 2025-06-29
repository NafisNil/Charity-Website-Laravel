@extends('frontend.layouts.master')
@section('title')
    Index - Al Wafa Foundation
@endsection
@section('content')
    <!-- Slider Start -->
    @include('frontend.slider')

    <!-- Section Intro Start -->
    <section class="section intro">
        <div class="container">
            <div class="columns is-align-items-center is-desktop mb-6">
                <div class="column is-6-desktop">
                    <div class="section-title mb-0">
                        <span class="text-color">What we can do</span>
                        <h2 class="mt-4 content-title">{{ $about->title }}</h2>
                    </div>
                </div>
                <div class="column is-6-desktop">
                    <p>{{ $about->we_can }}</p>
                </div>
            </div>
            <div class="columns is-multiline is-justify-content-center">
                @foreach ($services as $item)
                    <div class="column is-3-desktop is-6-tablet">
                        <div class="intro-item mb-5 mb-lg-0">
                            <img src="{{ !empty($item->photo) ? URL::to('storage/' . $item->photo) : URL::to('image/no_image.png') }}"
                                alt="{{ $item->title }}" class=" w-100">
                            <h4 class="mt-4 mb-3">{{ $item->title }}</h4>
                            <p>{!! $item->description !!}</p>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </section>
    <!-- Section Intro END -->
    <section class="section video">
        <div class="container">

            <div class="counter-section">
                <div class="columns is-multiline">
                    @foreach ($metric as $item)
                        <div class="column is-3-desktop is-6-tablet">
                            <div class="counter-item-2 pt-5">
                                <span class="counter-stat  text-color">{{ $item->amount }}</span>
                                <p>{{ $item->name }}</p>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
        </div>
    </section>
    <section class="section gallery">
        <div class="container">
            <div class="columns is-justify-content-center">
                <div class="column is-8-desktop is-10-tablet">
                    <div class="section-title has-text-centered">
                        <span class="text-color">Our Gallery</span>
                        <h2 class="mt-4 mb-5 is-relative content-title">We connect with people across different sectors. we
                            take risks and we always keep learning.</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="gallery-wrap">
                <div class="columns is-multiline">
                    @foreach ($gallery as $item)
                        <div class="column is-4-desktop is-12-tablet">
                            <div class="gallery-item">
                                <a href="{{ !empty($item->photo) ? URL::to('storage/' . $item->photo) : URL::to('image/no_image.png') }}"
                                    class="gallery-popup">
                                    <img src="{{ !empty($item->photo) ? URL::to('storage/' . $item->photo) : URL::to('image/no_image.png') }}"
                                        alt="{{ $item->title }}" class=" w-100" title="{{ $item->title }}">
                                </a>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="column">
                <div class="column lg-12">
                    <div class="section-divider"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section About Start -->
    <section class="section causes">
        <div class="container">
            <div class="columns is-justify-content-center">
                <div class="column is-7-desktop is-8-tablet">
                    <div class="section-title has-text-centered">
                        <span class="text-color">Latest Events</span>
                        <h2 class="mt-4 mb-5 is-relative content-title">Our Recent Causes <br> to serve better</h2>

                    </div>
                </div>
            </div>

            <div class="columns is-multiline is-justify-content-center">
                @foreach ($campaigns as $item)
                    <div class="column is-4-desktop is-6-tablet">
                        <div class="cause-item">
                            <img src="{{ !empty($item->photo) ? URL::to('storage/' . $item->photo) : URL::to('image/no_image.png') }}"
                                class=" w-100" alt="{{ $item->name }}">

                            <div class="card-body">
                                <h3 class="mb-4"><a href="cause-single.html">{{ $item->name }}</a></h3>

                                <ul class="list-inline border-bottom border-top py-3 mb-4">
                                    <li class="list-inline-item"><i class="icofont-check text-color mr-2"></i>Goal:
                                        <span>{{ $item->goal_amount }} {{ $item->currency }}</span>
                                    </li>
                                    <li class="list-inline-item"><i class="icofont-check text-color mr-2"></i>Raised:
                                        <span>{{ $item->amount_raised }} {{ $item->currency }}</span>
                                    </li>
                                </ul>
                                <p class="card-text mb-5">{!! Str::limit($item->description, 100) !!}</p>

                                <a href="donation.html" class="btn btn-main is-rounded">Donate Now</a>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </section>



    <section class="section latest-blog">
        <div class="container">
            <div class="columns is-justify-content-center is-desktop">
                <div class="column is-7-desktop has-text-centered">
                    <div class="section-title">
                        <span class="h6 text-color">Latest News</span>
                        <h2 class="mt-4 content-title">Latest articles to enrich knowledge</h2>
                    </div>
                </div>
            </div>

            <div class="columns is-multiline is-justify-content-center">
                @foreach ($blogs as $item)
                    <div class="column is-4-desktop is-6-tablet">
                        <div class="blog-item">
                            <img src="{{ !empty($item->photo) ? URL::to('storage/' . $item->photo) : URL::to('image/no_image.png') }}"
                                alt="" class="">

                            <div class="card-body mt-2">
                                <span
                                    class="text-sm text-color is-uppercase has-text-weight-bold">{{ $item->created_at->format('d M, Y') }}</span>
                                <h3 class="mb-3"><a href="blog-single.html" class="">{{ $item->title }}</a></h3>
                                <p class="mb-4">{!! Str::limit($item->description, 150) !!}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    <div class="volunteer section ">
        <div class="container">
            <div class="columns is-multiline">
                <div class="column is-7-desktop is-12-tablet">
                    <div class="volunteer-content">
                        <img src="images/bg/image-5.jpg" alt="" class="">
                        <h2 class="text-lg mb-5 mt-3">We can’t help everyone, but everyone can help someone</h2>


                        <h2 class="mt-6 mb-5">Trusted worldwide partner</h2>
                        <div class="clients-wrap">
                            @foreach ($partners as $item)
                                <a href="#">
                                    <img src="{{ !empty($item->photo) ? URL::to('storage/' . $item->photo) : URL::to('image/no_image.png') }}" alt="" class="" title="{{ $item->name }}">
                                </a>
                            @endforeach


                        </div>
                    </div>
                </div>

                <div class="column is-5-desktop is-12-tablet">
                    <div class="volunteer-form-wrap">
                        <span class="text-white">Join With us</span>
                        <h2 class="mb-6 text-lg text-white">Become A Volunteer</h2>
                        @include('admin.sessionMsg')
                        <form action="{{ route('volunteer.application') }}" class="volunteer-form" method="POST">
                            @csrf
                            <div class="mb-4">
                                <input type="text" class="input" placeholder="Full Name" name="name" required>
                            </div>
                            <div class="mb-4">
                                <input type="email" class="input" placeholder="Emaill Address" name="email" required>
                            </div>
                            <div class="mb-4">
                                <input type="text" class="input" placeholder="Phone Number" name="phone">
                            </div>
                            <div class="mb-4">
                                <input type="text" class="input" placeholder="Adress " name="address">
                            </div>
                            <div class="mb-4">
                                <input type="text" class="input" placeholder="Occupation" name="occupation">
                            </div>
                            <div class="mb-4">
                                <textarea  id="#" cols="30" rows="5" class="input" placeholder="Your Message" name="message"></textarea>
                            </div>

                            <button type="submit" class="btn btn-outline-info ">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

