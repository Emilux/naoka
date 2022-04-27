<template>
    <app-layout title="Dashboard">
        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <Title title="Dashboards" description="View your teams and created kanban"/>
                <div class="bg-white overflow-hidden">
                    <ListKanbans :boards="$page.props.boards" :CollaborateUsers="$page.props.CollaborateUsers"/>
                </div>
            </div>
        </div>

    </app-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue'
    import ListKanbans from '@/components/Dashboard/ListKanbans.vue'
    import Title from '@/components/Ui/Title.vue'

    export default defineComponent({
        components: {
            AppLayout,
            ListKanbans,
            Title,
        },

        data() {
            return {
                boards: Array,
                CollaborateUsers: Array,
            }
        }

    })

</script>
