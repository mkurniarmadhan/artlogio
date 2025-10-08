@push('style')
@endpush

<x-layouts.app>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="{{ route('posts.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                </div>
                <h1>Edit Post</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Posts</a></div>
                    <div class="breadcrumb-item">Edit Post</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Edit Post</h2>
           
                

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Ubah  Post</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('posts.update', $post) }}" method="post">
                                    @csrf
                                    @method('put')
                                    <div class="form-group row mb-4">
                                        <label
                                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" name="title" value="{{ $post->title }}"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label
                                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Content</label>
                                        <div class="col-sm-12 col-md-7">
                                            <textarea class="form-control" name="content">{{ $post->content }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label
                                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                                        <div class="col-sm-12 col-md-7">
                                            <select class="form-control selectric" name="is_active">
                                                <option value="0" {{ $post->is_active == 0 ? 'selected' : '' }}>
                                                    Pending</option>
                                                <option value="1" {{ $post->is_active == 1 ? 'selected' : '' }}>
                                                    Publish</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                        <div class="col-sm-12 col-md-7">
                                            <button class="btn btn-primary" type="submit">Ubah Post</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-layouts.app>

@push('scripts')
    <!-- Page Specific JS File -->
    <script src="{{ asset('assets/js/page/features-post-create.js') }}"></script>
@endpush
