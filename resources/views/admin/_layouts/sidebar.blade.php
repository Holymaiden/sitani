<div class="sidebar-wrapper">
        <div>
                <div class="logo-wrapper"><a href="{{ route('dashboard') }}"><img class="img-fluid for-light" src="{{ url('grocee/img/logo/icon-logo.png') }}" alt="" style="height:35px;width:35px"><img class="img-fluid for-dark" src="{{ url('grocee/img/logo/icon-logo.png') }}" alt="" style="height:35px;width:35px"></a>
                        <div class="back-btn"><i class="fa fa-angle-left"></i></div>
                        <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="align-left"> </i></div>
                </div>
                <div class="logo-icon-wrapper"><a href="{{ route('dashboard') }}"><img class="img-fluid for-light" src="{{ url('grocee/img/logo/icon-logo.png') }}" alt="" style="height:35px;width:35px"><img class="img-fluid for-dark" src="{{ url('grocee/img/logo/icon-logo.png') }}" style="height:35px;width:35px" alt=""></a></div>
                <nav class="sidebar-main">
                        <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
                        <div id="sidebar-menu">
                                <ul class="sidebar-links" id="simple-bar">
                                        <li class="back-btn"><a href="{{ route('dashboard') }}"><img class="img-fluid for-light" src="{{ url('grocee/img/logo/icon-logo.png') }}" alt="" style="height:35px;width:35px"><img class="img-fluid for-dark" src="{{ url('grocee/img/logo/icon-logo.png') }}" style="height:35px;width:35px" alt=""></a>
                                                <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                                        </li>
                                        <li class="sidebar-main-title">
                                                <div>
                                                        <h4 class="lan-1">General </h4>
                                                </div>
                                        </li>
                                        <li class="sidebar-list"> <a class="sidebar-link sidebar-title link-nav @stack('dashboard')" href="{{ route('dashboard') }}"><i data-feather="globe"></i><span class="lan-3">Dashboard</span></a></li>
                                        <li class="sidebar-main-title">
                                                <div>
                                                        <h4>Panen </h4>
                                                </div>
                                        </li>
                                        <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav @stack('panen')" href="{{ route('panen') }}"><i data-feather="shopping-bag"> </i><span>Panen</span></a></li>
                                        <li class="sidebar-main-title">
                                                <div>
                                                        <h4>Master Data </h4>
                                                </div>
                                        </li>
                                        <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav @stack('desa')" href="{{ route('desa') }}"><i data-feather="home"> </i><span>Desa</span></a></li>
                                        <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav @stack('lahan')" href="{{ route('lahan') }}"><i data-feather="grid"> </i><span>Lahan</span></a></li>
                                        <li class="sidebar-main-title">
                                                <div>
                                                        <h4>Kelompok Tani </h4>
                                                </div>
                                        </li>
                                        <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav @stack('kelompok')" href="{{ route('kelompok') }}"><i data-feather="user-check"> </i><span>Kelompok</span></a></li>
                                        <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav @stack('anggota')" href="{{ route('anggota') }}"><i data-feather="users"> </i><span>Anggota</span></a></li>
                                        <li class="sidebar-main-title">
                                                <div>
                                                        <h4>Bantuan </h4>
                                                </div>
                                        </li>
                                        <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav @stack('bantuan')" href="{{ route('bantuan') }}"><i data-feather="server"> </i><span>Jenis</span></a></li>
                                        <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav @stack('masuk')" href="{{ route('masuk') }}"><i data-feather="truck"> </i><span>Masuk</span></a></li>
                                        <li class="sidebar-main-title">
                                                <div>
                                                        <h4>Penyuluhan </h4>
                                                </div>
                                        </li>
                                        <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav @stack('penyuluh')" href="{{ route('penyuluh') }}"><i data-feather="monitor"> </i><span>Penyuluh</span></a></li>
                                        <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav @stack('jadwal-penyuluhan')" href="{{ route('jadwal-penyuluhan') }}"><i data-feather="activity"> </i><span>Jadwal Penyuluhan</span></a></li>
                                        <li class="sidebar-main-title">
                                                <div>
                                                        <h4>Kritik & Saran </h4>
                                                </div>

                                        </li>
                                        <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav @stack('saran')" href="{{ route('saran') }}"><i data-feather="message-circle"> </i><span>Kritik & Saran</span></a></li>
                                        <li class="sidebar-main-title">
                                                <div>
                                                        <h4>Penentuan Jenis Tanaman </h4>
                                                </div>

                                        </li>
                                        <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav @stack('data-latih')" href="{{ route('data-latih') }}"><i data-feather="archive"> </i><span>Data Latih</span></a></li>
                                        <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav @stack('naive-bayes')" href="{{ route('naive-bayes') }}"><i data-feather="zap"> </i><span>Naive Bayes</span></a></li>
                                        <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav @stack('naive-bayes')" href="{{ route('naive-bayes') }}"><i data-feather="zap"> </i><span>Naive Bayes</span></a></li>
                                </ul>
                        </div>
                        <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
                </nav>
        </div>
</div>