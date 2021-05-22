@extends("layouts.master")

@section('name'){{ $page->title ?? 'conditions utilisations' }}@endsection
@section('description') {{ $page->metaDescription ?? 'conditions utilisations‚∑' }} @endsection

@section('content')

    <section class="mt-5">
        <div class="container">
            <div class="row">
                {!! $page->html ?? '<h1>La Pages n est pas encore creee</h1>' !!}
            </div>
        </div>
    </section>

@endsection
