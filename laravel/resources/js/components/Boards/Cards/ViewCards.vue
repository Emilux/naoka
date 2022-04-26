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
            <div v-bind:style="{ borderColor: element.member && element.member.color }"
                class=" relative p-2.5 shadow-mini rounded-2xl mt-4 cursor-pointer text-naoka-purple font-raleway border-naoka-grey text-sm border hover:bg-white-hover transition-colors">
                
                <div class="absolute right-0 top-0 text-lg">
                    <button class="px-1 py-1.5"><i class="naoka-icon SolidOptionDot"></i></button>
                </div>
            
                <div v-if="element.tag" class="flex flex-wrap text-xs">
                    <div v-for="tag in element.tag" v-bind:style="{ backgroundColor: tag.bg,color: tag.color}" class="py-1.5 px-2.5 bg-naoka-yellow mr-2 mb-2 rounded-full">
                        {{tag.name}}
                    </div>
                    <div class="py-1.5 px-2.5 bg-naoka-red text-white mr-2 mb-2 rounded-full bg-naoka-red flex items-center">
                        <i class="naoka-icon SolidDoubleUpgrade"></i>
                        Very important
                    </div>
                    <div class="py-1.5 px-2.5 bg-naoka-purple text-white mr-2 mb-2 rounded-full">
                        {{element.estimated_time}}
                    </div>
                </div>

                <div class="mb-4">{{element.name}}</div>

                <div class="flex justify-between font-semibold">
                    <div>
                        <div v-if="element.until" class="">Until : {{element.until}}</div>
                    </div>
                    
                    <div>#NK-{{element.id}}</div>
                </div>
            </div>
        </template>
    </draggable>

</template>


<script>
import { defineComponent } from 'vue'
import draggable from 'vuedraggable'

export default {
    components: {
        draggable,
    },

    props: {
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