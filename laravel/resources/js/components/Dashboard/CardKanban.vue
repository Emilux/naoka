<template>
        <div class="py-8 px-10">
            <h2 class="text-center font-raleway text-lg">{{board.name}}</h2>
        </div>

        <div class="flex items-center">
            <button class="aspect-square w-8 h-8 flex transition-colors hover:bg-naoka-purple-hover justify-center items-center bg-naoka-purple text-white rounded-full">
                <i class="naoka-icon SolidCog"></i>
            </button>
        </div>
</template>

<script>
    import { defineComponent } from 'vue'

    export default defineComponent({
        components: {
        },

        props: {
            board: Array,
        },

        methods: {
            
        }
    })
</script>