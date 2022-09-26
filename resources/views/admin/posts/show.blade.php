@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 my-5">
                <div class="card mb-3">
                    {{-- <img src="{{ $post->post_image }}" class="card-img-top" alt="{{ $post->title }}"> --}}
                    <img src="{{ asset('storage/' . $post->post_image) }}" alt="{{ $post->title }}">
                    <div class="card-body">
                        <h2>{{ $post->post_title }}</h2>
                        <p class="card-text">{{ $post->post_content }}</p>
                        <p>Post written by {{ $post->user->name }} | on {{ $post->post_date }}</p>
                        <div>
                            <span>Tags:</span>
                            <span class="badge text-white bg-success p-2 mx-2">
                                @forelse ($post->tags as $tag)
                                    {{ $tag->name }}  &nbsp;
                                @empty
                                    No tag for this post
                                @endforelse
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
