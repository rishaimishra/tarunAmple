<!DOCTYPE html>
<html>
<head>
    <title>{{ $mailData['title'] }}</title>
</head>
<body>
    <h1>{{ $mailData['title'] }}</h1>
    <p>{{ $mailData['body'] }}</p>

    {{-- @php
    dd( $mailData['userObject']->user_id,  $mailData['userObject']->verification_link);
    @endphp --}}

  
    <p>
<a href="{{ route('member.verification.email', ['id' => $mailData['userObject']->user_id, 'link' =>  $mailData['userObject']->verification_link]) }}">Click here to verify your email</a>

    </p>
     
    <p>Thank you</p>
</body>
</html>