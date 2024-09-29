{{--
<a href="#" class="btn btn-lg btn-primary back-to-top"><i class="bi bi-arrow-up"></i></a>
--}}
<footer class="container-fluid p-20 bg-slate-950 m-0">
    <div class="container-fluid">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 lg:grid-cols-3">
            <style>
                .social-icons {
                    display: flex;
                    list-style-type: none;
                    padding: 0;
                }

                .social-icons li {
                    margin-right: 10px;
                }

                .social-icons a {
                    text-decoration: none;
                    color: #ffffff;
                    font-size: 24px;
                }
            </style>
            <div>
                <a class="navbar-brand" href="/">
                    <img src="{{ asset('landing/assets/img/gallery/siopay.png') }}" height="45" alt="logo">
                </a>
                <p style="color: #ffffff;">SIOPAY offers comprehensive payment and digital services for your business
                    needs. <a href="{{ route('contact') }}">Contact us</a> to learn more!</p>
                <div class="social-icons-container">
                    <ul class="social-icons">
                        <li><a href="https://facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="https://twitter.com" target="_blank"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="https://linkedin.com" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                    </ul>
                </div>
            </div>

            <div class="">
                <h3 class="text-primary mb-3">Quick Links</h3>
                <div class="d-flex flex-column">
                    <a class="text-white mb-2" href="{{ route('landing') }}">{{ __('nav.1') }}</a>
                    <a class="text-white mb-2" href="{{ route('who_we_are') }}">{{ __('nav.2') }}</a>
                    <a class="text-white mb-2" href="{{ route('contact') }}">{{ __('Contact Us') }}</a>
                </div>
            </div>
            <div class="">
                <h3 class="text-primary mb-3">More Links</h3>
                <div class="d-flex flex-column">
                    <a class="text-white mb-2" target="_blank"
                        href="https://sioshipping.eu">{{ __('Shipping & Courier') }}</a>
                    <a class="text-white mb-2" target="_blank"
                        href="https://sioshipping.eu">{{ __('Imports & Exports') }}</a>
                    <a class="text-white mb-2" target="_blank"
                        href="https://siostore.eu">{{ __('Marketing & E-commerce') }}</a>
                    <a class="text-white mb-2" target="_blank"
                        href="https://dash.siodatacheck.com">{{ __('ID & AML Verifications') }}</a>
                </div>
            </div>

        </div>
        <br>
        <div class="flex justify-between flex-col md:flex-row mt-3">

            <div class="col-lg-6  text-lg-start mb-3 mb-lg-0">
                <p class="m-0 text-white">&copy; <a href="#">{{ env('APP_NAME') }}</a> MUTISERVIZI S.R.L</p>
            </div>
            <div class="p-2">
                <ul class="nav d-inline-flex">
                    <li class="nav-item"><a class="nav-link text-white py-0" href="#">Privacy</a></li>
                    <li class="nav-item"><a class="nav-link text-white py-0" href="#">Terms</a></li>
                    <li class="nav-item"><a class="nav-link text-white py-0" href="#">FAQs</a></li>
                    <li class="nav-item"><a class="nav-link text-white py-0" href="#">Help</a></li>
                </ul>
                <div class="flex items-center">
                    <img src="{{ asset('landing2/img/part0.png') }}" alt="" width="200px">
                    <img src="{{ asset('landing2/img/visa.png') }}" class="h-[50px] w-[250px]">
                </div>

            </div>

        </div>
    </div>
</footer>
<script>
    var but = document.querySelector('.navbar-toggler')

    but.addEventListener('click', () => {
        let menu = document.getElementById('navbarSupportedContent')
        if (menu.style.display != 'block') {
            menu.style.display = 'block'
        } else {
            menu.style.display = 'none'
        }
    })

    const ddp = document.querySelector('#navbarDropdown')

    ddp.addEventListener('click', () => {
        let menu = document.querySelector('.service-menu')
        if (menu.style.display != 'block') {
            menu.style.display = 'block'
        } else {
            menu.style.display = 'none'
        }
    })

    const lang = document.querySelector('#langDropdown')

    lang.addEventListener('click', () => {
        let menu = document.querySelector('.lang-dp')
        if (menu.style.display != 'block') {
            menu.style.display = 'block'
        } else {
            menu.style.display = 'none'
        }
    })
</script>
<script src="{{ asset('admin_assets/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('landing2/lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('landing2/lib/waypoints/waypoints.min.js') }}"></script>
<script src="{{ asset('landing2/lib/counterup/counterup.min.js') }}"></script>
<script src="{{ asset('landing2/lib/owlcarousel/owl.carousel.min.js') }}"></script>

<!-- Contact Javascript File -->
<script src="{{ asset('landing2/mail/jqBootstrapValidation.min.js') }}"></script>
<script src="{{ asset('landing2/mail/contact.js') }}"></script>

<!-- Template Javascript -->
<script src="{{ asset('landing2/js/main.js') }}"></script>
