<!DOCTYPE html>
<html>
<head>
    <title>How to Generate QR Code in Laravel 8?</title>
</head>
<body>

<div class="visible-print text-center">
    <center><h1>QR Code Generator Example</h1>

        {!! QrCode::size(80)->generate('192.168.1.11/role-permissions-blog/public/login'); !!}</center>

</div>

</body>
</html>
