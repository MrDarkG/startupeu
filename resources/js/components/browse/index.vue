<template>
    <div class="container">
        <div class="container-fluid pl-3 pl-sm-3 pr-3 pr-sm-3 pr-md-3 pl-md-3 pr-lg-0 pl-lg-0 d-flex startup-list-search align-items-end justify-content-center"
            style="position:absolute!important;"
        >
            <div class="list-search p-0 pr-2 m-0 w-100 d-flex align-items-center justify-content-center">
                <label for="search" class="p-0 m-0 w-100 d-flex align-items-center">
                    <div class="left w-100 pr-3 m-0 row">
                        <div class="col-3 col-sm-3 col-md-1 col-lg-1 d-flex align-items-center justify-content-center p-0">
                            <img src="https://beta.startupcentraleurasia.com/themes/application/Components/svg/search.svg" alt="" width="20">
                        </div>
                        <div class="col-9 col-sm-9 col-md-11 col-lg-11 pl-0">
                            <input v-model="search" @input="setDataByItsValue" type="text" id="search" class="form-control custom-search-input p-0 mr-2 " placeholder="Search...">
                        </div>
                    </div>
                </label>
                <div class="right">
                    <button type="submit">Search</button>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row startup-list">
                <div class="col-md-3 left-search">
                    <filter-list
                        :data="filter_data"
                        @getSelectedFilters="setSearchUrl"
                    ></filter-list>
                </div>
                <div class="col-12 col-md-12 col-lg-9 pb-150">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6 list-type-style">
                                {{ title }}
                            </div>
                            <div class="col-md-6 list-type-count">
                                Showing : {{ data.length }} {{  }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <slot>
                            <!-- HERE GOES -->
                        </slot>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default{
    props:[
        'title',
        'data',
        'fields',
        'issues',
        'countries',
        'industries',
        'stages',
        'markets',
        'ranges',
        'var_attrs'
    ],
    watch:{
        url:function(url){
            this.getData(url)
        }
    },
    data(){
        return {
            url:'',
            search:'',
            filter_data:[
                {
                    title:'Countries',
                    prop:'countries[]=',
                    data:this.countries
                },
                {
                    title:'Issues consult',
                    prop:'issues[]=',
                    data:this.issues
                },
                {
                    title:'Fieldes consult',
                    prop:'fields[]=',
                    data:this.fields
                },
                {
                    title:'Stages',
                    prop:'stages[]=',
                    data:this.stages
                },
                {
                    title:'Markets',
                    prop:'markets[]=',
                    data:this.markets
                },
                {
                    title:'Ranges',
                    prop:'ranges[]=',
                    data:this.ranges
                },
            ],
        }
    },
    created(){
        document.querySelector('body').style.position="relative"
    },
    methods:{
        setDataByItsValue(event){
            this.$emit('setSearchedData', event.target.value)
        },
        setSearchUrl(selected_filters){
            let custom_url = ''
            selected_filters.map((filter, index)=>{
                let char = (index!==0)?'&':'?'
                custom_url += char+filter.url
            })
            this.url = custom_url
        },
        getData(url){
            axios.get(`/${this.title.toLowerCase().slice(0,this.title.length-1)}/search${url}`)
            .then((response)=>{
                this.$emit('setFilteredData', response.data)
            })
        }
    },
};
</script>
<style>
.custom-search-input:focus{
    border: none!important;
    outline: none!important;
}
</style>
