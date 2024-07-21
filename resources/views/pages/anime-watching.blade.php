<x-layout>
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
                        {{-- <a href="./categories.html">Categories</a> --}}
                        {{-- <a href="#">{{ $anime->genres }}</a> --}}
                        <span><a href="{{ route('anime.detail', $anime->slug) }}">{{ $anime->title }}</a></span>
                        <span>Episode {{ $currentEpisode }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Anime Section Begin -->
    <section class="anime-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="anime__video__player">
                        <video id="player" playsinline controls
                            data-poster="{{ asset('thumbnails/' . $episode->thumbnail . '') }}">
                            <source src="{{ asset('videos/' . $episode->video . '') }}" type="video/mp4" />
                            <!-- Captions are optional -->
                            <track kind="captions" label="English captions" src="#" srclang="en" default />
                        </video>
                    </div>
                    <div class="anime__details__episodes">
                        <div class="section-title">
                            <h5>List Episode</h5>
                        </div>
                        @foreach ($anime->episodes as $episode)
                            <a style="{{ $episode->episode_name == $currentEpisode ? 'background: #ffffff; color: #000000;' : '' }}"
                                href="{{ route('anime.watching', ['anime' => $episode->anime->slug, 'episode_name' => $episode->episode_name]) }}">{{ $episode->episode_name }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="anime__details__review">
                        <div class="section-title">
                            <h5>Reviews</h5>
                        </div>
                        @foreach ($anime->comments as $comment)
                            <div class="anime__review__item">
                                <div class="anime__review__item__pic">
                                    <img src="{{ asset('img/' . $comment->user->profile_image . '') }}" alt="">
                                </div>
                                <div class="anime__review__item__text">
                                    <h6>{{ $comment->user->name }} -
                                        <span>{{ $comment->created_at->diffForHumans() }}</span>
                                    </h6>
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
                            <input type="hidden" name="redirect_to" value="{{ url()->current() }}">
                            <input type="hidden" name="watching" value="{{ $currentEpisode }}">
                            <textarea placeholder="Your Comment" name="comment"></textarea>
                            <button type="submit"><i class="fa fa-location-arrow"></i> Review</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Anime Section End -->
</x-layout>
