<template>
<div>
    <div class="mt-3 w-100 d-flex text-white flex-column p-2 shadow rounded"
        :class="{
            'bg-success':!is_active.add,
            'bg-primary':is_active.add
        }"
    >
        <div @click="is_active.add = !is_active.add" class="font-weight-bold d-flex align-items-center justify-content-between p-2">
            <div>
                <h4 class="m-0">Add event +</h4>
            </div>
            <div>
                <div
                    class="mr-2 pl-2 pr-2 pt-1 pb-1 d-flex align-items-center rounded bg-transparent border cursor-pointer"
                    :class="{
                        'border-white': is_active.add,
                    }"
                >
                    <i
                        class="fa text-white font-weight-bold"
                        :class="{
                            'fa-angle-down': !is_active.add,
                            'fa fa-angle-up': is_active.add
                        }"
                        aria-hidden="true"
                    ></i>
                </div>
            </div>
        </div>
        <div v-if="is_active.add" class="bg-white rounded text-black p-2 events-main-content">
            <div>
                <label>
                    Title:
                </label>
                <input type="text" placeholder="event title..." v-model="inputs.title" class="form-control">
            </div>
            <div>
                <label>
                    Card color:
                </label>
                <input type="color" @change="inputs.card_color = $event.target.value"  v-model="inputs.card_color" class="form-control">
            </div>
            <div class="mt-3">
                <label>
                    Description:
                </label>
                <div>
                    <VueEditor
                        v-model="inputs.description"
                        :editorToolbar="customToolbar"
                    ></VueEditor>
                </div>
            </div>
            <div class="mt-3">
                <label>
                    Date:
                </label>
                <input type="date" v-model="inputs.date" class="form-control">
            </div>
            <div class="mt-3">
                <input type="file" @change="previewFile($event, 'add')">
                <div>
                    <img id="addevent-image" width="300" src="/assets/images/events/towers.jpg">
                </div>
            </div>
        </div>
        <div v-if="is_active.add" class="mt-2 d-flex align-items-center justify-content-end">
            <button class="btn btn-success pl-5 pr-5 pt-2 pb-2" @click="addEvent">
                Add
            </button>
        </div>
    </div>
    <div
        v-for="(event, e_index) in events"
        :key="event.id+event.created_at"
        class="mt-3 w-100 d-flex text-white flex-column p-3 bg-secondary shadow rounded"
    >
        <div class="d-flex align-items-center justify-content-between">
            <div
                class="font-weight-bold w-50"
            >
                <span class="font-weight-bold" v-if="!event.is_active">
                    {{ event.title }}
                </span>
            </div>
            <div class="d-flex align-items-center justify-content-between">
                <div class="pr-3">
                    <div
                        class="mr-2 pl-2 pr-2 pt-1 pb-1 d-flex align-items-center rounded bg-transparent border cursor-pointer"
                        @click="event.is_active = !event.is_active"
                        :class="{
                            'border-success': event.is_active,
                            'border-white': !event.is_active,
                        }"
                    >
                        <i
                            class="fa text-white font-weight-bold"
                            :class="{
                                'fa-angle-down': !event.is_active,
                                'text-success fa fa-angle-up': event.is_active
                            }"
                            :style="{
                                color:(event.card_color !== `#ffffff`)?'white':'black'+'!important',
                            }"
                            aria-hidden="true"
                        ></i>
                    </div>
                </div>
                <div class="pr-3">
                    <i class="fa fa-trash text-danger" @click="deleteEvent(e_index, event.id)" aria-hidden="true"></i>
                </div>
                <div
                    class="rounded-circle ml-2"
                    :class="{
                        'bg-success': event.is_active,
                        'bg-white': !event.is_active
                    }"
                    style="height:10px;width:10px;"
                ></div>
            </div>
        </div>
        <div class="text-black bg-white mt-2 w-100 rounded p-1 events-main-content" v-if="event.is_active">
            <div class="pl-2 pr-2">
                <div class="mt-2">
                    <label>
                        Title:
                    </label>
                    <input type="text" @change="event.title = $event.target.value" :value="event.title" class="form-control">
                </div>
                <div class="mt-2">
                    <label>
                        Card color:
                    </label>
                    <input type="color" @change="event.card_color = $event.target.value"  :value="event.card_color" class="form-control">
                </div>
                <div class="mt-3">
                    <label>
                        Description:
                    </label>
                    <div>
                        <VueEditor
                            v-model="event.description"
                            :editorToolbar="customToolbar"
                        ></VueEditor>
                    </div>
                </div>
                <div class="mt-3">
                    <label>
                        Date:
                    </label>
                    <input type="date" @change="event.date = $event.target.value" :value="event.date" class="form-control">
                </div>
                <div class="mt-3">
                    <input type="file" @change="previewFile($event, event.id, e_index)">
                    <div>
                        <img :id="event.id+'event-image'" width="300" :src="'/assets/images/events/uploads/'+event.image">
                    </div>
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-end pr-2 pt-2">
                <button
                    class="btn btn-success pl-3 pr-3 pt-2 pb-2"
                    @click="editEvent(event)"
                >
                    Save
                </button>
            </div>
        </div>
    </div>
</div>
</template>
<script>
export default {
    props:['events'],
    methods:{
        deleteEvent(e_index, event_id){
            if(confirm("Are you sure you want to delete this event?")){
                this.events.splice(e_index, 1)
                axios.get('/admin/delete/event/'+event_id)
            }
        },
        previewFile(image, event_id, index=null) {
            let preview = document.getElementById(event_id+"event-image")
            const file = image.target.files[0]
            const reader = new FileReader()
            reader.readAsDataURL(file)
            const toBase64 = new Promise((resolve, reject) => {
                reader.onload = () => resolve(reader.result)
                reader.onerror = error => reject(error)
            })
            toBase64.then((response)=>{
                if (index !== null){
                    this.events[index].image = response
                }else{
                    this.inputs.image = response
                }
                //PREVIEW IMAGE
                setTimeout(()=>{
                    preview.src = response
                },100)
            })
        },
        editEvent(event){
            event.date = new Date(event.date)
            axios.post('/admin/edit/event', {
                id: event.id,
                event: event
            })
        },
        addEvent(){
            axios.post('/admin/add/event', this.inputs)
            .then((response)=>{
                response.data.is_active = false
                this.events.push(response.data)
                this.inputs = {
                    title: '',
                    description: '',
                    date: '',
                    image: '',
                    card_color: '#ffffff'
                }
            })
        },
    },
    created() {
        this.events = this.events.map((event) => {
            event.is_active = false
            return event
        })
    },
    data(){
        return {
            inputs:{
                title: '',
                description: '',
                date: '',
                image: '',
                card_color: '#ffffff'
            },
            is_active:{
                add:false,
            },
        }
    },
}
</script>
<style scoped>
.text-black{
    color:black!important;
}
.border-white{
    border-color:white;
}
.cursor-pointer{
    cursor:pointer;
}
.events-main-content label{
    font-weight:bold;
}
</style>
