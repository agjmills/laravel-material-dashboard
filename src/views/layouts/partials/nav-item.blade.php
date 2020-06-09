<li class="nav-item">
  @if (Illuminate\Support\Arr::has($item, 'form_method'))
    <a class="nav-link" href="{{ route(Illuminate\Support\Arr::get($item, 'route'), Illuminate\Support\Arr::get($item, 'parameters')) }}" data-method="{{ Illuminate\Support\Arr::get($item, 'form_method') }}" data-token="{{ csrf_token() }}">
  @elseif (Illuminate\Support\Arr::has($item, 'route'))
    <a class="nav-link" href="{{ route(Illuminate\Support\Arr::get($item, 'route'), Illuminate\Support\Arr::get($item, 'parameters')) }}">
  @elseif (Illuminate\Support\Arr::has($item, 'link'))
    <a class="nav-link" href="{{ Illuminate\Support\Arr::get($item, 'link') }}">
  @endif
  @if (Illuminate\Support\Arr::has($item, 'icon'))
    <i class="fa {{ Illuminate\Support\Arr::get($item, 'icon') }}"></i>
  @endif
  @if ((Illuminate\Support\Arr::get($item, 'route', false) === false)  && (Illuminate\Support\Arr::get($item, 'link', false) === false))
    <p class="nav-link">{{ Illuminate\Support\Arr::get($item, 'text') }}</p>
  @else
    <p>{{ Illuminate\Support\Arr::get($item, 'text') }}</p>
  @endif
  @if (Illuminate\Support\Arr::get($item, 'route') || Illuminate\Support\Arr::get($item, 'link'))
    </a>
  @endif
</li>