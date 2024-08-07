<x-layout>
    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="hero__slider owl-carousel">
                @foreach ($animes as $anime)
                    <div class="hero__items set-bg" data-setbg="img/{{ $anime->image }}">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="hero__text">
                                    <div class="label">Adventure</div>
                                    <h2><a href="{{ route('anime.detail', $anime->slug) }}"
                                            style="color: #fff">{{ $anime->title }}</a></h2>
                                    <p>{{ Str::limit($anime->description, 40, '...') }}</p>
                                    <a
                                        href="{{ route('anime.watching', ['anime' => $anime->slug, 'episode_name' => $anime->episodes->first()->episode_name]) }}"><span>Watch
                                            Now</span> <i class="fa fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="trending__product">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <div class="section-title">
                                    <h4>Trending Now</h4>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="btn__all">
                                    <a href="#" class="primary-btn">View All <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @foreach ($trendingAnimes as $anime)
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="product__item">
                                        <div class="product__item__pic set-bg" data-setbg="img/{{ $anime->image }}">
                                            <div class="ep">{{ $anime->episodes->count() }} Eps</div>
                                            <div class="comment"><i class="fa fa-comments"></i>
                                                {{ $anime->comments->count() }}</div>
                                            <div class="view"><i class="fa fa-eye"></i> {{ $anime->viewers->count() }}
                                            </div>
                                        </div>
                                        <div class="product__item__text">
                                            <ul>
                                                @foreach ($anime->genres->take(3) as $genre)
                                                    <li>{{ $genre->name }}</li>
                                                @endforeach
                                            </ul>
                                            <h5><a
                                                    href="{{ route('anime.detail', with(['anime' => $anime->slug])) }}">{{ $anime->title }}</a>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="recent__product">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <div class="section-title">
                                    <h4>Recently Added Shows</h4>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="btn__all">
                                    <a href="#" class="primary-btn">View All <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @foreach ($recentlyAnimes as $anime)
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="product__item">
                                        <div class="product__item__pic set-bg" data-setbg="img/{{ $anime->image }}">
                                            <div class="ep">{{ $anime->episodes->count() }} Eps</div>
                                            <div class="comment"><i class="fa fa-comments"></i>
                                                {{ $anime->comments->count() }}</div>
                                            <div class="view"><i class="fa fa-eye"></i>
                                                {{ $anime->viewers->count() }}</div>
                                        </div>
                                        <div class="product__item__text">
                                            <ul>
                                                @foreach ($anime->genres->take(3) as $genre)
                                                    <li>{{ $genre->name }}</li>
                                                @endforeach
                                                <li>Movie</li>
                                            </ul>
                                            <h5><a
                                                    href="{{ route('anime.detail', with(['anime' => $anime->slug])) }}">{{ $anime->title }}</a>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="live__product">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <div class="section-title">
                                    <h4>Live Action</h4>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="btn__all">
                                    <a href="#" class="primary-btn">View All <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @foreach ($liveAnimes as $anime)
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="product__item">
                                        <div class="product__item__pic set-bg" data-setbg="img/{{ $anime->image }}">
                                            <div class="ep">{{ $anime->episodes->count() }} Eps</div>
                                            <div class="comment"><i class="fa fa-comments"></i>
                                                {{ $anime->comments->count() }}</div>
                                            <div class="view"><i class="fa fa-eye"></i>
                                                {{ $anime->viewers->count() }}</div>
                                        </div>
                                        <div class="product__item__text">
                                            <ul>
                                                @foreach ($anime->genres->take(3) as $genre)
                                                    <li>{{ $genre->name }}</li>
                                                @endforeach
                                                <li>Movie</li>
                                            </ul>
                                            <h5><a
                                                    href="{{ route('anime.detail', with(['anime' => $anime->slug])) }}">{{ $anime->title }}</a>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="product__sidebar">
                        <div class="product__sidebar__view">
                        </div>
                    </div>
                    <div class="product__sidebar__comment">
                        <div class="section-title">
                            <h5>For You</h5>
                        </div>
                        @foreach ($forYouAnimes as $anime)
                            <div class="product__sidebar__comment__item">
                                <div class="product__sidebar__comment__item__pic">
                                    <img src="{{ asset('img/' . $anime->image . '') }}" alt=""
                                        style="width:90px; height:auto;">
                                </div>
                                <div class="product__sidebar__comment__item__text">
                                    <ul>
                                        @foreach ($anime->genres as $genre)
                                            <li>{{ $genre->name }}</li>
                                        @endforeach
                                    </ul>
                                    <h5><a
                                            href="{{ route('anime.detail', with(['anime' => $anime->slug])) }}">{{ $anime->title }}</a>
                                    </h5>
                                    <span><i class="fa fa-eye"></i> {{ $anime->viewers->count() }} Viewes</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- Product Section End -->
</x-layout>
