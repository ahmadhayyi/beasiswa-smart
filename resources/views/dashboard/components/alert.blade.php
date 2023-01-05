@if(session()->has('success'))
    <div class="alert alert-success alert-close mb-5">
        <button class="alert-btn-close">
            <i class="fad fa-times"></i>
        </button>
        <span>{{ session('success') }}</span>
    </div>
@else
    <div class="alert alert-error alert-close">
        <button class="alert-btn-close">
            <i class="fad fa-times"></i>
        </button>
        <span>{{ session('failed') }}</span>
    </div>
@endif


