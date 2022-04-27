<template>
    <button  @click="AddCard" :class="addClass" class="hover:bg-white-hover text-sm text-naoka-purple font-raleway cursor-pointer flex items-center">
        <i class="naoka-icon solidPlus mr-4"></i>
        {{ text }}
    </button>

    <jet-dialog-modal :show="AddCardModal" @close="closeModal">
        <template #title>
            Create card
        </template>

        <template #content>
            <CreateCardForm :column="column" @close="closeModal"/>
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
            column: Object,
            text: String,
            addClass: String,
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
            },

            closeModal() {
                this.AddCardModal = false
            },
        },
    })
</script>
