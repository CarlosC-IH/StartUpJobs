@extends('frontend.layouts.public')

@php
    $data = metaData('home');
@endphp
@section('description', $data->description)
@section('og:image', asset($data->image))
@section('title', $data->title)

@section('main')

    <!-- google adsense area -->
    @if (advertisement_status('home_page_ad'))
        @if (advertisementCode('home_page_thin_ad_after_signin_section'))
            <div class="container my-4">
                {!! advertisementCode('home_page_thin_ad_after_signin_section') !!}
            </div>
        @endif
    @endif
    <!-- google adsense area end -->
    
    <section class="banner-section bg-white pb-5">
        <div class="rt-single-banner5">
            <div class="container position-parent">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="banner-content5">
                            <div class="mx-727" data-aos="fadeindown" data-aos-duration="1000">
                                <h1 class="text-gray-900 rt-mb-24">
                                    {{ __('discover_your_perfect_job_matching_your_interests_and_skills') }}
                                </h1>
                                <div class="f-size-18 text-gray-600 rt-mb-30">
                                    {{ __('unlock_your_potential_embrace_your_future') }}
                                </div>
                            </div>
                            <form action="{{ route('website.job') }}" method="GET" id="job_search_form">
                                <div class="jobsearchBox d-flex flex-column flex-md-row bg-gray-10 input-transparent rt-mb-24"
                                    data-aos="fadeinup" data-aos-duration="400" data-aos-delay="50">
                                    <div class="flex-grow-1 fromGroup has-icon">
                                        <input id="index_search" name="keyword" type="text"
                                            placeholder="{{ __('job_title_keyword') }}" value="{{ request('keyword') }}"
                                            autocomplete="off" class="text-gray-900">
                                        <div class="icon-badge">
                                            <x-svg.search-icon />
                                        </div>
                                        <span id="autocomplete_index_job_results"></span>
                                    </div>
                                    <input type="hidden" name="lat" id="lat" value="">
                                    <input type="hidden" name="long" id="long" value="">
                                    @php
                                        $oldLocation = request('location');
                                        $map = $setting->default_map;
                                    @endphp

                                    @if ($map == 'google-map')
                                        <div class="flex-grow-1 fromGroup has-icon banner-select no-border">
                                            <input type="text" id="searchInput" placeholder="{{ __('enter_location') }}"
                                                name="location" value="{{ $oldLocation }}" class="text-gray-900">
                                            <div id="google-map" class="d-none"></div>
                                            <div class="icon-badge">
                                                <x-svg.location-icon stroke="{{ $setting->frontend_primary_color }}"
                                                    width="24" height="24" />
                                            </div>
                                        </div>
                                    @else
                                        <div class="flex-grow-1 fromGroup has-icon banner-select no-border">
                                            <input name="long" class="leaf_lon" type="hidden">
                                            <input name="lat" class="leaf_lat" type="hidden">
                                            <input type="text" id="leaflet_search"
                                                placeholder="{{ __('enter_location') }}" name="location"
                                                value="{{ $oldLocation }}" autocomplete="off" class="text-gray-900">
                                            <div class="icon-badge">
                                                <x-svg.location-icon stroke="{{ $setting->frontend_primary_color }}"
                                                    width="24" height="24" />
                                            </div>
                                        </div>
                                    @endif
                                    <div class="flex-grow-0">
                                        <button type="submit"
                                            class="btn btn-primary d-block d-md-inline-block ">{{ __('find_job_now') }}</button>
                                    </div>
                                </div>
                            </form>
                            @if ($top_categories->count())
                                <div class="f-size-14 banner-quciks-links " data-aos="" data-aos-duration="1000"
                                    data-aos-delay="500">
                                    <span class="text-gray-400">{{ __('suggestion') }}: </span>
                                    @foreach ($top_categories as $item)
                                        @if ($item->slug)
                                            <a
                                                href="{{ route('website.job.category.slug', ['category' => $item->slug]) }}">
                                                {{ $item->name }} {{ !$loop->last ? ',' : '' }}
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-xl-6 d-flex align-items-center">
                        <div class="banner-mockup d-none d-xl-block w-100 text-right">
                            <div class="addimg-1 position-parent video-btn-center">
                                @if ($cms_setting->home_page_banner_image)
                                    <img src="{{ asset($cms_setting->home_page_banner_image) }}" alt="home page banner"
                                        draggable="false" loading="lazy">
                                @else
                                    <x-banner-image />
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    

    <!-- Counter Start -->
    
    <!-- google adsense area -->
    @if (advertisement_status('home_page_ad'))
        @if (advertisementCode('home_page_thin_ad_after_counter_section'))
            <div class="container my-4">
                {!! advertisementCode('home_page_thin_ad_after_counter_section') !!}
            </div>
        @endif
    @endif
    <!-- google adsense area end -->

     <!-- Banner Start -->
    <div class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-4 max-sm:tw-hidden mx-auto" >
                    <img class="sm:hidden" src="..\..\frontend\assets\images\pexels-fauxels-3184325.jpg">
                </div>
                <div class="tw-flex col-xl-6 col-lg-4 col-sm-6 mx-auto tw-items-center">
                    <div class="container">
                        <h2 class="tw-mb-5">Find the one that's right for you.</h2>
                        <p class="tw-mb-5">Explore all the internship opportunities available online. Get a 
                            personalized estimate of the stipend you can expect. Read reviews on 
                            over 30,000+ companies worldwide offering internships.</p>
                        <ul  class="">
                            <li class="tw-mb-1">Digital Marketing Solutions for Tomorrow</li>
                            <li class="tw-mb-1">Our Talented & Experienced Marketing Agency</li>
                            <li class="tw-mb-1">Create your own skin to match your brand</li>
                        </ul>
                        <a href="{{ route('website.about') }}" class="btn btn-primary btn-sm" role="button">About Us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->

    <!-- Here's Why you'll love it -->
    <div class="bg-light">
        <div class="container py-5">
            <div class="row tw-text-center">
                <h1>Here's why you'll love it at <span class="text-primary-500 has-title-shape">StartUpLab <img src="{{ asset('frontend/assets/images/all-img/title-shape.png') }}"
                                                alt="Company Title Shape" loading="lazy"></span></h1>
                <p class="">Access countless opportunities tailored to your skills and aspirations. <br /> Enjoy streamlined searches, personalized job alerts, and powerful tools</p>
            </div>
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-sm-6 mx-auto rt-mb-30">
                    <div class="bg-white tw-border-solid border pb-3 tw-rounded-lg tw-text-center hover:tw-shadow-[0px_12px_48px_rgba(0,44,109,0.1)]">
                        <div class="card-body tw-justify-center tw-items-center">
                            <div class="card-body tw-justify-center tw-items-center">
                                <div class="bg-light tw-rounded-lg  d-inline-flex justify-content-center tw-mx-auto tw-p-4 tw-mb-2">
                                    <img class="d-flex tw-justify-center tw-items-center" src="..\..\frontend\assets\images\icon\phone.svg">
                                </div>
                                <h5 class="tw-mb-5">24/7 Support</h5>
                                <p class="tw-pb-10">Always Here, Always Ready. Support Whenever You Need It</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6 mx-auto rt-mb-30">
                    <div class="bg-white tw-border-solid border pb-3 tw-rounded-lg tw-text-center hover:tw-shadow-[0px_12px_48px_rgba(0,44,109,0.1)]">
                        <div class="card-body tw-justify-center tw-items-center">
                            <div class="card-body tw-justify-center tw-items-center">
                                <div class="bg-light tw-rounded-lg d-inline-flex justify-content-center tw-mx-auto tw-p-4 tw-mb-2">
                                    <img class="tw-flex tw-justify-center tw-items-center" src="..\..\frontend\assets\images\icon\chip.svg"></div>
                                <h5 class="tw-mb-5">Tech & Startup Jobs</h5>
                                <p class="tw-pb-10">Your Gateway to Innovative Careers.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6 mx-auto rt-mb-30">
                    <div class="bg-white tw-border-solid border pb-3 tw-rounded-lg tw-text-center hover:tw-shadow-[0px_12px_48px_rgba(0,44,109,0.1)]">
                        <div class="card-body tw-justify-center tw-items-center">
                            <div class="card-body tw-justify-center tw-items-center tw-mx-auto">
                                <div class="bg-light tw-rounded-lg d-inline-flex justify-content-center  tw-mx-auto tw-p-4 tw-mb-2">
                                    <img class="tw-flex tw-justify-center tw-items-center" src="..\..\frontend\assets\images\icon\heartbeat.svg"></div>
                                <h5 class="tw-mb-5">Quick & Easy</h5>
                                <p class="tw-pb-10">Find Your Next Job in Minutes Seamless and Hassle-Free</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6 mx-auto rt-mb-30">
                    <div class="bg-white tw-border-solid border pb-3 tw-rounded-lg tw-text-center hover:tw-shadow-[0px_12px_48px_rgba(0,44,109,0.1)]">
                        <div class="card-body tw-justify-center tw-items-center">
                            <div class="card-body tw-justify-center tw-items-center tw-mx-auto">
                                <div class="bg-light tw-rounded-lg d-inline-flex justify-content-center tw-mx-auto tw-p-4 tw-mb-2">
                                    <img class="tw-flex tw-justify-center tw-items-center" src="..\..\frontend\assets\images\icon\clock.svg"></div>
                                <h5 class="tw-mb-5">Save Time</h5>
                                <p class="tw-pb-10">Job Hunting Made Efficient Our Streamlined Process</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Why choose us -->
    
    <!-- google adsense area -->
    @if (advertisement_status('home_page_ad'))
        @if (advertisementCode('home_page_fat_ad_after_chooseus_section'))
            <div class="container my-4">
                {!! advertisementCode('home_page_fat_ad_after_chooseus_section') !!}
            </div>
        @endif
    @endif
    <!-- google adsense area end -->
    <div class="most-popular-area rt-pt-50 rt-pt-md-50 bg-light border-top">
        <div class="container">
            <h2>{{ __('most_popular_vacancies') }}</h2>
            <div class="rt-spacer-40 rt-spacer-md-20"></div>

            <div class="row">
                @php
                    $popular_roles = $popular_roles->toArray();
                    ksort($popular_roles);
                @endphp
                @foreach ($popular_roles as $role)
                    <div class="col-lg-3 col-md-6 col-sm-6 mb-3">
                        <a href="{{ route('website.job', ['job_role' => $role['id']]) }}" class="most-popular-wrap">
                            <div class="most-popular-item">
                                <h3>{{ $role['name'] }}</h3>
                                <p>{{ $role['open_position_count'] }} {{ __('open_positions') }}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

        </div>
        <div class="rt-spacer-30 rt-spacer-md-30 bg-light"></div>
    </div>
    <!-- google adsense area -->
    @if (advertisement_status('home_page_ad'))
        @if (advertisementCode('home_page_fat_ad_after_vacancies_section'))
            <div class="container my-4">
                {!! advertisementCode('home_page_fat_ad_after_vacancies_section') !!}
            </div>
        @endif
    @endif
    <!-- google adsense area end -->
    <!-- category  Start -->
    <section class="catagory-area rt-pt-30 rt-pt-md-30 border-bottom bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex flex-wrap justify-content-center">
                        <div class="flex">
                            <h2>{{ __('popular_category') }}</h2>
                        </div>
                    </div>
                    <div class="text-center">
                        <p>Search all the open positions on the web. Get your own personalized salary estimate.
                        <br />Read reviews on over 30,000+ companies worldwide.</p>
                    </div>
                </div>
            </div>
            <div class="rt-spacer-20 rt-spacer-md-20"></div>
            <div class="row g-3 mb-4">
                
                    <div class="owl-carousel owl-theme owl-carousel-auto">
                        @php
                            $popular_categories = $popular_categories->toArray();
                            ksort($popular_categories);
                        @endphp
                        
                        @foreach ($popular_categories as $key => $category)
                            @isset($category['slug'])
                                <div class="item">
                                    <div class="card card-body tw-h-80 text-center">
                                        <a href="{{ route('website.job.category.slug', $category['slug']) }}"
                                            class="">
                                            <div class="card-img-top popular-category-icon">
                                                <i class="{{ $category['icon'] }}"></i>
                                            </div>
                                            <div class="card-text">
                                                <h5>{{ $category['name'] }}</h5>
                                                <p>{{ $category['jobs_count'] }} {{ __('open_positions') }}</p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endisset
                        @endforeach
                    </div>
                
            </div>
            <div class="d-flex justify-content-center rt-pt-md-10">
                            <a href="{{ route('website.job') }}" class="btn btn-outline-primary">
                                <span class="button-content-wrapper ">
                                    <span class="button-icon align-icon-right">
                                        <i class="ph-arrow-right"></i>
                                    </span>
                                    <span class="button-text">
                                        {{ __('view_all_jobs') }}
                                    </span>
                                </span>
                            </a>
                        </div>
        </div>
        <div class="rt-spacer-50 rt-spacer-md-50"></div>
    </section>
    <!-- google adsense area end -->
    
    <!-- google adsense area -->
    @if (advertisement_status('home_page_ad'))
        @if (advertisementCode('home_page_fat_ad_after_workingprocess_section'))
            <div class="container my-4">
                {!! advertisementCode('home_page_fat_ad_after_workingprocess_section') !!}
            </div>
        @endif
    @endif
    <!-- google adsense area end -->
    <!-- feature Job Start -->
    @if ($featured_jobs && count($featured_jobs) > 0)
        <section class="featurejob-area rt-pt-40 rt-pt-md-20 pb-3 bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex flex-wrap">
                            <div class="flex-grow-1">
                                <h2>{{ __('featured_job') }}</h2>
                            </div>
                            <a href="{{ route('website.job') }}" class="flex-grow-0 rt-pt-md-10">
                                <button class="btn btn-outline-primary">
                                    <span class="button-content-wrapper ">
                                        <span class="button-icon align-icon-right">
                                            <i class="ph-arrow-right"></i>
                                        </span>
                                        <span>
                                            {{ __('view_all') }}
                                        </span>
                                    </span>
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="rt-spacer-40 "></div>
                <div class="row">
                    <div class="col-12">
                        <ul class="rt-list">
                            @foreach ($featured_jobs as $job)
                                <x-website.job.job-list :job="$job" />
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!-- google adsense area -->
    @if (advertisement_status('home_page_ad'))
        @if (advertisementCode('home_page_fat_ad_after_featuredjob_section'))
            <div class="container my-4">
                {!! advertisementCode('home_page_fat_ad_after_featuredjob_section') !!}
            </div>
        @endif
    @endif
    <!-- google adsense area end -->
    <!-- feature Job Start -->
    @if ($top_companies && count($top_companies) > 0)
            <section class="featurejob-area rt-pt-40 rt-pt-md-50 bg-light">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex flex-wrap">
                                <div class="flex-grow-1">
                                    <h2>{{ __('top') }} <span
                                            class="text-primary-500 has-title-shape">{{ __('companies') }}
                                            <img src="{{ asset('frontend/assets/images/all-img/title-shape.png') }}"
                                                alt="Company Title Shape" loading="lazy">
                                        </span></h2>
                                </div>
                                <a href="{{ route('website.company') }}" class="flex-grow-0 rt-pt-md-10">
                                    <button class="btn btn-outline-primary">
                                        <span class="button-content-wrapper ">
                                            <span class="button-icon align-icon-right">
                                                <i class="ph-arrow-right"></i>
                                            </span>
                                            <span>
                                                {{ __('view_all') }}
                                            </span>
                                        </span>
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="rt-spacer-40 "></div>
                    <div class="row">
                        @foreach ($top_companies as $company)
                            <div class="col-xl-4 col-md-6 fade-in-bottom  condition_class rt-mb-24 tw-self-stretch">
                                <a href="{{ route('website.employe.details', $company->user->username) }}"
                                    class="card jobcardStyle1 tw-relative tw-h-full">
                                    <div class="tw-p-6 !tw-pb-[72px]">
                                        <div class="rt-single-icon-box tw-gap-3">
                                            <div class="tw-w-14 tw-h-14">
                                                <img class="tw-w-full tw-h-full tw-object-cover"
                                                    src="{{ $company->logo_url }}" alt="Company Logo" draggable="false"
                                                    class="object-fit-contain" loading="lazy">
                                            </div>
                                            <div class="iconbox-content">
                                                <div class="">
                                                    
                                                    <span
                                                        class="tw-text-[#191F33] tw-text-lg tw-font-medium  tw-inline-block">{{ $company->user->name }}</span>
                                                </div>
                                                @isset($company->country)
                                                    <span class="loacton text-gray-400 ">
                                                        <i class="ph-map-pin"></i>
                                                        {{ $company->country }}
                                                    </span>
                                                @endisset
                                            </div>
                                        </div>
                                        <div class="post-info">
                                            <div class="tw-flex tw-flex-wrap tw-gap-3">
                                                <span
                                                    class="tw-px-3 tw-py-1 tw-inline-block tw-text-sm tw-font-medium tw-text-[#474C54] tw-rounded-[52px] ll-gray-border">
                                                    {{ $company?->industry?->name ?? '' }}
                                                </span>
                                                <span
                                                    class="tw-px-3 tw-py-1 tw-inline-block tw-text-sm tw-font-medium tw-text-[#474C54] tw-rounded-[52px] ll-gray-border">{{ $company->jobs_count }}
                                                    {{ __('open_position') }}</span>
                                            </div>
                                            <div
                                                class="tw-absolute tw-bottom-6 tw-left-6 tw-text-base tw-font-semibold tw-capitalize tw-inline-flex tw-items-center tw-gap-1">
                                                <span>{{ __('view_profile') }}</span>
                                                <i class="ph-bold ph-arrow-right"></i>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
    @endif
    <!-- Testimonial Start -->
    @if ($testimonials->count())
        @if (($featured_jobs && count($featured_jobs)) || ($top_companies && count($top_companies) > 0))
            <div class="rt-spacer-40 rt-spacer-md-20 bg-light"></div>
        @endif

        <section class="testimoinals-area bg-light border-top">
            <div class="rt-spacer-50 rt-spacer-md-50"></div>
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <h2>{{ __('clients_testimonial') }}</h2>
                    </div>
                </div>
                <div class="rt-spacer-40 rt-spacer-md-20"></div>
                <div class="row">
                    <div class="col-12 position-parent">
                        <div class="slick-btn-gorup">
                            <button class="btn btn-light slickprev2 p-12">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M19 12H5" stroke="var(--primary-500)" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M12 5L5 12L12 19" stroke="var(--primary-500)" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>
                            <button class="btn btn-light slicknext2 p-12">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5 12H19" stroke="var(--primary-500)" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M12 5L19 12L12 19" stroke="var(--primary-500)" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>
                        </div>
                        <div class="testimonail_active slick-bullet deafult_style_dot">
                            @foreach ($testimonials as $testimonial)
                                <div class="single-item">
                                    <div class="testimonals-box">
                                        <div class="rt-mb-12">
                                            @for ($i = 0; $i < $testimonial->stars; $i++)
                                                <svg width="28" height="28" viewBox="0 0 28 28" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M12.9241 4.51321C13.3643 3.62141 14.636 3.62141 15.0762 4.51321L17.3262 9.07149C17.5009 9.42531 17.8383 9.67066 18.2287 9.72773L23.2623 10.4635C24.2462 10.6073 24.6383 11.8167 23.926 12.5105L20.2856 16.0562C20.0026 16.3319 19.8734 16.7292 19.9402 17.1187L20.7991 22.1264C20.9672 23.1068 19.9382 23.8543 19.0578 23.3913L14.5587 21.0253C14.209 20.8414 13.7913 20.8414 13.4416 21.0253L8.94252 23.3913C8.06217 23.8543 7.03311 23.1068 7.20125 22.1264L8.06013 17.1187C8.12693 16.7292 7.99773 16.3319 7.71468 16.0562L4.07431 12.5105C3.362 11.8167 3.75414 10.6073 4.73804 10.4635L9.7716 9.72773C10.162 9.67066 10.4995 9.42531 10.6741 9.07149L12.9241 4.51321Z"
                                                        fill="#FFAA00" />
                                                </svg>
                                            @endfor
                                        </div>
                                        <div class="text-gray-600 body-font-3">
                                            {{ Str::words($testimonial->description, 25, '...') }}
                                        </div>

                                        <div class="rt-single-icon-box">
                                            <div class="icon-thumb rt-mr-12">
                                                <div class="userimage">
                                                    <img src="{{ asset($testimonial->image) }}" alt="User Image"
                                                        draggable="false" loading="lazy">
                                                </div>
                                            </div>
                                            <div class="iconbox-content">
                                                <div class="body-font-3">{{ $testimonial->name }}</div>
                                                <div class="body-font-4 text-gray-400">{{ $testimonial->position }}
                                                </div>
                                            </div>
                                            <div class="iconbox-extra">
                                                <svg width="36" height="36" viewBox="0 0 36 36" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M16 28C16 30.1217 15.1571 32.1566 13.6569 33.6569C12.1566 35.1571 10.1217 36 8 36C5.87827 36 3.84344 35.1571 2.34315 33.6569C0.842854 32.1566 0 30.1217 0 28C0 23.58 8 0 8 0H12L8 20C10.1217 20 12.1566 20.8429 13.6569 22.3431C15.1571 23.8434 16 25.8783 16 28ZM36 28C36 30.1217 35.1571 32.1566 33.6569 33.6569C32.1566 35.1571 30.1217 36 28 36C25.8783 36 23.8434 35.1571 22.3431 33.6569C20.8429 32.1566 20 30.1217 20 28C20 23.58 28 0 28 0H32L28 20C30.1217 20 32.1566 20.8429 33.6569 22.3431C35.1571 23.8434 36 25.8783 36 28Z"
                                                        fill="#DADDE6" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
            <div class="rt-spacer-50 rt-spacer-md-50"></div>
        </section>
    @endif
    <!-- google adsense area -->
    @if (advertisementCode('home_page_center'))
        <div class="container my-4">
            {!! advertisementCode('home_page_center') !!}
        </div>
    @endif
    <!-- google adsense area end -->
    <!-- Call to action Start -->

    <!-- google adsense area -->
    @if (advertisement_status('home_page_ad'))
        @if (advertisementCode('home_page_fat_ad_after_client_section'))
            <div class="container my-4">
                {!! advertisementCode('home_page_fat_ad_after_client_section') !!}
            </div>
        @endif
    @endif
    <!-- google adsense area end -->
    @guest
        <section class="cta-area rt-pt-100 rt-mb-80 rt-pt-md-50 rt-mb-md-40">
            @include('frontend.partials.call-to-action')
        </section>
    @else
        {{-- Apply job Modal --}}
        <div class="modal fade" id="cvModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header border-transparent">
                        <h5 class="modal-title" id="cvModalLabel">{{ __('apply_job') }}: <span id="apply_job_title">
                                {{ __('job_title') }}</span></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('website.job.apply') }}" method="POST">
                        @csrf
                        <div class="modal-body mt-3">
                            <input type="hidden" id="apply_job_id" name="id">
                            <div class="from-group">
                                <x-forms.label name="choose_resume" :required="true" />
                                <select class="rt-selectactive form-control w-100-p" name="resume_id">
                                    <option value="">{{ __('select_one') }}</option>
                                    @foreach ($resumes as $resume)
                                        <option {{ old('resume_id') == $resume->id ? 'selected' : '' }}
                                            value="{{ $resume->id }}">{{ $resume->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mt-3">
                                <x-forms.label name="cover_letter" :required="true" />
                                <textarea id="default" class="form-control @error('cover_letter') is-invalid @enderror" name="cover_letter"
                                    rows="7"></textarea>
                                @error('cover_letter')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                        <div class="modal-footer border-transparent">
                            <button type="button" class="bg-priamry-50 btn btn-outline-primary" data-bs-dismiss="modal"
                                aria-label="Close">{{ __('cancel') }}</button>
                            <button type="submit" class="btn btn-primary btn-lg">
                                <span class="button-content-wrapper ">
                                    <span class="button-icon align-icon-right"><i class="ph-arrow-right"></i></span>
                                    <span class="button-text">
                                        {{ __('apply_now') }}
                                    </span>
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endguest

@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/fontawesome-free/css/all.min.css">
    <x-map.leaflet.autocomplete_links />
    @include('map::links')
    <style>
        span.select2-container--default .select2-selection--single {
            border: none !important;
        }

        span.select2-selection.select2-selection--single {
            outline: none;
        }

        .marginleft {
            margin-left: 10px !important;
        }
    </style>
@endsection

@section('script')
    <x-map.leaflet.autocomplete_scripts />
    <!-- ============== gooogle map ========== -->
    @if ($map == 'google-map')
        <script>
            function initMap() {
                var token = "{{ $setting->google_map_key }}";
                var oldlat = {{ Session::has('location') ? Session::get('location')['lat'] : $setting->default_lat }};
                var oldlng = {{ Session::has('location') ? Session::get('location')['lng'] : $setting->default_long }};
                const map = new google.maps.Map(document.getElementById("google-map"), {
                    zoom: 7,
                    center: {
                        lat: oldlat,
                        lng: oldlng
                    },
                });
                // Search
                var input = document.getElementById('searchInput');
                map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

                let country_code = '{{ current_country_code() }}';
                if (country_code) {
                    var options = {
                        componentRestrictions: {
                            country: country_code
                        }
                    };
                    var autocomplete = new google.maps.places.Autocomplete(input, options);
                } else {
                    var autocomplete = new google.maps.places.Autocomplete(input);
                }

                autocomplete.bindTo('bounds', map);
                var infowindow = new google.maps.InfoWindow();
                var marker = new google.maps.Marker({
                    map: map,
                    anchorPoint: new google.maps.Point(0, -29)
                });
                autocomplete.addListener('place_changed', function() {
                    infowindow.close();
                    marker.setVisible(false);
                    var place = autocomplete.getPlace();
                    const total = place.address_components.length;
                    let amount = '';
                    if (total > 1) {
                        amount = total - 2;
                    }
                    const result = place.address_components.slice(amount);
                    let country = '';
                    let region = '';
                    for (let index = 0; index < result.length; index++) {
                        const element = result[index];
                        if (element.types[0] == 'country') {
                            country = element.long_name;
                        }
                        if (element.types[0] == 'administrative_area_level_1') {
                            const str = element.long_name;
                            const first = str.split(',').shift()
                            region = first;
                        }
                    }
                    const text = region + ',' + country;
                    $('#insertlocation').val(text);
                    $('#lat').val(place.geometry.location.lat());
                    $('#long').val(place.geometry.location.lng());
                    if (place.geometry.viewport) {
                        map.fitBounds(place.geometry.viewport);
                    } else {
                        map.setCenter(place.geometry.location);
                        map.setZoom(17);
                    }
                });
            }
            window.initMap = initMap;
        </script>
        <script>
            @php
                $link1 = 'https://maps.googleapis.com/maps/api/js?key=';
                $link2 = $setting->google_map_key;
                $Link3 = '&callback=initMap&libraries=places,geometry';
                $scr = $link1 . $link2 . $Link3;
            @endphp;
        </script>

        <script src="{{ $scr }}" async defer></script>
    @endif
    <!-- ============== gooogle map ========== -->
    <script>
        // autocomplte
        var path = "{{ route('website.job.autocomplete') }}";

        $('#index_search').keyup(function(e) {
            var keyword = $(this).val();

            if (keyword != '') {
                $.ajax({
                    url: path,
                    type: 'GET',
                    dataType: "json",
                    data: {
                        search: keyword
                    },
                    success: function(data) {
                        $('#autocomplete_index_job_results').fadeIn();
                        $('#autocomplete_index_job_results').html(data);
                    }
                });
            } else {
                $('#autocomplete_index_job_results').fadeOut();
            }
        });
    </script>
@endsection
