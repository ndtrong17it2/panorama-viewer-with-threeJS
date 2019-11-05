<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r79/three.min.js"></script>
	<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/123879/OrbitControls.js"></script>
    <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/123879/DeviceOrientationControls.js"></script>
    <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/123879/StereoEffect.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}" type="text/javascript"></script>
    <title>Document</title>
</head>
<script>
    $(document).ready(function (){
        $("#idInputFile").change(function() {
            $('#idLabelinputFile').text(this.files[0].name);
        });
        $(".alert").alert();
    });
</script>

<body>
    @yield('content')
    <script src="{{ asset('js/panorama.js') }}" type="text/javascript"></script>
</body>

</html>