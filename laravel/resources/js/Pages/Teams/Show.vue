<template>
    <app-layout title="Team Settings">
        <template #header>
            <Title title="Team Settings" description="Edit team settings"/>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-4 sm:px-6 lg:px-8">
                <update-team-name-form :team="team" :permissions="permissions" />

                <team-member-manager class="mt-10 sm:mt-0"
                            :team="team"
                            :available-roles="availableRoles"
                            :user-permissions="permissions" />

                <template v-if="permissions.canDeleteTeam && ! team.personal_team">
                    <jet-section-border />

                    <delete-team-form class="mt-10 sm:mt-0 flex flex-col items-center" :team="team" />
                </template>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue'
    import DeleteTeamForm from '@/Pages/Teams/Partials/DeleteTeamForm.vue'
    import JetSectionBorder from '@/Jetstream/SectionBorder.vue'
    import TeamMemberManager from '@/Pages/Teams/Partials/TeamMemberManager.vue'
    import UpdateTeamNameForm from '@/Pages/Teams/Partials/UpdateTeamNameForm.vue'
    import Title from '@/Components/Ui/Title'

    export default defineComponent({
        props: [
            'team',
            'availableRoles',
            'permissions',
        ],

        components: {
            AppLayout,
            DeleteTeamForm,
            JetSectionBorder,
            TeamMemberManager,
            UpdateTeamNameForm,
            Title
        },
    })
</script>
