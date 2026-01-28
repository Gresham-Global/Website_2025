<div class="article-wrapper">
    <div class="article-container">
        <h1 class="blog-title text-center">
            {{ $news->title }}
        </h1>
        @php
        /* -------------------------------
        | 1. Gallery Images
        --------------------------------*/
        $galleryImages = is_string($news->gallery_images)
        ? json_decode($news->gallery_images, true)
        : ($news->gallery_images ?? []);

        if (!is_array($galleryImages)) {
        $galleryImages = [];
        }

        /* -------------------------------
        | 2. Initialize Variables
        --------------------------------*/
        $paragraphs = [];
        $headings = [];
        $imageIndex = 0;

        /* -------------------------------
        | 3. Clean Empty Paragraphs
        --------------------------------*/
        $cleanedDescription = preg_replace(
        '~<p>(?:\s|&nbsp;|<br\s* /?>|<font[^>]*>|<span[^>]*>)*\s*(?:</font>|</span>)*\s*</p>~i',
        '',
        $news->description ?? ''
        );

        /* -------------------------------
        | 4. Extract H1 / H2
        --------------------------------*/
        preg_match_all(
        '~<(h1|h2).*?>.*?</\1>~si',
            $cleanedDescription,
            $headingMatches
            );
            $headings = $headingMatches[0] ?? [];

            /* -------------------------------
            | 5. Remove H1 / H2
            --------------------------------*/
            $contentWithoutH1H2 = preg_replace(
            '~<(h1|h2).*?>.*?</\1>~si',
                '',
                $cleanedDescription
                );

                /* -------------------------------
                | 6. Extract paragraphs + H3-H5
                --------------------------------*/
                preg_match_all(
                '~<p.*?>.*?</p>|<h3.*?>.*?</h3>|<h4.*?>.*?</h4>|<h5.*?>.*?</h5>|<blockquote.*?>.*?</blockquote>~si',
                                    $contentWithoutH1H2,
                                    $contentMatches
                                    );

                                    if (!empty($contentMatches[0])) {
                                    foreach ($contentMatches[0] as $item) {
                                    $textOnly = trim(strip_tags(str_replace('&nbsp;', '', $item)));
                                    if ($textOnly !== '') {
                                    $paragraphs[] = $item;
                                    }
                                    }
                                    }
                                    @endphp

                                    {{-- ===============================
        | ARTICLE HEADER
        ================================--}}
                                    @if(!empty($headings))
                                    <header class="article-header">
                                        @foreach($headings as $heading)
                                        {!! $heading !!}
                                        @endforeach
                                    </header>
                                    @endif

                                    {{-- ===============================
        | ARTICLE BODY
        ================================--}}
                                    @foreach($paragraphs as $index => $paragraph)

                                    <section class="article-section">

                                        {{-- Image (if exists) --}}
                                        @if($imageIndex < count($galleryImages))
                                            <figure class="article-float {{ $index % 2 === 0 ? 'float-left' : 'float-right' }}">
                                            <img src="{{ asset($galleryImages[$imageIndex]) }}" alt="{{ $news->title }}">
                                            <!-- <figcaption>{{ $news->title }}</figcaption> -->
                                            </figure>
                                            @php $imageIndex++; @endphp
                                            @endif

                                            {{-- Content --}}
                                            <div class="article-content full-text {{ $index === 0 ? 'drop-cap' : '' }}">
                                                {!! $paragraph !!}
                                            </div>

                                            <div class="clearfix"></div>
                                    </section>

                                    @endforeach

                                    {{-- ===============================
        | REMAINING IMAGES
        ================================--}}
                                    @if($imageIndex < count($galleryImages))
                                        <section class="image-gallery">
                                        @for($i = $imageIndex; $i < count($galleryImages); $i++)
                                            <figure>
                                            <img src="{{ asset($galleryImages[$i]) }}" alt="{{ $news->title }}">
                                            <!-- <figcaption>{{ $news->title }}</figcaption> -->
                                            </figure>
                                            @endfor
                                            </section>
                                            @endif

    </div>
</div>
<style>
    .article-wrapper {
        background: #f9fafb;
        padding: 40px 0;
        font-family: 'Poppins', sans-serif;
        margin-bottom: 25px;
    }

    .article-container {
        max-width: 1400px;
        margin: auto;
        padding: 0 20px;
    }

    /* Header */
    .article-header h1 {
        font-size: 44px;
        font-weight: 700;
        text-align: center;
        line-height: 1.3;
        margin-bottom: 20px;
    }

    .article-header h2 {
        font-size: 26px;
        font-weight: 600;
        text-align: center;
        color: #555;
    }

    /* Sections */
    .article-section {
        margin: 10px 0;
    }

    /* Floating Images */
    .article-float {
        width: 45%;
        margin-bottom: 20px;
    }

    .float-left {
        float: left;
        margin-right: 30px;
    }

    .float-right {
        float: right;
        margin-left: 30px;
    }

    .article-float img {
        width: 100%;
        border-radius: 14px;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
    }

    /* Image Caption */
    .article-float figcaption,
    .image-gallery figcaption {
        font-size: 14px;
        color: #606161;
        margin-top: 8px;
        font-style: italic;
        text-align: center;
    }

    /* Content */
    .article-content p {
        font-size: 18px;
        line-height: 1.9;
        color: #000;
        margin-bottom: 18px;
        text-align: justify;
    }

    /* Drop Cap */
    .drop-cap p:first-of-type::first-letter {
        float: left;
        font-size: 72px;
        line-height: 0.8;
        padding-right: 10px;
        font-weight: 700;
        color: #111;
    }

    /* Pull Quotes */
    .article-content blockquote {
        font-size: 26px;
        font-weight: 600;
        color: #222;
        border-left: 5px solid #111;
        padding: 20px 25px;
        margin: 40px 0;
        background: #fff;
        font-style: italic;
    }

    /* Lists */
    .article-content ul {
        padding-left: 20px;
    }

    .article-content li {
        font-size: 17px;
        margin-bottom: 10px;
    }

    /* Gallery */
    .image-gallery {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
        gap: 20px;
        margin-top: 0;
    }

    .image-gallery img {
        width: 100%;
        border-radius: 14px;
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.1);
    }

    /* Clearfix */
    .clearfix {
        clear: both;
    }

    /* Mobile */
    @media (max-width: 768px) {
        .article-float {
            float: none !important;
            width: 100%;
            margin: 0 0 20px 0;
        }

        .article-header h1 {
            font-size: 32px;
        }

        .article-content p {
            font-size: 16px;
        }

        .drop-cap p:first-of-type::first-letter {
            font-size: 56px;
        }
    }
</style>