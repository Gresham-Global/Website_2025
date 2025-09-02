@extends('admin.layout.app')
@section('content')

<section class="boardView-section">
    <div class="boardView-container">
        <div class="about-institues-section">
            <div class="aboutInstitues-form-container">
                @if(session('error_message_catch'))
                <div class="alert alert-danger">
                    {{ session('error_message_catch') }}
                </div>
                @endif

                @if(session('status'))
                <div class="col-12 alert alert-success">
                    {{ session('status') }}
                </div>
                @endif

                <form name="add-publications" id="add-publications" method="POST" action="{{ route('admin.publication.store') }}" enctype="multipart/form-data">
                    @csrf

                    <!-- publications Title & Short Description -->
                    <div class="form-flex-box p-0 mt-3">
                        <div class="form-group w-48 form-group-box {{ $errors->has('title') ? 'has-error' : '' }}">
                            <label for="title" class="fullName">Publications Title</label>
                            <div class="input-group">
                                <input type="text" id="title" name="title" class="form-control" required value="{{ old('title') }}">
                            </div>
                            <span id="title-error" class="error" for="name" style="display: none;"></span>
                        </div>

                        <div class="form-group w-48 form-group-box {{ $errors->has('short_description') ? 'has-error' : '' }}">
                            <label for="short_description" class="fullName">Short Description</label>
                            <div class="input-group">
                                <input type="text" id="short_description" name="short_description" class="form-control" required value="{{ old('short_description') }}">
                            </div>
                            <span id="short_description-error" class="error" for="name" style="display: none;"></span>
                        </div>
                    </div>

                    <!-- Thumbnail Image & Video Link -->
                    <div class="form-flex-box upload-section p-0 mt-3">
                        <!-- Thumbnail Image -->
                        <div class="form-group form-group-box">
                            <label for="thumbnail_image" class="fullName">
                                Add Thumbnail Image (Max: 500KB, Recommended: 640x360px)
                            </label>
                            <div class="input-group">
                                <input type="file" id="thumbnail_image" name="thumbnail_image" class="form-control"
                                    onchange="previewImage(event)" required
                                    accept=".png, .jpg, .jpeg, .webp, .svg, image/png, image/jpeg, image/webp, image/svg+xml">
                            </div>
                            <img id="thumbnail_preview" class="preview-image" src="#" alt="Thumbnail Preview" />
                            <span id="thumbnail_image-error" class="error"></span>
                        </div>

                        <!-- Tags Select2 Multi + Tag Support -->
                        <div class="form-group form-group-box w-48 {{ $errors->has('tags') ? 'has-error' : '' }}">
                            <label for="tags" class="fullName">Add Tags</label>
                            <div class="input-group">
                                <select name="tags[]" id="tags" class="form-control" multiple style="height:50px">
                                    @foreach($tags as $tag)
                                    <option value="{{ $tag->name }}">{{ $tag->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <span id="tags-error" class="error" for="tags" style="display: none;"></span>
                        </div>
                    </div>

                    <!-- Social Link -->
                    <div class="form-flex-box upload-section p-0 mt-3 d-none">
                        <div class="form-group w-48 form-group-box">
                            <!-- Empty or future use -->
                        </div>

                        <div class="form-group w-48 form-group-box {{ $errors->has('share_link') ? 'has-error' : '' }}">
                            <label for="share_link" class="fullName">Social Link</label>
                            <div class="input-group">
                                <input type="text" id="share_link" name="share_link" class="form-control" value="{{ old('share_link') }}">
                            </div>
                            <span id="share_link-error" class="error" style="display: none;" for="share_link"></span>
                        </div>
                    </div>


                    <hr width="90%">

                    <div class="form-flex-box upload-section p-0 mt-5">
                        <!-- Banner Image -->
                        <div class="form-group form-group-box">
                            <label for="banner_image" class="fullName">Add Desktop Banner Image (Max: 500KB, Recommended: 1720x530px)</label>
                            <div class="input-group">
                                <input type="file" id="banner_image" name="banner_image" class="form-control" onchange="previewImage(event)" required accept=".png, .jpg, .jpeg, .webp, .svg">
                            </div>
                            <img id="banner_preview" class="preview-image" src="#" alt="Banner Preview" />
                            <span id="banner_image-error" class="error"></span>
                        </div>

                        <!--Mobile  Banner Image -->
                        <div class="form-group form-group-box">
                            <label for="mb_banner_image" class="fullName">Add Mobile Banner Image (Max: 500KB, Recommended: 430x350px)</label>
                            <div class="input-group">
                                <input type="file" id="mb_banner_image" name="mb_banner_image" class="form-control" onchange="previewImage(event)" required accept=".png, .jpg, .jpeg, .webp, .svg">
                            </div>
                            <img id="mb_banner_preview" class="preview-image" src="#" alt="Banner Preview" />
                            <span id="mb_banner_image-error" class="error"></span>
                        </div>

                        <!-- Vertical Image -->
                        <div class="form-group form-group-box">
                            <label for="vertical_image" class="fullName">Add Vertical Image (Max: 500KB, Recommended: 374x540px)</label>
                            <div class="input-group">
                                <input type="file" id="vertical_image" name="vertical_image" class="form-control" onchange="previewImage(event)" required accept=".png, .jpg, .jpeg, .webp, .svg">
                            </div>
                            <img id="vertical_preview" class="preview-image" src="#" alt="Vertical Preview" />
                            <span id="vertical_image-error" class="error"></span>
                        </div>

                        <!-- PDF Upload + Preview -->
                        <div class="form-group form-group-box">
                            <label for="report_pdf" class="fullName">Add Report PDF(Max File Size: 2MB)</label>
                            <div class="input-group">
                                <input type="file" id="report_pdf" name="report_pdf" class="form-control" accept=".pdf">
                            </div>
                            <iframe id="pdf_preview" class="preview-pdf" src="#" frameborder="0"></iframe>
                            <span id="report_pdf-error" class="error"></span>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="form-flex-box p-0 mt-3 desc_section">
                        <div class="form-group w-100 form-group-box {{ $errors->has('description') ? 'has-error' : '' }}">
                            <label for="description" class="description">Description (Upload image Max: 500KB, Dimensions: 1280x720px)</label>
                            <div class="input-group">
                                <textarea id="description" name="description" rows="20" class="form-control w-100" required>{{ old('description') }}</textarea>
                            </div>
                            <span id="description-error" class="error" for="name" style="display: none;"></span>
                        </div>
                    </div>

                    <hr width="90%">

                    <div class="form-flex-box p-0 mt-3 report-includes-section text-center">
                        <h5 class="report-includes-heading ">Section: What the report includes</h5>
                    </div>

                    @for ($i = 0; $i < 3; $i++)
                        <div class="form-flex-box p-0 mt-5 upload-section report-card" data-card-index="{{ $i }}">

                        <!-- Report Title -->
                        <div class="form-group form-group-box {{ $errors->has('report_title.'.$i) ? 'has-error' : '' }}">
                            <label for="report_title_{{ $i }}" class="fullName">Report Title {{ $i + 1 }}</label>
                            <div class="input-group">
                                <input type="text"
                                    id="report_title_{{ $i }}"
                                    name="report_title[{{ $i }}]"
                                    class="form-control"
                                    value="{{ old('report_title.'.$i) }}"
                                    @if ($i===0) required @endif>
                            </div>
                            <span id="report_title_{{ $i }}-error" class="error"></span>
                        </div>

                        <!-- Report Image Upload -->
                        <div class="form-group form-group-box">
                            <label for="report_image_{{ $i }}" class="fullName">Report Image {{ $i + 1 }} (Max: 500KB, Recommended: 550x380px)</label>
                            <div class="input-group">
                                <input type="file"
                                    id="report_image_{{ $i }}"
                                    name="report_image[{{ $i }}]"
                                    class="form-control"
                                    onchange="previewImage(event)"
                                    @if ($i===0) required @endif
                                    accept=".png, .jpg, .jpeg, .webp, .svg">
                            </div>
                            <img id="report_image_preview_{{ $i }}" class="preview-image" src="#" alt="Report Preview" />
                            <span id="report_image_{{ $i }}-error" class="error"></span>
                        </div>

                        <!-- Report List -->
                        <div class="form-group form-group-box full-width">
                            <label class="fullName">Report Lists {{ $i + 1 }} (Max: 5)</label>
                            <div id="report-list-wrapper-{{ $i }}">
                                <div class="input-group report-list-item mb-2">
                                    <input type="text"
                                        name="report_list[{{ $i }}][]"
                                        id="report_list_{{ $i }}_0"
                                        class="form-control"
                                        placeholder="Enter report list item"
                                        @if ($i===0) required @endif>
                                </div>
                            </div>
                            <button type="button" class="btn btn-sm btn-outline-primary mt-2 add-report-list-btn"
                                data-wrapper="#report-list-wrapper-{{ $i }}">+ Add More</button>
                            <span id="report_list_{{ $i }}_0-error" class="error"></span>
                        </div>
            </div>
            @endfor


            <hr width="90%">

            <div class="form-flex-box p-0 mt-3 key-highlights-section text-center">
                <h5 class="report-includes-heading ">Section: Key Highlights</h5>
            </div>

            @for ($i = 0; $i < 3; $i++)
                <div class="form-flex-box p-0 mt-4 upload-section key-highlight-card" data-card-index="{{ $i }}">

                <!-- Highlight Icon Upload -->
                <div class="form-group form-group-box w-48">
                    <label for="highlight_icon_{{ $i }}" class="fullName">Highlight Icon {{ $i + 1 }} (Max: 300KB, Recommended: 158x158px)</label>
                    <div class="input-group">
                        <input type="file"
                            id="highlight_icon_{{ $i }}"
                            name="highlight_icon[{{ $i }}]"
                            class="form-control"
                            accept=".png, .jpg, .jpeg, .webp, .svg"
                            onchange="previewHighlightIcon(event, {{ $i }})"
                            @if ($i===0) required @endif>
                    </div>

                    {{-- Preview image if available --}}
                    @if (!empty($keyHighlightsData[$i]['highlight_icon']))
                    <a href="{{ $keyHighlightsData[$i]['highlight_icon'] }}" target="_blank">
                        <img id="highlight_icon_preview_{{ $i }}" class="preview-image"
                            src="{{ $keyHighlightsData[$i]['highlight_icon'] }}"
                            alt="Icon Preview" style="max-width: 100px; max-height: 100px;">
                    </a>
                    @else
                    <img id="highlight_icon_preview_{{ $i }}" class="preview-image"
                        src="#" alt="Icon Preview"
                        style="display: none; max-width: 100px; max-height: 100px;">
                    @endif

                    <input type="hidden" name="highlight_icon_url_original[{{ $i }}]" value="{{ $keyHighlightsData[$i]['highlight_icon'] ?? '' }}">

                    <span id="highlight_icon_{{ $i }}-error" class="error"></span>
                </div>

                <!-- Highlight Description -->
                <div class="form-group form-group-box w-48 {{ $errors->has('highlight_description.'.$i) ? 'has-error' : '' }}">
                    <label for="highlight_description_{{ $i }}" class="fullName">Highlight Description {{ $i + 1 }}</label>
                    <div class="input-group">
                        <textarea id="highlight_description_{{ $i }}"
                            name="highlight_description[{{ $i }}]"
                            class="form-control summernote summernote-highlight"
                            placeholder="Enter description"
                            @if ($i===0) required @endif>{{ old('highlight_description.'.$i, $keyHighlightsData[$i]['highlight_description'] ?? '') }}</textarea>
                    </div>
                    <span id="highlight_description_{{ $i }}-error" class="error"></span>
                </div>

        </div>
        @endfor

        <hr width="90%">

        <div class="form-flex-box p-0 mt-3 desc_section statuswdth">
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" class="form-control" required>
                    <option value="active" {{ old('status', $publication->status ?? '') == 'active' ? 'selected' : '' }}>Published</option>
                    <option value="inactive" {{ old('status', $publication->status ?? '') == 'inactive' ? 'selected' : '' }}>Draft</option>
                </select>
            </div>
            <!-- <span id="status-error" class="error" for="name" style="display: none;"></span> -->
        </div>


        <!-- Submit Button -->
        <div class="d-flex align-items-center justify-content-end mt-4">
            <button class="view-btn" type="submit" style="height: 50px">Submit</button>
        </div>
        </form>
    </div>
    </div>
    </div>
</section>

@endsection