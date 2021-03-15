<!-- Footer -->
<footer class="page-footer font-small light-green accent-4 mt-5">

    <!-- Footer Elements -->
    <div class="container">

        <!-- Grid row-->
        <div class="row">

        <!-- Grid column -->
            <div class="col-md-12 py-1">
                <div class="mb-5 flex-center">

                    <!-- Twitter -->
                    <a class="tw-ic" href="https://twitter.com/home">
                        <i class="fab fa-twitter fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
                    </a>
                    <a class="tw-ic" href="https://github.com/">
                        <i class="fab fa-github fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
                    </a>
                    @guest
                    <a href="{{ route('register') }}" class="btn btn-outline-white rounded-pill green accent-3 mr-md-3 mr-2">Sign up!</a>
                    <a href="{{ route('login') }}" class="btn btn-outline-white rounded-pill green accent-3">Login!</a>
                    @endguest
                </div>
            </div>
        <!-- Grid column -->

        </div>
        <!-- Grid row-->

    </div>
    <!-- Footer Elements -->

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3 green accent-4">© 2021 Copyright:
        <a href=""> F-community.com</a>
    </div>
    <!-- Copyright -->

</footer>
    <!-- Footer -->
