@if ($paginator->lastPage() > 1)
    <ul class="pagination">
        @if($paginator->currentPage() != 1)
            @if($paginator->currentPage() != $paginator->lastPage())
                <div style="margin-right: 40px">
            @endif
                <li class="page-item">
                    <a class="page-link" href="{{$paginator->previousPageUrl()}}">前へ</a>
                </li>
            </div>
        @endif

        @if($paginator->currentPage() != $paginator->lastPage())
            @if($paginator->currentPage() != 1)
                <div style="margin-left: 40px">
            @endif
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}">次へ</a>
                </li>
            </div>
        @endif
    </ul>
@endif
