@extends("layouts.master")


@section('description')
GO AU BLED est une page mettant en relation les personnes de différentes communautés de l’Afrique comme de sa diaspora dans le but de transporter des colis et courriers destinés à leurs proches de partout dans le monde
@endsection

@section('content')

    <home-header-component :header="{{ $header }}"></home-header-component>

    <home-news-component :posts="{{ $posts }}"></home-news-component>

    <x-about-us>

        <div class="col-lg-6 about-img quigo-animate-class-css-element">
            <img src="{{ $about->image }}" alt="{{ $about->image }}">
        </div>

        <div class="col-lg-6 content quigo-animate-class-css-element">
            <h2>{{ $about->title }}</h2>
            <h3 class="text-justify">{{ $about->content }}</h3>
        </div>

    </x-about-us>

    <how-work :steps="{{ $steps }}" more-link="{{ route('howItWork') }}"></how-work>

    <destinations :destinations="{{ $destinations }}"></destinations>

    <x-testimonial>
        <div class="row people">
            @foreach($testimonials as $item)

                <div class="col-md-6 col-lg-4 item">
                    <div class="box">
                        <p class="description">{{ $item->content  }}</p>
                    </div>
                    <div class="author"><img class="rounded-circle" src="{{ asset($item->user->avatar) }}">
                        <h5 class="name">{{ $item->user->name  }}</h5>
                        <p class="title">{{ $item->user->email  }}</p>
                    </div>
                </div>

            @endforeach
        </div>
    </x-testimonial>

@endsection
