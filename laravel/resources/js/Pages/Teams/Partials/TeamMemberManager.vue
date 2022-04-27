<template>
    <div>
        <div v-if="userPermissions.canAddTeamMembers">
            <jet-section-border />

            <!-- Add Team Member -->
            <jet-form-section @submitted="addTeamMember" ProfileClass="flex flex-col w-full sm:w-96 items-center m-auto">
                <template #title>
                    Add Team Member
                </template>

                <template #description>
                    Add a new team member to your team, allowing them to collaborate with you.
                </template>

                <template #form>
                    <div class="mt-4">
                        <div class="max-w-xl text-sm text-gray-600">
                            Please provide the email address of the person you would like to add to this team.
                        </div>
                    </div>

                    <!-- Member Email -->
                    <div class="mt-4 w-full">
                        <div class="relative">
                            <jet-input id="email" type="email" class="mt-1 block w-full pl-14" v-model="addTeamMemberForm.email" placeholder="Email" required />
                            <SpanInput>
                                <i class="naoka-icon SolidMail"></i>
                            </SpanInput>
                        </div>
                        <jet-input-error :message="addTeamMemberForm.errors.email" class="mt-2" />
                    </div>

                    <!-- Role -->
                    <div class="mt-4" v-if="availableRoles.length > 0">
                        <jet-label for="roles" value="Role" />
                        <jet-input-error :message="addTeamMemberForm.errors.role" class="mt-2" />

                        <div class="relative z-0 mt-1 border border-gray-200 rounded-lg cursor-pointer">
                            <button type="button" class="relative px-4 py-3 inline-flex w-full rounded-lg focus:z-10 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200"
                                            :class="{'border-t border-gray-200 rounded-t-none': i > 0, 'rounded-b-none': i != Object.keys(availableRoles).length - 1}"
                                            @click="addTeamMemberForm.role = role.key"
                                            v-for="(role, i) in availableRoles"
                                            :key="role.key">
                                <div :class="{'opacity-50': addTeamMemberForm.role && addTeamMemberForm.role != role.key}">
                                    <!-- Role Name -->
                                    <div class="flex items-center">
                                        <div class="text-sm text-gray-600" :class="{'font-semibold': addTeamMemberForm.role == role.key}">
                                            {{ role.name }}
                                        </div>

                                        <svg v-if="addTeamMemberForm.role == role.key" class="ml-2 h-5 w-5 text-green-400" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    </div>

                                    <!-- Role Description -->
                                    <div class="mt-2 text-xs text-gray-600 text-left">
                                        {{ role.description }}
                                    </div>
                                </div>
                            </button>
                        </div>
                    </div>
                </template>

                <template #actions>
                    <jet-action-message :on="addTeamMemberForm.recentlySuccessful" class="mr-3">
                        Added.
                    </jet-action-message>

                    <Button class="mt-4" :wide="true" color="blue" :class="{ 'opacity-25': addTeamMemberForm.processing }" :disabled="addTeamMemberForm.processing">
                        Add
                    </Button>
                </template>
            </jet-form-section>
        </div>

        <div v-if="team.team_invitations.length > 0 && userPermissions.canAddTeamMembers">
            <jet-section-border />

            <!-- Team Member Invitations -->
            <jet-action-section class="mt-10 sm:mt-0">
                <template #title>
                    Pending Team Invitations
                </template>

                <template #description>
                    These people have been invited to your team and have been sent an invitation email. They may join the team by accepting the email invitation.
                </template>

                <!-- Pending Team Member Invitation List -->
                <template #content>
                    <div class="space-y-6">
                        <div class="flex items-center justify-between" v-for="invitation in team.team_invitations" :key="invitation.id">
                            <div class="text-gray-600">{{ invitation.email }}</div>

                            <div class="flex items-center">
                                <!-- Cancel Team Invitation -->
                                <button class="cursor-pointer ml-6 text-sm text-red-500 focus:outline-none"
                                                    @click="cancelTeamInvitation(invitation)"
                                                    v-if="userPermissions.canRemoveTeamMembers">
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </div>
                </template>
            </jet-action-section>
        </div>

        <div v-if="team.users.length > 0">
            <jet-section-border />

            <!-- Manage Team Members -->
            <jet-action-section class="mt-10 sm:mt-0">
                <template #title>
                    Team Members
                </template>

                <template #description>
                    All of the people that are part of this team.
                </template>

                <!-- Team Member List -->
                <template #content>
                    <div class="space-y-6">
                        <div class="flex flex-wrap items-center justify-between" v-for="user in team.users" :key="user.id">
                            <div class="flex items-center">
                                <img class="w-8 h-8 rounded-full border border-2" :style="{borderColor:user.membership.color}" :src="user.profile_photo_url" :alt="user.name">
                                <div class="ml-4">{{ user.name }}</div>
                            </div>

                            <div class="flex items-center mt-4 sm:mt-0 justify-center sm:justify-start w-full sm:w-auto">
                                <button class="sm:ml-2 text-sm text-gray-400 underline"
                                        @click="settingColor(user)"
                                        v-if="userPermissions.canDeleteTeam">
                                    <template v-if="!user.membership.color">
                                        Set member color
                                    </template>
                                    <template v-else>
                                        <div class="flex items-center">
                                            <div class="h-4 w-4 block border mr-2" :style="{backgroundColor:user.membership.color}"></div> Edit Member color
                                        </div>
                                    </template>

                                </button>

                                <!-- Manage Team Member Role -->
                                <button class="ml-2 text-sm text-gray-400 underline"
                                        @click="manageRole(user)"
                                        v-if="userPermissions.canAddTeamMembers && availableRoles.length">
                                    {{ displayableRole(user.membership.role) }}
                                </button>

                                <div class="ml-2 text-sm text-gray-400" v-else-if="availableRoles.length">
                                    {{ displayableRole(user.membership.role) }}
                                </div>

                                <!-- Leave Team -->
                                <button class="cursor-pointer ml-6 text-sm text-red-500"
                                                    @click="confirmLeavingTeam"
                                                    v-if="$page.props.user.id === user.id">
                                    Leave
                                </button>

                                <!-- Remove Team Member -->
                                <button class="cursor-pointer ml-6 text-sm text-red-500"
                                                    @click="confirmTeamMemberRemoval(user)"
                                                    v-if="userPermissions.canRemoveTeamMembers">
                                    Remove
                                </button>
                            </div>
                        </div>
                    </div>
                </template>
            </jet-action-section>
        </div>

        <!-- Member color Modal -->
        <jet-dialog-modal :show="currentlySettingColor" @close="currentlySettingColor = false">
            <template #title>
                Edit member color
            </template>

            <template #content>
                <ColorPicker class="mx-auto !w-full !max-w-full" :color="defaultColor" :visible-formats="['hex','rgb']" default-format="hex" alpha-channel="hide" @color-change="updateSelectedColor" >
                    <template #copy-button>
                        <i class="naoka-icon SolidCopyPaste text-base"></i>
                    </template>
                </ColorPicker>

                <jet-input-error :message="updateColorForm.errors.color" class="mt-2" />
            </template>

            <template #footer>
                <jet-secondary-button @click="currentlySettingColor = false">
                    Cancel
                </jet-secondary-button>

                <jet-button class="ml-3" @click="updateColor" :class="{ 'opacity-25': updateColorForm.processing }" :disabled="updateColorForm.processing">
                    Save
                </jet-button>
            </template>
        </jet-dialog-modal>

        <!-- Role Management Modal -->
        <jet-dialog-modal :show="currentlyManagingRole" @close="currentlyManagingRole = false">
            <template #title>
                Manage Role
            </template>

            <template #content>
                <div v-if="managingRoleFor">
                    <div class="relative z-0 mt-1 border border-gray-200 rounded-lg cursor-pointer">
                        <button type="button" class="relative px-4 py-3 inline-flex w-full rounded-lg focus:z-10 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200"
                                        :class="{'border-t border-gray-200 rounded-t-none': i > 0, 'rounded-b-none': i !== Object.keys(availableRoles).length - 1}"
                                        @click="updateRoleForm.role = role.key"
                                        v-for="(role, i) in availableRoles"
                                        :key="role.key">
                            <div :class="{'opacity-50': updateRoleForm.role && updateRoleForm.role !== role.key}">
                                <!-- Role Name -->
                                <div class="flex items-center">
                                    <div class="text-sm text-gray-600" :class="{'font-semibold': updateRoleForm.role === role.key}">
                                        {{ role.name }}
                                    </div>

                                    <svg v-if="updateRoleForm.role === role.key" class="ml-2 h-5 w-5 text-green-400" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                </div>

                                <!-- Role Description -->
                                <div class="mt-2 text-xs text-gray-600">
                                    {{ role.description }}
                                </div>
                            </div>
                        </button>
                    </div>
                </div>
            </template>

            <template #footer>
                <jet-secondary-button @click="currentlyManagingRole = false">
                    Cancel
                </jet-secondary-button>

                <Button class="mt-4 ml-3" color="blue" :wide="true" @click="updateRole"
                    :class="{ 'opacity-25': updateRoleForm.processing }" :disabled="updateRoleForm.processing">
                    Save
                </Button>
            </template>
        </jet-dialog-modal>

        <!-- Leave Team Confirmation Modal -->
        <jet-confirmation-modal :show="confirmingLeavingTeam" @close="confirmingLeavingTeam = false">
            <template #title>
                Leave Team
            </template>

            <template #content>
                Are you sure you would like to leave this team?
            </template>

            <template #footer>
                <jet-secondary-button @click="confirmingLeavingTeam = false">
                    Cancel
                </jet-secondary-button>

                <jet-danger-button class="ml-3" @click="leaveTeam" :class="{ 'opacity-25': leaveTeamForm.processing }" :disabled="leaveTeamForm.processing">
                    Leave
                </jet-danger-button>
            </template>
        </jet-confirmation-modal>

        <!-- Remove Team Member Confirmation Modal -->
        <jet-confirmation-modal :show="teamMemberBeingRemoved" @close="teamMemberBeingRemoved = null">
            <template #title>
                Remove Team Member
            </template>

            <template #content>
                Are you sure you would like to remove this person from the team?
            </template>

            <template #footer>
                <jet-secondary-button @click="teamMemberBeingRemoved = null">
                    Cancel
                </jet-secondary-button>

                <jet-danger-button class="ml-3" @click="removeTeamMember" :class="{ 'opacity-25': removeTeamMemberForm.processing }" :disabled="removeTeamMemberForm.processing">
                    Remove
                </jet-danger-button>
            </template>
        </jet-confirmation-modal>
    </div>
</template>

<script>
    import { defineComponent } from 'vue'
    import JetActionMessage from '@/Jetstream/ActionMessage.vue'
    import JetActionSection from '@/Jetstream/ActionSection.vue'
    import Button from '@/components/Ui/Button.vue'
    import JetConfirmationModal from '@/Jetstream/ConfirmationModal.vue'
    import JetDangerButton from '@/Jetstream/DangerButton.vue'
    import JetDialogModal from '@/Jetstream/DialogModal.vue'
    import JetFormSection from '@/Jetstream/FormSection.vue'
    import JetInput from '@/Jetstream/Input.vue'
    import JetInputError from '@/Jetstream/InputError.vue'
    import JetLabel from '@/Jetstream/Label.vue'
    import JetSecondaryButton from '@/Jetstream/SecondaryButton.vue'
    import JetSectionBorder from '@/Jetstream/SectionBorder.vue'
    import SpanInput from '@/Jetstream/SpanInput.vue'
    import { ColorPicker } from 'vue-accessible-color-picker'

    export default defineComponent({
        components: {
            JetActionMessage,
            JetActionSection,
            Button,
            JetButton,
            JetConfirmationModal,
            JetDangerButton,
            JetDialogModal,
            JetFormSection,
            JetInput,
            JetInputError,
            JetLabel,
            JetSecondaryButton,
            JetSectionBorder,
            SpanInput,
            ColorPicker
        },

        props: [
            'team',
            'availableRoles',
            'userPermissions'
        ],

        data() {
            return {
                addTeamMemberForm: this.$inertia.form({
                    email: '',
                    role: null,
                }),

                updateRoleForm: this.$inertia.form({
                    role: null,
                }),

                updateColorForm: this.$inertia.form({
                    color: '',
                }),

                leaveTeamForm: this.$inertia.form(),
                removeTeamMemberForm: this.$inertia.form(),

                currentlyManagingRole: false,
                currentlySettingColor: false,
                defaultColor: '',
                managingRoleFor: null,
                confirmingLeavingTeam: false,
                teamMemberBeingRemoved: null,
            }
        },

        methods: {
            addTeamMember() {
                this.addTeamMemberForm.post(route('team-members.store', this.team), {
                    errorBag: 'addTeamMember',
                    preserveScroll: true,
                    onSuccess: () => this.addTeamMemberForm.reset(),
                });
            },

            cancelTeamInvitation(invitation) {
                this.$inertia.delete(route('team-invitations.destroy', invitation), {
                    preserveScroll: true
                });
            },

            manageRole(teamMember) {
                this.managingRoleFor = teamMember
                this.updateRoleForm.role = teamMember.membership.role
                this.currentlyManagingRole = true
            },

            updateRole() {
                this.updateRoleForm.put(route('team-members.update', [this.team, this.managingRoleFor]), {
                    preserveScroll: true,
                    onSuccess: () => (this.currentlyManagingRole = false),
                })
            },

            /**
             * Open color edit modal and set the default color
             * @param teamMember
             */
            settingColor(teamMember) {
                this.settingColorFor = teamMember
                this.defaultColor = teamMember.membership.color ? teamMember.membership.color : '#FED766'
                this.currentlySettingColor = true
            },

            /**
             * Update the current color form color
             * @param color
             */
            updateSelectedColor(color){
                this.updateColorForm.color = color.colors.hex
            },

            /**
             * Send data to route to update member color
             */
            updateColor() {
                this.updateColorForm.put(route('team-member.updatecolor', [this.team, this.settingColorFor]), {
                    preserveScroll: true,
                    onSuccess: () => (this.currentlySettingColor = false),
                })
            },

            confirmLeavingTeam() {
                this.confirmingLeavingTeam = true
            },

            leaveTeam() {
                this.leaveTeamForm.delete(route('team-members.destroy', [this.team, this.$page.props.user]))
            },

            confirmTeamMemberRemoval(teamMember) {
                this.teamMemberBeingRemoved = teamMember
            },

            removeTeamMember() {
                this.removeTeamMemberForm.delete(route('team-members.destroy', [this.team, this.teamMemberBeingRemoved]), {
                    errorBag: 'removeTeamMember',
                    preserveScroll: true,
                    preserveState: true,
                    onSuccess: () => (this.teamMemberBeingRemoved = null),
                })
            },

            displayableRole(role) {
                return this.availableRoles.find(r => r.key === role).name
            },
        },
    })
</script>
