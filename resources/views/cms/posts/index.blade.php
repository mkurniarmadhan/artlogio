@push('style')
@endpush

<x-layouts.app>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Posts</h1>
                <div class="section-header-button">
                    <a href="{{ route('posts.create') }}" class="btn btn-primary">Tambah Post</a>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Posts</a></div>
                    <div class="breadcrumb-item">All Posts</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">Posts</h2>
                <p class="section-lead">
                    Kelolah post
                </p>


                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Semua Post</h4>
                            </div>
                            <div class="card-body">
                                <div class="float-left">
                                    <form id="filterForm" method="GET" action="{{ route('posts.index') }}">
                                        <select id="statusFilter" name="status" class="form-control "
                                            onchange="this.form.submit()">
                                            <option value="all" {{ request('status') == 'all' ? 'selected' : '' }}>
                                                All
                                            </option>
                                            <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>
                                                Draf
                                            </option>
                                            <option value="publish"
                                                {{ request('status') == 'publish' ? 'selected' : '' }}>
                                                Publish</option>
                                            <option value="sampah"
                                                {{ request('status') == 'sampah' ? 'selected' : '' }}>
                                                Sampah</option>
                                        </select>
                                    </form>
                                </div>
                                <div class="float-right">
                                    <form>
                                        <div class="input-group">
                                            <input type="text" class="form-control"
                                                placeholder="Cari berdasarkan title" name="q" id="searchInput"
                                                value="{{ request('q') }}">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="clearfix mb-3"></div>

                                <div class="table-responsive">
                                    <table class="table-striped table">
                                        <tr>

                                            <th>Title</th>
                                            <th>Content</th>
                                            <th>Published At</th>
                                            <th>Status</th>
                                        </tr>

                                        @forelse ($posts as $post)
                                            <tr>
                                                <td>{{ $post->title }}
                                                    <div class="table-links">

                                                        @if ($status =='sampah')
                                                            <form method="POST"
                                                                action="{{ route('posts.restore', $post->id) }}"
                                                                class="d-inline">
                                                                @csrf
                                                                <button type="submit"
                                                                    class="btn btn-info btn-sm">Restore</button>
                                                            </form>

                                                            <form method="POST"
                                                                action="{{ route('posts.forceDelete', $post->id) }}"
                                                                class="d-inline">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="btn btn-danger btn-sm">Delete
                                                                    Permanen</button>
                                                            </form>
                                                        @else
                                                            <a href="{{ route('posts.edit', $post) }}"
                                                                class="btn btn-sm btn-warning">Edit</a>
                                                            <form method="POST"
                                                                action="{{ route('posts.destroy', $post) }}"
                                                                onsubmit="return confirm('Hapus post ini?')"
                                                                class="d-inline">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="btn btn-sm btn-danger">Hapus</button>
                                                            </form>
                                                        @endif


                                                    </div>

                                                </td>
                                                <td>
                                                    {{ str()->limit($post->content, 50) }}
                                                </td>

                                                <td>{{ $post->published_at?->translatedFormat('D M Y h:i:s') }}</td>
                                                <td>
                                                    <div
                                                        class="badge badge-{{ $post->is_active ? 'primary' : 'warning' }}">
                                                        {{ $post->is_active ? 'Publish' : 'Draf' }}</div>
                                                </td>
                                            </tr>

                                        @empty
                                            <tr>
                                                <td colspan="4" class="text center">Post tidak ditemukan</td>
                                            </tr>
                                        @endforelse
                                    </table>
                                </div>
                                <div class="float-right">
                                    {{ $posts->links('pagination::bootstrap-5') }}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-layouts.app>

@push('scripts')
@endpush
