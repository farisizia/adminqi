<body>
<div class="page-flex">
    <section class="bg-primary py-3 py-md-5 py-xl-8">
        <div class="container">
            <div class="align-items-center gy-4 row">
                <div class="col-12 col-md-6 col-xl-7">
                    <div class="d-flex justify-content-center">
                        <img
                            alt="Logo"
                            class="img-fluid rounded mb-4"
                            height="100"
                            loading="lazy"
                            src="{{ asset('assets/img/logo.svg') }}"
                            width="245"
                        >
                    </div>
                </div>
                <div class="col-12 col-md-6 col-xl-5">
                    <div class="border-0 card rounded-4">
                        <div class="card-body login-form p-3 p-md-4 p-xl-5">
                            @yield('konten')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
</body>
