@extends('layouts.parent')

@section('content')

<br>
<br>

<div class="container mt-4">
    <div class="border p-4">
        {{-- 件名 --}}
        <h1 class="h4 mb-4">
            {{ $post->subject }}
        </h1>

        {{-- 投稿情報 --}}
        <div class="summary">
            <p><span>{{ $post->name }}</span> / <time>{{ $post->updated_at->format('Y-m-d') }}</time></p>
        </div>

        {{-- 本文 --}}
        <p class="mb-5">
            {!! nl2br(e($post->message)) !!}
        </p>
    </div>
</div>

<div class="form-group row">
    <div class="offset-9 mt-4">
        <p>
            <a href="{{ route('index') }}" class="btn btn-info btn-sm">一覧に戻る</a>
            @auth
                @if ($post->user_id == Auth::user()->id)
                    <a href="{{ route('edit', $post->id) }}" class="btn btn-info btn-sm">編集</a>
                    <a href="{{ route('delete-confirm', $post->id) }}" class="btn btn-danger btn-sm">削除</a>
                @endif
            @endauth
        </p>
    </div>
</div>

@endsection
