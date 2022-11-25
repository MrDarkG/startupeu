<template>
    <browse-index
        title="Investors"
        :markets="markets"
        :ranges="ranges"
        :countries="countries"
        :data="data"
        @setFilteredData="setFilteredData"
        @setSearchedData="setSearchedData"
    >
        <div class="row" v-if="data">
            <div class="col-12 col-sm-6 col-md-4 col-lg-4" v-if="!investor.is_disabled" v-for="investor in data">
                <div class="list-item investor-item d-flex justify-content-between pt-4 pb-2">
                    <a href="#">
                        <img :src="'/investor/'+investor.logo" alt="Logo" style="border-radius: 16px;">
                        <div class="title investor-title">{{ investor.name }}</div>
                        <div class="desc investor-desc">{{ setShortDescription(investor.question1, 150) }}</div>
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
        markets:Array,
        ranges:Array,
        countries:Array,
        investors:Object
    },
    data(){
      return {
          data:[],
      }
    },
    created(){
        this.setCustomData('investors')
    },
    methods:{
        setFilteredData(response){
            this.data = response
        },
    },
};
</script>
