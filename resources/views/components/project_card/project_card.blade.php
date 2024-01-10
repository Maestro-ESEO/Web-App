@props(['name' => "Project",
'description'=> "Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni distinctio voluptatibus ducimus saepe adipisci deleniti consequuntur mollitia necessitatibus expedita iure debitis eos, aut repellendus inventore amet quibusdam vel, cum quo?",
'deadline'=> "2021-08-18"])

@php
    $date = strtotime($deadline);
@endphp

<div class="w-[24rem] h-56 flex flex-col justify-start items-start bg-gray-100 rounded-2xl shadow-project p-4 gap-3">
            <p class="font-bold text-black text-xl">{{$name}}</p>
            <p class="text-dark-gray text-sm line-clamp-2">{{$description}}</p>

            <x-project_card.date date="{{date('m/d/Y', $date)}}"/>
            <x-ui.divider />

            <div class="w-full flex justify-start items-center gap-3">
                <div class="flex justify-start items-center pl-3">
                    <x-project_card.circle stylecss="bg-green-500 -ml-3" />
                    <x-project_card.circle stylecss="bg-red -ml-3" />
                    <x-project_card.circle stylecss="bg-yellow-300 -ml-3" />
                    <div class="h-9 w-9 -ml-3 rounded-full flex items-center justify-center bg-gray-300 text-sm">+1</div>
                </div>
                <div class="flex flex-col flex-1 justify-center items-start">
                    <p class="text-sm text-dark-gray">X tasks left</p>
                    <x-project_card.progress progress=45 />
                </div>
            </div>
        </div>
