@extends('frontend.layouts.app')

@section('description')
    @php
    $data = metaData('blog');
    @endphp
    {{ $data->description }}
@endsection
@section('og:image')
    {{ asset($data->image) }}
@endsection
@section('title')
    {{ $data->title }}
@endsection

@section('main')
    <div class="breadcrumbs breadcrumbs-height">
        <div class="container">
            <div class="breadcrumb-menu">
                <h6 class="f-size-18 m-0">{{ __('blog') }}</h6>
                <ul>
                    <li><a href="{{ route('website.home') }}">{{ __('home') }}</a></li>
                    <li>/</li>
                    <li>{{ __('blog') }}</li>
                </ul>
            </div>
        </div>
    </div>
    
    <div class="blog-content-area rt-pt-50 rt-mb-100 rt-mb-md-20">
        <div class="container">
            <h3>Blogscape</h3>
            <div class="owl-carousel owl-theme owl-carousel-blog">
                @if ($recent_posts && count($recent_posts))
                        @foreach ($recent_posts as $post)
                <div class="item">
                    <div class="icon-thumb post-img">
                        <div class="post-thmubnail">
                            <a href="{{ route('website.post', $post->slug) }}">
                                <img src="{{ url($post->image) }}" alt="post image" class="img-fluid rounded" class="object-fit-contain">
                            </a>
                            <div class="gradient-overlay"></div>
                            <p class="position-absolute bottom-0 start-0 w-100 text-center text-white bg-opacity-75">
                                <a href="{{ route('website.post', $post->slug) }}" class="link-light">
                                    {{ $post->title }}
                                </a>
                            </h5>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
            <div class="row">
            <h2 class="mb-4">Insightful Posts</h2>
                <div class="col-xl-9 order-0 order-xl-1">
                        <div class="row">
                            @foreach ($posts as $post)
                                <div class="col-md-6 col-lg-4 mb-4">
                                    <div class="card bg-dark text-white overflow-hidden position-relative" style="padding-top: 100%;">
                                        <img src="{{ url($post->image) }}" class="card-img position-absolute top-0 start-0 w-100 h-100" alt="{{ $post->title }}" style="object-fit: cover; border-radius: 0.375rem;">
                                        <div class="card-img-overlay d-flex flex-column justify-content-end p-3" style="background: rgba(0, 0, 0, 0.5);">
                                            <h5 class="tw-text-sm text-white fw-bold card-title">{{ $post->title }}</h5>
                                            <p class="card-text">
                                                <small class="tw-text-xs text-white">
                                                    <i class="bi bi-calendar"></i> {{ date('M d, Y', strtotime($post->created_at)) }}
                                                    <span class="ms-3">
                                                        <i class="bi bi-chat-dots"></i> {{ $post->comments_count }}
                                                    </span>
                                                </small>
                                            </p>
                                            <a href="{{ route('website.post', $post->slug) }}" class="stretched-link"></a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    
                </div>

                <div class="col-xl-3 rt-mb-md-30 order-1">
                    <div class="sidebar-wrapper sticky-top" style="top: 10px;">
                        <div class="widget widget_search">
                            <form action="{{ route('website.posts') }}" method="GET" id="searchForm">
                                <h2 class="widget-title"> {{ __('search') }} </h2>
                                <div class="fromGroup has-icon2">
                                    <input type="text" placeholder="{{ __('search') }}" name="search"
                                        value="{{ request('search') }}">
                                    <button class="icon-badge rt-ml-12 bg-transparent border-0 no-padding">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M11 19C15.4183 19 19 15.4183 19 11C19 6.58172 15.4183 3 11 3C6.58172 3 3 6.58172 3 11C3 15.4183 6.58172 19 11 19Z"
                                                stroke="var(--primary-500)" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M21 21.0004L16.65 16.6504"
                                                stroke="var(--primary-500)" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </button>
                                </div>
                                @if ($categories && count($categories))
                                    <hr>
                                    <ul class="rt-list filter_lists">
                                        <li class="d-block has-children open">
                                            <div class="body-font-1 ft-wt-5 rt-mb-20"> {{ __('category') }} </div>
                                            <ul class="sub-catagory rt-list">
                                                @foreach ($categories as $category)
                                                    <li class="d-block rt-mb-15">
                                                        <div class="form-check from-chekbox-custom">
                                                            <input {{ request('category') && in_array($category->slug, request('category')) ? 'checked':'' }}
                                                                class="form-check-input" type="checkbox" value="{{ $category->slug }}"
                                                                id="{{ $category->id }}category" name="category[]">
                                                            <label class="form-check-label pointer text-gray-700 f-size-16"
                                                                for="{{ $category->id }}category">
                                                                {{ $category->name }}
                                                            </label>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    </ul>

                                    <button type="submit" class="btn btn-primary btn-xs mt-4">{{ __('filter') }}</button>
                                @endif
                            </form>
                        </div>
                        @if (advertisementCode('blog_detailpage_inside_blog'))
                            <div class="">
                                {!! advertisementCode('bloglist_page_left') !!}
                            </div>
                        @endif
                         <!-- google adsense area end -->
                        <!--@if ($recent_posts && count($recent_posts))-->
                        <!--     <div class="widget rt-widget-recent-posts">-->
                        <!--        <h2 class="widget-title">{{ __('recent_post') }}</h2>-->
                        <!--        <ul>-->
                        <!--            @foreach ($recent_posts as $post)-->
                        <!--                <li>-->
                        <!--                    <a href="{{ route('website.post', $post->slug) }}" class="tw-block recent-blog">-->
                        <!--                        <div class="rt-single-icon-box max-[375px]:tw-flex-wrap">-->
                        <!--                            <div class="icon-thumb recent-post-img rt-mr-16">-->
                        <!--                                <img src="{{ url($post->image) }}" alt="image" class="object-fit-contain">-->
                        <!--                            </div>-->
                        <!--                            <div class="iconbox-content">-->
                        <!--                                <div class="bofy-font-4 entry-meta rt-mb-10">-->
                        <!--                                    <span class="date text-gray-500 rt-mr-8 hover:text-primary-500">-->
                        <!--                                        {{ date('M d, Y', strtotime($post->created_at)) }}-->
                        <!--                                    </span>-->
                        <!--                                    @if ($post->comments_count != 0)-->
                        <!--                                        <span class="text-gray-500 rt-mr-8">-->
                        <!--                                            <svg width="4" height="4" viewBox="0 0 4 4" fill="none"-->
                        <!--                                                xmlns="http://www.w3.org/2000/svg">-->
                        <!--                                                <path-->
                        <!--                                                    d="M4 2C4 3.10457 3.10457 4 2 4C0.89543 4 0 3.10457 0 2C0 0.89543 0.89543 0 2 0C3.10457 0 4 0.89543 4 2Z"-->
                        <!--                                                    fill="#767E94" />-->
                        <!--                                            </svg>-->
                        <!--                                        </span>-->
                        <!--                                        <span-->
                        <!--                                            class="comments text-gray-500 hover:text-primary-500">-->
                        <!--                                            {{ $post->comments_count }}-->
                        <!--                                            {{ $post->comments_count == 1 ? __('comment') : __('comments') }}-->
                        <!--                                        </span>-->
                        <!--                                    @endif-->
                        <!--                                </div>-->
                        <!--                                <p class="body-font-3 text-gray-900 tw-mb-0 tw-text-ellipsis tw-block tw-whitespace-nowrap tw-w-[180px] tw-overflow-hidden hover:text-primary-500">-->
                        <!--                                    {{ Str::limit($post->short_description, 80) }}-->
                        <!--                                </p>-->
                        <!--                            </div>-->
                        <!--                        </div>-->
                        <!--                    </a>-->
                        <!--                </li>-->
                        <!--            @endforeach-->
                        <!--        </ul>-->
                        <!--    </div>-->
                        <!--@endif-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection




