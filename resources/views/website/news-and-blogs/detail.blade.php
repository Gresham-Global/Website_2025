@extends('website.layout.master')

@section('content')


<x-banner
  :title="$news_and_blogs->title"
  :image="$news_and_blogs->banner_image"
  :alt="$news_and_blogs->title" />


@includeIf(
'website.news-and-blogs.template.' . $news_and_blogs->template,
['news' => $news_and_blogs]
)
<style>
  .swiper-button-prev,
  .swiper-button-next {
    font-size: 40px;
    color: rgb(168, 35, 35);
    cursor: pointer;
    z-index: 100;
  }

  /* Replace default Swiper icons with text arrows */
  .swiper-button-prev::after,
  .swiper-button-next::after {
    font-size: 40px;
    font-weight: 400;
  }

  /* Custom arrow symbols */
  .swiper-button-prev::after {
    content: "❮";
  }

  .swiper-button-next::after {
    content: "❯";
  }

  /* Optional spacing tweak (like slick) */
  .swiper-button-prev {
    margin-left: -0.5rem;
  }
  /* Base bullets */
.media .swiper-pagination-bullet {
  width: 20px !important;
  height: 20px !important;
  border-radius: 20px !important;
  background: #d9d9d9 !important;
  opacity: 1 !important; /* kills Swiper default fade */
  margin: 0 5px !important;
  cursor: pointer;
  transition: all 0.3s ease;
}

/* Active bullet */
.media .swiper-pagination-bullet-active {
  width: 40px !important;
  background: #e32636 !important;
  border-radius: 20px !important;
}
</style>
@endsection