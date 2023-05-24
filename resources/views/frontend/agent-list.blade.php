@extends('frontend.main')
@section('title'){{isset($siteInfo->title) ? $siteInfo->title : 'GGI Turkey,'}}
@endsection
@section('meta'){{isset($siteInfo->description) ? $siteInfo->description : 'description'}}
@endsection
@section('image')https://ggiturkey.com/frontend/images/logo/logo.png
@endsection
@section('title', 'GGI Turkey, Properties')

@section('content')
@include('frontend.includes.header1')
        <!-- Hero section start -->
        <section class="bg-no-repeat bg-center bg-cover bg-[#FFF6F0] h-[350px] lg:h-[513px] flex flex-wrap items-center relative before:absolute before:inset-0 before:content-[''] before:bg-[#000000] before:opacity-[70%]" style="background-image: url('assets/images/breadcrumb/bg-1.png');">
            <div class="container">
                <div class="grid grid-cols-12">
                    <div class="col-span-12">
                        <div class="max-w-[700px]  mx-auto text-center text-white relative z-[1]">
                            <div class="mb-5"><span class="text-base block">Our Agents</span></div>
                            <h1 class="font-lora text-[32px] sm:text-[50px] md:text-[68px] lg:text-[50px] leading-tight xl:text-2xl font-medium">
                                Meet our Team
                            </h1>
                            <!-- <p class="text-base mt-5 max-w-[500px] mx-auto text-center">
                                Huge number of propreties availabe here for buy and sell
                                also you can find here co-living property as you like
                            </p> -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Hero section end -->

        <!-- Team Section Etart-->
        <section class="team-section py-[80px] lg:py-[120px]">
            <div class="container">
                <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-x-[30px] -mb-[30px]">
                    <!-- single team start -->
                    @foreach($agents as $agent)
                    <div class="text-center group mb-[30px]">
                        <div class="relative rounded-[6px_6px_0px_0px]">
                        <a href="{{url('/agents/'.$agent->id)}}">
                        <img src="{!! $agent->photo() !!}" class="w-auto h-auto block mx-auto" loading="lazy" width="215" height="310" alt="{{$agent->f_name}} {{$agent->l_name}}">
                    </a>
                    <ul class="flex flex-col absolute w-full top-[30px] left-0 overflow-hidden">
                        <li class="translate-x-[0px] group-hover:translate-x-1 opacity-0 group-hover:opacity-100 transition-all duration-300 m-[10px]">
                            <a href="tel:{{str_replace(' ','',$agent->mobile)}}" aria-label="svg" class="w-[26px] h-[26px] transition-all rounded-full bg-[#FFF6F0] flex items-center justify-center hover:drop-shadow-[0px_4px_10px_rgba(0,0,0,0.25)] text-[#494949] hover:text-[#3B5998]">
                                <img width="16px" src="{{asset('/images/phone.png')}}">
                            </a>
                        </li>
                        <li class="translate-x-[0px] group-hover:translate-x-1 opacity-0 group-hover:opacity-100 transition-all duration-500 m-[10px]">
                            <a href="mailto:{{$agent->email}}" aria-label="svg" class="w-[26px] h-[26px] transition-all rounded-full bg-[#FFF6F0] flex items-center justify-center hover:drop-shadow-[0px_4px_10px_rgba(0,0,0,0.25)] text-[#494949] hover:text-[#3B5998]">
                                <img width="16px" src="{{asset('/images/email.png')}}">
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="bg-[#FFFDFC] z-[1] drop-shadow-[0px_2px_15px_rgba(0,0,0,0.1)] rounded-[0px_0px_6px_6px] px-3 md:px-[15px] py-[20px] border-b-[6px] border-primary transition-all duration-500 before:transition-all before:duration-300 group-hover:border-secondary relative">
                    <h3><a href="{{url('/agents/'.$agent->id)}}" class="font-lora font-normal text-base text-primary group-hover:text-secondary">{{$agent->f_name}} {{$agent->l_name}}</a></h3>
                    <p class="font-normal text-[14px] leading-none capitalize mt-[5px] group-hover:text-body">{{$agent->title}}</p>
                </div>
                    </div>
                    @endforeach
                    <!-- single team end-->
                </div>
            </div>
        </section>
        <!-- Team Section End-->
    <!--Listing Filter ends-->
@endsection
@push('script')
<script>
    $('#sort').on('change',function(){
        var agent = $(this).val();
$('.list-agent').hide();
        $.ajax({
            method:'post',
            url: '{{route('agent.sort')}}',
            data: {agent:agent,"_token":"{{csrf_token()}}"},
            dataType:'html',
            success:function(response){
                $('#list-view').html(response);
            }
        });
    });
</script>
@endpush
