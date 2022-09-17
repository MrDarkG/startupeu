<template>
<div>
    <div v-if="is_active.add">
        ragac
    </div>
    <div
        @click="event.is_active = !event.is_active"
        v-for="event in events"
        class="mt-3 w-100 d-flex text-white flex-column p-3 bg-secondary shadow rounded"
    >
        <div class="d-flex align-items-center justify-content-between">
            <div class="font-weight-bold">
                {{ event.title }}
            </div>
            <div
                class="rounded-circle "
                :class="{
                    'bg-success': event.is_active,
                    'bg-white': !event.is_active
                }"
                style="height:10px;width:10px;"
            ></div>
        </div>
        <div class="bg-white mt-2" v-if="event.is_active">
            321
        </div>
    </div>
</div>
</template>
<script>
export default {
    props:['events'],
    created() {
        this.events = this.events.map((event) => {
            event.is_active = false
            return event
        })
    },
    data(){
        return {
            is_active:{
                add:true,
            },
        }
    },
}
</script>
