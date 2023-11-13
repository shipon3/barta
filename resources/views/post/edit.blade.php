@extends('layout.app')
@section('content')
<form action="{{route('post.update',$post->uuid)}}" method="POST" enctype="multipart/form-data" class="bg-white border-2 border-black rounded-lg shadow mx-auto max-w-none px-4 py-5 sm:px-6 space-y-3">
    <!-- Create Post Card Top -->
    @csrf
    @method('PATCH')
    <div>
        <div class="flex items-start /space-x-3/">
            <!-- Content -->
            <div class="text-gray-700 font-normal w-full">
                <textarea class="block w-full p-2 pt-2 text-gray-900 rounded-lg border-none outline-none focus:ring-0 focus:ring-offset-0" name="description" rows="2" placeholder="What's going on, Shamim?">{{$post->description}}</textarea>
            </div>
        </div>
    </div>

    <!-- Create Post Card Bottom -->
    <div>
        <!-- Card Bottom Action Buttons -->
        <div class="flex items-center justify-end">

            <div>
                <!-- Post Button -->
                <button type="submit" class="-m-2 flex gap-2 text-xs items-center rounded-full px-4 py-2 font-semibold bg-gray-800 hover:bg-black text-white">
                    Update Post
                </button>
                <!-- /Post Button -->
            </div>
        </div>
        <!-- /Card Bottom Action Buttons -->
    </div>
    <!-- /Create Post Card Bottom -->
</form>
@endsection