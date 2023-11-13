@extends('layout.app')
@section('content')
<section id="newsfeed" class="space-y-6">
    <!-- Barta Card -->
    <article class="bg-white border-2 border-black rounded-lg shadow mx-auto max-w-none px-4 py-5 sm:px-6">
        <!-- Barta Card Top -->
        <header>
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3">

                    <!-- User Info -->
                    <div class="text-gray-900 flex flex-col min-w-0 flex-1">
                        <a href="profile.html" class="hover:underline font-semibold line-clamp-1">
                            {{$post->f_name}} {{$post->l_name}}
                        </a>

                        <a href="profile.html" class="hover:underline text-sm text-gray-500 line-clamp-1">
                            {{$post->user_name}}
                        </a>
                    </div>
                    <!-- /User Info -->
                </div>
            </div>
        </header>

        <!-- Content -->
        <div class="py-4 text-gray-700 font-normal">
            <p>{{$post->description}}
            </p>
        </div>

        <!-- Date Created & View Stat -->
        <div class="flex items-center gap-2 text-gray-500 text-xs my-2">
            <span class="">{{getTimeAgo($post->created_at)}}</span>
            <span class="">•</span>
            <span>{{$post->view_count}} views</span>
        </div>
    </article>
</section>
@endsection