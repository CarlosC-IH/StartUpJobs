@extends('frontend.layouts.app')

@section('description'){{ strip_tags($post->description) }}@endsection
@section('og:image'){{ asset($post->image) }}@endsection
@section('title'){{ $post->title }}@endsection

@section('main')
    <div class="breadcrumbs breadcrumbs-height">
        <div class="container">
            <div class="breadcrumb-menu">
                <h6 class="f-size-18 m-0">{{ __('blog_deatils') }}</h6>
                <ul>
                    <li><a href="{{ route('website.home') }}">{{ __('home') }}</a></li>
                    <li>/</li>
                    <li>{{ __('blog_deatils') }}</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
        <!-- google adsense area  -->
        @if (advertisementCode('blog_detailpage_inside_blog'))
            <div style="margin-top:50px;">
                {!! advertisementCode('blog_detailpage_inside_blog') !!}
            </div>
        @endif
        <!-- google adsense area end -->
    </div>

    <div class="blog-content-area">
        <div class="container">
            <div class="">
                <article class="single-blog-post  hover-shadow:none">
                    <div class="mt-2 d-flex justify-content-center rt-mb-30">
                        <img class="w-75" src="{{ url($post->image) }}" alt="post">
                    </div>
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="col-md-12">
                                <h2 class="rt-mb-24 fw-bold">{{ $post->title }}</h2>
                                <div class="entry-meta tw-flex-wrap tw-gap-3 align-items-center">
                                    <a class="author-img-link d-flex align-items-center" href="#">
                                        <img src="{{ $post->author->image }}" alt="Author" class="rt-mr-12">
                                        <span class="body-font-3 text-gray-700"> {{ $post->author->name }}</span>
                                    </a>
                                    <a class="date" href="#">
                                        <i class="ph-calendar-blank"></i>
                                        {{ date('M d, Y', strtotime($post->created_at)) }}
                                    </a>
                                    @if (count($post->comments) != 0)
                                        <a class="comment" href="{{ route('website.post', $post->slug) }}#comments">
                                            <i class="ph-chat-circle-dots"></i>
                                            {{ $post->commentsCount() }} {{ __('comments') }}
                                        </a>
                                    @endif
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="d-none d-lg-flex flex-column col-lg-auto">
                                        <div class="sticky-top">
                                            <div class="my-5">
                                                <a href="{{ socialMediaShareLinks(url()->current(), 'facebook') }}">
                                                    <i class="fa-brands fa-facebook fa-lg"></i>
                                                </a>
                                            </div>
                                            <div class="my-5">
                                                <a href="{{ socialMediaShareLinks(url()->current(), 'twitter') }}">
                                                    <i class="fa-brands fa-x-twitter fa-lg"></i>
                                                </a>
                                            </div>
                                            <div class="my-5">
                                                <a href="{{ $cms_setting->footer_instagram_link }}">
                                                    <i class="fa-brands fa-instagram fa-lg"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-11 col-md-12">
                                        <h6 class="rt-mb-24">
                                            {{ $post->short_description }}
                                        </h6>
                                        <div class="body-font-3 text-gray-600">
                                            {!! $post->description !!}
                                        </div>
                                        <br>
                                        <div class="rt-spacer-60"></div>
                                        <ul class="rt-list gap-8">
                                            <li class="d-inline-block body-font-3">
                                                Share This Post
                                            </li>
                                            <li class="d-inline-block ms-3">
                                                <button class="btn btn-outline-plain">
                                                    <span class="f-size-18 text-primary-500"> <svg xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img"
                                                            class="iconify iconify--bx" width="1em" height="1em"
                                                            preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"
                                                            data-icon="bx:bxl-facebook">
                                                            <path
                                                                d="M13.397 20.997v-8.196h2.765l.411-3.209h-3.176V7.548c0-.926.258-1.56 1.587-1.56h1.684V3.127A22.336 22.336 0 0 0 14.201 3c-2.444 0-4.122 1.492-4.122 4.231v2.355H7.332v3.209h2.753v8.202h3.312z"
                                                                fill="currentColor"></path>
                                                        </svg></span>
                                                    <a
                                                        href="{{ socialMediaShareLinks(url()->current(), 'facebook') }}">{{ __('facebook') }}</a>
                                                </button>
                                            </li>
                                            <li class="d-inline-block">
                                                <button class="btn btn-outline-plain">
                                                    <span class="f-size-18 text-twitter"><svg xmlns="http://www.w3.org/2000/svg" 
                                                    width="1em" height="1em"
                                                    viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                    <path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"/>
                                                    </svg>
                                                        </span>
                                                    <a
                                                        href="{{ socialMediaShareLinks(url()->current(), 'twitter') }}">{{ __('twitter') }}</a>
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="sticky-top" style="top: 10px;">
                                <h4>Other Posts</h4>
                                <ul class="list-group list-unstyled list-group-flush">
                                @foreach($recent_posts as $recent_post)
                                    <li class="bg-light mb-3">
                                        <a href="{{ route('website.post', $recent_post->slug) }}" class="">
                                            <div class="bg-danger">
                                                <img src="{{ url($recent_post->image) }}" alt="image" class="">
                                            </div>
                                            <p class="fw-bold my-3 mx-3">{{ $recent_post->title }}</p>
                                            <p class="tw-text-sm mx-3"><i class="fa-regular fa-clock me-2"></i>{{ date('M d, Y', strtotime($post->created_at)) }}</p>
                                        </a>
                                    </li>
                                @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </article>

                <div class="comments-elemenst rt-pt-50 rt-pt-md-50" id="comments">
                    <h6 class="rt-mb-32">{{ __('write_a_comment') }}</h6>
                    <form action="{{ route('website.comment', $post->slug) }}" class="rt-mb-50" method="post">
                        @csrf
                        <textarea rows="4" name="body" placeholder="{{ __('share_your_thoughts_on_this_post') }}?" class="rt-mb-15"></textarea>
                        @auth()
                            <button type="submit" class="btn btn-primary">{{ __('post_a_comment') }}</button>
                        @else
                            <button type="submit"
                                class="btn btn-primary login_required">{{ __('post_a_comment') }}</button>
                        @endauth
                    </form>
                    <ul class="comments-list rt-list">
                        @forelse ($post->comments as $comment)
                            <li class="single-comments">
                                <div class="rt-single-icon-box rt-mb-15">
                                    <div class="icon-thumb rt-mr-16">
                                        <div class="user-img">
                                            <img src="{{ url($comment->user->image) }}" alt="Image" class="!tw-object-cover !tw-w-12 !tw-h-12 !tw-rounded-full">
                                        </div>
                                    </div>
                                    <div class="iconbox-content body-font-3 text-gray-700">
                                        <a class="user-name ft-wt-5 rt-mb-4 text-gray-900 hover:text-primary-500"
                                            href="#">{{ $comment->user->name }}</a>
                                        <span
                                            class="d-block body-font-4 text-gray-500">{{ $comment->created_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                                <div class="body-font-3 text-gray-700">
                                    {!! nl2br($comment->body) !!}
                                </div>
                                <div class="body-font-4 mt-3">
                                    <button id="replies-{{ $comment->id }}" data-id="{{ $comment->id }}"
                                        class="btn btn-sm reply tw-p-0 tw-inline-flex tw-gap-2 tw-items-center tw-text-[#0A65CC]"
                                        onclick="showHideForm('reply-{{ $comment->id }}')">
                                        <span>
                                            <x-svg.reply-icon />
                                        </span>
                                        <span>{{ __('reply') }}</span>
                                    </button>
                                    <form id="reply-{{ $comment->id }}"
                                        action="{{ route('website.comment', $post->slug) }}" class="rt-mb-50 d-none"
                                        method="post">
                                        @csrf
                                        <div class="tw-flex tw-gap-4 tw-justify-between tw-items-center tw-pt-4">
                                            <div class="tw-w-[50px] tw-h-[50px] tw-overflow-hidden">
                                                <img src="{{ url($comment->user->image) }}" alt="user" class="tw-w-full tw-h-full tw-rounded-full tw-object-cover">
                                            </div>
                                            <textarea rows="1" name="body" placeholder="{{ __('share_your_thoughts_on_this_comment') }}?" class="tw-py-3 tw-px-[18px]"></textarea>
                                            <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                                            @auth('user')
                                                <button type="submit" class="btn btn-primary btn-inline">
                                                    {{ __('post_a_reply') }}
                                                </button>
                                            @else
                                                <button type="submit"
                                                    class="btn btn-primary tw-overflow-visible login_required">
                                                    Post Reply
                                                </button>
                                            @endauth
                                        </div>
                                        <hr>
                                    </form>
                                </div>
                                @if (count($comment->replies) > 0)
                                    @foreach ($comment->replies as $reply)
                            <li class="single-comments">
                                <div class="rt-single-icon-box rt-mb-15">
                                    <div class="icon-thumb rt-mr-16">
                                        <div class="user-img">
                                            <img src="{{ url($reply->user->image) }}" alt="user" class="object-fit-contain !tw-w-16 !tw-h-16 !tw-rounded-full">
                                        </div>
                                    </div>
                                    <div class="iconbox-content body-font-3 text-gray-700">
                                        <a class="user-name ft-wt-5 rt-mb-4 text-gray-900 hover:text-primary-500"
                                            href="#">{{ $reply->user->name }}</a>
                                        <span
                                            class="d-block body-font-4 text-gray-500">{{ $reply->created_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                                <div class="body-font-3 text-gray-700">
                                    {!! nl2br($reply->body) !!}
                                </div>
                            </li>
                        @endforeach
                        @endif
                        </li>
                    @empty
                        <p>{{ __('no_comments') }}</p>
                        @endforelse
                    </ul>
                    <div class="rt-spacer-24"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="rt-spacer-80 rt-spacer-md-40"></div>

@endsection

@section('script')
    <script>
        function showHideForm(id) {
            var value = document.getElementById(id).style.display;
            var button = '#replies-' + id.slice(-1);
            if (value == 'none') {
                document.getElementById(id).classList.add('d-none');
                $(button).hide();
            } else {
                document.getElementById(id).classList.remove('d-none');
                $(button).show();
            }
        }
    </script>
@endsection
