<template>
    <nav class="sm:w-12 w-16 max-h-full h-full relative">
        <button class="z-10 absolute bg-white w-8 h-8 rounded-r-full flex justify-center items-center -right-full -translate-x-full sm:-translate-x-1/2 h-16 top-1/2 -translate-y-1/2 transition-colors hover:bg-white-hover">
            <i class="naoka-icon SolidChevronLeft"></i>
        </button>
        <div class="overflow-y-auto hide-scrollbar w-full text-lg bg-white shadow-base h-full absolute top-0 flex flex-col items-center justify-between py-6">
            <div>
                <BtnAddColumn/>
                
                <button class="transition-colors hover:bg-naoka-purple hover:text-white mb-4 w-8 h-8 flex justify-center items-center text-naoka-purple border border-naoka-purple rounded-full"><i class="naoka-icon SolidTag"></i></button>
                <button class="mb-4 w-8 h-8 flex hover:bg-naoka-purple hover:text-white justify-center items-center text-naoka-purple border border-naoka-purple rounded-full"><i class="naoka-icon SolidPalette"></i></button>
                <button class="mb-4 w-8 h-8 flex hover:bg-naoka-purple hover:text-white justify-center items-center text-naoka-purple border border-naoka-purple rounded-full"><i class="naoka-icon SolidTeam"></i></button>
                <button class="mb-4 w-8 h-8 flex hover:bg-naoka-purple hover:text-white justify-center items-center text-naoka-purple border border-naoka-purple rounded-full"><i class="naoka-icon SolidArchive"></i></button>
                <button class="mb-4 w-8 h-8 flex hover:bg-naoka-purple hover:text-white justify-center items-center text-naoka-purple border border-naoka-purple rounded-full"><i class="naoka-icon SolidCog"></i></button>
            </div>
            <div>
                <button class="block sm:hidden mb-4 w-8 h-8 flex hover:bg-naoka-purple hover:text-white justify-center items-center text-naoka-purple border border-naoka-purple rounded-full"><i class="naoka-icon SolidLeftArrow"></i></button>
                <button class="mb-4 w-8 h-8 flex hover:bg-naoka-purple hover:text-white justify-center items-center text-naoka-purple border border-naoka-purple rounded-full"><i class="naoka-icon SolidHelp"></i></button>
                <button class="mb-4 w-8 h-8 flex hover:bg-naoka-purple hover:text-white justify-center items-center text-naoka-purple border border-naoka-purple rounded-full"><i class="naoka-icon SolidInfo"></i></button>
            </div>
        </div>
    </nav>
</template>

<script>
import { defineComponent } from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'
import BtnAddColumn from '@/components/Navigation/Boards/BtnAddColumn.vue'

export default defineComponent({
    components: {
        BtnAddColumn,
    },
})
</script>