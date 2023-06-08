


<div class="py-[50px] lg:py-[50px]">
<div id="stories" class="storiesWrapper"></div>
</div>


@push('script')
<script src="{{asset('frontend/js/plugins/zuck.min.js')}}"></script>

<script>
    var currentSkin = getCurrentSkin();
    var stories = new Zuck('stories', {
      backNative: true,
      previousTap: true,
      skin: currentSkin['name'],
      autoFullScreen: currentSkin['params']['autoFullScreen'],
      avatars: currentSkin['params']['avatars'],
      paginationArrows: currentSkin['params']['paginationArrows'],
      list: currentSkin['params']['list'],
      cubeEffect: currentSkin['params']['cubeEffect'],
      localStorage: true,
      stories: [
        @foreach ($stories as $key => $story)
        @php
        $createdAt = \Carbon\Carbon::parse($story->created_at);
        @endphp
        Zuck.buildTimelineItem(
          "{{$story->storyTranslation->title}}",
          "{{ URL::asset('images/stories/' . $story->storyTranslation->image)}}",
          "{{$story->storyTranslation->title}}",
          "https://ggiturkey.com",
          timestamp(),
          [
            ["{{$story->storyTranslation->title}}", "{{$story->type}}", "{{$story->duration}}", "{{ URL::asset('images/stories/' . $story->storyTranslation->image)}}", "{{ URL::asset('images/stories/' . $story->file_thumb)}}", '{{url($story->link)}}', '{{$story->storyTranslation->link_title}}', false, timestamp()],
          ]
        ),
        @endforeach
      ]
    });
  </script>
@endpush
