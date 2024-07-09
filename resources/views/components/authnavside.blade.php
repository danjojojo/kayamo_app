<nav class="navbar navbar-dark sticky-top align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0" id="sidenavbar" style="background: rgb(78, 115, 223);--bs-primary: #4e73df;--bs-primary-rgb: 78,115,223;">
    <div class="container-fluid d-flex flex-column p-0">
        <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="{{ route('welcome') }}" wire:navigate>
            <div class="sidebar-brand-icon"><i class="fas fa-home fs-5" style="transform: rotate(0deg);"></i></div>
            <div class="sidebar-brand-text mx-3"><span class="text-capitalize fs-5 fw-normal">KayaMo</span></div>
        </a>
        <hr class="sidebar-divider my-0">
        <ul class="navbar-nav text-light" id="accordionSidebar" style="margin-top: 18px;margin-bottom: 18px;">
            <li class="nav-item" style="margin-bottom: 8px;"><a class="nav-link fs-6 text-center" href="{{ route('requests.index') }}" wire:navigate><i class="fas fa-clipboard-list text-center"></i><span class="fs-6 text-center">Requests</span></a></li>
            {{-- <li class="nav-item fs-6 text-center" style="margin-bottom: 8px;"><a class="nav-link fs-6 text-center" href="{{ route('visits') }}" wire:navigate><i class="fas fa-user fs-6 text-center"></i><span class="fs-6 text-center">Visits</span></a></li> --}}
            <li class="nav-item fs-6 text-center" style="margin-bottom: 8px;"><a class="nav-link fs-6 text-center" href="{{ route('quotes.index') }}" wire:navigate><i class="fas fa-dollar-sign text-center"></i><span class="fs-6 text-center">Quotes</span></a></li>
            <li class="nav-item fs-6 text-center" style="margin-bottom: 8px;"><a class="nav-link fs-6 text-center" href="{{ route('bookings.index') }}" wire:navigate><i class="fas fa-bookmark text-center"></i><span class="fs-6 text-center">Bookings</span></a></li>
            <li class="nav-item fs-6 text-center" style="margin-bottom: 8px;"><a class="nav-link fs-6 text-center" href="{{ route('finished') }}" wire:navigate><i class="fas fa-check"></i><span class="fs-6 text-center">Finished</span></a></li>
        </ul>
        <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
    </div>
</nav>