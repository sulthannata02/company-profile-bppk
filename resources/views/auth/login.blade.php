<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login Admin</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap"
          rel="stylesheet">

    @vite('resources/css/main.css')
</head>

<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

    <form method="POST" action="{{ route('login.process') }}">
        @csrf
        <h3>Login Disini!</h3>

        <label for="email">Email</label>
        <input type="text" placeholder="Email" id="email" name="email" required>

        <label for="password">Password</label>
        <input type="password" placeholder="Password" id="password" name="password" required>

        <button type="submit">Log In</button>

        <a href="{{ url('/') }}"
                class="w-full block text-center mt-3 bg-gray-500 text-white py-3 rounded-lg font-semibold hover:bg-gray-600 transition">
                Kembali
            </a>
    </form>
</body>
</html>
