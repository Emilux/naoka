<template>
    <button :type="type" class="flex text-purple font-semibold rounded-xl tracking-widest disabled:opacity-25 transition p-3">
        <slot></slot>
    </button>
</template>

<script>
    import { defineComponent } from 'vue'

    export default defineComponent({
        props: {
            type: {
                type: String,
                default: 'button',
            },
        }
    })
</script>
