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
            <div class="col-md-6" v-if="!investor.is_disabled" v-for="investor in data">
                <div class="list-item investor-item d-flex justify-content-between pt-4 pb-2">
                    <a :href="`${investor.id}`">
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
