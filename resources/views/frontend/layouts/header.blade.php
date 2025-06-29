<header class="navigation">
	<div class="header-top ">
		<div class="container">
			<div class="columns is-gapless is-justify-content-space-between is-align-items-center">
				<div class="column is-6-desktop is-4-tablet has-text-left-desktop has-text-centered-mobile">
					<div class="header-top-info">
						<a href="tel:{{ $contact->phone }}"><i class="icofont-phone mr-2"></i><span>{{ $contact->phone }}</span></a>
						<a href="mailto:{{ $contact->email }}" ><i class="icofont-email mr-2"></i><span>{{ $contact->email }}</span></a>
					</div>
				</div>
				<div class="column is-6-desktop is-8-tablet">
					<div class="header-top-right has-text-right-tablet has-text-centered-mobile">
						<a href="{{ @$social->facebook }}" target="_blank"><i class="icofont-facebook"></i></a>
						<a href="{{ @$social->twitter }}" target="_blank"><i class="icofont-twitter"></i></a>
						<a href="{{ @$social->youtube }}" target="_blank"><i class="icofont-youtube"></i></a>
						<a href="{{ @$social->instagram }}" target="_blank"><i class="icofont-instagram"></i></a>
						<a href="{{ @$social->linkedin }}" target="_blank"><i class="icofont-linkedin"></i></a>
						<a href="#" class="top-btn">Donate Now</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<nav id="navbar" class="navbar main-nav">
		<div class="container">
			<div class="navbar-brand">
				<a class="navbar-item" href="i{{ route('index') }}">
					<img src="{{(!empty($contact->photo))?URL::to('storage/'.$contact->photo):URL::to('image/no_image.png')}}" alt="logo">
				</a>
				<button role="button" class="navbar-burger burger" data-hidden="true" data-target="navigation">
					<span aria-hidden="true"></span>
					<span aria-hidden="true"></span>
					<span aria-hidden="true"></span>
				</button>
			</div>

			<div class="navbar-menu mr-0" id="navigation">
				<ul class="navbar-end">					 
					<li class="navbar-item">
						<a class="navbar-link" href="{{ route('index') }}">Home</a>
					</li>
					
					<li class="navbar-item">
						<a class="navbar-link" href="about.html">About</a>
					</li>

					<li class="navbar-item has-dropdown is-hoverable">
						<a class="navbar-link">Causes<span class="ml-1">+</span></a>
						<div class="navbar-dropdown">
							<a class="navbar-item" href="service.html">Causes</a>
							<a class="navbar-item" href="cause-single.html">Cause details</a>
						</div>
					</li>

					<li class="navbar-item has-dropdown is-hoverable">
						<a class="navbar-link">Get Involved<span class="ml-1">+</span></a>
						<div class="navbar-dropdown">
							<a class="navbar-item" href="donation.html">Donation</a>
							<a class="navbar-item" href="volunteer.html">Be a Volunteer</a>
						</div>
					</li>

					<li class="navbar-item has-dropdown is-hoverable">
						<a class="navbar-link">Pages<span class="ml-1">+</span></a>
						<div class="navbar-dropdown">
							<a class="navbar-item" href="event.html">Event</a>
							<a class="navbar-item" href="event-single.html">Event Single</a>
							<a class="navbar-item" href="confirmation.html">Confirmation</a>
							<a class="navbar-item" href="404.html">404</a>
						</div>
					</li>

					<li class="navbar-item has-dropdown is-hoverable">
						<a class="navbar-link">Blog +</a>
						<div class="navbar-dropdown align-right">
							<a class="navbar-item" href="blog-grid.html">Blog Grid</a>
							<a class="navbar-item" href="blog-sidebar.html">Blog with Sidebar</a>
							<a class="navbar-item" href="blog-single.html">Blog Single</a>
						</div>
					</li>
					
					<li class="navbar-item">
						<a class="navbar-link" href="contact.html">Contact</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
</header>