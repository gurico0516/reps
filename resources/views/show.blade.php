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

        <section>
            <h2 class="h5 mb-4">
                コメント
            </h2>

            @forelse($post->comments as $comment)
                <div class="border-top p-4">
                    <time class="text-secondary">
                        {{ $comment->name }} /
                        {{ $comment->created_at->format('Y-m-d') }}
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



<!-- コメント入力欄 -->
<form class="mb-4" method="POST" action="{{ route('comment') }}">
    @csrf
    <input type="hidden" name="post_id"  value="{{ $post->id }}">

    <div class="form-group">
        <label for="subject">名前</label>
        <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}">
        @if ($errors->has('name'))
            <div class="invalid-feedback">
                {{ $errors->first('name') }}
            </div>
        @endif
    </div>

    <div class="form-group">
        <label for="body">本文</label>
        <textarea name="comment" class="form-control {{ $errors->has('comment') ? 'is-invalid' : '' }}" rows="4"></textarea>
        @if ($errors->has('comment'))
            <div class="invalid-feedback">
                {{ $errors->first('comment') }}
            </div>
        @endif
    </div>

    <div class="mt-4">
        <button type="submit" class="btn btn-outline-info">
            コメントする
        </button>
    </div>
</form>

@if (session('commentstatus'))
    <div class="alert alert-success mt-4 mb-4">
        {{ session('commentstatus') }}
    </div>
@endif
<div class="mt-4 mb-4">
    <p>
        <a href="{{ route('index') }}" class="btn btn-info btn-sm">一覧に戻る</a>
        <a href="{{ route('edit', $post->id) }}" class="btn btn-info btn-sm">編集</a>
        <a href="{{ route('delete-confirm', $post->id) }}" class="btn btn-danger btn-sm">削除</a>
    </p>
</div>



 <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

@endsection
