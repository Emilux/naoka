<template>
    <input class="border-default px-4 py-4 placeholder-purple border-2 border-purple font-semibold focus:border-purple focus:ring-purple rounded-xl" :value="modelValue" @input="$emit('update:modelValue', $event.target.value)" ref="input">
</template>

<script>
    import { defineComponent } from 'vue'

    export default defineComponent({
        props: ['modelValue'],

        emits: ['update:modelValue'],

        methods: {
            focus() {
                this.$refs.input.focus()
            }
        }
    })
</script>
