@foreach(config('laravel-material-dashboard.menu') as $item)
    <ul class="nav">
        @include('MaterialDashboard::partials.nav-permissions', ['item' => $item])
        @foreach(Illuminate\Support\Arr::get($item, 'links', []) as $subItem)
            @include('MaterialDashboard::partials.nav-permissions', ['item' => $subItem])
        @endforeach
    </ul>
@endforeach