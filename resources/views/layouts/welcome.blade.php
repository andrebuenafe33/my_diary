<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('/images/Books.ico') }}">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&family=Orbitron:wght@700&display=swap" rel="stylesheet">

    <!-- Tailwind CDN (if you're not using Laravel Mix or Vite) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{asset('/css/welcome.css')}}">
   
</head>
<body class="min-h-screen flex items-center justify-center relative bg-gray-100 text-white overflow-hidden animated-gradient">

    <!-- Particles background container -->
    <div id="particles-js" class="absolute inset-0 z-0"></div>

    <!-- Foreground login content -->
    <main class="relative z-10 w-full max-w-md mx-auto p-6 rounded-lg shadow-xl fade-in text-center text-white backdrop-blur-md bg-white/10 border border-white/20">
        <img src="{{ asset('/images/Books.ico') }}" alt="Books Logo" class="mx-auto mb-4 w-20 h-20">
        <h1 class="text-2xl mb-6 font-bold"><i>Duty Diary</i></h1>
        <a href="{{ route('login') }}" class="login-btn inline-block px-6 py-2 border-2 border-gray-700 rounded-full text-gray-700 font-semibold hover:bg-gray-800 hover:text-white transition duration-300">Login</a>
    </main>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
    <script src="{{ asset('js/welcome.js') }}"></script>
</body>

</html>
