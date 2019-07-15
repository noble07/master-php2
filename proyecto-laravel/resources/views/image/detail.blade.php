@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @include('includes.message')
            <div class="card pub_image mb-4">
                <div class="card-header">
                    @if ($image->user->image)
                        <div class="container-avatar">
                            <img src="{{ route('user.avatar', ['filename' => $image->user->image]) }}" class="avatar mb-3" alt="">
                        </div>
                    @endif
                    <div class="data-user">
                        {{ $image->user->name.' '.$image->user->surname }}
                        <span class="nickname">{{ ' | @'.$image->user->nick  }}</span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="image-container">
                        <img src="{{ route('image.file', ['filename' => $image->image_path]) }}" alt="">
                    </div>
                    <div class="description px-4 pt-4">
                        <span class="nickname">{{ '@'.$image->user->nick }}</span>
                        <p>{{ $image->description }}</p>
                    </div>
                    <div class="likes pl-4 pr-2 float-left">
                        <img src="{{ asset('img/black-heart.png') }}" alt="">
                    </div>
                    <div class="comments">
                        <a href="" class="btn btn-sm btn-warning mr-4 mb-4">
                            Comentarios ({{ count($image->comments) }})
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection