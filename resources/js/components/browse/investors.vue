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
            <div
                class="col-12 col-sm-6 col-md-6 mt-3"
                v-if="!investor.is_disabled"
                v-for="investor in data"
            >
                <div
                    style="height: 360px;"
                    class="bg-white browse-types-card p-3 d-flex flex-column justify-content-between overflow-hidden"
                >
                    <a :href="`/investor/${investor.id}`" class="d-flex flex-column justify-content-between">
                        <div
                            class="browse-card-image"
                            :style="{
                                backgroundImage:`url('${investor.logo}')`
                            }"
                        ></div>
                        <h5 class="font-weight-bold m-0 pt-2 pb-2">{{ investor.name }}</h5>
                        <div class="pb-1" style="color:#797979;" :title="investor.about">
                            {{setShortDescription(investor.about, 216)}}
                        </div>
                    </a>
                    <div class="d-flex justify-content-between">
                        <div
                            class="d-flex flex-wrap align-items-center"
                        >
                            <div
                                v-for="item in investor?.industries"
                                class="pl-2 font-weight-bold"
                                style="color:#6200ee;"
                            >
                                #{{item.industry.title}}
                            </div>
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
<style>
.browse-card-image{
    height:160px;
    width:160px;
    border-radius: 16px;
    background-repeat: no-repeat;
    background-position: center;
}
</style>
