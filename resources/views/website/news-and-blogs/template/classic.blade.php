<div class="customSection blog-wrapper">
    <div class="customContainer blog-container">

        {{-- Title --}}
        <h1 class="blog-title text-center">
            {{ $news->title }}
        </h1>

        {{-- Content --}}
        <div class="blog-content">
            {!! $news->description !!}
        </div>

    </div>
</div>
<style>
    .blog-wrapper {
        background: #ffffff;
        padding: 80px 0;
        font-family: 'Georgia', 'Times New Roman', serif;
    }

    .blog-container {
        /* max-width: 760px; */
        margin: auto;
        padding: 0 20px;
    }

    /* Title */
    .blog-title {
        font-size: 42px;
        font-weight: 600;
        line-height: 1.3;
        margin-bottom: 40px;
        color: #111;
    }

    /* Content Typography */
    .blog-content p {
        font-size: 18px;
        line-height: 1.85;
        color: #333;
        margin-bottom: 22px;
        text-align: justify;
    }

    /* Headings inside content */
    .blog-content h2 {
        font-size: 28px;
        font-weight: 600;
        margin: 50px 0 20px;
        color: #111;
    }

    .blog-content h3 {
        font-size: 22px;
        font-weight: 600;
        margin: 40px 0 16px;
    }

    /* Lists */
    .blog-content ul,
    .blog-content ol {
        padding-left: 22px;
        margin-bottom: 24px;
    }

    .blog-content li {
        font-size: 18px;
        line-height: 1.7;
        margin-bottom: 10px;
    }

    /* Blockquotes (classic newspaper style) */
    .blog-content blockquote {
        font-size: 22px;
        font-style: italic;
        border-left: 4px solid #000;
        padding-left: 20px;
        margin: 40px 0;
        color: #000;
    }

    /* Links */
    .blog-content a {
        color: #000;
        text-decoration: underline;
        text-underline-offset: 4px;
    }

    .blog-content a:hover {
        opacity: 0.8;
    }

    /* Mobile */
    @media (max-width: 768px) {
        .blog-title {
            font-size: 30px;
            margin-bottom: 30px;
        }

        .blog-content p,
        .blog-content li {
            font-size: 16px;
        }
    }
</style>