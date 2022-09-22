@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 my-5">
                <div class="card mb-3">
                    <img src="{{ $post->post_image }}" class="card-img-top" alt="{{ $post->title }}">
                    <div class="card-body">
                        <h2>{{ $post->post_title }}</h2>
                        <p class="card-text">{{ $post->post_content }}</p>
                        <span class="badge text-white bg-dark p-2">{{ $post->user->name }}</span>
                        <span class="badge text-white bg-dark p-2">{{ $post->post_date }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
