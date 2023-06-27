<div class="gallery-pagination">
    <ul class="pagination justify-content-center">
      <li class="page-item">
        <a class="page-link" href="{{ $paginator->previousPageUrl() }}" aria-label="Previous">
          <span aria-hidden="true"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> Previous</span>
        </a>
      </li>
      @foreach ($elements as $element)
        @if (is_string($element))
          <li class="page-item disabled"><span class="page-link">{{ $element }}</span></li>
        @endif

        @if (is_array($element))
          @foreach ($element as $page => $url)
            <li class="page-item {{ $page == $paginator->currentPage() ? 'active' : '' }}">
              <a class="page-link" href="{{ $url }}">{{ $page }}</a>
            </li>
          @endforeach
        @endif
      @endforeach
      <li class="page-item">
        <a class="page-link" href="{{ $paginator->nextPageUrl() }}" aria-label="Next">
          <span aria-hidden="true">Next <i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>
        </a>
      </li>
    </ul>
  </div>
