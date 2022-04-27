<template>
    <app-layout title="Profile">
        <template #header>
            <AuthTitle title="Profile" description="Edit your profile information"/>
        </template>

        <div class="xl:container">
            <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
                <div v-if="$page.props.jetstream.canUpdateProfileInformation">
                    <update-profile-information-form :user="$page.props.user" />
                </div>

                <div v-if="$page.props.jetstream.canUpdatePassword">
                    <update-password-form class="mt-10 sm:mt-0" />
                </div>

                <div v-if="$page.props.jetstream.canUpdateProfileInformation">
                    <UpdateEmailForm :user="$page.props.user" />
                </div>

                <div v-if="$page.props.jetstream.canUpdateProfileInformation">
                    <UpdateNameForm :user="$page.props.user" />
                </div>

                <div v-if="$page.props.jetstream.canManageTwoFactorAuthentication">
                    <two-factor-authentication-form class="mt-10 sm:mt-0" />
                </div>

                <div class="flex justify-between">

                    <BtnLogOut/>
                    <template v-if="$page.props.jetstream.hasAccountDeletionFeatures">
                        <delete-user-form class="mt-10 sm:mt-0" />
                    </template>
                </div>
            </div>
        </div>

        <AuthFooter/>
    </app-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue'
    import DeleteUserForm from '@/Pages/Profile/Partials/DeleteUserForm.vue'
    import LogoutOtherBrowserSessionsForm from '@/Pages/Profile/Partials/LogoutOtherBrowserSessionsForm.vue'
    import TwoFactorAuthenticationForm from '@/Pages/Profile/Partials/TwoFactorAuthenticationForm.vue'
    import UpdatePasswordForm from '@/Pages/Profile/Partials/UpdatePasswordForm.vue'
    import UpdateProfileInformationForm from '@/Pages/Profile/Partials/UpdateProfileInformationForm.vue'
    import AuthTitle from '@/Jetstream/AuthTitle.vue'
    import UpdateEmailForm from '@/Pages/Profile/Partials/UpdateEmailForm.vue'
    import UpdateNameForm from '@/Pages/Profile/Partials/UpdateNameForm.vue'
    import BtnLogOut from '@/Pages/Profile/Partials/BtnLogOut.vue'
    import AuthFooter from '@/Jetstream/AuthFooter.vue'


    export default defineComponent({
        props: ['sessions'],

        components: {
            AppLayout,
            DeleteUserForm,
            LogoutOtherBrowserSessionsForm,
            TwoFactorAuthenticationForm,
            UpdatePasswordForm,
            UpdateProfileInformationForm,
            AuthTitle,
            UpdateEmailForm,
            UpdateNameForm,
            BtnLogOut,
            AuthFooter,
        },
    })
</script>
