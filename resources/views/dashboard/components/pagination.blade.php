<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-end mt-5">
        @if (!$data->onFirstPage())
        <li class="page-item">
            <a class="page-link" href="{{ $data->previousPageUrl() }}" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        @endif
        @for ($i = 1; $i <= $data->lastPage(); $i++)
        <li class="page-item {{ $i == $data->currentPage() ? 'active' : '' }}"><a class="page-link"
                href="{{ $data->url($i) }}">{{ $i }}</a></li>
        @endfor
        @if ($data->hasMorePages())
        <li class="page-item">
            <a class="page-link" href="{{ $data->nextPageUrl() }}" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
        @endif
    </ul>
</nav>
