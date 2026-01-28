@foreach ($media as $item)
@include('website.media.media_item_single', ['item' => $item])
@endforeach