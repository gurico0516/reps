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

<div class="mt-5">
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
