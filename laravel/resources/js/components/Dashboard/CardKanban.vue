<template>
    <Link :href="route('boards.show', board)" class="w-full mx-6">
        <div class="shadow-base flex-shrink-0 flex flex-col justify-between border-2 hover:bg-white-hover border-naoka-purple p-4 rounded-3xl">
            <div class="flex justify-end font-semibold">#NK</div>
            <div class="py-8 px-10">
                <h2 class="text-center font-raleway text-lg">{{board.name}}</h2>
            </div>

            <div class="flex items-center">
                <button class="aspect-square w-8 h-8 flex transition-colors hover:bg-naoka-purple-hover justify-center items-center bg-naoka-purple text-white rounded-full">
                    <i class="naoka-icon SolidCog"></i>
                </button>
            </div>
        </div>
    </Link>

</template>

<script>
    import { Link } from '@inertiajs/inertia-vue3';
    import { defineComponent } from 'vue'

    export default defineComponent({
        components: {
            Link
        },

        props: {
            board: Object,
        },

        methods: {

        }
    })
</script>
