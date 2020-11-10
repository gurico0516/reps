@extends('layouts.parent')

@section('content')

<br>
<br>

<main id="main">

    <div class="container mt-4">
        <div class="border p-4">
            <h1 class="h4 mb-4 font-weight-bold">
                投稿の新規作成
            </h1>

            <form method="POST" action="{{ route('create-complete') }}">
                @csrf
                <fieldset class="mb-4">
                    <div class="form-group">
                        <label for="subject">お名前</label>
                        <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}">
                        @if ($errors->has('name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="subject">好きな爬虫類</label>
                        <input  type="text" name="subject" class="form-control {{ $errors->has('subject') ? 'is-invalid' : '' }}">
                        @if ($errors->has('subject'))
                            <div class="invalid-feedback">
                                {{ $errors->first('subject') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="message">魅力</label>
                        <textarea name="message" class="form-control {{ $errors->has('message') ? 'is-invalid' : '' }}" rows="4" ></textarea>
                        @if ($errors->has('message'))
                            <div class="invalid-feedback">
                                {{ $errors->first('message') }}
                            </div>
                        @endif
                    </div>

                    <div class="mt-5">
                        <a class="btn btn-secondary" href="{{ route('index') }}">
                            キャンセル
                        </a>

                        <input type="submit" class="btn btn-info" value="確認する">
                    </div>
                </fieldset>
            </form>
        </div>
    </div>

</main><!-- End #main -->

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
