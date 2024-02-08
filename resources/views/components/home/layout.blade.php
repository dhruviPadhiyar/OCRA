<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" href="{{ url('logo/f1.png') }}" type="image/x-icon">
    <x-home.navbar />
    <x-home.links />
    <x-home.style />
    <script>
        setTimeout(function() {
            document.getElementById('alert').innerHTML = '';
        }, 5000);
    </script>
</head>

<body>
    <div class="container" id="alert">
        @if (session('success'))
            <div class="alert alert-success m-2">
                <p>{{ session('success') }}</p>
            </div>
        @elseif (session('error'))
            <div class="alert alert-danger m-2">
                <p>{{ session('error') }}</p>
            </div>
        @endif
    </div>
    {{ $slot }}
    <!-- scripts -->
    <x-home.script />
</body>

</html>
