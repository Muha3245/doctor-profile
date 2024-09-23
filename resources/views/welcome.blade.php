@extends('layout.app')
@section('content')
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center">

            <h1 class="logo me-auto"><a href="#">Medilab</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="#about">About</a></li>
                    <li><a class="nav-link scrollto" href="#services">Services</a></li>
                    <li><a class="nav-link scrollto" href="#departments">Departments</a></li>
                    <li><a class="nav-link scrollto" href="#doctors">Doctors</a></li>
                    <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="#">Drop Down 1</a></li>
                            <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i
                                        class="bi bi-chevron-right"></i></a>
                                <ul>
                                    <li><a href="#">Deep Drop Down 1</a></li>
                                    <li><a href="#">Deep Drop Down 2</a></li>
                                    <li><a href="#">Deep Drop Down 3</a></li>
                                    <li><a href="#">Deep Drop Down 4</a></li>
                                    <li><a href="#">Deep Drop Down 5</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Drop Down 2</a></li>
                            <li><a href="#">Drop Down 3</a></li>
                            <li><a href="#">Drop Down 4</a></li>
                        </ul>
                    </li>
                    <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->


            <a href="#appointment" class="appointment-btn scrollto"><span class="d-none d-md-inline">Make an</span>
                Appointment</a>

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container">
            <h1>Welcome to Medilab</h1>
            <h2>We are team of talented designers making websites with Bootstrap</h2>
            <a href="#about" class="btn-get-started scrollto">Get Started</a>
        </div>
    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= Why Us Section ======= -->
        <section id="why-us" class="why-us">
            <div class="container">

                <div class="row">
                    <div class="col-lg-4 d-flex align-items-stretch">
                        <div class="content">
                            <h3>Why Choose Medilab?</h3>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                                labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
                                Asperiores dolores sed et. Tenetur quia eos. Autem tempore quibusdam vel necessitatibus
                                optio ad corporis.
                            </p>
                            <div class="text-center">
                                <a href="#" class="more-btn">Learn More <i class="bx bx-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 d-flex align-items-stretch">
                        <div class="icon-boxes d-flex flex-column justify-content-center">
                            <div class="row">
                                <div class="col-xl-4 d-flex align-items-stretch">
                                    <div class="icon-box mt-4 mt-xl-0">
                                        <i class="bx bx-receipt"></i>
                                        <h4>Corporis voluptates sit</h4>
                                        <p>Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut
                                            aliquip</p>
                                    </div>
                                </div>
                                <div class="col-xl-4 d-flex align-items-stretch">
                                    <div class="icon-box mt-4 mt-xl-0">
                                        <i class="bx bx-cube-alt"></i>
                                        <h4>Ullamco laboris ladore pan</h4>
                                        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                                            deserunt</p>
                                    </div>
                                </div>
                                <div class="col-xl-4 d-flex align-items-stretch">
                                    <div class="icon-box mt-4 mt-xl-0">
                                        <i class="bx bx-images"></i>
                                        <h4>Labore consequatur</h4>
                                        <p>Aut suscipit aut cum nemo deleniti aut omnis. Doloribus ut maiores omnis facere
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End .content-->
                    </div>
                </div>

            </div>
        </section><!-- End Why Us Section -->

        <!-- ======= About Section ======= -->
        @php
            $aboutData = \App\Helpers\UserHelper::getAbout();
        @endphp


        <section id="about" class="about">
            <div class="container-fluid">
                @if ($aboutData)
                    <div class="row">
                        @foreach ($aboutData as $about)
                            <div
                                class="col-xl-5 col-lg-6  d-flex justify-content-center align-items-stretch position-relative">
                                <img src="{{ asset('images/' . $about->image) }}" alt="">
                            </div>

                            <div
                                class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
                                <h3>Enim quis est voluptatibus aliquid consequatur fugiat</h3>
                                <p>{!! $about->description ?? '' !!}</p>
                        @endforeach
                @endif
                @php
                    $aboutIcon = \App\Helpers\UserHelper::getIcon();
                @endphp
                @if ($aboutIcon)
                    @foreach ($aboutIcon as $icon)
                        <div class="icon-box">
                            <div class="icon"><i class="{{ $icon->icon }}"></i></div>
                            <h4 class="title"><a href="">{{ $icon->title }}</a></h4>
                            <p class="description">{{ $icon->description }}</p>
                        </div>
                    @endforeach
                @endif

            </div>
            </div>

            </div>
        </section><!-- End About Section -->

        <!-- ======= Counts Section ======= -->
        <section id="counts" class="counts">
            <div class="container">

                <div class="row">

                    <div class="col-lg-3 col-md-6">
                        <div class="count-box">
                            <i class="fas fa-user-md"></i>
                            <span data-purecounter-start="0" data-purecounter-end="85" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Doctors</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
                        <div class="count-box">
                            <i class="far fa-hospital"></i>
                            <span data-purecounter-start="0" data-purecounter-end="18" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Departments</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                        <div class="count-box">
                            <i class="fas fa-flask"></i>
                            <span data-purecounter-start="0" data-purecounter-end="12" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Research Labs</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                        <div class="count-box">
                            <i class="fas fa-award"></i>
                            <span data-purecounter-start="0" data-purecounter-end="150" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Awards</p>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Counts Section -->

        <!-- ======= Services Section ======= -->
        <section id="services" class="services">
            <div class="container">


                <div class="section-title">
                    <h2>Services</h2>
                    <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint
                        consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia
                        fugiat sit in iste officiis commodi quidem hic quas.</p>
                </div>
                @php
                    $aboutService = \App\Helpers\UserHelper::getServices();
                @endphp
                @if ($aboutService)
                    <div class="row">
                        @foreach ($aboutService as $service)
                            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                                <div class="icon-box">
                                    <div class="icon"><i class="{{ $service->icon }}"></i></div>
                                    <h4><a href="">{{ $service->title }}</a></h4>
                                    <p>{{ $service->description }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif

            </div>
        </section><!-- End Services Section -->

        <!-- ======= Appointment Section ======= -->
        <section id="appointment" class="appointment section-bg">
            <div class="container">
                @php
                    $departments = \App\Helpers\UserHelper::getDepartments();
                    $doctors = \App\Helpers\UserHelper::getDoctor();
                @endphp

                <div class="section-title">
                    <h2>Make an Appointment</h2>
                    <p>Fill in the form below to make an appointment.</p>
                </div>

                <!-- Validation error display -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Appointment form -->
                <form action="{{ route('appointments.store') }}" method="POST" role="form" >
                    @csrf
                    <div class="row">
                        <div class="col-md-4 form-group">
                            <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                        </div>
                        <div class="col-md-4 form-group">
                            <input type="email" name="email" class="form-control" id="email" placeholder="Your Email" required>
                        </div>
                        <div class="col-md-4 form-group">
                            <input type="tel" name="phone" class="form-control" id="phone" placeholder="Your Phone" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 form-group">
                            <input type="date" name="date" class="form-control" id="date" placeholder="Appointment Date" required>
                        </div>
                        <div class="col-md-4 form-group">
                            <select name="department_id" id="department" class="form-select" required>
                                <option value="">Select Department</option>
                                @foreach($departments as $department)
                                    <option value="{{ $department->id }}">{{ $department->category }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4 form-group">
                            <select name="doctor_id" id="doctor" class="form-select" required>
                                <option value="">Select Doctor</option>
                                @foreach($doctors as $doctor)
                                    <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group mt-3">
                        <textarea class="form-control" name="message" rows="5" placeholder="Message (Optional)"></textarea>
                    </div>

                    <div class="text-center"><button type="submit">Make an Appointment</button></div>
                </form>
            </div>
        </section>



        <!-- ======= Departments Section ======= -->
        <section id="departments" class="departments">
            <div class="container">

                @php
                    $aboutDepartments = \App\Helpers\UserHelper::getDepartments();
                @endphp

                @if ($aboutDepartments)
                    <div class="section-title">
                        <h2>Departments</h2>
                        <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit
                            sint
                            consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea.
                            Quia
                            fugiat sit in iste officiis commodi quidem hic quas.</p>
                    </div>

                    <div class="row gy-4">
                        <div class="col-lg-3">
                            <ul class="nav nav-tabs flex-column">
                                @foreach ($aboutDepartments as $key => $department)
                                    <li class="nav-item">
                                        <a class="nav-link {{ $key == 0 ? 'active show' : '' }}" data-bs-toggle="tab"
                                            href="#tab-{{ $key }}">
                                            {{ $department->category }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="col-lg-9">
                            <div class="tab-content">
                                @foreach ($aboutDepartments as $key => $department)
                                    <div class="tab-pane {{ $key == 0 ? 'active show' : '' }}"
                                        id="tab-{{ $key }}">
                                        <div class="row gy-4">
                                            <div class="col-lg-8 details order-2 order-lg-1">
                                                <h3>{{ $department->title }}</h3>
                                                <p class="fst-italic">{{ $department->description }}</p>
                                            </div>
                                            <div class="col-lg-4 text-center order-1 order-lg-2">
                                                <img src="{{ asset('images/' . $department->image) }}"
                                                    alt="{{ $department->title }}" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @else
                    <p>No departments available at the moment.</p>
                @endif
            </div>
        </section><!-- End Departments Section -->


        <!-- ======= Doctors Section ======= -->
        <section id="doctors" class="doctors">
            <div class="container">
                @php
                    $aboutDoctor = \App\Helpers\UserHelper::getDoctor();
                @endphp
                @if ($aboutDoctor)
                    <div class="section-title">
                        <h2>Doctors</h2>
                        <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit
                            sint
                            consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea.
                            Quia
                            fugiat sit in iste officiis commodi quidem hic quas.</p>
                    </div>
                    <div class="row">
                        @foreach ($aboutDoctor as $doctor)
                            <div class="col-lg-6">
                                <div class="member d-flex align-items-start">
                                    <div class="pic"><img src="{{ asset('doctors/' . $doctor->image) }}"
                                            class="img-fluid" alt=""></div>
                                    <div class="member-info">
                                        <h4>{{ $doctor->name }}</h4>
                                        <span>{{ $doctor->title }}</span>
                                        <p>{{ $doctor->description }}</p>
                                        <div class="social">
                                            <a href="{{ $doctor->twitter }}"><i class="ri-twitter-fill"></i></a>
                                            <a href="{{ $doctor->facebook }}"><i class="ri-facebook-fill"></i></a>
                                            <a href="{{ $doctor->instagram }}"><i class="ri-instagram-fill"></i></a>
                                            <a href="{{ $doctor->linkedin }}"> <i class="ri-linkedin-box-fill"></i> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif



            </div>
        </section><!-- End Doctors Section -->

        <!-- ======= Frequently Asked Questions Section ======= -->
        <section id="faq" class="faq section-bg">
            <div class="container">

                <div class="section-title">
                    <h2>Frequently Asked Questions</h2>
                    <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint
                        consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia
                        fugiat sit in iste officiis commodi quidem hic quas.</p>
                </div>

                <div class="faq-list">
                    <ul>
                        <li data-aos="fade-up">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse"
                                data-bs-target="#faq-list-1">Non consectetur a erat nam at lectus urna duis? <i
                                    class="bx bx-chevron-down icon-show"></i><i
                                    class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-1" class="collapse show" data-bs-parent=".faq-list">
                                <p>
                                    Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non
                                    curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus
                                    non.
                                </p>
                            </div>
                        </li>

                        <li data-aos="fade-up" data-aos-delay="100">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse"
                                data-bs-target="#faq-list-2" class="collapsed">Feugiat scelerisque varius morbi enim nunc?
                                <i class="bx bx-chevron-down icon-show"></i><i
                                    class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">
                                <p>
                                    Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum
                                    velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec
                                    pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus
                                    turpis massa tincidunt dui.
                                </p>
                            </div>
                        </li>

                        <li data-aos="fade-up" data-aos-delay="200">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse"
                                data-bs-target="#faq-list-3" class="collapsed">Dolor sit amet consectetur adipiscing elit?
                                <i class="bx bx-chevron-down icon-show"></i><i
                                    class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-3" class="collapse" data-bs-parent=".faq-list">
                                <p>
                                    Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus
                                    pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum
                                    tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna
                                    molestie at elementum eu facilisis sed odio morbi quis
                                </p>
                            </div>
                        </li>

                        <li data-aos="fade-up" data-aos-delay="300">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse"
                                data-bs-target="#faq-list-4" class="collapsed">Tempus quam pellentesque nec nam aliquam
                                sem et tortor consequat? <i class="bx bx-chevron-down icon-show"></i><i
                                    class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-4" class="collapse" data-bs-parent=".faq-list">
                                <p>
                                    Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est
                                    ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit
                                    adipiscing bibendum est. Purus gravida quis blandit turpis cursus in.
                                </p>
                            </div>
                        </li>

                        <li data-aos="fade-up" data-aos-delay="400">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse"
                                data-bs-target="#faq-list-5" class="collapsed">Tortor vitae purus faucibus ornare. Varius
                                vel pharetra vel turpis nunc eget lorem dolor? <i
                                    class="bx bx-chevron-down icon-show"></i><i
                                    class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-5" class="collapse" data-bs-parent=".faq-list">
                                <p>
                                    Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae ultricies leo
                                    integer malesuada nunc vel. Tincidunt eget nullam non nisi est sit amet. Turpis nunc
                                    eget lorem dolor sed. Ut venenatis tellus in metus vulputate eu scelerisque.
                                </p>
                            </div>
                        </li>

                    </ul>
                </div>

            </div>
        </section><!-- End Frequently Asked Questions Section -->

        <!-- ======= Testimonials Section ======= -->
        <section id="doctors-testimonials" class="testimonials">
            <div class="container">

                @php
                    $aboutDoctor = \App\Helpers\UserHelper::getDoctor();
                @endphp

                @if ($aboutDoctor)
                    <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                        <div class="swiper-wrapper">
                            @foreach ($aboutDoctor as $doctor)
                                <div class="swiper-slide">
                                    <div class="testimonial-wrap">
                                        <div class="testimonial-item">
                                            <img src="{{ asset('doctors/' . $doctor->image) }}" class="testimonial-img"
                                                alt="{{ $doctor->name }}">
                                            <h3>{{ $doctor->name }}</h3>
                                            <h4>{{ $doctor->title }}</h4>
                                            <p>
                                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                                {{ $doctor->description }}
                                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                            </p>
                                            <div class="social">
                                                <a href="{{ $doctor->twitter }}"><i class="ri-twitter-fill"></i></a>
                                                <a href="{{ $doctor->facebook }}"><i class="ri-facebook-fill"></i></a>
                                                <a href="{{ $doctor->instagram }}"><i class="ri-instagram-fill"></i></a>
                                                <a href="{{ $doctor->linkedin }}"><i
                                                        class="ri-linkedin-box-fill"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- End testimonial item -->
                            @endforeach
                        </div>

                        <div class="swiper-pagination"></div>
                    </div>
                @endif

            </div>
        </section><!-- End Doctors Testimonials Section -->


      <!-- ======= Gallery Section ======= -->
<section id="gallery" class="gallery">
    <div class="container">
        @php
            // Fetch gallery data using the helper
            $galleryItems = \App\Helpers\UserHelper::getImage();
        @endphp

        @if($galleryItems && $galleryItems->count() > 0)
            <div class="section-title">
                <h2>Gallery</h2>
                <!-- Display the description from the first gallery item -->
                <p>{{ $galleryItems->first()->description }}</p>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row g-0">
                @foreach ($galleryItems as $gallery)
                    @foreach (json_decode($gallery->image, true) as $image)
                        <div class="col-lg-3 col-md-4">
                            <div class="gallery-item">
                                <a href="{{ asset('galleries/' . $image) }}" class="galelry-lightbox">
                                    <img src="{{ asset('galleries/' . $image) }}" alt="Gallery Image" class="img-fluid gallery-img" style="height: 200px; width:100%; object-fit: cover;">
                                </a>
                            </div>
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>
        @endif
</section>
<!-- End Gallery Section -->



        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container">

                <div class="section-title">
                    <h2>Contact</h2>
                    <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint
                        consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia
                        fugiat sit in iste officiis commodi quidem hic quas.</p>
                </div>
            </div>

            <div>
                <iframe style="border:0; width: 100%; height: 350px;"
                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621"
                    frameborder="0" allowfullscreen></iframe>
            </div>

            <div class="container">
                <div class="row mt-5">

                    <div class="col-lg-4">
                        <div class="info">
                            <div class="address">
                                <i class="bi bi-geo-alt"></i>
                                <h4>Location:</h4>
                                <p>A108 Adam Street, New York, NY 535022</p>
                            </div>

                            <div class="email">
                                <i class="bi bi-envelope"></i>
                                <h4>Email:</h4>
                                <p>info@example.com</p>
                            </div>

                            <div class="phone">
                                <i class="bi bi-phone"></i>
                                <h4>Call:</h4>
                                <p>+1 5589 55488 55s</p>
                            </div>

                        </div>

                    </div>

                    <div class="col-lg-8 mt-5 mt-lg-0">

                        <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="Your Name" required>
                                </div>
                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Your Email" required>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <input type="text" class="form-control" name="subject" id="subject"
                                    placeholder="Subject" required>
                            </div>
                            <div class="form-group mt-3">
                                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                            </div>
                            <div class="my-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>
                            </div>
                            <div class="text-center"><button type="submit">Send Message</button></div>
                        </form>

                    </div>

                </div>

            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
@endsection
