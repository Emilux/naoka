<template>
    <app-layout title="Create Team">
        <template #afterNavbar>
            <nav class="hidden sm:flex py-2.5 px-8 bg-naoka-purple flex items-center justify-between">
                <div class="flex items-center">
                    <a class="flex items-center hover:bg-white-hover transition-colors inline-block bg-white text-naoka-purple py-2 px-3.5 rounded-xl text-xs sm:text-sm font-raleway font-semibold" href="">
                        <i class="naoka-icon SolidChevronLeft mr-1"></i>
                        <span>Back</span>
                    </a>
                    <span class="ml-8 text-white font-raleway font-semibold text-lg">{{$page.props.board.name}}</span>
                    <span class="mx-3.5 text-white font-raleway text-lg">#NK</span>
                </div>
                <div class="flex items-center">
                    <div class="flex items-center hidden md:flex">
                        <div class="bg-naoka-red -mr-4 w-8 h-8 rounded-full"></div>
                        <div class="bg-naoka-yellow -mr-4 w-8 h-8 rounded-full"></div>
                        <div class="bg-naoka-blue -mr-4 w-8 h-8 rounded-full"></div>
                        <button class="bg-white w-8 h-8 rounded-full flex justify-center items-center transition-colors hover:bg-white-hover">
                            <i class="naoka-icon SolidOptionDotHorizontal text-3xl"></i>
                        </button>
                    </div>
                    <a class="ml-4 flex items-center hover:bg-white-hover transition-colors inline-block bg-white text-naoka-purple py-2 px-3.5 rounded-xl text-xs sm:text-sm font-raleway font-semibold" href="">
                        <i class="naoka-icon SolidAddMember mr-1"></i>
                        <span>Invite members</span>
                    </a>
                    <button class="aspect-square ml-8 w-8 h-8 flex transition-colors hover:bg-white-hover justify-center items-center bg-white text-naoka-purple rounded-full"><i class="naoka-icon SolidCog"></i></button>
                </div>
            </nav>
            <main class="h-full relative inline-flex">
                <nav class="sm:w-12 w-16 max-h-full h-full relative">
                    <button class="z-10 absolute bg-white w-8 h-8 rounded-r-full flex justify-center items-center -right-full -translate-x-full sm:-translate-x-1/2 h-16 top-1/2 -translate-y-1/2 transition-colors hover:bg-white-hover">
                        <i class="naoka-icon SolidChevronLeft"></i>
                    </button>
                    <div class="overflow-y-auto hide-scrollbar w-full text-lg bg-white shadow-base h-full absolute top-0 flex flex-col items-center justify-between py-6">
                        <div>
                            <button class="transition-colors hover:bg-naoka-blue-hover mb-4 bg-naoka-blue w-8 h-8 flex justify-center items-center text-white rounded-full"><i class="naoka-icon solidPlus"></i></button>
                            <button class="transition-colors hover:bg-naoka-purple hover:text-white mb-4 w-8 h-8 flex justify-center items-center text-naoka-purple border border-naoka-purple rounded-full"><i class="naoka-icon SolidTag"></i></button>
                            <button class="mb-4 w-8 h-8 flex hover:bg-naoka-purple hover:text-white justify-center items-center text-naoka-purple border border-naoka-purple rounded-full"><i class="naoka-icon SolidPalette"></i></button>
                            <button class="mb-4 w-8 h-8 flex hover:bg-naoka-purple hover:text-white justify-center items-center text-naoka-purple border border-naoka-purple rounded-full"><i class="naoka-icon SolidTeam"></i></button>
                            <button class="mb-4 w-8 h-8 flex hover:bg-naoka-purple hover:text-white justify-center items-center text-naoka-purple border border-naoka-purple rounded-full"><i class="naoka-icon SolidArchive"></i></button>
                            <button class="mb-4 w-8 h-8 flex hover:bg-naoka-purple hover:text-white justify-center items-center text-naoka-purple border border-naoka-purple rounded-full"><i class="naoka-icon SolidCog"></i></button>
                        </div>
                        <div>
                            <button class="block sm:hidden mb-4 w-8 h-8 flex hover:bg-naoka-purple hover:text-white justify-center items-center text-naoka-purple border border-naoka-purple rounded-full"><i class="naoka-icon SolidLeftArrow"></i></button>
                            <button class="mb-4 w-8 h-8 flex hover:bg-naoka-purple hover:text-white justify-center items-center text-naoka-purple border border-naoka-purple rounded-full"><i class="naoka-icon SolidHelp"></i></button>
                            <button class="mb-4 w-8 h-8 flex hover:bg-naoka-purple hover:text-white justify-center items-center text-naoka-purple border border-naoka-purple rounded-full"><i class="naoka-icon SolidInfo"></i></button>
                        </div>
                    </div>
                </nav>

                <button class="absolute bottom-0 right-0 flex justify-center items-center w-12 h-12 m-8 sm:w-16 sm:h-16 sm:m-12 text-3xl bg-naoka-red text-white rounded-full">
                    <i class="naoka-icon solidTrash"></i>
                </button>

            </main>
        </template>
    </app-layout>
</template>

<script>
import { defineComponent } from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'

export default defineComponent({
    components: {
        AppLayout,
    },
})
</script>
