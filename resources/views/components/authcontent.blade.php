<div id="wrapper">

    {{-- SIDE NAV --}}
    <x-authnavside/>
    {{-- SIDE NAV --}}



    {{-- BOTTOM NAV WHEN SMALL SCREEN SIZE --}}
    <x-authnavbot/>
    {{-- BOTTOM NAV WHEN SMALL SCREEN SIZE --}}



    {{-- CONTENT --}}
    <div class="d-flex flex-column" id="content-wrapper">
        <div id="content">


            {{-- TOP NAV --}}
            <x-authnavtop/>
            {{-- TOP NAV --}}


            {{ $slot }}

            
        </div>
    </div><a class="border rounded d-inline scroll-to-top" href="#page-top" style="margin-top: 0px;margin-bottom: 73px;"><i class="fas fa-angle-up"></i></a>
</div>