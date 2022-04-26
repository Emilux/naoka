<template>
    <app-layout title="Create Board">
        <template #header>
            <Title title="Create Board" description="Create a new kanban board"/>
        </template>
        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <create-board-form/>
            </div>
        </div>
    </app-layout>
</template>

<script>
import { defineComponent } from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'
import Title from "@/Components/Ui/Title";
import CreateBoardForm from "@/Components/Boards/CreateBoardForm";

export default defineComponent({
    components: {
        AppLayout,
        Title,
        CreateBoardForm
    },
})
</script>
