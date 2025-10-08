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

              </div>
            


        </section>

     </div>
</x-layouts.app>