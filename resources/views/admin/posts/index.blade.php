@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 my-5">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('deleted'))
                    <div class="alert alert-danger">
                        {{ session('deleted') }}
                    </div>
                @endif

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Author</th>
                            <th scope="col">Title</th>
                            <th scope="col">Date</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($posts as $post)
                            <tr>
                                <th class="align-middle">{{ $post->id }}</th>
                                <td class="align-middle">{{ $post->user->name }}</td>
                                <td class="align-middle">{{ $post->post_title }}</td>
                                <td class="align-middle">{{ $post->post_date }}</td>
                                <td>
                                    <a href="{{ route('admin.posts.show', $post->id) }}" class="btn btn-primary">View</a>
                                    <a href="{{ route('admin.posts.edit', $post->id) }}"
                                        class="btn btn-success mx-1">Edit</a>
                                    <form class="d-inline" action="{{ route('admin.posts.destroy', $post->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="10">Posts are not available</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="d-flex justify-content-center ">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
