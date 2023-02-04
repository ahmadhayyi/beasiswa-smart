<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-end mt-5">
        @if (!$data->onFirstPage())
        <li class="page-item">
            <a class="page-link" href="{{ $data->previousPageUrl() }}" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        @endif
        @if ($data->currentPage() > 3)
        <li class="page-item"><a class="page-link" href="{{ $data->url(1) }}">1</a></li>
        <li class="page-item disabled"><span class="page-link">...</span></li>
        @endif
        @for ($i = max($data->currentPage()-2, 1); $i <= min(max($data->currentPage()-2, 1)+4,$data->lastPage()); $i++)
        <li class="page-item {{ $i == $data->currentPage() ? 'active' : '' }}"><a class="page-link"
                href="{{ $data->url($i) }}">{{ $i }}</a></li>
        @endfor
        @if ($data->currentPage() < $data->lastPage()-2)
            <li class="page-item disabled"><span class="page-link">...</span></li>
            <li class="page-item"><a class="page-link" href="{{ $data->url($data->lastPage()) }}">{{
                    $data->lastPage() }}</a></li>
        @endif
        @if ($data->hasMorePages())
        <li class="page-item">
            <a class="page-link" href="{{ $data->nextPageUrl() }}" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
        @endif
    </ul>
</nav>