<template>
<div class="mt-4">
    <multiselect
        id="phone_index"
        v-model="custom_news"
        track-by="id"
        label="title"
        :placeholder="'Select News...'"
        :options="news"
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
    props:['news','selected'],
    data(){
        return {
            custom_news: {},
        }
    },
    created(){
        this.setSelectedNews()
    },
    methods:{
        saveSelectedPage(){
            let news = this.custom_news
            if (news.id){
                axios.post('/admin/single-page/create',news)
                .then((response) => {
                    window.location.href=`/news/${news.title}.${news.id}`
                })
            }
        },
        deleteSelectedPage(){
            axios.get('/admin/single-page/delete')
                .then(()=>{
                    this.custom_news = {}
                })
        },
        setSelectedNews(){
            if (this.selected){
                this.custom_news = this.news.filter((item)=>{
                    return item.id == this.selected.news_id
                })
            }
        }
    },
}
</script>
