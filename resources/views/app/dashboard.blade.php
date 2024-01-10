@extends("app.layout")


@section("content")

<div class="w-full h-full flex flex-col justify-start py-14 px-16">
    <x-ui.title>Hello {{Auth::user()->first_name}}!</x-ui.title>
    <div class="w-full flex flex-wrap justify-start items-start mt-16 gap-10">
        <div class="w-[24rem] h-56 flex flex-col justify-start items-start bg-gray-100 rounded-2xl shadow-project p-4 gap-3">
            <p class="font-bold text-black text-xl">Project 1</p>
            <p class="text-dark-gray text-sm line-clamp-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni distinctio voluptatibus ducimus saepe adipisci deleniti consequuntur mollitia necessitatibus expedita iure debitis eos, aut repellendus inventore amet quibusdam vel, cum quo?</p>

            <div class="w-32 h-8 flex flex-row justify-center items-center border border-dark-gray rounded-lg gap-2 text-dark-gray">
                <x-icons.deadline class="stroke-dark-gray" size=16 />
                <p class="text-sm">18/08/2002</p>
            </div>
            <x-ui.divider />

            <div class="w-full flex justify-start items-center gap-3">
                <div class="flex justify-start items-center pl-3">
                    <div class="h-9 w-9 -ml-3 rounded-full bg-black"></div>
                    <div class="h-9 w-9 -ml-3 rounded-full bg-red"></div>
                    <div class="h-9 w-9 -ml-3 rounded-full bg-yellow-300"></div>
                    <div class="h-9 w-9 -ml-3 rounded-full flex border items-center justify-center bg-gray-200 text-sm">+1</div>
                </div>
                <div class="flex flex-col flex-1 justify-center items-start">
                    <p class="text-sm text-dark-gray">2 tasks left</p>
                    <div class="flex w-full justify-start items-center gap-2">
                        <div class="flex-1 bg-gray-200 rounded-full h-2.5">
                            <div class="bg-red h-2.5 rounded-full" style="width: 90%"></div>
                        </div>
                        <p class="font-semibold text-xs  text-red">90%</p>
                    </div>

                </div>
            </div>
        </div>
        
    </div>
</div>

@endsection