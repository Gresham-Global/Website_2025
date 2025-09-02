    <!-- Top Navbar Section -->
    <div class="panelNavbar-component">
        <div class="blankbox">
            <span class="material-symbols-outlined" id="menu-btn"> menu </span>
        </div>
        <div class="panelNavbar-container">
            <h3 class="panelNavbar-container-h3">{{ $heading ?? ""}}</h3>

            <div class="panelNavbar-profilebox">
                <!-- <div class="panelNavbar-notifyBox">
                    <img src="{{ asset('panel/icons/Bell.svg') }}" alt="" class="panelNavbar-notifybell" />
                    <span class="panelNavbar-notifycount">9+</span>
                </div> -->
                <!-- <img src="{{ asset('panel/icons/enq-clg.svg') }}" alt="" class="panelNavbar-clgImg" /> -->

                <div class="dropdown">
                    <span class="material-symbols-outlined dropdownbtn" id="dropdownMenuButton" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        keyboard_arrow_down
                    </span>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <!-- <a class="dropdown-item" href="{{-- route('institute.profile') --}}">Profile</a> -->
                        <!-- <a class="dropdown-item" href="#">Settings</a> -->
                        <a class="dropdown-item" href="{{ route('admin.logout') }}">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
