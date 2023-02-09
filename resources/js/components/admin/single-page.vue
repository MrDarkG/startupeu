<template>
<div class="mt-4">
    <multiselect
        id="phone_index"
        v-model="single_event"
        track-by="id"
        label="title"
        :placeholder="'Select News...'"
        :options="events"
        :multiple="false"
    ></multiselect>
    <div class="d-flex align-items-center justify-content-end">
        <div class="pl-2 pr-2">
            <button
                @click="deleteSelectedPage"
                class="btn btn-danger float-right"
            >
                Delete
            </button>
        </div>
        <div class="pl-2 pr-2">
            <button
                @click="saveSelectedPage"
                class="btn btn-success float-right"
            >
                Submit
            </button>
        </div>
    </div>
</div>
</template>
<script>
export default {
    props:['events','selected','buttons'],
    data(){
        return {
            single_event: {},
        }
    },
    created(){
        this.setSelectedNews()
    },
    methods:{
        saveSelectedPage(){
            let single_event = this.single_event
            if (single_event.id){
                axios.post('/admin/single-page/create',single_event)
                .then((response) => {
                    window.location.href = response.data
                })
            }
        },
        deleteSelectedPage(){
            axios.get('/admin/single-page/delete')
                .then(()=>{
                    this.single_event = {}
                })
        },
        setSelectedNews(){
            if (this.selected){
                this.single_event = this.events.filter((item)=>{
                    return item.id == this.selected.news_id
                })
            }
        }
    },
}
</script>
