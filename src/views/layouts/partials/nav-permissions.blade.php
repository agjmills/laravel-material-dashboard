@if (Illuminate\Support\Arr::has($item, 'permissions', false))
  @can(Illuminate\Support\Arr::get($item, 'permissions.action'), Illuminate\Support\Arr::get($item, 'permissions.resource'))
    @include('MaterialDashboard::partials.nav-item')
  @endcan
@else
  @include('MaterialDashboard::partials.nav-item')
@endif