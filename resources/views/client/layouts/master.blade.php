<!DOCTYPE html>

<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<html lang="en-us">
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>

    <!-- mobile responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="This is meta description">
    <meta name="author" content="Themefisher">
    <meta name="generator" content="Hugo 0.74.3" />

    <!-- theme meta -->
    <meta name="theme-name" content="reader" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('client.layouts.partials.css')

    {{-- <meta property="og:title" content="Reader | Hugo Personal Blog Template" />
    <meta property="og:description" content="This is meta description" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="" />
    <meta property="og:updated_time" content="2020-03-15T15:40:24+06:00" /> --}}
</head>

<body>

    @include('client.layouts.header')

    {{-- <section class="section pb-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-5">
                    <h2 class="h5 section-title">Editors Pick</h2>
                    <article class="card">
                        <div class="post-slider slider-sm">
                            <img src="images/post/post-1.jpg" class="card-img-top" alt="post-thumb">
                        </div>

                        <div class="card-body">
                            <h3 class="h4 mb-3"><a class="post-title" href="post-details.html">Use apples to give
                                    your bakes caramel and a moist texture</a></h3>
                            <ul class="card-meta list-inline">
                                <li class="list-inline-item">
                                    <a href="author-single.html" class="card-meta-author">
                                        <img src="images/john-doe.jpg">
                                        <span>Charls Xaviar</span>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <i class="ti-timer"></i>2 Min To Read
                                </li>
                                <li class="list-inline-item">
                                    <i class="ti-calendar"></i>14 jan, 2020
                                </li>
                                <li class="list-inline-item">
                                    <ul class="card-meta-tag list-inline">
                                        <li class="list-inline-item"><a href="tags.html">Color</a></li>
                                        <li class="list-inline-item"><a href="tags.html">Recipe</a></li>
                                        <li class="list-inline-item"><a href="tags.html">Fish</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <p>It’s no secret that the digital industry is booming. From exciting startups to …</p>
                            <a href="post-details.html" class="btn btn-outline-primary">Read More</a>
                        </div>
                    </article>
                </div>
                <div class="col-lg-4 mb-5">
                    <h2 class="h5 section-title">Trending Post</h2>

                    <article class="card mb-4">
                        <div class="card-body d-flex">
                            <img class="card-img-sm" src="images/post/post-3.jpg">
                            <div class="ml-3">
                                <h4><a href="post-details.html" class="post-title">Advice From a Twenty Something</a>
                                </h4>
                                <ul class="card-meta list-inline mb-0">
                                    <li class="list-inline-item mb-0">
                                        <i class="ti-calendar"></i>14 jan, 2020
                                    </li>
                                    <li class="list-inline-item mb-0">
                                        <i class="ti-timer"></i>2 Min To Read
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </article>

                    <article class="card mb-4">
                        <div class="card-body d-flex">
                            <img class="card-img-sm" src="images/post/post-2.jpg">
                            <div class="ml-3">
                                <h4><a href="post-details.html" class="post-title">The Design Files - Homes
                                        Minimalist</a></h4>
                                <ul class="card-meta list-inline mb-0">
                                    <li class="list-inline-item mb-0">
                                        <i class="ti-calendar"></i>14 jan, 2020
                                    </li>
                                    <li class="list-inline-item mb-0">
                                        <i class="ti-timer"></i>2 Min To Read
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </article>

                    <article class="card mb-4">
                        <div class="card-body d-flex">
                            <img class="card-img-sm" src="images/post/post-4.jpg">
                            <div class="ml-3">
                                <h4><a href="post-details.html" class="post-title">The Skinny Confidential</a></h4>
                                <ul class="card-meta list-inline mb-0">
                                    <li class="list-inline-item mb-0">
                                        <i class="ti-calendar"></i>14 jan, 2020
                                    </li>
                                    <li class="list-inline-item mb-0">
                                        <i class="ti-timer"></i>2 Min To Read
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </article>
                </div>

                <div class="col-lg-4 mb-5">
                    <h2 class="h5 section-title">Popular Post</h2>

                    <article class="card">
                        <div class="post-slider slider-sm">
                            <img src="images/post/post-5.jpg" class="card-img-top" alt="post-thumb">
                        </div>
                        <div class="card-body">
                            <h3 class="h4 mb-3"><a class="post-title" href="post-details.html">How To Make Cupcakes
                                    and Cashmere Recipe At Home</a></h3>
                            <ul class="card-meta list-inline">
                                <li class="list-inline-item">
                                    <a href="author-single.html" class="card-meta-author">
                                        <img src="images/kate-stone.jpg" alt="Kate Stone">
                                        <span>Kate Stone</span>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <i class="ti-timer"></i>2 Min To Read
                                </li>
                                <li class="list-inline-item">
                                    <i class="ti-calendar"></i>14 jan, 2020
                                </li>
                                <li class="list-inline-item">
                                    <ul class="card-meta-tag list-inline">
                                        <li class="list-inline-item"><a href="tags.html">City</a></li>
                                        <li class="list-inline-item"><a href="tags.html">Food</a></li>
                                        <li class="list-inline-item"><a href="tags.html">Taste</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <p>It’s no secret that the digital industry is booming. From exciting startups to …</p>
                            <a href="post-details.html" class="btn btn-outline-primary">Read More</a>
                        </div>
                    </article>
                </div>
                <div class="col-12">
                    <div class="border-bottom border-default"></div>
                </div>
            </div>
        </div>
    </section> --}}

    <section class="section-sm">
        <div class="container">
            <div class="row justify-content-center">

                @yield('content')

            </div>
        </div>
    </section>

    @include('client.layouts.footer')

    @include('client.layouts.partials.js')


</body>

</html>
