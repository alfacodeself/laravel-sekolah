{{-- @props(['nama' =]) --}}

<x-landingpage.top-bar phone="{{ $school->phone }}" email="{{ $school->email }}"></x-landingpage.top-bar>
<!-- ======= Header ======= -->
<header id="header" class="d-flex align-items-center">
    <div class="container d-flex justify-content-between align-items-center">

        <div class="logo">
            <h1><a href="{{ route('landingpage') }}">{{ $school->nama }}</a></h1>
        </div>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="{{ request()->routeIs('landingpage') ? 'active' : '' }}" href="{{ route('landingpage') }}">Beranda</a></li>
                <li class="dropdown">
                    <a href="#" class="{{ request()->routeIs('profile.*') ? 'active' : '' }}">
                        <span>Profil</span>
                        <i class="bi bi-chevron-down"></i>
                    </a>
                    <ul>
                        <li><a href="{{ route('profile.history') }}">Sejarah</a></li>
                        <li><a href="{{ route('profile.purpose') }}">Visi dan Misi</a></li>
                    </ul>
                </li>
                <li><a href="{{ route('news.index') }}" class="{{ request()->routeIs('news.*') ? 'active' : '' }}">Berita</a></li>
                <li><a href="{{ route('event.index') }}" class="{{ request()->routeIs('event.*') ? 'active' : '' }}">Agenda</a></li>
                <li><a href="{{ route('announcement.index') }}" class="{{ request()->routeIs('announcement.*') ? 'active' : '' }}">Pengumuman</a></li>
                <li><a href="{{ route('gallery.index') }}" class="{{ request()->routeIs('gallery.*') ? 'active' : '' }}">Galeri</a></li>
                @if ($portal != null)
                    <li class="dropdown">
                        <a href="#">
                            <span>Portal</span>
                            <i class="bi bi-chevron-down"></i>
                        </a>
                        <ul>
                            @foreach ($portal as $p)
                                <li><a href="{{ $p->link_portal }}">{{ $p->nama_portal }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                @endif
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->
