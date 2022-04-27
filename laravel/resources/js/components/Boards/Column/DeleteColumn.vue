<template>
    <button  @click="DeleteCard" class="hover:bg-white-hover py-4 px-4 text-sm text-naoka-purple font-raleway cursor-pointer flex items-center">
        <i v-bind:onclick="log" class="naoka-icon SolidOptionDot hover:bg-white-hover p-1"></i>
    </button>

    <jet-dialog-modal :show="DeleteCardModal" @close="closeModal">
        <template #title>
            Create card
        </template>

        <template #content>
            delete
        </template>

        <template #footer>
            <jet-secondary-button @click="closeModal">
                Cancel
            </jet-secondary-button>
        </template>
    </jet-dialog-modal>
</template>


<script>
    import { defineComponent } from 'vue'
    import JetDialogModal from '@/Jetstream/DialogModal.vue'
    import JetSecondaryButton from '@/Jetstream/SecondaryButton.vue'
    import CreateCardForm from '@/components/Boards/Cards/CreateCardForm.vue'

    export default defineComponent({
        components: {
            JetDialogModal,
            JetSecondaryButton,
            CreateCardForm,
        },

        props: {
            column: Object
        },

        data() {
            return {
                DeleteCardModal: false,

                form: this.$inertia.form({
                    password: '',
                })
            }
        },

        methods: {
            DeleteCard() {
                this.DeleteCardModal = true;

                setTimeout(() => this.$refs.password.focus(), 250)
            },

            closeModal() {
                this.DeleteCardModal = false

                this.form.reset()
            },
        },
    })
</script>
