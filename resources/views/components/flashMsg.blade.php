@props(['msg', 'bg' => 'success', 'mt' => '25px 0 0 0']) {{-- default bg value is success --}}


<div class="alert alert-{{ $bg }} fade show" role="alert" style="margin:{{ $mt }};">
    <span>{{ $msg }}</span>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="position: relative; float: right; color: rgb(205,68,59);"></button>
</div>