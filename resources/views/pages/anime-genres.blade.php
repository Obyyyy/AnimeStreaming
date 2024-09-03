<x-layout>
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                        <a href="./categories.html">Categories</a>
                        <span>{{ $genre->name }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Product Section Begin -->
    <section class="product-page spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="product__page__content">
                        <div class="product__page__title">
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-6">
                                    <div class="section-title">
                                        <h4>{{ $genre->name }}</h4>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            @foreach ($animes as $anime)
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="product__item">
                                        <div class="product__item__pic set-bg"
                                            data-setbg="{{ asset('img/' . $anime->image . '') }}">
                                            <div class="ep">{{ $anime->episodes->count() }} Eps</div>
                                            <div class="comment"><i class="fa fa-comments"></i>
                                                {{ $anime->comments->count() }}</div>
                                            <div class="view"><i class="fa fa-eye"></i> {{ $anime->viewers->count() }}
                                            </div>
                                        </div>
                                        <div class="product__item__text">
                                            <ul>
                                                @foreach ($anime->genres as $genre)
                                                    <li>{{ $genre->name }}</li>
                                                @endforeach
                                            </ul>
                                            <h5><a
                                                    href="{{ route('anime.detail', $anime->slug) }}">{{ $anime->title }}</a>
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
                        <!-- </div>
                </div>         -->
                    </div>
                    <div class="product__sidebar__comment">
                        <div class="section-title">
                            <h5>FOR YOU</h5>
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
