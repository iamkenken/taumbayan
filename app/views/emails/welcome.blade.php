<h1>Hi {{ $firstname }}</h1>

<p>Welcome to the Taumbayan Polls</p>

<p>Please click the link below to verify your account and be able to submit your own poll.</p>

{{ URL::to('register/verify/'. $confirmation_code) }}