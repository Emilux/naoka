<template>
    <jet-action-section>

        <template #content>
            <div class="mt-5">
                <jet-danger-button @click="confirmBoardDeletion">
                    Delete Board
                </jet-danger-button>
            </div>

            <!-- Delete Account Confirmation Modal -->
            <jet-dialog-modal :show="confirmBoardDelete" @close="closeModal">
                <template #title>
                    Delete Account
                </template>

                <template #content>
                    Are you sure you want to delete the board : {{$page.props.board.name}} ? Once the board is deleted, all of its resources and data will be permanently deleted.
                </template>

                <template #footer>
                    <jet-secondary-button @click="closeModal">
                        Cancel
                    </jet-secondary-button>

                    <jet-danger-button class="ml-3" @click="deleteBoard" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Delete Board
                    </jet-danger-button>
                </template>
            </jet-dialog-modal>
        </template>
    </jet-action-section>
</template>

<script>
import { defineComponent } from 'vue'
import JetActionSection from '@/Jetstream/ActionSection.vue'
import JetDialogModal from '@/Jetstream/DialogModal.vue'
import JetDangerButton from '@/Jetstream/DangerButton.vue'
import JetInput from '@/Jetstream/Input.vue'
import JetInputError from '@/Jetstream/InputError.vue'
import JetSecondaryButton from '@/Jetstream/SecondaryButton.vue'

export default defineComponent({
    components: {
        JetActionSection,
        JetDangerButton,
        JetDialogModal,
        JetInput,
        JetInputError,
        JetSecondaryButton,
    },

    data() {
        return {
            confirmBoardDelete: false,

            form: this.$inertia.form()
        }
    },

    methods: {
        confirmBoardDeletion() {
            this.confirmBoardDelete = true;
        },

        deleteBoard() {
            this.form.delete(route('boards.destroy', this.$page.props.board), {
                preserveScroll: true,
                onSuccess: () => this.closeModal(),
            })
        },

        closeModal() {
            this.confirmBoardDelete = false
        },
    },
})
</script>
