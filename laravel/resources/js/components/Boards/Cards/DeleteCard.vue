<template>
    <jet-dropdown align="right" width="48">
        <template #trigger>
            <button class="px-1 py-1.5"><i class="naoka-icon SolidOptionDot"></i></button>
        </template>

        <template #content>
            <div class="block px-2 py-2 text-xs">
                <button v-bind:onclick="DeleteCard" class="py-2 px-2 text-naoka-purple font-raleway cursor-pointer flex items-center">
                    Delete card
                </button>
            </div>
        </template>
    </jet-dropdown>
    

    <jet-dialog-modal :show="DeleteCardModal" @close="closeModal">
        <template #title>
            Delete this card ?
        </template>

        <template #content>
            <DeleteCardForm :column="column" :card="card" @close="closeModal"/>
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
    import DeleteCardForm from '@/components/Boards/Cards/DeleteCardForm.vue'
    import JetDropdown from '@/Jetstream/Dropdown.vue'
    import JetDropdownLink from '@/Jetstream/DropdownLink.vue'
    

    export default defineComponent({
        components: {
            JetDialogModal,
            JetSecondaryButton,
            DeleteCardForm,
            JetDropdown,
            JetDropdownLink,
        },

        props: {
            card: Object,
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
            },

            closeModal() {
                this.DeleteCardModal = false

                this.form.reset()
            },
        },
    })
</script>
