<template>
    <browse-index
        title="Mentors"
        :fields="fields"
        :issues="issues"
        :countries="countries"
        :data="data"
        @setFilteredData="setFilteredData"
    >
        <div class="row" v-if="data">
            <div class="col-md-6" v-if="!mentor.is_disabled" v-for="mentor in data">
                <div class="list-item investor-item d-flex justify-content-between pt-4 pb-2">
                    <a href="#">
                        <img :src="mentor.logo" alt="Logo" style="border-radius: 16px;">
                        <div class="title investor-title">{{ mentor.name }}</div>
                        <div class="desc investor-desc">{{ mentor.question1 }}</div>
                    </a>
                    <div class="d-flex justify-content-between  tags-div">
                        <div>
                            <ul class="tags">
                                <li><a href="#">#Enterprise Software </a></li>
                            </ul>
                        </div>
                        <div>
                            <span class="money-in-investor">
                                $50
                            </span>
                            <span class="moneyandhours">
                                $/hour
                            </span>
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
        fields:Array,
        issues:Array,
        countries:Array,
        mentors:Object
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
            this.data.map((item)=>{
                item.is_disabled = true
                let array = ['company_name', 'name', 'website']
                array.forEach((arr)=>{
                    console.log(item[arr], input, item[arr].toLowerCase().includes(input.toLowerCase()))
                    if(item[arr].toLowerCase().includes(input.toLowerCase())){
                        item.is_disabled = false
                    }
                })
            })
        },
        setFilteredData(response){
            this.data = response
        },
        setCustomData(){
            this.mentors.data.map((item)=>{
                item['is_disabled']
                this.data.push(item)
            })
        },
    },
};
</script>
