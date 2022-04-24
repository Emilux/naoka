<template>
    <div class="shadow-base flex-shrink-0 flex flex-col justify-between w-72 mx-6 border-2 border-naoka-purple p-4 rounded-3xl">
        <div class="flex justify-end font-semibold">#NK</div>
        <div class="py-8 px-10">
            <h2 class="text-center font-raleway text-lg">Naoka kanban title</h2>
        </div>

        <div class="flex justify-between items-center">
            <button class="aspect-square w-8 h-8 flex transition-colors hover:bg-naoka-purple-hover justify-center items-center bg-naoka-purple text-white rounded-full">
                <i class="naoka-icon SolidCog"></i>
            </button>
            <div class="flex items-center flex">
                <div class="bg-naoka-red -mr-4 w-8 h-8 rounded-full"></div>
                <div class="bg-naoka-yellow -mr-4 w-8 h-8 rounded-full"></div>
                <div class="bg-naoka-blue -mr-4 w-8 h-8 rounded-full"></div>
                <button class="bg-naoka-purple text-white w-8 h-8 rounded-full flex justify-center items-center transition-colors hover:bg-naoka-purple-hover">
                    <i class="naoka-icon SolidOptionDotHorizontal text-3xl"></i>
                </button>
            </div>
        </div>
    </div>
</template>