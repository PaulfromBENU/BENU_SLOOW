@extends('layouts.base_layout')

@section('title')
    Bienvenue sur BENU SLO0W
@endsection

@section('main-content')
    @include('includes.welcome.presentation')
@endsection

@section('scripts')
<script type="text/javascript">
    $(function() {
        let bulletText = $('#welcome-bullet-presentation').text();
        let splitText = bulletText.split("•");
        let newText = "";
        let newSentence;
        splitText.forEach(function(sentence, index) {
            if (index > 0) {
                newSentence = "• " + sentence + '</li><li>';
                newText += newSentence;
            }
        });
        $('#welcome-bullet-presentation').html(newText);
    });
</script>
@endsection
