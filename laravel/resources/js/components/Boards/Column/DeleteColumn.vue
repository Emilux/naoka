<template>
    <jet-dropdown align="right" width="48">
        <template #trigger>
            <i class="naoka-icon SolidOptionDot hover:bg-white-hover p-1"></i>
        </template>

        <template #content>
            <div class="block px-4 py-2 text-xs text-gray-400">
                <button v-bind:onclick="DeleteColumn" class="py-4 px-4 text-naoka-purple font-raleway cursor-pointer flex items-center">
                    Delete column
                </button>
            </div>
        </template>
    </jet-dropdown>
    

    <jet-dialog-modal :show="DeleteColumnModal" @close="closeModal">
        <template #title>
            Delete this column ?
        </template>

        <template #content>
            <DeleteColumnForm :column="column" @close="closeModal"/>
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
    import DeleteColumnForm from '@/components/Boards/Column/DeleteColumnForm.vue'
    import JetDropdown from '@/Jetstream/Dropdown.vue'
    import JetDropdownLink from '@/Jetstream/DropdownLink.vue'
    

    export default defineComponent({
        components: {
            JetDialogModal,
            JetSecondaryButton,
            DeleteColumnForm,
            JetDropdown,
            JetDropdownLink,
        },

        props: {
            column: Object,
        },

        data() {
            return {
                DeleteColumnModal: false,

                form: this.$inertia.form({
                    password: '',
                })
            }
        },

        methods: {
            DeleteColumn() {
                this.DeleteColumnModal = true;
            },

            closeModal() {
                this.DeleteColumnModal = false

                this.form.reset()
            },
        },
    })
</script>
