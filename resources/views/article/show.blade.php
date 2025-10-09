<x-layouts.article>



    <x-slot:header>

        <div class="container-fluid">
            <div class="container">
                <nav class="breadcrumb bg-transparent m-0 p-0">
                    <a class="breadcrumb-item" href="{{ route('article.index') }}">Beranda</a>
                    <span class="breadcrumb-item active">{{ $post->title }}</span>
                </nav>
            </div>
        </div>
    </x-slot>


    <div class="position-relative mb-3">
        <img class="img-fluid w-100" src="{{ asset('assets/frontend/img/no-image.jpg') }}" style="object-fit: cover;">
        <div class="overlay position-relative bg-light">
            <div class="mb-3">
                <a href="">{{ $post->title }}</a>
                <span class="px-1">/</span>
                <span>{{ $post->published_at->format('d F Y') }}</span>
            </div>
            <div>
                <h3 class="mb-3">{{ $post->title }}</h3>
                {!! $post->content !!}


            </div>
        </div>
    </div>




</x-layouts.article>
