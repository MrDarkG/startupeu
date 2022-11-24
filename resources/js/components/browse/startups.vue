<template>
    <browse-index
        title="Startups"
        :countries="countries"
        :stages="stages"
        :data="data"
        @setSearchedData="setSearchedData"
        @setFilteredData="setFilteredData"
    >
        <div class="row m-0" v-if="data">
            <div class="col-12 col-md-6 col-lg-6 col-xl-4 p-2"
                 v-if="startup.is_disabled === false"
                 v-for="(startup, s_index) in data">
                <div class="browse-startup-card shadow h-100 p-4 d-flex flex-column justify-content-between" style="min-width:unset!important;">
                    <a :href="`/startup/${startup.id}`">
                        <img :src="startup.logo" alt="Logo" style="width: 62px;">
                        <div class="title font-weight-bold" style="word-break:break-word;font-size:20px;" :title="startup.what_your_company_does">
                            {{ startup.name }} - {{ setShortDescription(startup.what_your_company_does, 23) }}
                        </div>
                        <div class="desc" :title="startup.description" style="word-break: break-word;font-size:15px;color:#8c8c8c;">
                            {{ setShortDescription(startup.description, 150) }}
                        </div>
                    </a>
                    <div class="d-flex">
                        <div
                            :class="{
                                'ml-1':s_index > 1,
                            }"
                            style="color:#6200EE;"
                            v-if="data.industry"
                            v-for="data in startup.startup_industries"
                        >
                            #{{data.industry.title}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </browse-index>
</template>
<script>
export default{
    props:{
        countries:Array,
        stages:Array,
        startups:Array
    },
    data(){
        return {
            data:[],
        }
    },
    created(){
        this.setCustomData('startups')
    },
    methods:{
        setFilteredData(response){
            response.map((item)=>{
                item.is_disabled = false
            })
            this.data = response
        },
    },
};
</script>
