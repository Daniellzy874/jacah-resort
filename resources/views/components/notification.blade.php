@props(['align' => 'right', 'contentClasses' => 'py-1 bg-white'])
@props(['notif'])

@php
$alignmentClasses = match ($align) {
'left' => 'ltr:origin-top-left rtl:origin-top-right start-0',
'top' => 'origin-top',
default => 'ltr:origin-top-right rtl:origin-top-left end-0',
};


@endphp


<div class="relative" x-data="{ open: false }" @click.outside="open = false" @close.stop="open = false">
    <div @click="open = ! open" class="cursor-pointer pt-2 px-2  text-gray-500 rounded-full shadow-md bg-green-700/50 active:bg-green-400 focus:bg-green focus:bg-green-400 focus:text-white">
        <h1 class="text-white text-2xl">
            <i class='bx bx-bell'></i>
        </h1>
        <span id="notif" class="bg-red-400 px-1 absolute rounded-full text-white border-3 text-[10px] border-white translate-y-[-220%] translate-x-[100%]"></span>
    </div>

    <div x-show="open"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        class="absolute z-50 mt-2 rounded-md shadow-lg {{$alignmentClasses}}"
        style="display: none;"
        @click="open = false">
        <div id="notif_content" class="rounded-md ring-1 ring-black ring-opacity-5 bg-white flex flex-column p-2 gap-2 w-[45vh] h-[50vh] overflow-auto">
        </div>
    </div>
</div>