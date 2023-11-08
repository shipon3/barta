<!DOCTYPE html>
<html class="html h-full bg-white">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />

  <style>
    * {
      font-family: 'Inter', sans-serif;
    }
  </style>
</head>

<body class="h-full">
  <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
      <a href="./index.html" class="text-center text-6xl font-bold text-gray-900">
        <h1>Barta</h1>
      </a>
      <h1 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">
        Create a new account
      </h1>
    </div>

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
      <form class="space-y-6" action="{{route('register.store')}}" method="POST">
        @csrf
        <!-- Name -->
        <div>
          <label for="first_name" class="block text-sm font-medium leading-6 text-gray-900">First Name</label>
          <div class="mt-2">
            <input id="first_name" value="{{old('first_name')}}" name="first_name" type="text" autocomplete="name" placeholder="Alp" required class="block w-full rounded-md border-0 p-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-black sm:text-sm sm:leading-6" />
            @error('first_name')
            <span class="text-red-600 text-sm font-medium">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <!-- Name -->
        <div>
          <label for="last_name" class="block text-sm font-medium leading-6 text-gray-900">Last Name</label>
          <div class="mt-2">
            <input id="last_name" value="{{old('last_name')}}" name="last_name" type="text" autocomplete="name" placeholder="Arslan" required class="block w-full rounded-md border-0 p-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-black sm:text-sm sm:leading-6" />
            @error('last_name')
            <span class="text-red-600 text-sm font-medium">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <!-- Username -->
        <div>
          <label for="user_name" class="block text-sm font-medium leading-6 text-gray-900">Username</label>
          <div class="mt-2">
            <input id="user_name" value="{{old('user_name')}}" name="user_name" type="text" autocomplete="username" placeholder="alparslan1029" required class="block w-full rounded-md border-0 p-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-black sm:text-sm sm:leading-6" />
            @error('user_name')
            <span class="text-red-600 text-sm font-medium">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <!-- Email -->
        <div>
          <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
          <div class="mt-2">
            <input id="email" name="email" value="{{old('email')}}" type="email" autocomplete="email" placeholder="alp.arslan@mail.com" required class="block w-full rounded-md border-0 p-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-black sm:text-sm sm:leading-6" />
            @error('email')
            <span class="text-red-600 text-sm font-medium">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <!-- Password -->
        <div>
          <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
          <div class="mt-2">
            <input id="password" name="password" type="password" autocomplete="current-password" placeholder="••••••••" required class="block w-full rounded-md border-0 p-2 p-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-black sm:text-sm sm:leading-6" />
            @error('password')
            <span class="text-red-600 text-sm font-medium">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <!-- Password -->
        <div>
          <label for="password_confirmation" class="block text-sm font-medium leading-6 text-gray-900">Confirm Password</label>
          <div class="mt-2">
            <input id="password_confirmation" name="password_confirmation" type="password" autocomplete="current-password" placeholder="••••••••" required class="block w-full rounded-md border-0 p-2 p-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-black sm:text-sm sm:leading-6" />
            @error('password_confirmation')
            <span class="text-red-600 text-sm font-medium">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div>
          <button type="submit" class="flex w-full justify-center rounded-md bg-black px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-black focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black">
            Register
          </button>
        </div>
      </form>

      <p class="mt-10 text-center text-sm text-gray-500">
        Already a member?
        <a href="{{route('login')}}" class="font-semibold leading-6 text-black hover:text-black">Sign In</a>
      </p>
    </div>
  </div>
</body>

</html>