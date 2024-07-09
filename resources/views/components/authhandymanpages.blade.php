@props(['user'])

<div class="d-flex flex-fill justify-content-between" style="margin-top: 22px;">
    <a class="d-flex flex-grow-1" href="{{ route('profile', $user)}}" style="margin-right: 10px;" wire:navigate>
        <button class="btn btn-primary d-block w-100" type="submit" style="font-family: 'Libre Franklin', sans-serif;">Overview</button>
    </a>
    <a href="{{ route('profile_reviews', $user)}}" class="d-flex flex-grow-1" href="#" style="margin-right: 10px;" wire:navigate>
        <button class="btn btn-primary d-block w-100" type="submit" style="font-family: 'Libre Franklin', sans-serif;">Reviews</button>
    </a>
    <a class="d-flex flex-grow-1" href="{{ route('profile_portfolio', $user)}}" wire:navigate>
        <button class="btn btn-primary d-block w-100" type="submit" style="font-family: 'Libre Franklin', sans-serif;">Portfolio</button>
    </a>
</div>