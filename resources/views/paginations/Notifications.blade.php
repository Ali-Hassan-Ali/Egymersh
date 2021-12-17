@if ($notifications->lastPage() > 1)
    <ul class="pagination justify-content-start">
        <li class="page-item {{ ($notifications->currentPage() == 1) ? ' active' : '' }}">
            <a class="page-link" href="{{ $notifications->url($notifications->currentPage()-1) }}">
                <i class="material-icons md-chevron_left"></i>
            </a>
        </li>

        @for ($i = 1; $i <= $notifications->lastPage(); $i++)
            <li class="page-item {{ ($notifications->currentPage() == $i) ? ' active' : '' }}">
                <a class="page-link" href="{{ $notifications->url($i) }}">{{ $i }}</a>
            </li>
        @endfor

        <li class="page-item {{ ($notifications->currentPage() == 1) ? ' active' : '' }}">
            <a class="page-link" href="{{ $notifications->url($notifications->currentPage()+1) }}">
                <i class="material-icons md-chevron_right"></i>
            </a>
        </li>

    </ul>
@endif