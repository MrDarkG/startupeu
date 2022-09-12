<template>
    <browse-index
        title="Startups"
        :fields="fields"
        :issues="issues"
        :countries="countries"
        :data="data"
        @setSearchedData="setSearchedData"
        @setFilteredData="setFilteredData"
    >
        <div class="row m-0" v-if="data">
            <div class="col-12 col-md-6 col-lg-4 p-2" v-if="startup.is_disabled === false" v-for="startup in data">
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
        fields:Array,
        issues:Array,
        startups:Array
    },
    data(){
        return {
            data:[],
        }
    },
    created(){
        this.setCustomData()
    },
    methods:{
        setSearchedData(input){
            console.log(input)
            this.data.map((item)=>{
                item.is_disabled = true
                let array = ['full_name', 'name', 'ceo_email']
                array.forEach((arr)=>{
                    if(item[arr].toLowerCase().includes(input.toLowerCase())){
                        item.is_disabled = false
                    }
                })
            })
        },
        setShortDescription(string){
            return (string.length > 172)?string.slice(0,169)+' ...':string
        },
        setFilteredData(response){
            this.data = response
        },
        setCustomData(){
            this.startups.map((item)=>{
                item['is_disabled'] = false
                this.data.push(item)
            })
        },
    },
};
</script>
