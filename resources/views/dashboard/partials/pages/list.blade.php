@foreach($pages as $page)
    <li class="{{ (request()->is("ru/dashboard/pages/$page->id*")) ? 'active' : '' }}">
        <a href="{{ route('dashboard.pages.edit', $page->id) }}">
            <i class="feather icon-circle"></i>
            <span class="menu-item" data-i18n="Grid">{{ $page->getTranslation('name', 'ru') }}</span>
        </a>
    </li>
@endforeach
