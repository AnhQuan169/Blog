@extends('layouts.user.app')

@section('content')
    <div class="container list-container">
        <div class="row">
            <div class="col-lg-8 list-box-left">
                <div class="list-left">
                    <h1 class="list-left-title">{{ $category->title }}</h1>
                    <div class="left-header-content">
                        <div class="left-header-content-wrap">
                            @forelse ($postLatest as $key => $post)
                                <a href="{{ route('post.detail', $post) }}" class="left-header-content-link">
                                    <div class="img-container">
                                        <img class="img-content" src="{{ asset('storage/'.$post->image) }}" alt="Image">
                                    </div>
                                </a>
                                <div class="title-content">
                                    <a href="{{ route('post.detail', $post) }}" class="left-header-content-link">
                                        <h2 class="left-header-title">{{ $post->title }}</h2>
                                    </a>
                                    <p class="content-header">{{ $post->description }}</p>
                                    <span class="content-date">{{ $post->getDateFormatAttribute('created_at') }}</span>
                                </div>
                            @empty
                                <div class="title-content">
                                    Danh mục chưa có bài viết
                                </div>
                            @endforelse
                        </div>
                        <div class="left-header-content-more">
                            @foreach ($postsOlder as $postOlder)
                                <div class="left-header-content-more-container">
                                    <a href="{{ route('post.detail', $postOlder) }}" class="left-header-content-more-container-link">
                                        <div class="img-more-post">
                                            <img class="image-more" src="{{ asset('storage/'.$postOlder->image) }}">
                                        </div>
                                        <h2 class="left-header-title-more">{{ $postOlder->title }}</h2>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="left-box-list">
                        <div class="left-box-list-items">
                            <!-- Block items -->
                            @if ($posts->currentPage() == 1)
                                @foreach ($posts->skip(4) as $post)
                                    <div class="item">
                                        <a href="{{ route('post.detail', $post) }}" class="item-link">
                                            <div class="item-img">
                                                <img src="{{ asset('storage/'.$post->image) }}" alt="Image">
                                            </div>
                                        </a>
                                        <div class="title-content">
                                            <a href="{{ route('post.detail', $post) }}" class="left-box-list-link">
                                                <h2 class="left-header-title">{{ $post->title }}</h2>
                                                <p class="content-header">{{ $post->description }}</p>
                                                <span class="content-date">{{ $post->getDateFormatAttribute('created_at') }}</span>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                @forelse ($posts as $post)
                                    <div class="item">
                                        <a href="{{ route('post.detail', $post) }}" class="item-link">
                                            <div class="item-img">
                                                <img src="{{ asset('storage/'.$post->image) }}" alt="Image">
                                            </div>
                                        </a>
                                        <div class="title-content">
                                            <a href="{{ route('post.detail', $post) }}" class="left-box-list-link">
                                                <h2 class="left-header-title">{{ $post->title }}</h2>
                                                <p class="content-header">{{ $post->description }}</p>
                                                <span class="content-date">{{ $post->getDateFormatAttribute('created_at') }}</span>
                                            </a>
                                        </div>
                                    </div>
                                @empty
                                    <div class="item">
                                        Danh mục chưa có bài viết
                                    </div>
                                @endforelse
                            @endif
                        </div>
                        <div class="page-nav">
                            {{ $posts->links() }}
                        </div>
                    </div>
                </div>
                <!-- Nav Page -->
            </div>
            <div class="col-lg-4 list-box-right">
                <div class="list-right">
                    <div class="right-box-favourite">
                        <h2 class="right-title">CHUYÊN MỤC ĐƯỢC YÊU THÍCH</h2>
                        <div class="right-box-tag">
                            <a href="" class="right-box-tag-title">
                                <span class="item-tag">#thị trường</span>
                            </a>
                            <a href="" class="right-box-tag-title">
                                <span class="item-tag">#nhà đẹp</span>
                            </a>
                            <a href="" class="right-box-tag-title">
                                <span class="item-tag">#phong thủy</span>
                            </a>
                            <a href="" class="right-box-tag-title">
                                <span class="item-tag">#tư vấn</span>
                            </a>
                            <a href="" class="right-box-tag-title">
                                <span class="item-tag">#nhà môi giới</span>
                            </a>
                        </div>
                    </div>
                    <div class="right-box-most-viewed-news">
                        <h2 class="right-title">Tin xem nhiều nhất</h2>
                        @forelse ($postsView as $postView)
                            <ul class="right-title-item">
                                <li class="item-new">
                                    <a href="{{ route('post.detail', $postView) }}" class="item-link">
                                        <div class="item-img-new">
                                            <img src="{{ asset('storage/'.$postView->image) }}" alt="Image">
                                        </div>
                                        <h2 class="item-title">{{ $postView->title }}</h2>
                                    </a>
                                </li>
                            </ul>
                        @empty
                            <ul>
                                <li class="item-new">Danh mục chưa có bài viết</li>
                            </ul>
                        @endforelse
                    </div>
                    <div class="right-box-category-topic">
                        <h2 class="right-title">Chủ đề cùng chuyên mục</h2>
                        <div class="right-box-tag">
                            <a href="" class="right-box-tag-title">
                                <span class="item-tag">#Dự án</span>
                            </a>
                            <a href="" class="right-box-tag-title">
                                <span class="item-tag">#Phân tích</span>
                            </a>
                            <a href="" class="right-box-tag-title">
                                <span class="item-tag">#Thế giới</span>
                            </a>
                            <a href="" class="right-box-tag-title">
                                <span class="item-tag">#Thị trường</span>
                            </a>
                        </div>
                    </div>
                    <div class="right-box-topic-favourite">
                        <h2 class="right-title">Chủ đề được yêu thích</h2>
                        <div class="right-box-tag">
                            <a href="" class="right-box-tag-title">
                                <span class="item-tag">#Thị trường</span>
                            </a>
                            <a href="" class="right-box-tag-title">
                                <span class="item-tag">#Kiến trúc</span>
                            </a>
                            <a href="" class="right-box-tag-title">
                                <span class="item-tag">#Nhà của sao</span>
                            </a>
                            <a href="" class="right-box-tag-title">
                                <span class="item-tag">#Dự án</span>
                            </a>
                            <a href="" class="right-box-tag-title">
                                <span class="item-tag">#Phân tích</span>
                            </a>
                        </div>
                    </div>
                    <div class="right-location-box pr-item">
                        <h2 class="right-title">Bán nhà đất 2022</h2>
                        <div class="info-box">
                            <div class="info-box-1">
                                <h3 class="info-box-item">
                                    <a href="" class="item-location">Hà Nội</a>
                                </h3>
                                <h3 class="info-box-item">
                                    <a href="" class="item-location">Bình Dương</a>
                                </h3>
                            </div>
                            <div class="info-box-2">
                                <h3 class="info-box-item">
                                    <a href="" class="item-location">TP Hồ Chí Minh</a>
                                </h3>
                                <h3 class="info-box-item">
                                    <a href="" class="item-location">Đà Nẵng</a>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
