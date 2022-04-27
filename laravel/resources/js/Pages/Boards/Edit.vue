<template>
    <app-layout :title="'Edit ' + $page.props.board.name + ' board'">
        <template #header>
            <Title title="Edit Board" description="Edit kanban board"/>
        </template>
        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <edit-board-form/>
            </div>
        </div>
    </app-layout>
</template>

<script>
import { defineComponent } from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'
import Title from "@/Components/Ui/Title";
import EditBoardForm from "@/Components/Boards/EditBoardForm";

export default defineComponent({
    components: {
        AppLayout,
        Title,
        EditBoardForm
    },
})
</script>
