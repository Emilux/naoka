<template>
    <jet-form-section @submitted="updateTeamName" ProfileClass="flex flex-col w-full sm:w-96 items-center m-auto">
        <template #title>
            Team Name
        </template>

        <template #description>
            The team's name and owner information.
        </template>

        <template #form class="">
            <div class="w-full">
                <!-- Team Owner Information -->
                <div class="mt-4">
                    <jet-label value="Team Owner" />

                    <div class="flex items-center mt-2">
                        <img class="w-12 h-12 rounded-full object-cover" :src="team.owner.profile_photo_url" :alt="team.owner.name">

                        <div class="ml-4 leading-tight">
                            <div>{{ team.owner.name }}</div>
                            <div class="text-gray-700 text-sm">{{ team.owner.email }}</div>
                        </div>
                    </div>
                </div>

                <!-- Team Name -->
                <div class="mt-4">

                    <div class="relative" :disabled="! permissions.canUpdateTeam" >
                        <jet-input id="name" type="text" class="mt-1 block w-full pl-14" v-model="form.name" placeholder="Team Name"/>
                        <SpanInput>
                            <i class="naoka-icon SolidTeam"></i>
                        </SpanInput>
                    </div>

                    <jet-input-error :message="form.errors.name" class="mt-2" />
                </div>
            </div>
            
            <div v-if="permissions.canUpdateTeam">
                <jet-action-message :on="form.recentlySuccessful" class="mr-3">
                    Saved.
                </jet-action-message>

                <Button color="blue" :wide="true" class="mt-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Save
                </Button>
            </div>
        </template>

    </jet-form-section>
</template>

<script>
    import { defineComponent } from 'vue'
    import JetActionMessage from '@/Jetstream/ActionMessage'
    import Button from '@/components/Ui/Button'
    import JetFormSection from '@/Jetstream/FormSection'
    import JetInput from '@/Jetstream/Input'
    import JetInputError from '@/Jetstream/InputError'
    import JetLabel from '@/Jetstream/Label'
    import SpanInput from '@/Jetstream/SpanInput'

    export default defineComponent({
        components: {
            JetActionMessage,
            Button,
            JetFormSection,
            JetInput,
            JetInputError,
            JetLabel,
            SpanInput,
        },

        props: ['team', 'permissions'],

        data() {
            return {
                form: this.$inertia.form({
                    name: this.team.name,
                })
            }
        },

        methods: {
            updateTeamName() {
                this.form.put(route('teams.update', this.team), {
                    errorBag: 'updateTeamName',
                    preserveScroll: true
                });
            },
        },
    })
</script>
