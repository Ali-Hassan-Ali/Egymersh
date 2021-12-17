@if ($sellers->lastPage() > 1)
    <ul class="pagination justify-content-start">
        <li class="page-item {{ ($sellers->currentPage() == 1) ? ' active' : '' }}">
            <a class="page-link" href="{{ $sellers->url($sellers->currentPage()-1) }}">
                <i class="material-icons md-chevron_left"></i>
            </a>
        </li>

        @for ($i = 1; $i <= $sellers->lastPage(); $i++)
            <li class="page-item {{ ($sellers->currentPage() == $i) ? ' active' : '' }}">
                <a class="page-link" href="{{ $sellers->url($i) }}">{{ $i }}</a>
            </li>
        @endfor

        <li class="page-item {{ ($sellers->currentPage() == 1) ? ' active' : '' }}">
            <a class="page-link" href="{{ $sellers->url($sellers->currentPage()+1) }}">
                <i class="material-icons md-chevron_right"></i>
            </a>
        </li>

    </ul>
@endif