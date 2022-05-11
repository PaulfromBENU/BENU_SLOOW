@extends('layouts.base_layout')

@section('title')
    Bienvenue sur BENU SLO0W
@endsection

@section('main-content')
    @include('includes.welcome.presentation')
    @include('includes.welcome.transition_1')
    @include('includes.welcome.content_1')
    @include('includes.welcome.transition_2')
    @include('includes.welcome.concept')
    @include('includes.welcome.reservation')
    @include('includes.welcome.faq')
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
