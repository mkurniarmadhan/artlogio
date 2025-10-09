

<x-layouts.app>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="{{ route('posts.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                </div>
                <h1>Profile</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Posts</a></div>
                    <div class="breadcrumb-item">Profile</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Profile</h2>




                  <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="mb-5">{{ __('Profile') }}</h2>
            <div class="mb-4">
                @include('profile.partials.update-profile-information-form')
            </div>
            <div class="mb-4">
                @include('profile.partials.update-password-form')
            </div>
            <div>
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
            </div>
        </section>
    </div>
</x-layouts.app>
