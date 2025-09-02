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

                    @php
                        // Fetch all selected city IDs for this event to optimize performance
                        $selectedTagIds = $publication_tags->pluck('tag_id')->toArray();
                    @endphp

                    <form name="edit_publication" id="edit_publication" method="POST"
                        action="{{ url('admin/publication/edit/' . $publicationsData['id']) }}" enctype="multipart/form-data">
                        @csrf

                        <!-- Title & Short Description -->
                        <div class="form-flex-box p-0 mt-3">
                            <div class="form-group w-48 form-group-box {{ $errors->has('title') ? 'has-error' : '' }}">
                                <label for="title" class="fullName">Publications Title</label>
                                <div class="input-group">
                                    <input type="text" id="title" name="title" class="form-control" required
                                        value="{{ old('title', $publicationsData['title']) }}">
                                </div>
                                <span id="title-error" class="error" for="name" style="display: none;"></span>
                            </div>

                            <div
                                class="form-group w-48 form-group-box {{ $errors->has('short_description') ? 'has-error' : '' }}">
                                <label for="short_description" class="fullName">Short Description</label>
                                <div class="input-group">
                                    <input type="text" id="short_description" name="short_description" class="form-control"
                                        required
                                        value="{{ old('short_description', $publicationsData['short_description']) }}">
                                </div>
                                <span id="short_description-error" class="error" for="name" style="display: none;"></span>
                            </div>
                        </div>

                        <!-- Thumbnail Upload -->
                        <div class="form-flex-box p-0 mt-3">
                            <div class="form-group w-48 form-group-box">
                                <label for="thumbnail_image" class="fullName">Update Thumbnail Image (Max: 500KB,
                                    Recommended: 640x360px)</label>
                                <div class="input-group">
                                    <input type="file" id="thumbnail_image" name="thumbnail_image" class="form-control"
                                        accept=".png, .jpg, .jpeg, .webp, .svg, image/png, image/jpeg, image/webp, image/svg+xml">
                                </div>
                                <span id="thumbnail_image-error" class="error" for="name" style="display: none;"></span>
                            </div>
                            {{-- Tags Select2 Multi + Tag Support --}}
                            <div class="form-group form-group-box w-48 {{ $errors->has('tags') ? 'has-error' : '' }}">
                                <label for="tags" class="fullName">Add Tags</label>
                                <div class="input-group">
                                    <select name="tags[]" id="tags" class="form-control" multiple>
                                        @foreach($tags as $tag)
                                            <option value="{{ $tag->name }}" {{ in_array($tag->id, $selectedTagIds) ? 'selected' : '' }}>
                                                {{ $tag->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <span id="tags-error" class="error" for="tags" style="display: none;"></span>
                            </div>
                        </div>

                        <!-- Thumbnail Preview & Video Link -->
                        <div class="form-flex-box p-0 mt-3">
                            <div class="form-group w-48 form-group-box">
                                <label class="fullName">Uploaded Thumbnail Image Preview</label><br>
                                <div class="input-group">
                                    @if (!empty($publicationsData['thumbnailImagePath']))
                                        <a href="{{ $publicationsData['thumbnailImagePath'] }}" target="_blank">
                                            <img src="{{ $publicationsData['thumbnailImagePath'] }}" alt="Image Preview"
                                                style="max-width: auto; max-height: 100px;">
                                        </a>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group w-48 form-group-box {{ $errors->has('share_link') ? 'has-error' : '' }}">
                                <!-- <label for="share_link" class="fullName">Social Link</label>
                                <div class="input-group">
                                    <input type="text" id="share_link" name="share_link" class="form-control"
                                        value="{{ old('share_link', $publicationsData['share_link'] ?? '') }}">
                                </div>
                                <span id="share_link-error" class="error" for="name" style="display: none;"></span> -->
                            </div>
                        </div>

                        <hr width="90%">


                        <!-- What the Report includes -->
                        <div class="form-flex-box upload-section p-0 mt-5">

                            {{-- Banner Image --}}
                            <div class="form-group w-33 form-group-box">
                                <label class="fullName">Update Desktop Banner Image</label>
                                <div class="input-group mb-2">
                                    <input type="file" id="banner_image" name="banner_image" class="form-control"
                                        accept=".png, .jpg, .jpeg, .webp, .svg">
                                </div>
                                @if (!empty($publicationsData['banner_image']))
                                    <!-- <label class="fullName">Current Banner Image</label><br> -->
                                    <a href="{{ $publicationsData['banner_image'] }}" target="_blank">
                                        <img src="{{ $publicationsData['banner_image'] }}" class="existing-preview"
                                            alt="Banner Preview">
                                    </a>
                                @endif
                            </div>

                            {{-- Mbile Banner Image --}}
                            <div class="form-group w-33 form-group-box">
                                <label class="fullName">Update Mobile Banner Image</label>
                                <div class="input-group mb-2">
                                    <input type="file" id="mb_banner_image" name="mb_banner_image" class="form-control"
                                        accept=".png, .jpg, .jpeg, .webp, .svg">
                                </div>
                                @if (!empty($publicationsData['mb_banner_image']))
                                    <!-- <label class="fullName">Current Banner Image</label><br> -->
                                    <a href="{{ $publicationsData['mb_banner_image'] }}" target="_blank">
                                        <img src="{{ $publicationsData['mb_banner_image'] }}" class="existing-preview"
                                            alt="Banner Preview">
                                    </a>
                                @endif
                            </div>

                            {{-- Vertical Image --}}
                            <div class="form-group w-33 form-group-box">
                                <label class="fullName">Update Vertical Image</label>
                                <div class="input-group mb-2">
                                    <input type="file" id="vertical_image" name="vertical_image" class="form-control"
                                        accept=".png, .jpg, .jpeg, .webp, .svg">
                                </div>
                                @if (!empty($publicationsData['vertical_image']))
                                    <label class="fullName">Current Vertical Image</label><br>
                                    <a href="{{ $publicationsData['vertical_image'] }}" target="_blank">
                                        <img src="{{ $publicationsData['vertical_image'] }}" class="existing-preview"
                                            alt="Vertical Preview">
                                    </a>
                                @endif
                            </div>

                            {{-- Report PDF --}}
                            <div class="form-group w-33 form-group-box">
                                <label class="fullName">Update Report PDF(Max File Size: 2MB)</label>
                                <div class="input-group mb-2">
                                    <input type="file" id="report_pdf" name="report_pdf" class="form-control" accept=".pdf">
                                </div>
                                <div id="report_pdf_error_container" class="custom-error-container"></div>
                                <!-- Custom div for errors -->
                                @if (!empty($publicationsData['report_pdf']))
                                    <label class="fullName">Current Report PDF</label><br>
                                    <a href="{{ $publicationsData['report_pdf'] }}" target="_blank">
                                        <iframe src="{{ $publicationsData['report_pdf'] }}" frameborder="0"
                                            class="preview_pdf"></iframe>
                                    </a>
                                @endif
                            </div>

                        </div>



                        <!-- Description -->
                        <div class="form-flex-box p-0 mt-3 desc_section">
                            <div
                                class="form-group w-100 form-group-box {{ $errors->has('description') ? 'has-error' : '' }}">
                                <label for="description" class="description">Description (Upload image Max: 500KB,
                                    Dimensions: 1280x720px)</label>
                                <div class="input-group">
                                    <textarea id="description" name="description" rows="10" class="form-control"
                                        required>{{ old('description', $publicationsData['description']) }}</textarea>
                                </div>
                                <span id="description-error" class="error" for="name" style="display: none;"></span>
                            </div>
                        </div>

                        <hr width="90%">

                        <!-- what the report includes Starts  -->

                        <div class="form-flex-box p-0 mt-5 report-includes-section text-center">
                            <h5 class="report-includes-heading ">Section: What the report includes</h5>
                        </div>


                        @php
                            $reportCards = $publicationsData['report_cards'] ?? [];
                        @endphp

                        @for ($i = 0; $i < 3; $i++)
                            @php
                                $card = $reportCards[$i] ?? [
                                    'report_title' => '',
                                    'report_image' => '',
                                    'report_list' => [],
                                ];
                            @endphp

                            <div class="form-flex-box p-0 mt-5 upload-section report-card" data-card-index="{{ $i }}">

                                <!-- Report Title -->
                                <div class="form-group form-group-box">
                                    <label class="fullName">Report Title {{ $i + 1 }}</label>
                                    <div class="input-group">
                                        <input type="text" id="report_title_{{ $i }}" name="report_title[{{ $i }}]"
                                            class="form-control" value="{{ old('report_title.' . $i, $card['report_title']) }}" @if($i == 0) required @endif>
                                    </div>
                                </div>

                                <!-- Report Image Upload -->
                                <div class="form-group form-group-box">
                                    <label class="fullName">Report Image {{ $i + 1 }}</label>
                                    <div class="input-group">
                                        <input type="file" id="report_image_{{ $i }}" name="report_image[{{ $i }}]"
                                            class="form-control" accept=".png, .jpg, .jpeg, .webp, .svg">
                                    </div>

                                    @if (!empty($card['report_image']))
                                        <a href="{{ $card['report_image'] }}" target="_blank">
                                            <img src="{{ $card['report_image'] }}" class="preview-image existing-preview"
                                                alt="Preview Image">
                                        </a>
                                    @endif

                                    <!-- Store hidden value -->
                                    <input type="hidden" name="report_image_url_original[{{ $i }}]"
                                        value="{{ $card['report_image'] ?? '' }}">
                                </div>

                                <!-- Report List -->
                                <div class="form-group form-group-box full-width">
                                    <label class="fullName">Report Lists {{ $i + 1 }} (Max: 5)</label>
                                    <div id="report-list-wrapper-{{ $i }}">
                                        @foreach ($card['report_list'] ?? [] as $j => $listItem)
                                            <div class="input-group report-list-item mb-2">
                                                <input type="text" name="report_list[{{ $i }}][]" id="report_list_{{ $i }}_{{ $j }}"
                                                    class="form-control" value="{{ $listItem }}"
                                                    placeholder="Enter report list item"  @if($i == 0) required @endif>
                                                @if ($j > 0)
                                                    <button type="button"
                                                        class="btn btn-sm btn-danger ms-2 remove-report-list">×</button>
                                                @endif
                                            </div>
                                        @endforeach

                                        @if (empty($card['report_list']))
                                            <!-- Render 1 empty input by default if no list -->
                                            <div class="input-group report-list-item mb-2">
                                                <input type="text" name="report_list[{{ $i }}][]" id="report_list_{{ $i }}_0"
                                                    class="form-control" placeholder="Enter report list item"  @if($i == 0) required @endif>
                                            </div>
                                        @endif
                                    </div>

                                    <button type="button" class="btn btn-sm btn-outline-primary mt-2 add-report-list-btn"
                                        data-wrapper="#report-list-wrapper-{{ $i }}">+ Add More</button>
                                </div>
                            </div>
                        @endfor


                        <!-- what the report includes edns  -->

                        <hr width="90%">

                        <div class="form-flex-box p-0 mt-3 key-highlights-section text-center">
                            <h5 class="report-includes-heading ">Section: Key Highlights</h5>
                        </div>

                        @php
                            $keyHighlights = $publicationsData['key_highlights'] ?? [];
                        @endphp

                        @for ($i = 0; $i < 3; $i++)
                            @php
                                $highlight = $keyHighlights[$i] ?? [
                                    'highlight_icon' => '',
                                    'highlight_description' => '',
                                ];
                            @endphp

                            <div class="form-flex-box p-0 mt-4 upload-section key-highlight-card" data-card-index="{{ $i }}">

                                <!-- Highlight Icon Upload -->
                                <div class="form-group form-group-box w-48">
                                    <label for="highlight_icon_{{ $i }}" class="fullName">Highlight Icon {{ $i + 1 }}</label>
                                    <div class="input-group">
                                        <input type="file" id="highlight_icon_{{ $i }}" name="highlight_icon[{{ $i }}]"
                                            class="form-control" accept=".png, .jpg, .jpeg, .webp, .svg"
                                            onchange="previewHighlightIcon(event, {{ $i }})">
                                    </div>

                                    @if (!empty($highlight['highlight_icon']))
                                        <a href="{{ $highlight['highlight_icon'] }}" target="_blank">
                                            <img id="highlight_icon_preview_{{ $i }}" class="preview-image existings-preview"
                                                src="{{ $highlight['highlight_icon'] }}" alt="Icon Preview">
                                        </a>
                                    @else
                                        <img id="highlight_icon_preview_{{ $i }}" class="preview-image existings-preview" src="#"
                                            alt="Icon Preview" style="display: none; ">
                                    @endif

                                    <input type="hidden" name="highlight_icon_url_original[{{ $i }}]"
                                        value="{{ $highlight['highlight_icon'] ?? '' }}">
                                    <span id="highlight_icon-error-{{ $i }}" class="error"></span>
                                </div>

                                <!-- Highlight Description -->
                                <div
                                    class="form-group form-group-box w-48 {{ $errors->has('highlight_description.' . $i) ? 'has-error' : '' }}">
                                    <label for="highlight_description_{{ $i }}" class="fullName">Highlight Description
                                        {{ $i + 1 }}</label>
                                    <div class="input-group">
                                        <textarea id="highlight_description_{{ $i }}" name="highlight_description[{{ $i }}]"
                                            class="form-control summernote summernote-highlight"
                                            placeholder="Enter description">{{ old('highlight_description.' . $i, $highlight['highlight_description']) }}</textarea>
                                    </div>
                                    <span id="highlight_description-error-{{ $i }}" class="error"></span>
                                </div>

                            </div>
                        @endfor
          

                        <div class="form-flex-box p-0 mt-3 desc_section statuswdth">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" class="form-control" required>
                                    <!-- For Create: Default to 'active' if no status is provided in the form -->
                                    <option value="active" {{ (old('status', $publicationsData['status'] ) == 'active') ? 'selected' : '' }}>Published</option>
                                    <option value="inactive" {{ (old('status', $publicationsData['status']) == 'inactive') ? 'selected' : '' }}>Draft</option>
                                </select>
                            </div>
                        </div>


                        <!-- Hidden Original Image -->
                        <input type="hidden" id="thumbnail_image_url_original" name="thumbnail_image_url_original"
                            class="form-control" value="{{ $publicationsData['thumbnail_image'] }}">

                        <!-- Submit Button -->
                        <div class="d-flex align-items-center justify-content-end mt-1">
                            <button class="view-btn" type="submit" style="height: 50px">Submit</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection