@if(session()->has('success'))
    <div class="alert alert-success alert-close mb-5 text-center">
        <button class="alert-btn-close">
            <i class="fad fa-times"></i>
        </button>
        <span class="text-sm">{{ session('success') }}</span>
    </div>
@else
    <div class="alert alert-error alert-close mb-5 text-center">
        <button class="alert-btn-close">
            <i class="fad fa-times"></i>
        </button>
        <span class="text-sm text-red-600">{{ session('failed') }}</span>
    </div>
@endif


