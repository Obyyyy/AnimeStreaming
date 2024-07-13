<x-layout>
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
                        <a href="./categories.html">Categories</a>
                        <span>Romance</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Anime Section Begin -->
    <section class="anime-details spad">
        <div class="container">
            <div class="anime__details__content">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="anime__details__pic set-bg" data-setbg="{{ asset('img/' . $anime->image . '') }}">
                            <div class="comment"><i class="fa fa-comments"></i> 11</div>
                            <div class="view"><i class="fa fa-eye"></i> 9141</div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="anime__details__text">
                            <div class="anime__details__title">
                                <h3>{{ $anime->title }}</h3>
                            </div>

                            <p>{{ $anime->description }}</p>
                            <div class="anime__details__widget">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <ul>
                                            <li><span>Type:</span> {{ $anime->type }}</li>
                                            <li><span>Studios:</span> {{ $anime->studios }}</li>
                                            <li><span>Date aired:</span>
                                                {{ \Illuminate\Support\Carbon::parse($anime->date_aired)->isoFormat('D MMMM YYYY') }}
                                            </li>
                                            <li><span>Status:</span> {{ $anime->status }}</li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <ul>
                                            <li><span>Genre:</span> {{ $anime->genres }}</li>

                                            <li><span>Duration:</span> {{ $anime->duration }} min/ep</li>
                                            <li><span>Quality:</span> {{ $anime->quality }}</li>
                                            <li><span>Views:</span> 131,541</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="anime__details__btn">
                                @if (Auth::user()->followedAnimes->contains($anime->id))
                                    <form id="unfollowForm" action="{{ route('anime.unfollow', $anime->slug) }}"
                                        method="POST">
                                        @csrf
                                    </form>
                                    <a href="#"
                                        onclick="document.getElementById('unfollowForm').submit(); return false;"
                                        class="follow-btn" style="background: #9e2323; color:#e9d6d6;"><i
                                            class="fa fa-heart"></i> Followed</a>
                                @else
                                    <form id="followForm" action="{{ route('anime.follow', $anime->slug) }}"
                                        method="POST">
                                        @csrf
                                    </form>
                                    <a href="#"
                                        onclick="document.getElementById('followForm').submit(); return false;"
                                        class="follow-btn"><i class="fa fa-heart-o"></i> Follow</a>
                                @endif
                                <a href="anime-watching.html" class="watch-btn"><span>Watch Now</span> <i
                                        class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <div class="anime__details__review">
                        <div class="section-title">
                            <h5>Reviews</h5>
                        </div>
                        @foreach ($comments as $comment)
                            <div class="anime__review__item">
                                <div class="anime__review__item__pic">
                                    <img src="{{ asset('img/' . $comment->user->profile_image . '') }}" alt="">
                                </div>
                                <div class="anime__review__item__text">
                                    <h6>{{ $comment->user->name }} - <span>
                                            {{ $comment->created_at->diffForHumans() }} </span></h6>
                                    <p>{{ $comment->comments }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="anime__details__form">
                        <div class="section-title">
                            <h5>Your Comment</h5>
                        </div>
                        <form action="{{ route('anime.add.comment', with(['anime' => $anime->slug])) }}"
                            method="POST">
                            @csrf
                            <textarea placeholder="Your Comment" name="comment"></textarea>
                            <button type="submit"><i class="fa fa-location-arrow"></i> Review</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="anime__details__sidebar">
                        <div class="section-title">
                            <h5>you might like...</h5>
                        </div>
                        @foreach ($similiarAnime as $anime)
                            <div class="product__sidebar__view__item set-bg"
                                data-setbg="{{ asset('img/' . $anime->image . '') }}">
                                <div class="ep">18 / ?</div>
                                <div class="view"><i class="fa fa-eye"></i> 9141</div>
                                <h5><a
                                        href="{{ route('anime.detail', with(['anime' => $anime->slug])) }}">{{ $anime->title }}</a>
                                </h5>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Anime Section End -->
</x-layout>
