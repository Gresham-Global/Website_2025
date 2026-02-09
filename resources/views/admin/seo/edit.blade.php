@extends('admin.layout.app')

@section('content')

<section class="boardView-section">
    <div class="boardView-container">
        <div class="about-institues-section">
            <div class="aboutInstitues-form-container">

                {{-- Alerts --}}
                @if(session('error_message_catch'))
                <div class="alert alert-danger">
                    {{ session('error_message_catch') }}
                </div>
                @endif

                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                <form action="{{ route('admin.seo_update', $seo->id) }}" method="POST">
                    @csrf
                    {{-- If using PUT/PATCH --}}
                    @method('POST')

                    <div class="form-flex-box p-0 mt-3">
                        {{-- Page Dropdown --}}
                        <div class="form-group w-48 form-group-box">
                            <label for="page_url">Select Page</label>

                            <div class="input-group input-group-disabled">

                                <select name="page_url" id="page_url" class="form-control" required>

                                    <option value="">-- Select Page --</option>


                                    {{-- Static Pages --}}
                                    @if(!empty($pages['static']))
                                    <optgroup label="Static Pages">
                                        @foreach($pages['static'] as $page)
                                        <option value="{{ $page['url'] }}"
                                            {{ $seo->page_url == $page['url'] ? 'selected' : '' }}
                                            {{ isset($page['disabled']) && $page['disabled'] ? 'disabled' : '' }}>

                                            {{ $page['title'] }}
                                            {{ isset($page['disabled']) && $page['disabled'] ? '(Already Added SEO)' : '' }}

                                        </option>
                                        @endforeach
                                    </optgroup>
                                    @endif


                                    {{-- News & Blogs --}}
                                    @if(!empty($pages['blogs']))
                                    <optgroup label="News & Blogs">
                                        @foreach($pages['blogs'] as $page)
                                        <option value="{{ $page['url'] }}"
                                            {{ $seo->page_url == $page['url'] ? 'selected' : '' }}
                                            {{ isset($page['disabled']) && $page['disabled'] ? 'disabled' : '' }}>

                                            {{ $page['title'] }}
                                            {{ isset($page['disabled']) && $page['disabled'] ? '(Already Added SEO)' : '' }}

                                        </option>
                                        @endforeach
                                    </optgroup>
                                    @endif


                                    {{-- Publications --}}
                                    @if(!empty($pages['publications']))
                                    <optgroup label="Publications">
                                        @foreach($pages['publications'] as $page)
                                        <option value="{{ $page['url'] }}"
                                            {{ $seo->page_url == $page['url'] ? 'selected' : '' }}
                                            {{ isset($page['disabled']) && $page['disabled'] ? 'disabled' : '' }}>

                                            {{ $page['title'] }}
                                            {{ isset($page['disabled']) && $page['disabled'] ? '(Already Added SEO)' : '' }}

                                        </option>
                                        @endforeach
                                    </optgroup>
                                    @endif


                                    {{-- Events --}}
                                    @if(!empty($pages['events']))
                                    <optgroup label="Events">
                                        @foreach($pages['events'] as $page)
                                        <option value="{{ $page['url'] }}"
                                            {{ $seo->page_url == $page['url'] ? 'selected' : '' }}
                                            {{ isset($page['disabled']) && $page['disabled'] ? 'disabled' : '' }}>

                                            {{ $page['title'] }}
                                            {{ isset($page['disabled']) && $page['disabled'] ? '(Already Added SEO)' : '' }}

                                        </option>
                                        @endforeach
                                    </optgroup>
                                    @endif


                                </select>

                            </div>
                        </div>


                        {{-- Meta Title --}}
                        <div class="form-group w-48 form-group-box">
                            <label for="meta_title">Meta Title</label>
                            <div class="input-group">
                                <input type="text" id="meta_title" name="meta_title" class="form-control"
                                    value="{{ old('meta_title', $seo->meta_title) }}">
                            </div>
                        </div>
                    </div>

                    <div class="form-flex-box p-0 mt-3">
                        {{-- Meta Description --}}
                        <div class="form-group w-48 form-group-box">
                            <label for="meta_description">Meta Description</label>
                            <div class="input-group">
                                <textarea name="meta_description" id="meta_description" class="form-control">{{ old('meta_description', $seo->meta_description) }}</textarea>
                            </div>
                        </div>

                        {{-- Meta Keywords --}}
                        <div class="form-group w-48 form-group-box">
                            <label for="meta_keywords">Meta Keywords</label>
                            <div class="input-group">
                                <textarea name="meta_keywords" id="meta_keywords" class="form-control">{{ old('meta_keywords', $seo->meta_keywords) }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex align-items-center justify-content-end mt-4">
                        <button class="view-btn" type="submit" style="height: 50px">Update</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>
<style>
    select {
        pointer-events: none !important;
        background: #eee;
    }

    .input-group-disabled {
        pointer-events: none !important;
        background: #eee;
    }
</style>
@endsection