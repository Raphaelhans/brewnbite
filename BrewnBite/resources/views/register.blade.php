<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Brew & Bite - Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap');
      * {
        font-family: 'Poppins', sans-serif;
      }
    </style>
  </head>
  <body class="bg-gray-100 text-gray-900 min-h-screen w-full flex items-center justify-center">
    <div class="flex justify-center items-center w-100 min-h-screen">
      <div class="wrapper lg:w-6/12 sm:w-4/5 flex flex-row bg-white sm:rounded-xl">
        <div class="lg:w-6/12 sm:w-3/6 flex flex-col justify-center items-center rounded-l-xl bg-gradient-to-tr from-[#fcdad0] to-slate-50 p-[4rem]">
          <h2 class="text-3xl font-bold text-emerald-600 text-center my-8">Welcome to <span class="text-emerald-600">Brew & Bite</span></h2>
          <p class="text-sm font-light text-justify text-emerald-600">Join Brew & Bite, your go-to destination for all things food and drink! Whether you're craving the perfect coffee or a delicious bite, we provide a seamless experience to connect with your culinary needs.</p>
        </div>
        <div class="lg:w-6/12 p-[4rem]">
          <form action="register" method="post">
            <div class="flex flex-row justify-center items-center">
              <h1 class="font-semibold text-emerald-600 pb-1 ml-2">Brew & Bite</h1>
            </div>
            <div>
              <h2 class="text-3xl font-bold text-black text-center my-8">Create Your Account</h2>
            </div>
            <div>
              <input type="text" name="name" class="w-full px-8 py-4 rounded-xl font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-emerald-400 focus:bg-white" placeholder="Enter your Name" required>
            </div>
            <div class="mt-5">
              <input type="password" name="password" class="w-full px-8 py-4 rounded-xl font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-emerald-400 focus:bg-white" placeholder="Password" required>
            </div>
            <div class="mt-5">
              <input type="email" name="email" class="w-full px-8 py-4 rounded-xl font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-emerald-400 focus:bg-white" placeholder="Enter your Email" required>
            </div>
            <div class="mt-5">
              <input type="text" name="phone" class="w-full px-8 py-4 rounded-xl font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-emerald-400 focus:bg-white" placeholder="Enter your Phone Number" required>
            </div>
            <div class="text-center flex flex-col">
              <button type="submit" name="register" class="mt-5 tracking-wide font-semibold bg-emerald-500 text-gray-100 w-full py-4 rounded-xl hover:bg-emerald-700 transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none">
                <span><i class="fa-solid fa-user-plus mr-4"></i></span>Register
              </button>
              <div>
                <p class="mt-6 text-xs text-gray-600 text-center">
                  Already have an account?
                  <a href="/" class="border-b border-emerald-500 border-dotted text-emerald-500 font-semibold">
                    Login here
                  </a>
                </p>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
