<template>
    <app-layout title="Create Team">
        <template #afterNavbar>
            <nav class="hidden sm:flex py-2.5 px-8 bg-naoka-purple flex items-center justify-between">
                <div class="flex items-center">
                    <Button :href="route('dashboard')" color="white-purple" class="py-2 px-3.5">
                        <i class="naoka-icon SolidChevronLeft mr-1"></i>
                        <span>Back</span>
                    </Button>
                    <span class="ml-8 text-white font-raleway font-semibold text-lg">{{$page.props.board.name}}</span>
                    <span class="mx-3.5 text-white font-raleway text-lg uppercase">#{{$page.props.board.identifier}}</span>
                </div>
                <div class="flex items-center">
                    <Link :href="route('boards.edit', $page.props.board)" class="aspect-square ml-8 w-8 h-8 flex transition-colors hover:bg-white-hover justify-center items-center bg-white text-naoka-purple rounded-full"><i class="naoka-icon SolidCog"></i></Link>
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
import Button from "@/Components/Ui/Button";
import { Link } from '@inertiajs/inertia-vue3';


export default defineComponent({
    components: {
        Button,
        AppLayout,
        LeftNavBoards,
        ViewDragNDrop,
        Link
    },

    data() {
        return {
            columns: Object,
            cards: Object,
        }
    }
})
</script>
