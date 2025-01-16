<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Brew & Bite</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap');
      * {
        font-family: 'Poppins', sans-serif;
      }
    </style>
  </head>
  <body class="text-gray-900 min-h-screen w-full flex items-center justify-center bg-[#fce4e1]">
    <div class="bg-white lg:w-1/3 sm:w-3/4 p-[3rem] shadow-xl sm:rounded-xl">
      <form action="login" method="post">
        @csrf
        <div class="flex flex-row justify-center items-center">
          <h1 class="font-semibold text-emerald-600 pb-1 ml-2 text-3xl mb-4">Brew & Bite</h1>
        </div>
        <div>
          <p class="text-center text-gray-600 mb-6 text-sm">Welcome back! Please login to your account.</p>
        </div>
        <div>
          <input type="email" name="email" 
            class="w-full px-8 py-4 rounded-xl font-medium bg-gray-100 border border-gray-300 placeholder-gray-500 text-sm focus:outline-none focus:border-emerald-400 focus:bg-white" 
            placeholder="Email" required>
            @error('email')
                <div class="text-red-500 text-xs mt-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="mt-5">
          <input type="password" name="password" 
            class="w-full px-8 py-4 rounded-xl font-medium bg-gray-100 border border-gray-300 placeholder-gray-500 text-sm focus:outline-none focus:border-emerald-400 focus:bg-white" 
            placeholder="Password" required>
            @error('password')
                <div class="text-red-500 text-xs mt-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="text-center flex flex-col">
          <button type="submit" name="login" 
            class="mt-5 tracking-wide font-semibold bg-emerald-500 text-gray-100 w-full py-4 rounded-xl hover:bg-emerald-700 transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none">
            Login
          </button>
          <div>
            <p class="mt-6 text-xs text-gray-600 text-center">
              Don't have an account?
              <a href="/register" 
                class="border-b border-brown-500 border-dotted text-brown-500 font-semibold">
                Register here
              </a>
            </p>
          </div>
        </div>
      </form>
    </div>
  </body>
</html>
