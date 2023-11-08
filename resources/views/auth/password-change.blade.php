@extends('layout.app')
@section('content')
<form action="{{route('password.store')}}" method="POST">
    @csrf
    @method('PATCH')
    <div class="space-y-12">
        <div class="border-gray-900/10 pb-4">
            <h2 class="text-xl font-semibold leading-7 text-gray-900">
                Change Password
            </h2>
            <div class="mt-4 border-gray-900/10 pb-4">
                <div class="grid grid-cols-1 gap-x-4 gap-y-4 sm:grid-cols-6">
                    <div class="col-span-full">
                        <label for="password" class="block text-sm font-medium leading-6 text-gray-900">New Password</label>
                        <div class="mt-2">
                            <input type="password" name="password" id="password" autocomplete="password" class="block w-full rounded-md border-0 p-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-gray-600 sm:text-sm sm:leading-6" />
                        </div>
                        @error('password')
                        <span class="text-red-600 text-sm font-medium">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="mt-4 border-gray-900/10 pb-4">
                <div class="grid grid-cols-1 gap-x-4 gap-y-4 sm:grid-cols-6">
                    <div class="col-span-full">
                        <label for="password_confirmation" class="block text-sm font-medium leading-6 text-gray-900">Confirm Password</label>
                        <div class="mt-2">
                            <input type="password" name="password_confirmation" id="password_confirmation" autocomplete="password" class="block w-full rounded-md border-0 p-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-gray-600 sm:text-sm sm:leading-6" />
                        </div>
                        @error('password_confirmation')
                        <span class="text-red-600 text-sm font-medium">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-6 flex items-center justify-end gap-x-6">
        <button type="button" class="text-sm font-semibold leading-6 text-gray-900">
            Cancel
        </button>
        <button type="submit" class="rounded-md bg-gray-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600">
            Save
        </button>
    </div>
</form>
@endsection