<template>
    <app-layout title="Dashboard">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden">
                    <Dashbord />
                </div>
            </div>
        </div>

        <AuthFooter/>
    </app-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue'
    import Dashbord from '@/Dashbord/Dashbord.vue'
    import AuthFooter from '@/JetStream/AuthFooter.vue'

    export default defineComponent({
        components: {
            AppLayout,
            Dashbord,
            AuthFooter,
        },
    })
</script>
