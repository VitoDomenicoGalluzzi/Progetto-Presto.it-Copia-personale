<form class="d-inline" action="{{route('setLanguageLocale', $lang)}}" method="POST">
@csrf
<button type="submit" class="btn">
    <img src="{{asset('vendor/blade-flags/language-' . $lang . '.svg')}}" width="30">
</button>

</form>