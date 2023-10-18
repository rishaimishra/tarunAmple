<!DOCTYPE html>
<html>
<head>
    <title>{{ $mailData['title'] }}</title>
</head>
<body>
    <h1>{{ $mailData['title'] }}</h1>
    <p>{{ $mailData['body'] }}</p>


  
    <p>
    	Thanks For Register In Amplepoints Vendor Panel,
    	<br>
    	name : {{ $mailData['first_name'] }}
    	<br>
    	email : {{ $mailData['email'] }}

    </p>
     
    <p>Thank you</p>
</body>
</html>