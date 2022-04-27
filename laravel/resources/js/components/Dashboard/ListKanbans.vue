<template>
    <section class="my-4 text-naoka-purple font-raleway">
        <div class="mt-4">
            <div class="container lg:w-[1056px]">
                <div class="mx-6">
                    <div class="flex justify-between items-center flex-wrap">

                        <template v-for="team in $page.props.user.all_teams" :key="team.id">
                            <div v-if="team.id == $page.props.user.current_team_id">
                                <h2 class="text-lg font-bold">{{ team.name }}</h2>
                            </div>
                        </template>

                        <Button :href="route('boards.create')" color="blue">
                            <i class="naoka-icon solidPlus sm:mr-2"></i>
                            <span class="hidden sm:block">Create kanban</span>
                        </Button>
                    </div>
                        <div class="flex items-center justify-between mt-4 flex-wrap">
                            <template v-if="CollaborateUsers && typeof CollaborateUsers['0'] !== 'undefined'" >
                            <div class="flex items-center">
                                <div class="bg-naoka-red -mr-4 w-8 h-8 rounded-full"></div>
                                <div class="bg-naoka-yellow -mr-4 w-8 h-8 rounded-full"></div>
                                <div class="bg-naoka-blue -mr-4 w-8 h-8 rounded-full"></div>
                                <button class="show-participant relative bg-naoka-purple text-white w-8 h-8 rounded-full flex justify-center items-center transition-colors hover:bg-naoka-purple-hover">
                                    <i class="naoka-icon SolidOptionDotHorizontal text-3xl"></i>
                                    <div class="show-participant-hidden bg-black text-white rounded-md w-40 p-1 m-8 absolute z-10 bottom-[unset] left-1/2 text-center">
                                        <template v-for="user in CollaborateUsers">
                                            <p class="text-sm"> {{ user.name }} </p>
                                        </template>
                                    </div>
                                </button>

                                <!-- Add member -->
                                <JetNavLink :href="route('teams.show', $page.props.user.current_team)" :active="route().current('teams.show')" class="aspect-square w-8 h-8 ml-4 flex transition-colors hover:bg-naoka-blue-hover justify-center items-center bg-naoka-blue text-white rounded-lg">
                                    <i class="naoka-icon SolidAddMember"></i>
                                </JetNavLink>
                            </div>
                            </template>
                            <!-- Team Settings -->
                            <JetNavLink :href="route('teams.show', $page.props.user.current_team)"  class="px-4 h-8 flex transition-colors hover:bg-naoka-purple-hover justify-center items-center bg-naoka-purple text-white rounded-full">
                                <i class="naoka-icon SolidCog"></i>
                                Team Settings
                            </JetNavLink>
                        </div>


                </div>


                <div class="flex flex-col mt-8 overflow-auto hide-scrollbar">
                    <div class="flex flex-wrap items-center">
                       <template v-for="board in boards">
                           <div class="mb-12 w-full sm:w-1/2 lg:w-1/3">
                           <CardKanban :board="board"/>
                           </div>
                       </template>
                        <div class="mb-12 w-full sm:w-1/2 lg:w-1/3">
                            <CardAdd/>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    import { defineComponent } from 'vue'
    import CardKanban from "@/components/Dashboard/CardKanban.vue";
    import CardAdd from "@/components/Dashboard/CardAdd.vue";
    import JetNavLink from '@/Jetstream/NavLink.vue'
    import Button from '@/components/Ui/Button'

    export default defineComponent({
        components: {
            CardKanban,
            CardAdd,
            JetNavLink,
            Button,
        },

        props: {
            boards: Object,
            CollaborateUsers: Object,
        },
    })
</script>
