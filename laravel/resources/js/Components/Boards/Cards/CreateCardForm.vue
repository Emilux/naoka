<template>

    <jet-form-section @submitted="createCard">

        <template #form>
            <div class="w-full sm:w-3/4">
                <jet-input placeholder="Card title" id="name" type="text" class="block w-full mt-1" v-model="form.name"/>
                <jet-input-error :message="form.errors.name" class="mt-2" />
            </div>
        </template>

        <template #actions>
            <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Create
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

    props: {
        column: Object,
    },

    data() {
        return {
            form: this.$inertia.form({
                name: '',
            })
        }
    },

    methods: {
        createCard() {
            this.form.post(route('boards.column.card.store', [this.$page.props.board, this.column]), {
                errorBag: 'createCard',
                preserveScroll: true,
                onSuccess: () => this.$emit('close', closeModal())
            });
        },
    },
})
</script>
