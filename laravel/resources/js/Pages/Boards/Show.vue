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
                    <span class="mx-3.5 text-white font-raleway text-lg uppercase">#{{$page.props.board.identifier}}</span>
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
                <LeftNavBoards/>

                <ViewDragNDrop :columns="$page.props.columns" :cards="$page.props.cards"/>

            </main>
        </template>
    </app-layout>
</template>

<script>
import { defineComponent } from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'
import LeftNavBoards from '@/components/Navigation/Boards/LeftNavBoards.vue'
import ViewDragNDrop from '@/components/Boards/Column/ViewDragNDrop.vue'


export default defineComponent({
    components: {
        AppLayout,
        LeftNavBoards,
        ViewDragNDrop,
    },

    data() {
        return {
            columns: Object,
            cards: Object,
        }
    }
})
</script>
