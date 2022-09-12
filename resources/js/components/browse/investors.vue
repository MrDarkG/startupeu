<template>
    <browse-index
        title="Investors"
        :fields="fields"
        :issues="issues"
        :countries="countries"
        :data="data"
        @setFilteredData="setFilteredData"
        @setSearchedData="setSearchedData"
    >
        <div class="row" v-if="data">
            <div class="col-md-6" v-if="!investor.is_disabled" v-for="investor in data">
                <div class="list-item investor-item d-flex justify-content-between pt-4 pb-2">
                    <a href="#">
                        <img :src="investor.logo" alt="Logo" style="border-radius: 16px;">
                        <div class="title investor-title">{{ investor.name }}</div>
                        <div class="desc investor-desc">{{ investor.question1 }}</div>
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
        investors:Object
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
            this.investors.data.map((item)=>{
                item['is_disabled'] = false
                this.data.push(item)
            })
        },
    },
};
</script>
