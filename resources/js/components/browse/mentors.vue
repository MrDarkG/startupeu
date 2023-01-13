<template>
    <browse-index
        title="Mentors"
        :fields="fields"
        :issues="issues"
        :countries="countries"
        :data="data"
        @setFilteredData="setFilteredData"
        @setSearchedData="setSearchedData"
    >
        <div class="row" v-if="data">
            <div
                class="col-12 col-sm-6 col-md-6 mt-3"
                v-if="!mentor.is_disabled"
                v-for="mentor in data"
            >
                <div class="bg-white browse-types-card p-3 d-flex flex-column justify-content-between">
                    <a :href="`/mentor/${mentor.id}`" class="d-flex flex-column justify-content-between">
                        <img :src="'/mentors/'+mentor.logo" alt="Logo" style="border-radius: 16px;height:56px;">
                        <h5 class="font-weight-bold m-0 pt-2 pb-2">{{ mentor.name }}</h5>
                        <div class="pb-1" style="color:#797979;" :title="mentor.question1">
                            {{ setShortDescription(mentor.question1, 116) }}
                        </div>
                    </a>
                    <div class="d-flex justify-content-between">
                        <div style="color:#6200ee;" class="font-weight-bold">
                            #Enterprise Software
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
        this.setCustomData('mentors')
    },
    methods:{
        setFilteredData(response){
            this.data = response
        },
    },
};
</script>
