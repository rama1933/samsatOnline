<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar" data-sidebarbg="skin6">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            @if (Auth::user()->hasRole('admin'))
            <ul id="sidebarnav">
                <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{ route('home.admin') }}"
                        aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span
                            class="hide-menu">Dashboard</span></a></li>
                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu">PENDAFTARAN</span></li>

                <li class="sidebar-item"> <a class="sidebar-link" href="{{ route('pendaftaran1tahunadmin.index') }}"
                        aria-expanded="false"><i data-feather="file-text" class="feather-icon"></i><span class="hide-menu">1 Tahun
                        </span></a>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link" href="{{ route('pendaftaran1tahunonlineadmin.index') }}"
                        aria-expanded="false"><i data-feather="file-text" class="feather-icon"></i><span class="hide-menu">1 Tahun Online
                        </span></a>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link" href="{{ route('pendaftaran5tahunadmin.index') }}"
                        aria-expanded="false"><i data-feather="file-text" class="feather-icon"></i><span class="hide-menu">5 Tahun
                        </span></a>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link" href="{{ route('pendaftarankuasaadmin.index') }}"
                        aria-expanded="false"><i data-feather="file-text" class="feather-icon"></i><span class="hide-menu">Surat
                            Kuasa
                        </span></a>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link" href="{{ route('pendaftaranduplikatadmin.index') }}"
                        aria-expanded="false"><i data-feather="file-text" class="feather-icon"></i><span class="hide-menu"> Duplikat
                        </span></a>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link" href="{{ route('pendaftaranbalikadmin.index') }}"
                        aria-expanded="false"><i data-feather="file-text" class="feather-icon"></i><span class="hide-menu"> Balik
                            Nama
                        </span></a>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link" href="{{ route('suratkuasaadmin.index') }}" aria-expanded="false"><i
                            data-feather="file-text" class="feather-icon"></i><span class="hide-menu"> Data Surat Kuasa
                        </span></a>
                </li>

                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu">Master</span></li>
                <li class="sidebar-item"> <a class="sidebar-link" href="{{ route('biodata.index') }}" aria-expanded="false"><i
                            data-feather="box" class="feather-icon"></i><span class="hide-menu"> Biodata
                        </span></a>

                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu">Managemen User</span></li>
                <li class="sidebar-item"> <a class="sidebar-link" href="{{ route('user.index') }}" aria-expanded="false"><i
                            data-feather="lock" class="feather-icon"></i><span class="hide-menu"> User
                        </span></a>
                </li>
                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu">Cetak Laporan</span></li>
                <li class="sidebar-item"> <a class="sidebar-link" href="{{ route('laporan.admin') }}" aria-expanded="false"><i
                            data-feather="feather" class="feather-icon"></i><span class="hide-menu"> Cetak Laporan
                        </span></a>
                </li>
            </ul>
            @endif


            @if (Auth::user()->hasRole('user'))
            <ul id="sidebarnav">
                <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{ route('home.user') }}"
                        aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span
                            class="hide-menu">Dashboard</span></a></li>
                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu">PENDAFTARAN</span></li>

                <li class="sidebar-item"> <a class="sidebar-link" href="{{ route('pendaftaran1tahun.index') }}" aria-expanded="false"><i
                            data-feather="file-text" class="feather-icon"></i><span class="hide-menu">1 Tahun
                        </span></a>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link" href="{{ route('pendaftaran1tahunonline.index') }}" aria-expanded="false"><i
                            data-feather="file-text" class="feather-icon"></i><span class="hide-menu">1 Tahun Online
                        </span></a>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link" href="{{ route('pendaftaran5tahun.index') }}" aria-expanded="false"><i
                            data-feather="file-text" class="feather-icon"></i><span class="hide-menu">5 Tahun
                        </span></a>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link" href="{{ route('pendaftarankuasa.index') }}" aria-expanded="false"><i
                            data-feather="file-text" class="feather-icon"></i><span class="hide-menu">Dengan Surat Kuasa
                        </span></a>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link" href="{{ route('pendaftaranduplikat.index') }}" aria-expanded="false"><i
                            data-feather="file-text" class="feather-icon"></i><span class="hide-menu"> Duplikat
                        </span></a>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link" href="{{ route('pendaftaranbalik.index') }}" aria-expanded="false"><i
                            data-feather="file-text" class="feather-icon"></i><span class="hide-menu"> Balik Nama
                        </span></a>
                </li>

                <li class="sidebar-item"> <a class="sidebar-link" href="{{ route('suratkuasa.index') }}" aria-expanded="false"><i
                            data-feather="file-text" class="feather-icon"></i><span class="hide-menu"> Buat Surat Kuasa
                        </span></a>
                </li>

                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu">Managemen User</span></li>
                <li class="sidebar-item"> <a class="sidebar-link" href="{{ route('profile.user') }}" aria-expanded="false"><i
                            data-feather="lock" class="feather-icon"></i><span class="hide-menu"> Profile
                        </span></a>
                </li>

                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu">Cetak Laporan</span></li>
                <li class="sidebar-item"> <a class="sidebar-link" href="{{ route('laporan.user') }}" aria-expanded="false"><i
                            data-feather="feather" class="feather-icon"></i><span class="hide-menu"> Cetak Laporan
                        </span></a>
                </li>
            </ul>
            @endif
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
