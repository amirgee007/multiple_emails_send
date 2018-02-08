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

            <div id="hide" class="item-review-holder" >
                <input data-id="{{$url}}" type="button" id="unsub-button" value="Click Here to Un Subscribe" data-wait="Submitting review..." class="submit-button w-button socksku_feedback_button">
            </div>

            <div id="show" class="item-review-holder" style="display: none">
                <h4>You have successfully unsubscribed from e-mails about member benefits.!</h4>
                <h5>We’re sorry that you no longer wish to receive these e-mails but we understand..!<br></h5>
            </div>
    </div>

@stop

@section('footer_scripts')

    <script>
    $("#unsub-button").click(function(e){

        var url = ($(this).attr('data-id'));

        $.ajax({

            url: "{{route('post.customer.unsubscribe')}}",
            data: {'url': url },
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            success: function(data) {
                if(data.status)
                {
                    $('#show').css('display','block');
                    $('#hide').css('display','none');
                    toastr.success('Your have successfully unSubscribed from our Emailing System.','Message');
                }
                else
                    toastr.error('Something went wrong please try again later','Message');
            },
            type: 'POST'
        });

    });
</script>
@stop