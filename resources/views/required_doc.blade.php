<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dear Member of Siopay</title>
</head>

<body class="">
    <div class="" style="padding: 20px">
        <h4><b>Dear,</b></h4>
        <h4><b>{{ $user }}!</b></h4>
        <p>Some Documents are Required for the Approval of your siopay.com Account.</p>

        <h2 style="margin-bottom: 0.5rem" class="mb-2">Documents:</h2>
        @if ($registrationDoc == true)
            <h4 style="margin-bottom: 0.5rem" class="mb-1">Registration Document is Required</h4>
        @endif

        @if ($fullDoc == true)
            <h4>Full Document is Required</h4>
        @endif

        <p>And Send these Documents to the siopay.com Support Team on this email <a class="text-primary"
                href="">{{ $supportEmail }}</a></p>
    </div>

</body>

</html>
