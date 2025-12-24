<!-- Side Navbar Section -->
<div class="panelSidebar-component" id="sidenav">
    <span class="material-symbols-outlined" id="menu-back"> close </span>
    <div class="panelSidebar-logo-container">
        <img src="{{ asset('website/assets/logo/logo.svg') }}" alt="" class="navLogoImg" />
    </div>

    <div class="panelSidebar-collegeTitlebox">
        <!--  <img src="{{ asset('panel/icons/enq-clg.svg') }}" alt="" /> -->
        <p>Admin Panel</p>
    </div>

    <div class="panelSidebar-collegeMenu">
        <div class="panelSidebar-collegeMenusBox">
            <a href="{{ route('admin.dashboard') }}">
                <div class="collegeMenu-item {{ request()->is('admin/dashboard') ? 'item_active disabled' : '' }}">
                    <span class="material-symbols-outlined collegeMenu-itemIcon">
                        grid_view
                    </span>
                    <p class="collegeMenu-itemText">Dashboard</p>
                </div>
            </a>

            <a href="{{ route('admin.media') }}">
                <div
                    class="collegeMenu-item {{ (request()->is('admin/media') || request()->is('admin/media/create') || request()->is('admin/media/edit*')) ? 'item_active disabled' : '' }}">
                    <span class="material-symbols-outlined collegeMenu-itemIcon">
                        campaign
                    </span>
                    <p class="collegeMenu-itemText">Media</p>
                </div>
            </a>



            <div class="select-menu {{ (request()->is('admin/event*') ) ? 'active disabled prevent-close' : '' }}">
                <div class="select-btn {{ (request()->is('admin/event*') ) ? 'item_active disabled text-white' : '' }}">
                    <p class="{{ (request()->is('admin/event*') ) ? 'text-white ' : '' }}"><span
                            class="material-symbols-outlined collegeMenu-itemIcon">
                            control_point
                        </span>Event</p>
                    <span class="material-symbols-outlined dropicon">
                        keyboard_arrow_down
                    </span>
                </div>
                <ul class="options">
                    <li>
                        <a href="{{ route('admin.event') }}">
                            <div
                                class="collegeMenu-item {{ ((request()->is('admin/event') || request()->is('admin/event/*')) && (!request()->is('admin/event/cit*'))) ? 'item_active disabled' : '' }}">
                                <input type="radio" disabled>
                                <p class="collegeMenu-itemText">Event</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.event.cities.index') }}">
                            <div
                                class="collegeMenu-item {{ (request()->is('admin/event/cities') || request()->is('admin/event/cities/*')) ? 'item_active disabled' : '' }}">
                                <input type="radio" disabled>
                                <p class="collegeMenu-itemText">City</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.event.city.images') }}">
                            <div
                                class="collegeMenu-item {{ (request()->is('admin/event/city/images') || request()->is('admin/event/city/images/*')) ? 'item_active disabled' : '' }}">
                                <input type="radio" disabled>
                                <p class="collegeMenu-itemText">Event Images</p>
                            </div>
                        </a>
                    </li>

                </ul>
            </div>
            <a href="{{ route('admin.newsandblog') }}">
                <div
                    class="collegeMenu-item {{ (request()->is('admin/newsandblog') || request()->is('admin/newsandblog/create') || request()->is('admin/newsandblog/edit*')) ? 'item_active disabled' : '' }}">
                    <span class="material-symbols-outlined collegeMenu-itemIcon">
                        campaign
                    </span>
                    <p class="collegeMenu-itemText">News and Blogs</p>
                </div>


            </a>

            <a href="{{ route('admin.publication') }}">
                <div
                    class="collegeMenu-item {{ (request()->is('admin/publication') || request()->is('admin/publication/create') || request()->is('admin/publication/edit*')) ? 'item_active disabled' : '' }}">
                    <span class="material-symbols-outlined collegeMenu-itemIcon">
                        campaign
                    </span>
                    <p class="collegeMenu-itemText">Publications</p>
                </div>
            </a>

            <a href="{{ route('admin.career') }}">
                <div
                    class="collegeMenu-item {{ (request()->is('admin/career') || request()->is('admin/career/create') || request()->is('admin/career/edit*')) ? 'item_active disabled' : '' }}">
                    <span class="material-symbols-outlined collegeMenu-itemIcon">
                        campaign
                    </span>
                    <p class="collegeMenu-itemText">Career</p>
                </div>
            </a>

            <a href="{{ route('admin.job_interested') }}">
                <div class="collegeMenu-item {{ request()->is('admin/job-interested') ? 'item_active disabled' : '' }}">
                    <span class="material-symbols-outlined collegeMenu-itemIcon">
                        campaign
                    </span>
                    <p class="collegeMenu-itemText">Job Interested</p>
                </div>
            </a>


            <a href="{{ route('admin.enquires') }}">
                <div class="collegeMenu-item {{ (request()->is('admin/enquires') || request()->is('admin/enquires') || request()->is('admin/enquires')) ? 'item_active disabled' : '' }}">
                    <span class="material-symbols-outlined collegeMenu-itemIcon">
                        campaign
                    </span>
                    <p class="collegeMenu-itemText">Enquries</p>
                </div>
            </a>
            <a href="{{ route('admin.subscribe') }}">
                <div class="collegeMenu-item {{ request()->is('admin/subscribe-list') ? 'item_active disabled' : '' }}">
                    <span class="material-symbols-outlined collegeMenu-itemIcon">campaign</span>
                    <p class="collegeMenu-itemText">Subscribe List</p>
                </div>
            </a>
            <a href="{{ route('admin.publication-report') }}">
                <div class="collegeMenu-item {{ request()->is('admin/publication-report') ? 'item_active disabled' : '' }}">
                    <span class="material-symbols-outlined collegeMenu-itemIcon">campaign</span>
                    <p class="collegeMenu-itemText">Publication Report</p>
                </div>
            </a>

            <a href="{{ route('admin.publication-form-list') }}">
                <div class="collegeMenu-item {{ request()->is('admin/publication-form-list') ? 'item_active disabled' : '' }}">
                    <span class="material-symbols-outlined collegeMenu-itemIcon">campaign</span>
                    <p class="collegeMenu-itemText">Publication Form List</p>
                </div>
            </a>

            <a href="{{ route('admin.life') }}">
                <div
                    class="collegeMenu-item {{ (request()->is('admin/life') || request()->is('admin/life/create') || request()->is('admin/life/edit*')) ? 'item_active disabled' : '' }}">
                    <span class="material-symbols-outlined collegeMenu-itemIcon">
                        campaign
                    </span>
                    <p class="collegeMenu-itemText">Life at Grisham Global</p>
                </div>
            </a>

            <a href="{{ route('admin.banner') }}">
                <div
                    class="collegeMenu-item {{ (request()->is('admin/banner') || request()->is('admin/banner/create') || request()->is('admin/banner/edit*')) ? 'item_active disabled' : '' }}">
                    <span class="material-symbols-outlined collegeMenu-itemIcon">
                        campaign
                    </span>
                    <p class="collegeMenu-itemText">Banner</p>
                </div>
            </a>
            <a href="{{ route('admin.seo') }}">
                <div
                    class="collegeMenu-item {{ (request()->is('admin/seo') || request()->is('admin/seo/create') || request()->is('admin/seo/edit*')) ? 'item_active disabled' : '' }}">
                    <span class="material-symbols-outlined collegeMenu-itemIcon">
                        campaign
                    </span>
                    <p class="collegeMenu-itemText">SEO</p>
                </div>
            </a>

        </div>
    </div>

    <p id="copyright">
        Copyright © <span id="year"></span> All rights reserved.
    </p>
    <!-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            const selectMenu = document.querySelector('.select-menu');
            const selectBtn = selectMenu.querySelector('.select-btn');

            selectBtn.addEventListener('click', function() {
                selectMenu.classList.toggle('active');
            });

            // Close dropdown when clicking outside of it
            document.addEventListener('click', function(event) {
                if (!selectMenu.contains(event.target) && selectMenu.classList.contains('active')) {
                    selectMenu.classList.remove('active');
                }
            });
        });
    </script> -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const selectMenu = document.querySelector('.select-menu');
            const selectBtn = selectMenu.querySelector('.select-btn');

            selectBtn.addEventListener('click', function(e) {
                e.stopPropagation(); // Prevent bubbling up to document
                selectMenu.classList.toggle('active');

                // Toggle `prevent-close` class based on active state
                if (selectMenu.classList.contains('active')) {
                    selectMenu.classList.add('prevent-close');
                } else {
                    selectMenu.classList.remove('prevent-close');
                }
            });

            document.addEventListener('click', function(event) {
                if (
                    !selectMenu.contains(event.target) &&
                    selectMenu.classList.contains('active') &&
                    !selectMenu.classList.contains('prevent-close')
                ) {
                    selectMenu.classList.remove('active');
                }
            });
        });
    </script>
</div>