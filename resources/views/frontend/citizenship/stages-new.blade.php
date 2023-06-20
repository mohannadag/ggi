<section class="mt-6 mb-20 text-neutral-700">
    <div class="grid gap-12 lg:grid-cols-1">
        @if(App::isLocale('ar'))
            <img src="{{ URL::asset('/images/images/stages.png') }}" class="lg:w-2/3" style="justify-self: center;">
        @else
            <img src="{{ URL::asset('/images/images/stages-en.png') }}" class="lg:w-2/3" style="justify-self: center;">
        @endif
    </div>
</section>

