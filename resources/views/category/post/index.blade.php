@extends('layouts.blog')

@section('content')

    <main class="blog">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">Блог</h1>
            <section class="featured-posts-section">
                <div class="row">
                    @foreach($posts as $post)
                        <div class="col-md-4 fetured-post blog-post" data-aos="fade-right">
                            <div class="blog-post-thumbnail-wrapper">
                                <img src="{{ asset('storage/' . $post->preview_image) }}" alt="blog post">
                            </div>
                            <div class="d-flex justify-content-between">
                                <p class="blog-post-category">{{ $post->category->title }}</p>
                                @auth()
                                    <form action="{{ route('post.like.store', $post->id) }}" method="POST">
                                        @csrf
                                        <span>{{ $post->liked_users_count }}</span>
                                        <button type="submit" class="border-0 bg-transparent">
                                            @if( auth()->user()->likedPosts->contains($post->id) )
                                                <i class="nav-icon fas fa-solid fa-heart"></i>
                                            @else
                                                <i class="nav-icon far fa-regular fa-heart"></i>
                                            @endif
                                        </button>
                                    </form>
                                @endauth
                                @guest()
                                    <div>
                                        <span>{{ $post->liked_users_count }}</span>
                                        <i class="nav-icon far fa-regular fa-heart"></i>
                                    </div>
                                @endguest
                            </div>
                            <a href="{{ route('post.show', $post->id) }}" class="blog-post-permalink">
                                <h6 class="blog-post-title">{{ $post->title }}</h6>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="mx-auto" style="margin-top: -80px; margin-bottom: 80px;">
                        {{ $posts->links() }}
                    </div>
                </div>
            </section>
            <div class="row">
                <div class="col-md-4 sidebar" data-aos="fade-left">
                    <div class="widget widget-post-carousel">
                        <h5 class="widget-title">Post Lists</h5>
                        <div class="post-carousel">
                            <div id="carouselId" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselId" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselId" data-slide-to="1"></li>
                                    <li data-target="#carouselId" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner" role="listbox">
                                    <figure class="carousel-item active">
                                        <img src="{{ asset('assets/images/blog_widget_carousel.jpg') }}"
                                             alt="First slide">
                                        <figcaption class="post-title">
                                            <a href="#!">Front becomes an official Instagram Marketing Partner</a>
                                        </figcaption>
                                    </figure>
                                    <figure class="carousel-item">
                                        <img src="{{ asset('assets/images/blog_7.jpg') }}" alt="First slide">
                                        <figcaption class="post-title">
                                            <a href="#!">Front becomes an official Instagram Marketing Partner</a>
                                        </figcaption>
                                    </figure>
                                    <div class="carousel-item">
                                        <img src="{{ asset('assets/images/blog_5.jpg') }}" alt="First slide">
                                        <figcaption class="post-title">
                                            <a href="#!">Front becomes an official Instagram Marketing Partner</a>
                                        </figcaption>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="widget">
                        <h5 class="widget-title">Categories</h5>
                        <img src="{{ asset('assets/images/blog_widget_categories.jpg') }}" alt="categories"
                             class="w-100">
                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection
