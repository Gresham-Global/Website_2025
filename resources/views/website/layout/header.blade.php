<header class="header">
    <!-- <div class="topSection">
        <div class="topContainer">
            <div class="callTopBtn">
                <a href="#"><img src="{{ asset('website/assets/icons/callRound.svg') }}" alt="" />+91 977 3911 384</a>
            </div>
            <div class="topRight"> -->
    <!-- <div class="dropdown">
                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButtonTop1"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Quick Links
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButtonTop1">
                        <li><a class="dropdown-item" href="{{ url('media')}}">Media</a></li>
                        <li><a class="dropdown-item" href="{{ url('events')}}">Events</a></li>
                        <li><a class="dropdown-item" href="{{ url('careers')}}">Careers</a></li>
                    </ul>
                </div> -->
    <!-- <a href="{{ url('media')}}"
                    class="topLink dn990 {{ request()->is('media') ? 'active1' : '' }}">Media</a>
                <a href="{{ url('events')}}"
                    class="topLink dn990 borderLW {{ request()->is('events') ? 'active' : '' }}">Events</a>
                <a href="{{ url('careers')}}"
                    class="topLink dn990 borderLW{{ request()->is('careers') ? 'active' : '' }}">Careers</a> -->
    <!-- <div class="followBox">
                    <p>Follow us on</p>
                    <a href="https://www.linkedin.com/company/gresham-global" target="_blank"><img
                            src="{{ asset('website/assets/icons/linkedinRound.webp') }}" alt="" /></a> -->
    <!-- <a href="https://www.instagram.com/gresham.global" target="_blank"><img
                            src="{{ asset('website/assets/icons/instaRound.svg') }}" alt="" /></a> -->
    <!-- </div> -->
    <!-- <div class="offerBox">
                    <img src="{{ asset('website/assets/images/offer.webp') }}" alt="" />
                </div> -->
    <!-- </div>
        </div>
    </div> -->


    <div class="buttomSection">
        <div class="navContainer">
            <!-- Logo -->
            <a href="{{ url('')}}" class="navLogo d-flex align-items-center">
                <img src="{{ asset('website/assets/logo/logo.png') }}" alt="Logo" class="navLogoImg" />
            </a>
            <!-- Toggle Button for Side Navigation on Tablet/Smaller Screens -->
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNav"
                aria-controls="offcanvasNav" aria-expanded="false" aria-label="Toggle navigation">
                <img src="{{ asset('website/assets/icons/menu.png') }}" alt="menu-icon" />
            </button>

            <!-- Navigation for Web View -->
            <nav class="webNav">
                <ul class="nav">

                    <li class="nav-item {{ request()->is('/') ? 'active' : '' }} ">
                        <a href="{{ url('')}}" class="nav-link "><strong>Home</strong></a>
                    </li>

                    <li
                        class="nav-item borderLB dropdown {{ (request()->is('about') || request()->is('approach')) ? 'active' : '' }}">
                        <a href="#" class="nav-link  dropdown-toggle" data-bs-toggle="dropdown">
                            <strong>About</strong>
                        </a>
                        <ul class="dropdown-menu secNavMenus">
                            <li><a class="dropdown-item text-black {{ request()->is('about') ? 'active' : '' }}"
                                    style="{{ request()->is('about') ? 'color:#e32636!important;' : 'color:#000!important;border-bottom:white!important;' }} background-color:white !important;"
                                    href="{{ url('about')}}">About Us</a>
                            </li>
                            <li><a class="dropdown-item text-black {{ request()->is('approach') ? 'active' : '' }}"
                                    style="{{ request()->is('approach') ? 'color:#e32636!important;' : 'color:#000!important;border-bottom:white!important;' }} background-color:white!important;"
                                    href="{{ url('approach')}}">Approach</a>
                            </li>
                        </ul>
                    </li>
                    <li
                        class="nav-item borderLB dropdown {{(request()->is('research-assessment')||request()->is('incountry-representation')||request()->is('academic-collaborations')||request()->is(patterns: 'admission-compliance')||request()->is('strategic-marketing')||request()->is('operational-support')) ? 'active' : '' }} ">
                        <a href="#" class="nav-link  dropdown-toggle" data-bs-toggle="dropdown"><strong>
                                Services</strong>
                        </a>
                        <ul class="dropdown-menu secNavMenus">
                            <li><a class="dropdown-item text-black {{ request()->is('research-assessment') ? 'active' : '' }}"
                                    style="{{ request()->is('research-assessment') ? 'color:#e32636!important;' : 'color:#000!important;border-bottom:white!important;' }} background-color:white!important;"
                                    href="{{ url('research-assessment')}}">Research &
                                    Assessment</a>
                            </li>
                            <li><a class="dropdown-item text-black {{ request()->is('incountry-representation') ? 'active' : '' }}"
                                    style="{{ request()->is('incountry-representation') ? 'color:#e32636!important;' : 'color:#000!important;border-bottom:white!important;' }} background-color:white!important;"
                                    href="{{ url('incountry-representation')}}">In-Country
                                    Representation</a>
                            </li>
                            <li><a class="dropdown-item text-black {{ request()->is('academic-collaborations') ? 'active' : '' }}"
                                    style="{{ request()->is('academic-collaborations') ? 'color:#e32636!important;' : 'color:#000!important;border-bottom:white!important;' }} background-color:white!important;"
                                    href="{{ url('academic-collaborations')}}">Academic Collaborations</a>
                            </li>
                            <li><a class="dropdown-item text-black {{ request()->is('admission-compliance') ? 'active' : '' }}"
                                    style="{{ request()->is('admission-compliance') ? 'color:#e32636!important;' : 'color:#000!important;border-bottom:white!important;' }} background-color:white!important;"
                                    href="{{ url('admission-compliance')}}">Admission Compliance</a>
                            </li>
                            <li><a class="dropdown-item text-black {{ request()->is('strategic-marketing') ? 'active' : '' }}"
                                    style="{{ request()->is('strategic-marketing') ? 'color:#e32636!important;' : 'color:#000!important;border-bottom:white!important;' }} background-color:white!important;"
                                    href="{{ url('strategic-marketing')}}">Strategic Marketing</a>
                            </li>
                            <li><a class="dropdown-item text-black {{ request()->is('operational-support') ? 'active' : '' }}"
                                    style="{{ request()->is('operational-support') ? 'color:#e32636!important;' : 'color:#000!important;border-bottom:white!important;' }} background-color:white!important;"
                                    href="{{ url('operational-support')}}">Operational Support</a>
                            </li>
                            <!-- <li><a class="dropdown-item text-black {{ request()->is('strategic-marketing') ? 'active' : '' }}"
                                    style="color:#000!important; border-bottom:white!important;background-color:white!important;"
                                    href="{{ url('strategic-marketing')}}">Strategic
                                    Marketing</a></li>
                            <li><a class="dropdown-item text-black lstBor {{ request()->is('operational-support') ? 'active' : '' }}"
                                    style="color:#000!important; border-bottom:white!important;background-color:white!important;"
                                    href="{{ url('operational-support')}}">Operational
                                    Support</a></li> -->
                        </ul>
                    </li>
                    <!-- <li class="nav-item borderLB {{ request()->is('media') ? 'active' : '' }}">
                        <a href="{{ url('media') }}" class="nav-link "><strong>Media</strong></a>
                    </li> -->

                    <li
                        class="nav-item borderLB dropdown {{ (request()->is('media') || request()->is('news-and-blogs')) ? 'active' : '' }}">
                        <a href="#" class="nav-link  dropdown-toggle" data-bs-toggle="dropdown">
                            <strong>Media</strong>
                        </a>
                        <ul class="dropdown-menu secNavMenus">
                            <li><a class="dropdown-item text-black {{ request()->is('media') ? 'active' : '' }}"
                                    style="{{ request()->is('media') ? 'color:#e32636!important;' : 'color:#000!important;border-bottom:white!important;' }} background-color:white!important;"
                                    href="{{ url('media')}}">Media</a>
                            </li>
                            <li><a class="dropdown-item text-black {{ request()->is('news-and-blogs*') ? 'active' : '' }}"
                                    style="{{ request()->is('news-and-blogs*') ? 'color:#e32636!important;' : 'color:#000!important;border-bottom:white!important;' }} background-color:white!important;"
                                    href="{{ url('news-and-blogs')}}">News and Blogs</a>
                            </li>
                            <!-- <li><a class="dropdown-item text-black {{ request()->is('publications') ? 'active' : '' }}"
                                    style="{{ request()->is('publications') ? 'color:#e32636!important;' : 'color:#000!important;border-bottom:white!important;' }} background-color:white!important;"
                                    href="{{ url('publications')}}">Publications</a>
                            </li> -->
                        </ul>
                    </li>
                    <li class="nav-item borderLB {{ request()->is('publications*') ? 'active' : '' }}">
                        <a href="{{ url('publications') }}" class="nav-link "><strong>Publications</strong></a>
                    </li>
                    <li class="nav-item borderLB {{ request()->is('events*') ? 'active' : '' }}">
                        <a href="{{ url('events') }}" class="nav-link "><strong>Events</strong></a>
                    </li>
                    <li class="nav-item borderLB {{ request()->is('careers*') || request()->is('career-details*') ? 'active' : '' }}">
                        <a href="{{ url('careers') }}" class="nav-link "><strong>Careers</strong></a>
                    </li>
                    <li class="nav-item borderLB {{ request()->is('contact') ? 'active' : '' }}">
                        <a href="{{ url('contact')}}" class="nav-link "><strong>Contact Us</strong></a>
                    </li>

                </ul>
                <!-- <button class="touchBtn" id="touchBtn">Follow us on</button> -->
                <div class="followBox">
                    <!-- <p>Follow us on</p> -->
                    <a href="https://www.linkedin.com/company/gresham-global" target="_blank"><img style="width: 32px; height: 32px"
                            src="{{ asset('website/assets/icons/linkedinRound.webp') }}" alt="linkedin-icon" /></a>
                    <!-- <a href="https://www.instagram.com/gresham.global" target="_blank"><img
                            src="{{ asset('website/assets/icons/instaRound.svg') }}" alt="" /></a> -->
                </div>
            </nav>
        </div>
        <!-- Side Navigation for Tablet/Smaller Screens -->
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNav" aria-labelledby="offcanvasNavLabel">
            <div class="offcanvas-header">
                <a href="{{ url('')}}" class="navLogo d-flex align-items-center" id="offcanvasNavLabel">
                    <img src="{{ asset('website/assets/logo/logo.png') }}" alt="Logo" class="navLogoImg" />
                </a>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body headmbmenu">
                <ul class="nav flex-column" aria-label="Close">
                    <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
                        <a href="{{ url('/') }}" class="nav-link">Home</a>
                    </li>

                    <li class="nav-item {{ request()->is('about') || request()->is('approach') ? 'active' : '' }}">
                        <a href="{{ url('about')}}" class="nav-link dropdown-toggle  d-flex align-items-center"
                            id="aboutusBtn">
                            About Us
                        </a>
                        <ul class="dropdownmenu {{ request()->is('about') || request()->is('approach') ? 'show' : '' }}">
                            <li><a class="dropdown-item {{ request()->is('about') ? 'active' : '' }}" style="{{ request()->is('about') ? 'color:#e32636!important;' : 'color:#000!important;border-bottom:white!important;' }} background-color:white!important;" href="{{ url('about')}}">About Us</a></li>
                            <li><a class="dropdown-item {{ request()->is('approach') ? 'active' : '' }}" style="{{ request()->is('approach') ? 'color:#e32636!important;' : 'color:#000!important;border-bottom:white!important;' }} background-color:white!important;" href="{{ url('approach')}}">Approach</a></li>
                        </ul>
                    </li>
                    <li class="nav-item {{(request()->is('research-assessment')||request()->is('incountry-representation')||request()->is('academic-collaborations')||request()->is(patterns: 'admission-compliance')||request()->is('strategic-marketing')||request()->is('operational-support')) ? 'active' : '' }}">
                        <a href="#" class="nav-link dropdown-toggle  d-flex align-items-center"
                            id="servicesBtn">
                            Services
                        </a>
                        <ul class="dropdownmenu">
                            <li><a class="dropdown-item" style="{{ request()->is('research-assessment') ? 'color:#e32636!important;' : 'color:#000!important;border-bottom:white!important;' }} background-color:white!important;" href="{{ url('research-assessment')}}">Research &
                                    Assessment</a></li>
                            <li><a class="dropdown-item" style="{{ request()->is('incountry-representation') ? 'color:#e32636!important;' : 'color:#000!important;border-bottom:white!important;' }} background-color:white!important;" href="{{ url('incountry-representation')}}">In-Country
                                    Representation</a></li>
                            <li><a class="dropdown-item" style="{{ request()->is('academic-collaborations') ? 'color:#e32636!important;' : 'color:#000!important;border-bottom:white!important;' }} background-color:white!important;" href="{{ url('academic-collaborations')}}">Academic
                                    Collaborations</a></li>
                            <li><a class="dropdown-item" style="{{ request()->is('admission-compliance') ? 'color:#e32636!important;' : 'color:#000!important;border-bottom:white!important;' }} background-color:white!important;" href="{{ url('admission-compliance')}}">Admissions
                                    Compliance</a></li>
                            <li><a class="dropdown-item" style="{{ request()->is('strategic-marketing') ? 'color:#e32636!important;' : 'color:#000!important;border-bottom:white!important;' }} background-color:white!important;" href="{{ url('strategic-marketing')}}">Strategic Marketing</a>
                            </li>
                            <li><a class="dropdown-item last" style="{{ request()->is('operational-support') ? 'color:#e32636!important;' : 'color:#000!important;border-bottom:white!important;' }} background-color:white!important;" href="{{ url('operational-support')}}">Operational
                                    Support</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item {{ (request()->is('media') || request()->is('news-and-blogs')) ? 'active' : '' }}">
                        <a href="#" class="nav-link dropdown-toggle  d-flex align-items-center"
                            id="mediaBtn">Media</a>
                        <ul class="dropdownmenu">

                            <li><a class="dropdown-item" style="{{ request()->is('media') ? 'color:#e32636!important;' : 'color:#000!important;border-bottom:white!important;' }} background-color:white!important;" href="{{ url('media')}}">Media</a></li>
                            <li><a class="dropdown-item" style="{{ request()->is('news-and-blogs') ? 'color:#e32636!important;' : 'color:#000!important;border-bottom:white!important;' }} background-color:white!important;" href="{{ url('news-and-blogs')}}">News and Blogs</a></li>
                            {{-- <li><a class="dropdown-item" href="{{ url('publications')}}">Publications</a>
                    </li> --}}
                </ul>
                </li>
                <li class="nav-item {{ request()->is('publications*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('publications') }}">Publications</a>
                </li>
                <li class="nav-item {{ request()->is('events') ? 'active' : '' }} "><a class="nav-link " href="{{ url('events')}}">Events</a></li>
                <li class="nav-item {{ request()->is('careers') ? 'active' : '' }} "><a class="nav-link " href="{{ url('careers')}}">Careers</a></li>
                <li class="nav-item {{ request()->is('contact') ? 'active' : '' }} ">
                    <a href="{{ url('contact')}}" class="nav-link ">Contact Us</a>
                </li>
                </ul>
            </div>
        </div>
    </div>
</header>