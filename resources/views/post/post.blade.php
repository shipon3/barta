@extends('layouts.app')
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
            <span>{{count($comments)}} comments</span>
            <span class="">•</span>
            <span>{{$post->view_count}} views</span>
        </div>
        <hr class="my-6">
        <form action="{{ route('comment.store',$post->id)}}" method="POST">
            @csrf
            <!-- Create Comment Card Top -->
            <div>
                <div class="flex items-start /space-x-3/">
                    <div class="text-gray-700 font-normal w-full">
                        <textarea x-data="{
                          resize () {
                              $el.style.height = '0px';
                              $el.style.height = $el.scrollHeight + 'px'
                          }
                      }" x-init="resize()" @input="resize()" type="text" name="comment" placeholder="Write a comment..." class="flex w-full h-auto min-h-[40px] px-3 py-2 text-sm bg-gray-100 focus:bg-white border border-sm rounded-lg border-neutral-300 ring-offset-background placeholder:text-neutral-400 focus:border-neutral-300 focus:outline-none focus:ring-1 focus:ring-offset-0 focus:ring-neutral-400 disabled:cursor-not-allowed disabled:opacity-50 text-gray-900" style="height: 38px;"></textarea>
                    </div>
                </div>
            </div>

            <!-- Create Comment Card Bottom -->
            <div>
                <!-- Card Bottom Action Buttons -->
                <div class="flex items-center justify-end">
                    <button type="submit" class="mt-2 flex gap-2 text-xs items-center rounded-full px-4 py-2 font-semibold bg-gray-800 hover:bg-black text-white">
                        Comment
                    </button>
                </div>
                <!-- /Card Bottom Action Buttons -->
            </div>
            <!-- /Create Comment Card Bottom -->
        </form>
    </article>
    <hr>
    <div class="flex flex-col space-y-6">
        <h1 class="text-lg font-semibold">Comments ({{count($comments)}})</h1>
        @if(count($comments) > 0)
        <!-- Barta User Comments Container -->
        <article class="bg-white border-2 border-black rounded-lg shadow mx-auto max-w-none px-4 py-2 sm:px-6 min-w-full divide-y">

            @foreach($comments as $key => $comment)

            <div class="py-4">
                <!-- Barta User Comments Top -->
                <header>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <!-- User Info -->
                            <div class="text-gray-900 flex flex-col min-w-0 flex-1">
                                <a href="profile.html" class="hover:underline font-semibold line-clamp-1">
                                    {{$comment->author->f_name}} {{$comment->author->l_name}}
                                </a>

                                <a href="profile.html" class="hover:underline text-sm text-gray-500 line-clamp-1">
                                    {{$comment->author->user_name}}
                                </a>
                            </div>
                            <!-- /User Info -->
                        </div>
                        @if($comment->author->id == Auth::user()->id)
                        <div class="flex flex-shrink-0 self-center" x-data="{ open: false }">
                            <div class="relative inline-block text-left">
                                <div>
                                    <button @click="open = !open" type="button" class="-m-2 flex items-center rounded-full p-2 text-gray-400 hover:text-gray-600" id="menu-0-button">
                                        <span class="sr-only">Open options</span>
                                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path d="M10 3a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM10 8.5a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM11.5 15.5a1.5 1.5 0 10-3 0 1.5 1.5 0 003 0z"></path>
                                        </svg>
                                    </button>
                                </div>
                                <!-- Dropdown menu -->
                                <div x-show="open" @click.away="open = false" class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1" id="user-menu-item-0">Edit</a>
                                    <a href="{{route('comment.destroy',$comment->id)}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1" id="user-menu-item-1">Delete</a>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>

                </header>

                <!-- Content -->
                <div class="py-4 text-gray-700 font-normal">
                    <p>
                        {{$comment->description}}
                    </p>
                </div>

                <!-- Date Created -->
                <div class="flex items-center gap-2 text-gray-500 text-xs">
                    <span class="">{{getTimeAgo($comment->created_at)}}</span>
                </div>
            </div>

            @endforeach

            <!-- /Comments -->
        </article>
        @endif
        <!-- /Barta User Comments -->
    </div>
</section>
@endsection