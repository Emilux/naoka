<template>
    <app-layout title="Dashboard">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden">
                    <ListKanbans :boards="$page.props.boards"/>
                </div>
            </div>
        </div>

    </app-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue'
    import ListKanbans from '@/components/Dashboard/ListKanbans.vue'

    export default defineComponent({
        components: {
            AppLayout,
            ListKanbans,
        },

        data() {
            return {
                boards: Array,
            }
        }

    })

</script>
