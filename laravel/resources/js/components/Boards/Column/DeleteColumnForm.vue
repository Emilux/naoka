<template>
    <jet-form-section @submitted="deleteColumn">
        <template #form>
            Are you sur do you wan't delete this column ?
        </template>

        <template #actions>
            <jet-button class="bg-naoka-red" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Delete
            </jet-button>
        </template>
    </jet-form-section>
</template>

<script>
import { defineComponent } from 'vue'
import JetButton from '@/Jetstream/Button.vue'
import JetFormSection from '@/Jetstream/FormSection.vue'
import JetInput from '@/Jetstream/Input.vue'
import JetInputError from '@/Jetstream/InputError.vue'

export default defineComponent({
    components: {
        JetButton,
        JetFormSection,
        JetInput,
        JetInputError,
    },

    data() {
        return {
            form: this.$inertia.form({
                name: '',
            })
        }
    },

    props: {
        column: Object
    },

    methods: {
        deleteColumn() {
            console.log('Ok')
            this.form.delete(route('boards.column.destroy', [this.$page.props.board, this.column]), {
                errorBag: 'deleteColumn',
                preserveScroll: true,
                onSuccess: () => this.$emit('close', closeModal())
            });
        },
    },
})
</script>
