<body class="hold-transition sidebar-mini">
<div class="wrapper">
    {{-- navbar --}}
    @include('struktur.komponen.navbar')
    {{-- navbar --}}
    {{-- aside --}}
    @include('struktur.komponen.aside')
    {{-- aside --}}
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="mb-2 row">
                    <div class="col-sm-6">
                        <h1>@yield('judul')</h1>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="card">
                <div class="card-header">
                    <div class="card-body">
                        @yield('konten')
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
{{-- js --}}
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/adminlte.min.js') }}"></script>
@stack('js')
{{-- js --}}
</body>
