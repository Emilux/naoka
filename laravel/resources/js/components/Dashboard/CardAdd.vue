<template>
    <div class="shadow-base flex-shrink-0 flex flex-col justify-between w-72 mx-6 border-2 border-naoka-purple hover:bg-white-hover p-4 rounded-3xl">
        <JetNavLink :href="route('boards.create', $page.props.user.current_team)" :active="route().current('boards.create')" class="py-8 px-8">
            <h2 class="text-center font-raleway text-lg font-bold flex items-center">
                <i class="naoka-icon solidPlus flex items-center bg-naoka-purple rounded-full text-4xl w-13 h-13 p-2 mr-3 text-white"></i>
                Create new kanban
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