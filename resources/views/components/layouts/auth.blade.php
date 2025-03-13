<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <title>Laravel</title>

      <!-- Fonts -->
      <link rel="preconnect" href="https://fonts.bunny.net">
      <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

      @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>
<body>
  <main class="flex justify-center items-center h-screen">
    <div class="shadow-xl p-6">
      {{ $slot }}
    </div>
  </main>
</body>
</html>