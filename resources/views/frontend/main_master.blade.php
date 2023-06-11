@include('frontend.body.head')

        <!-- preloader-start -->
        <div id="preloader">
            <div class="rasalina-spin-box"></div>
        </div>
        <!-- preloader-end -->

		<!-- Scroll-top -->
        <button class="scroll-top scroll-to-target" data-target="html">
            <i class="fas fa-angle-up"></i>
        </button>
        <!-- Scroll-top-end-->

        <!-- header-area -->
        @include('frontend.body.header')
        <!-- header-area-end -->

        <!-- main-area -->
        <main>

            @yield('main')

        </main>
        <!-- main-area-end -->



        <!-- Footer-area -->
        @include('frontend.body.footer')
        <!-- Footer-area-end -->


@include('frontend.body.scripts')
