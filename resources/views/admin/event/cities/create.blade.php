@extends('admin.layout.app')
@section('content')

<section class="boardView-section">
    <div class="boardView-container">
        <div class="about-institues-section">
            <div class="aboutInstitues-form-container">

                @if(session('error_message_catch'))
                <div class="alert alert-danger">{{ session('error_message_catch') }}</div>
                @endif

                @if(session('status'))
                <div class="col-12 alert alert-success">{{ session('status') }}</div>
                @endif

                <form name="add-city" id="add-city" method="POST" action="{{ route('admin.event.cities.store') }}">
                    @csrf

                    <div class="form-flex-box p-0 mt-3">
                        {{-- Event Dropdown --}}
                        <div class="form-group form-group-box w-48">
                            <label for="event_id" class="fullName">Event</label>
                            <div class="input-group">
                                <select name="event_id" id="event_id" class="form-control" style="height:50px">
                                    <option value="">Select Event</option>
                                    @foreach($events as $event)
                                    <option value="{{ $event->id }}">{{ $event->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <span id="event_id-error" class="error" for="name" style="display: none;"></span>

                        </div>

                        {{-- City Select2 Multi + Tag Support --}}
                        <div class="form-group form-group-box w-48">
                            <label for="city" class="fullName">City</label>
                            <div class="input-group">
                                <select name="city[]" id="city" class="form-control" multiple style="height:50px">
                                    @foreach($cities as $city)
                                    <option value="{{ $city->city_name }}">{{ $city->city_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <span id="city-error" class="error" for="name" style="display: none;"></span>

                        </div>
                    </div>

            </div>

            <!-- Submit -->
            <div class="d-flex align-items-center justify-content-end mt-4">
                <button class="view-btn" type="submit" style="height: 50px">Submit</button>
            </div>
            </form>

        </div>
    </div>
    </div>
</section>

@endsection