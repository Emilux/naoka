<template>
    <button  @click="AddCard" class="hover:bg-white-hover py-4 px-4 text-sm text-naoka-purple font-raleway cursor-pointer flex items-center">
        <i class="naoka-icon solidPlus mr-4"></i>
        Add new card...
    </button>

    <jet-dialog-modal :show="AddCardModal" @close="closeModal">
        <template #title>
            Create card
        </template>

        <template #content>
            <CreateCardForm :column="column"/>
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
                AddCardModal: false,

                form: this.$inertia.form({
                    password: '',
                })
            }
        },

        methods: {
            AddCard() {
                this.AddCardModal = true;

                setTimeout(() => this.$refs.password.focus(), 250)
            },

            closeModal() {
                this.AddCardModal = false

                this.form.reset()
            },
        },
    })
</script>
