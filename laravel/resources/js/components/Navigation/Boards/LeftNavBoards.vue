<template>
    <nav class="sm:w-12 w-16 max-h-full h-full relative">
        <button @click="closeNav" :class="{'left-8 sm:left-4':!navOpen}" class="z-10 absolute bg-white w-8 h-8 rounded-r-full flex justify-center items-center -right-full -translate-x-full sm:-translate-x-1/2 h-16 top-1/2 -translate-y-1/2 transition-colors hover:bg-white-hover">
            <i class="naoka-icon SolidChevronLeft"></i>
        </button>
        <div :class="{'block':navOpen, 'hidden':!navOpen}" class="overflow-y-auto hide-scrollbar w-full text-lg bg-white shadow-base h-full absolute top-0 flex flex-col items-center justify-between py-6">
            <div>
                <BtnAddColumn/>
                <Link :href="route('teams.show', $page.props.board.team_id)" class="mb-4 w-8 h-8 flex hover:bg-naoka-purple hover:text-white justify-center items-center text-naoka-purple border border-naoka-purple rounded-full"><i class="naoka-icon SolidTeam"></i></Link>
                <Link :href="route('boards.edit', $page.props.board)" class="mb-4 w-8 h-8 flex hover:bg-naoka-purple hover:text-white justify-center items-center text-naoka-purple border border-naoka-purple rounded-full"><i class="naoka-icon SolidCog"></i></Link>
            </div>
            <div>
                <Link :href="route('dashboard')" class="block sm:hidden mb-4 w-8 h-8 flex hover:bg-naoka-purple hover:text-white justify-center items-center text-naoka-purple border border-naoka-purple rounded-full"><i class="naoka-icon SolidLeftArrow"></i></Link>
            </div>
        </div>
    </nav>
</template>

<script>
import { defineComponent } from 'vue'
import { Link } from '@inertiajs/inertia-vue3';
import BtnAddColumn from '@/components/Navigation/Boards/BtnAddColumn.vue'

export default defineComponent({
    components: {
        BtnAddColumn,
        Link
    },
    data(){
        return {
            navOpen:true
        }
    },
    methods:{
        closeNav(){
            this.navOpen = !this.navOpen
        }
    }
})
</script>
