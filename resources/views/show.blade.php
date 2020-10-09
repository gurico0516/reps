@extends('layouts.parent')

@section('content')

<div class="container mt-4">
    <div class="border p-4">
        {{-- 件名 --}}
        <h1 class="h4 mb-4">
            {{ $post->subject }}
        </h1>

        {{-- 投稿情報 --}}
        <div class="summary">
            <p><span>{{ $post->name }}</span> / <time>{{ $post->updated_at->format('Y-m-d') }}</time> / {{ $post->id }}</p>
        </div>

        {{-- 本文 --}}
        <p class="mb-5">
            {!! nl2br(e($post->message)) !!}
        </p>

        <section>
            <h2 class="h5 mb-4">
                コメント
            </h2>

            @forelse($post->comments as $comment)
                <div class="border-top p-4">
                    <time class="text-secondary">
                        {{ $comment->name }} /
                        {{ $comment->created_at->format('Y-m-d') }} /
                        {{ $comment->id }}
                    </time>
                    <p class="mt-2">
                        {!! nl2br(e($comment->comment)) !!}
                    </p>
                </div>
            @empty
                <p>コメントはまだありません。</p>
            @endforelse
        </section>
    </div>
</div>

@endsection
