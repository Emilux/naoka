<template>
    <div class="shadow-base flex-shrink-0 flex flex-col justify-between mx-6 border-2 border-naoka-purple border-dashed hover:bg-white-hover p-4 rounded-3xl">
        <JetNavLink :href="route('boards.create')" :active="route().current('boards.create')" class="py-8 px-8">
            <h2 class="text-center font-raleway text-lg flex items-center justify-center">
                <div class="rounded-full bg-naoka-purple text-xl mr-2.5 text-white w-10 h-10 flex items-center justify-center">
                <i class="naoka-icon solidPlus"></i>
                </div>
                Create Kanban
            </h2>
        </JetNavLink>
    </div>
</template>

<script>
    import { defineComponent } from 'vue'
    import JetNavLink from '@/Jetstream/NavLink.vue'
    import { Link } from '@inertiajs/inertia-vue3';

    export default defineComponent({
        components: {
            JetNavLink,
            Link,
        },

        props: {
            board: Array,
        },

        methods: {

        }
    })
</script>
