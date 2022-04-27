<template>
    <draggable
        :scroll-sensitivity="100"
        :delay="100"
        :delayOnTouchOnly="true"
        :force-fallback="true"
        class="pb-4 px-4 overflow-auto"
        :list="cards"
        group="cards"
    >
        <template #item="{ element }" :key="element.id">

            <div class=" relative p-2.5 shadow-mini rounded-2xl mt-4 cursor-pointer text-naoka-purple font-raleway border-naoka-grey text-sm border hover:bg-white-hover transition-colors">
                
                <div class="absolute right-0 top-0 text-lg">
                    <DeleteCard :column="column" :card="element"/>
                </div>
            
                <div v-if="element.tag" class="flex flex-wrap text-xs">
                    <div v-for="tag in element.tag" v-bind:style="{ backgroundColor: tag.bg,color: tag.color}" class="py-1.5 px-2.5 bg-naoka-yellow mr-2 mb-2 rounded-full">
                        {{tag.name}}
                    </div>
                </div>

                <div class="mb-4">{{element.name}}</div>

                <div class="flex justify-between font-semibold">
                    <div>
                        <div v-if="element.until" class="">Until : {{element.until}}</div>
                    </div>
                    
                    <div>#{{$page.props.board.identifier}}-{{element.count}}</div>
                </div>
            </div>
        </template>
    </draggable>

</template>


<script>
import { defineComponent } from 'vue'
import draggable from 'vuedraggable'
import DeleteCard from '@/components/Boards/Cards/DeleteCard.vue'

export default {
    components: {
        draggable,
        DeleteCard,
    },

    props: {
        cards: Object,
        column: Object
    },

    data() {
        return {
            hasScroll: true,
            drag: true,
        }
    },
    
    mounted() {
        console.log(this.cards);
    },

    methods:{
        log: function () {
            console.log('click')
        }
    }
}
</script>