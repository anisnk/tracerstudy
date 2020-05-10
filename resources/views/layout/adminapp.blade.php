<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @yield('title')
    </title>
    <script src="{{ mix('js/app.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>

<body>
    <main>
        <div class="wrapper">
            <nav class="sidebar" id="sidebar">
                <div class="sidebar-header">
                    <h3>Tracer Study</h3>
                </div>

                <ul class="list-unstyled components">
                    <p>Hello, Admin</p>
                    <p class="small">Administrator</p>
                    <li>
                        <a href="{{ route('fakultas.index') }}"><i class="fas fa-headphones"></i> Fakultas</a>
                    </li>
                    <li>
                        <a href="/prodi">Program Studi</a>
                    </li>
                    <li>
                        <a href="{{ route('mahasiswa.index') }}">Mahasiswa</a>
                    </li>



                    <li>
                        <a href="#pageSubmenu3" data-toggle="collapse" aria-expanded="false"
                            class="dropdown-toggle">Data Alumni</a>
                        <ul class="collapse list-unstyled" id="pageSubmenu3">
                            <li>
                                <a href="{{ route('sektor.index') }}">Sektor Perusahaan</a>
                            </li>
                            <li>
                                <a href="{{ route('perusahaan.index') }}">Perusahaan</a>
                            </li>
                            <li>
                                <a href="{{ route('jabatan.index') }}">Jabatan</a>
                            </li>
                            <li>
                                <a href="{{ route('alumni.index') }}">Alumni</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#pageSubmenu1" data-toggle="collapse" aria-expanded="false"
                            class="dropdown-toggle">Kuesioner</a>
                        <ul class="collapse list-unstyled" id="pageSubmenu1">
                            <li>
                                <a href="{{ route('opsi.index') }}">Opsi Kuesioner</a>
                            </li>
                            <li>
                                <a href="{{ route('pertanyaan.index') }}">Pertanyaan Kuesioner</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false"
                            class="dropdown-toggle">Laporan</a>
                        <ul class="collapse list-unstyled" id="pageSubmenu2">
                            <li>
                                <a href="#">Laporan 1</a>
                            </li>
                            <li>
                                <a href="#">Laporan 2</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <div class="content">
                @yield('content')
            </div>
        </div>


    </main>
    @yield ('js')
</body>

</html>