<section class="new-sec-6">
    <div class="row align-items-center">

        <div class="col-lg-4 d-none d-lg-block">
            <div style="overflow: hidden; height: 626px;">
                <img src="{{ asset($image ?? 'website/assets/images/our-values.webp') }}"
                    class="img-fluid w-100"
                    style="height: 100%; object-fit: cover;"
                    alt="Teamwork Image">
            </div>
        </div>

        <!-- Right Content -->
        <div class="col-lg-7 custom-margin fixcms">
            <div class="row ">
                <div class="col-12 col-md-6 d-flex flex-column">
                    <div class="d-block d-md-flex align-items-center mb-4" style="gap: 15px;">
                        <h2 class="icon-h">OUR <br />VALUES</h2>
                    </div>
                </div>

                @foreach ($values as $value)
                <div class="col-12 col-md-6 d-flex flex-column" style="padding: 10px;">
                    <div class="d-flex align-items-center icon-box-cc" style="gap: 15px;">
                        <div class="icon-bx" style="width: 90px;">
                            <img src="{{ asset($value['icon']) }}" class="img-fluid" alt="{{ strtoupper($value['title']) }}">
                        </div>
                        <h5 class="fw-bold mb-0 icon-bx-h">{{ strtoupper($value['title']) }}</h5>
                    </div>
                    <p class="text-muted-c mb-0 icon-bx-d">{{ $value['description'] }}</p>
                </div>
                @endforeach

            </div><!-- row end -->
        </div><!-- col-lg-7 end -->

    </div><!-- row -->
</section>
<style>
    .text-muted-c {
        color: #606161 !important;
    }

    @media screen and (max-width: 768px) {
        .icon-h {
            font-size: 45px !important;
            line-height: 45px !important;
        }
    }
</style>