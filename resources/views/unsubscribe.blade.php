@extends('layouts.minimal')

@section('title')
    Sock Feedback
    @parent
@stop


@section('header_styles')

@stop

@section('content')
    <div id="header" class="section-4">
        <div class="container-11 w-container">
            <img src="{{asset('assets/feedback/images/logo-tall.png')}}" class="image-23">
            <h1 class="heading-24">We're unsubscribing you!</h1>
        </div>
    </div>

    <div class="container-12 w-container">

            <div class="item-review-holder">
                <input type="button" value="Click Here to Un Subscribe" data-wait="Submitting review..." class="submit-button w-button socksku_feedback_button">
            </div>

    </div>

@stop

@section('footer_scripts')
<script>

</script>
@stop