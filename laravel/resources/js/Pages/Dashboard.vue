<template>
    <app-layout title="Dashboard">

        <AuthTitle title="Dashboards" description="Lorem ipsum dolor ipsumeto la Qunatasse la tu connais"/>

        <div class="py-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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
    import AuthTitle from "@/Jetstream/AuthTitle.vue";

    export default defineComponent({
        components: {
            AppLayout,
            ListKanbans,
            AuthTitle,
        },

        data() {
            return {
                boards: Array,
                CollaborateUsers: Array,
            }
        }

    })

</script>
