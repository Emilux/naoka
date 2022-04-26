<template>
    <draggable
        class="flex w-full overflow-auto items-start h-full py-12 px-4 absolute right-0 top-0 w-[calc(100%-4rem)] sm:w-[calc(100%-3rem)]"
        :list="columns"
        :scroll-sensitivity="100"
        :delayOnTouchOnly="true"
        :delay="100"
        :force-fallback="true"
        group="columns"
        handle=".handle"
    >
        <template #item="{ element }" :key="element.id">
            <div class="flex flex-col border-2 mx-8 rounded-3xl w-72 flex-shrink-0 max-h-full overflow-hidden">
                <div class="handle p-3 text-sm text-naoka-purple font-raleway font-semibold cursor-pointer flex justify-between items-center">
                    <div v-bind:onclick="log" class="hover:bg-white-hover p-1 w-full">{{ element.name }}</div>
                        <div class="text-xl flex items-center">
                        <i v-bind:onclick="log" class="naoka-icon solidPlus hover:bg-white-hover p-1"></i>
                        <i v-bind:onclick="log" class="naoka-icon SolidOptionDot hover:bg-white-hover p-1"></i>
                    </div>
                </div>

                <ViewCards :cards="cards"/>
                
                <CreateCard :column="element"/>
            </div>
        </template>
    </draggable>
</template>

<script>
import { defineComponent } from 'vue'
import draggable from 'vuedraggable'
import ViewCards from '@/components/Boards/Cards/ViewCards.vue'
import CreateCard from '@/components/Boards/Cards/CreateCard.vue'

export default {
    components: {
        draggable,
        ViewCards,
        CreateCard,
    },

    props: {
        columns: Object,
        cards: Object,
    },

    data() {
        return {
            hasScroll: true,
            drag: true,
        }
    },

    methods:{
        log: function () {
            console.log('click')
        }
    }
}
</script>