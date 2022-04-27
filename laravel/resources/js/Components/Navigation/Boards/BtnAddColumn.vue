<template>
    <button  @click="AddColumn" class="transition-colors hover:bg-naoka-blue-hover mb-4 bg-naoka-blue w-8 h-8 flex justify-center items-center text-white rounded-full">
        <i class="naoka-icon solidPlus"></i>
    </button>

    <jet-dialog-modal :show="AddColumnModal" @close="closeModal">
        <template #title>
            Create column
        </template>

        <template #content>
            <createColumnForm/>
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
    import createColumnForm from '@/components/Boards/Column/createColumnForm.vue'

    export default defineComponent({
        components: {
            JetDialogModal,
            JetSecondaryButton,
            createColumnForm,
        },

        data() {
            return {
                AddColumnModal: false,

                form: this.$inertia.form({
                    password: '',
                })
            }
        },

        methods: {
            AddColumn() {
                this.AddColumnModal = true;

                setTimeout(() => this.$refs.password.focus(), 250)
            },

            closeModal() {
                this.AddColumnModal = false

                this.form.reset()
            },
        },
    })
</script>
