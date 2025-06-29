<footer class="footer section">
    <div class="container">
        <div class="columns is-multiline">
            <div class="column is-4-desktop is-6-tablet">
                <div class="footer-widget widget">
                    <h4 class="is-capitalize mb-4 text-white">Company</h4>
                    {!! $contact->address !!}

                    <ul class="list-unstyled footer-menu mt-4">
                        <li><a href="tel:{{ $contact->phone }}"><i class="icofont-phone"></i>{{ $contact->phone }}</a>
                        </li>
                        <li><a href="mailto:{{ $contact->email }}"><i class="icofont-email"></i>{{ $contact->email }}</a>
                        </li>
                    </ul>
                    <ul class="list-inline footer-socials">
                        <li class="list-inline-item"><a href="{{ $social->facebook }}"><i
                                    class="icofont-facebook"></i></a></li>
                        <li class="list-inline-item"><a href="{{ $social->twitter }}"><i
                                    class="icofont-twitter"></i></a></li>
                        <li class="list-inline-item"><a href="{{ $social->linkedin }}"><i
                                    class="icofont-linkedin"></i></a></li>
                        <li class="list-inline-item"><a href="{{ $social->youtube }}"><i
                                    class="icofont-youtube"></i></a></li>
                        <li class="list-inline-item"><a href="{{ $social->instagram }}"><i
                                    class="icofont-instagram"></i></a></li>
                    </ul>
                </div>
            </div>

            <div class="column is-2-desktop is-6-tablet">
                <div class="widget footer-widget">
                    <h4 class="is-capitalize mb-4 text-white">Quick Links</h4>

                    <ul class="list-unstyled footer-menu lh-35">
                        <li><a href="#">About</a></li>
                        <li><a href="#">Services</a></li>
                        <li><a href="#">Team</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
            </div>

            <div class="column is-3-desktop is-6-tablet">
                <div class="footer-widget widget">
                    <h4 class="is-capitalize mb-4 text-white">Subscribe Us</h4>
                    <p class="mb-4">Subscribe to get latest news article and resources </p>

                    <form action="#" class="sub-form">
                        <input type="text" class="input mb-4 text-white" placeholder="Subscribe Now ...">
                        <a href="#" class="btn btn-main btn-small is-rounded">subscribe</a>
                    </form>
                </div>
            </div>

            <div class="column is-3-desktop is-6-tablet">
                <div class="widget footer-widget">
                    <h4 class="is-capitalize mb-4 text-white">Gallery</h4>

                    <div class="gallery-wrap">
                        @foreach ($gallery as $item)
                            <div class="gallery-img">
                                <img src="{{ !empty($item->photo) ? URL::to('storage/' . $item->photo) : URL::to('image/no_image.png') }}" alt="" class="" title="{{ $item->title }}">
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>

        <div class="footer-btm py-5">
            <div class="columns is-justify-content-center">
                <div class="column is-12">
                    <div class="copyright has-text-centered">
                        <small>&copy; Copyright Reserved to AlWafa Foundation </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
