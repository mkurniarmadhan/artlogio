
@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('assets/library/selectric/public/selectric.css') }}">
@endpush

<x-layouts.app>
      <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Posts</h1>
                <div class="section-header-button">
                    <a href="{{ route('posts.create') }}"
                        class="btn btn-primary">Add New</a>
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
                    You can manage all posts, such as editing, deleting and more.
                </p>

                <div class="row">
                    <div class="col-12">
                        <div class="card mb-0">
                            <div class="card-body">
                                <ul class="nav nav-pills">
                                    <li class="nav-item">
                                        <a class="nav-link active"
                                            href="#">Semua </a>
                                    </li>
                                  
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>All Posts</h4>
                            </div>
                            <div class="card-body">
                                <div class="float-left">
                                    <select class="form-control selectric">
                                        <option>All</option>
                                        <option>Draf</option>
                                        <option>Publish</option>
                                        <option>Sampah</option>
                                    </select>
                                </div>
                                <div class="float-right">
                                    <form>
                                        <div class="input-group">
                                            <input type="text"
                                                class="form-control"
                                                placeholder="Search">
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
                                                    <a href="#">View</a>
                                                    <div class="bullet"></div>
                                                    <a href="{{ route('posts.edit',$post) }}">Edit</a>
                                                    <div class="bullet"></div>
                                                    <a href="#"
                                                        class="text-danger">Trash</a>
                                                </div>
                                            </td>
                                            <td>
                                               {{ str()->limit($post->content,50,) }}
                                            </td>
                                            
                                            <td>{{ $post->published_at }}</td>
                                            <td>
                                                <div class="badge badge-{{ $post->is_active ?'primary':'warning' }}">{{ $post->is_active ? 'Active' :'Deactives' }}</div>
                                            </td>
                                        </tr>

                                            @empty
                                            
                                        @endforelse
                                    </table>
                                </div>
                                <div class="float-right">
                                    {{$posts->links('pagination::bootstrap-5')}}
                                 
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
    <!-- JS Libraies -->
    <script src="{{ asset('assets/library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('assets/js/page/features-posts.js') }}"></script>
@endpush