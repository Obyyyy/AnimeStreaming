<x-layout>
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                        <span>Searching Animes</span>
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
                                        <h4>Search of "{{ $search }}"</h4>
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
                {{-- <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="product__sidebar">
                        <div class="product__sidebar__view">
                        </div>
                    </div>
                    <div class="product__sidebar__comment">
                        <div class="section-title">
                            <h5>FOR YOU</h5>
                        </div>
                        <div class="product__sidebar__comment__item">
                            <div class="product__sidebar__comment__item__pic">
                                <img src="img/sidebar/comment-1.jpg" alt="">
                            </div>
                            <div class="product__sidebar__comment__item__text">
                                <ul>
                                    <li>Active</li>
                                    <li>Movie</li>
                                </ul>
                                <h5><a href="#">The Seven Deadly Sins: Wrath of the Gods</a></h5>
                                <span><i class="fa fa-eye"></i> 19.141 Viewes</span>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
        </div>
    </section>
    <!-- Product Section End -->
</x-layout>
