<template>
    <div>
        <Head :title="title" />

        <jet-banner />

        <div class="h-screen flex flex-col overflow-hidden">
            <Navbar class="relative">
                <jet-dropdown align="right" width="48">
                    <template #trigger>
                        <Button color="blue" type="button" as="button" preserve-state>
                            <div class="hidden sm:block">Create</div>
                            <i class="naoka-icon solidPlus sm:ml-2"></i>
                        </Button>
                    </template>

                    <template #content>
                        <jet-dropdown-link :href="route('teams.create')" v-if="$page.props.jetstream.canCreateTeams">
                            Create New Team
                        </jet-dropdown-link>
                        <jet-dropdown-link :href="route('boards.create')">
                            Create Board
                        </jet-dropdown-link>
                    </template>
                </jet-dropdown>
            </Navbar>
            <slot name="afterNavbar"></slot>
            <div class="overflow-auto">
                <!-- Page Heading -->
                <header class="bg-white" v-if="$slots.header">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        <slot name="header"></slot>
                    </div>
                </header>

                <!-- Page Content -->
                <main>
                    <slot></slot>
                </main>
            </div>

        </div>
    </div>
</template>

<script>
    import { defineComponent } from 'vue'
    import JetApplicationMark from '@/Jetstream/ApplicationMark.vue'
    import JetBanner from '@/Jetstream/Banner.vue'
    import JetDropdown from '@/Jetstream/Dropdown.vue'
    import JetDropdownLink from '@/Jetstream/DropdownLink.vue'
    import JetNavLink from '@/Jetstream/NavLink.vue'
    import JetResponsiveNavLink from '@/Jetstream/ResponsiveNavLink.vue'
    import Navbar from "@/Components/Navigation/Navbar";
    import Button from "@/Components/Ui/Button";
    import { Head, Link } from '@inertiajs/inertia-vue3';

    export default defineComponent({
        props: {
            title: String,
        },

        components: {
            Head,
            JetApplicationMark,
            JetBanner,
            Navbar,
            JetDropdown,
            JetDropdownLink,
            JetNavLink,
            JetResponsiveNavLink,
            Button,
            Link,
        },

        data() {
            return {
                showingNavigationDropdown: false,
            }
        },

        methods: {
            switchToTeam(team) {
                this.$inertia.put(route('current-team.update'), {
                    'team_id': team.id
                }, {
                    preserveState: false
                })
            },

            logout() {
                this.$inertia.post(route('logout'));
            },
        }
    })
</script>
