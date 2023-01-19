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
                <div
                    style="height: 360px;"
                    class="bg-white browse-types-card p-3 d-flex flex-column justify-content-between overflow-hidden"
                >
                    <a :href="`/mentor/${mentor.id}`" class="d-flex flex-column justify-content-between">
                        <div
                            class="browse-card-image"
                            :style="{
                                backgroundImage:`url('/mentors/${mentor.logo}')`
                            }"
                        ></div>
                        <h5 class="font-weight-bold m-0 pt-2 pb-2">{{ mentor.name }}</h5>
                        <div class="pb-1" style="color:#797979;" :title="mentor.question1">
                            {{ setShortDescription(mentor.question1, 116) }}
                        </div>
                    </a>
                    <div class="d-flex justify-content-between">
                        <div
                            class="d-flex flex-wrap align-items-center"
                        >
                            <div
                                v-for="item in mentor?.issues"
                                class="pl-2 font-weight-bold"
                                style="color:#6200ee;"
                            >
                                #{{item.issue.title}}
                            </div>
                        </div>
                        <div>
                            <span style="color:rgba(52, 199, 89, 1);font-size:25px;">${{mentor.price}}</span><span style="color:rgba(52, 199, 89, 0.6);">/hour</span>
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
