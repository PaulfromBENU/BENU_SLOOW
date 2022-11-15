@extends('layouts.base_layout')

@section('title')
    {{ __('welcome.seo-title') }}
@endsection

@section('description')
    {{ __('welcome.seo-description') }}
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

<script type="text/javascript">
    // Show a loader on reservation submission
    function setLoading(isLoading) {
        if (isLoading) {
            // Disable the button and show a loader
            $('#spinner').show();
            $('#button-text').hide();
        } else {
            $('#spinner').hide();
            $('#button-text').show();
        }
    }

    $(function() {
        setLoading(false);
        Livewire.on('sendingConfirmation', function() {
            setLoading(true);
        });
    });
</script>
@endsection
