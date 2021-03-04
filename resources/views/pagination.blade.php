@php
    /**  @var $tags $posts $categories  */
    $pages = $categories ?? $pages = $posts ?? $pages = $tags;
@endphp

<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">

        @if($pages->currentPage() > 1 )
            <li class="page-item"><li class="page-item"><a class="page-link" class="page-link" href="{{ $pages->previousPageUrl() }}"> Prev </a></li>
        @endif


        @foreach($pages->getUrlRange($pages->currentPage()-1 , $pages->currentPage()+1) as $num => $link)
            @if($loop->first && $num >= 2)
                <li class="page-item"><li class="page-item"><a class="page-link" class="page-link" href="{{ $pages->url(1) }}"> {{ 1 }} </a></li>
            @endif

            @if($num >= 3 && $loop->first)
                <li class="page-item"> ... </li>
            @endif


            @if($num > 0 && $num <= $pages->lastPage())
                <li class="page-item"><a class="page-link" href="{{ $link }}"> {{ $num }} </a>
            @endif


            @if($num == 2 && $loop->last)
                <li class="page-item"><a class="page-link" href="{{ $pages->url($pages->currentPage() + 2) }}"> {{ $pages->currentPage() + 2 }} </a>
            @endif

            @if($num+1 < $pages->lastPage() && $loop->last)
                <li class="page-item"> ... </li>
            @endif

            @if($loop->last && $num < $pages->lastPage())
                <li class="page-item"><a class="page-link" href="{{ $pages->url($pages->lastPage()) }}"> {{ $pages->lastPage()}} </a>
            @endif

        @endforeach
        @if($pages->currentPage() !== $pages->lastPage())
            <li class="page-item"><a class="page-link" href="{{ $pages->nextPageUrl() }}"> Next </a>
        @endif
    </ul>
</nav>

