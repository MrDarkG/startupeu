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
            <div class="col-12 col-md-6 col-lg-4 p-2"
                 v-if="startup.is_disabled === false"
                 v-for="startup in data">
                <div class="list-item p-4" style="height: 235px; min-width:unset!important;">
                    <a href="#">
                        <img :src="startup.logo" alt="Logo" style="width: 62px;">
                        <div class="title">
                            {{ startup.name }} - {{ startup.what_your_company_does }}
                        </div>
                        <div class="desc" :title="startup.description">
                            {{ setShortDescription(startup.description) }}
                        </div>
                    </a>
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
