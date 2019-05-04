<div class="dataTables_paginate paging_simple_numbers" id="key-table_paginate">
@if ($paginator->lastPage() > 1)
    <ul class="pagination">
        <li class="{{ ($paginator->currentPage() == 1) ? ' paginate_button page-item disabled' : '' }}">
            <a href="{{ $paginator->url(1) }}" class="page-link">Previous</a>
        </li>
        @for ($i = 1; $i <= $paginator->lastPage(); $i++)
            <li class="{{ ($paginator->currentPage() == $i) ? ' paginate_button page-item active' : '' }}">
                <a href="{{ $paginator->url($i) }}" class="page-link">{{ $i }}</a>
            </li>
        @endfor
        <li class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' paginate_button page-item next disabled' : '' }}">
            <a href="{{ $paginator->url($paginator->currentPage()+1) }}" class="page-link">Next</a>
        </li>
    </ul>
@endif
</div>