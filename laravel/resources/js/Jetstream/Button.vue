<template>
    <button :type="type" class="flex bg-blue text-white font-semibold rounded-xl tracking-widest hover:bg-blue-700 disabled:opacity-25 transition p-3">
        <slot></slot>
    </button>
</template>

<script>
    import { defineComponent } from 'vue'

    export default defineComponent({
        props: {
            type: {
                type: String,
                default: 'submit',
            },
        }
    })
</script>
