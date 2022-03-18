<div class="d-flex justify-content-between">
    <h5>{{ $title }}</h5>
    @if(isset($route))
        <a href="{{ $route }}" class="btn btn-sm btn-light">{{$routeName ?? 'Back'}}</a>
    @endif
</div>
<hr>
