<template>
    <jet-form-section @submitted="createBoard">
        <template #form>
            <div>{{$page.props.name}}</div>
            <div class="w-full sm:w-3/4">
                <jet-input placeholder="Board title" id="name" type="text" class="block w-full mt-1" v-model="form.name" autofocus />
                <jet-input-error :message="form.errors.name" class="mt-2" />
                <jet-input placeholder="Board identifier" id="identifier" type="text" class="block mt-1" v-model="form.identifier" />
                <jet-input-error :message="form.errors.identifier" class="mt-2" />
            </div>
        </template>

        <template #actions>
            <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Create
            </jet-button>
        </template>
    </jet-form-section>
    <delete-board-button/>
</template>

<script>
import { defineComponent } from 'vue'
import JetButton from '@/Jetstream/Button.vue'
import JetFormSection from '@/Jetstream/FormSection.vue'
import JetInput from '@/Jetstream/Input.vue'
import JetInputError from '@/Jetstream/InputError.vue'
import JetLabel from '@/Jetstream/Label.vue'
import DeleteBoardButton from '@/Components/Boards/DeleteBoardButton'

export default defineComponent({
    components: {
        JetButton,
        JetFormSection,
        JetInput,
        JetInputError,
        JetLabel,
        DeleteBoardButton
    },

    data() {
        return {
            form: this.$inertia.form({
                name: this.$page.props.board.name,
                identifier: this.$page.props.board.identifier,
            })
        }
    },

    methods: {
        createBoard() {
            this.form.put(route('boards.update', this.$page.props.board ), {
                errorBag: 'updateBoard',
                preserveScroll: true
            });
        },
    },
})
</script>
