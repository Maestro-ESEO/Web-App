@extends("app.layout")


@section("content")

<div class="w-full h-full flex flex-col justify-start py-14 px-16">
    <x-ui.title>Hello {{Auth::user()->first_name}}!</x-ui.title>
    <div class="w-full flex flex-wrap justify-start items-start mt-16 gap-10">
        <div class="w-80 h-52 flex flex-col justify-start items-start bg-light-gray rounded-2xl shadow-project p-4">
            <p class="font-semibold text-black text-xl">Project 1</p>
            <p class="text-dark-gray text-sm mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum deleniti.</p>

            <div class="w-24 h-8 mt-2 flex flex-row justify-center items-center border-2 border-black rounded-lg gap-1">
                <x-icons.deadline size=16 /> Date
            </div>

        </div>
    </div>
</div>

@endsection