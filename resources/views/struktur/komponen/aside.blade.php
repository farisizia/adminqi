<aside class="elevation-4 main-sidebar sidebar-dark-primary" style="background-color: #021622">
    <div class="sidebar">
        {{-- sidebar pengguna --}}
        <div class="d-flex mb-3 mt-3 pb-3">
            <div class="image">
                <img
                    alt="Foto"
                    class="elevation-3"
                    src="{{ asset('img/logo.png') }}"
                    style="height: 100px; width: 220px"
                >
            </div>
        </div>
        {{-- sidebar pengguna --}}
        <br>
        <nav class="mt-2">
            <ul class="flex-column nav nav-pills nav-sidebar" data-accordion="false" data-widget="treeview">
                <li class="nav-item">
                    <div>
                        <a class="nav-link" href="{{ route('dasbor') }}">
                            <i class="fa fa-home nav-icon"></i>
                            <p>Dasbor</p>
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
</aside>
