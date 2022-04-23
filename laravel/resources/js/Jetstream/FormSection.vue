<template>
    <div class="">

        <div class="mt-5 md:mt-0">
            <form @submit.prevent="$emit('submitted')">
                <div class="px-4 py-5 bg-white sm:p-6"
                    :class="hasActions ? 'sm:rounded-tl-md sm:rounded-tr-md' : 'sm:rounded-md'">
                    <slot name="error"></slot>

                    <div class="sm:flex sm:justify-between flex-col sm:flex-row sm:items-center">
                        <slot name="form"></slot>
                        <slot name="actions"></slot>
                    </div>
                </div>
                
            </form>
        </div>
    </div>
</template>

<script>
    import { defineComponent } from 'vue'

    export default defineComponent({
        emits: ['submitted'],

        components: {
        },

        computed: {
            hasActions() {
                return !! this.$slots.actions
            }
        }
    })
</script>
