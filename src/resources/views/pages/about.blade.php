@extends("layouts.master")

@section('name'){{ $page->title }}@endsection
@section('description') {{ $page->metaDescription }} @endsection

@section('content')

    <section class="mt-5">
        <div class="container">
            <div class="row">
                {!! $page->html !!}
            </div>

        </div>
    </section>


@endsection
