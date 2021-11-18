<div>
    @if(empty($teamlogourl))
    <img src="{{ asset('images/no_image.jpg') }}">
    @else
    <img src="{{ asset('storage/teams/' . $teamlogourl) }}">
    @endif
</div>