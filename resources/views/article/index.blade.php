<x-layouts.article>


    @if (!$query)

        <x-slot:header>
            <div class="container-fluid py-3">
                <div class="container">
                    <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                        <h3 class="m-0">Terbaru</h3>
                    </div>
                    <div class="owl-carousel owl-carousel-2 carousel-item-4 position-relative">

                        @foreach ($latestPost as $post)
                            <div class="position-relative overflow-hidden" style="height: 300px;">
                                <img class="img-fluid w-100 h-100" src="{{ asset('assets/frontend/img/no-image.jpg') }}"
                                    style="object-fit: cover;">
                                <div class="overlay">
                                    <div class="mb-1" style="font-size: 13px;">
                                        <a class="text-white" href="{{ route('article.show', $post) }}">{{ $post->title }}</a>
                                        <span class="px-1 text-white">/</span>
                                        <a class="text-white" href="">{{ $post->published_at?->translatedFormat('Y') }}</a>
                                    </div>
                                    <a class="h4 m-0 text-white"
                                        href="{{ route('article.show', $post) }}">{{ $post->judul }}</a>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </x-slot>

    @endif

    <div class="row">
        <div class="col-12">
            <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                <h3 class="m-0">Postingan</h3>


            </div>
        </div>



        @forelse ($posts as $post)
            <div class="col-6">

                <div class="d-flex mb-3">
                    <img src="{{ asset('assets/frontend/img/no-image.jpg') }}"
                        style="width: 100px; height: 100px; object-fit: cover;">
                    <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
                        <div class="mb-1" style="font-size: 13px;">
                            <a href="{{ route('article.show', $post) }}">{{ $post->title }}</a>
                            <span class="px-1">/</span>
                            <span>{{ $post->published_at->translatedFormat('d F Y') }}</span>
                        </div>
                        <a class="h6 m-0" href="{{ route('article.show', $post) }}">{{ $post->title }}</a>
                    </div>
                </div>
            </div>

        @empty
            <div class="col-6">

                <h3>Tidak ada postingan</h3>
            </div>
        @endforelse




        {{ $posts->links('pagination::bootstrap-4') }}



    </div>


</x-layouts.article>
