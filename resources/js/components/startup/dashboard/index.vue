<template>
<div class="dash-container">
    <!-- <p class="alert alert-success">Startup add successfully </p>             -->
    <div class="title">Investment Oportunities </div>
    <div class="desc">
        Find investment opportunities from leading Venture Funds, Angels and Accelerators, apply with one click.
    </div>
    <div class="tabs tabs-bordered ui-tabs ui-corner-all ui-widget ui-widget-content">
        <div class="container ml-3 pl-0 pr-0">
            <div
                class="row col-12 col-sm-9 p-1"
                style="background:#d8d8dc;border-radius:16px;"
            >
                <div
                    v-for="(menu, index) in menu_list"
                    class="text-center col-12 col-sm-4 col-md-3 col-lg-2 p-2 single_menu_div d-flex align-items-center justify-content-center"
                    :class="{'shadow-sm':menu.is_active,'mr-1':(index+1!==menu_list.length)}"
                    style="border-radius:14px;cursor:pointer;"
                    @click="menu_list.map((m)=>m.is_active = false);menu.is_active=true;searchByMenuTitle(menu.id)"
                    :style="(menu.is_active)?'color:#6200ee;background:white;':''"
                >
                    {{ menu.title }}
                </div>
            </div>
        </div>
        <startup-cards
            :investors="custom_investors">
        </startup-cards>
    </div>
</div>
</template>
<script>
export default{
    props:{
        investors:Array,
        types:Array,
    },
    data(){
        return{
            custom_investors:[],
            menu_list:[
                {
                    title:'All',
                    is_active:true,
                    url:""
                },
            ],
        }
    },
    created(){
        this.setCustomMenuList()
        this.custom_investors=this.investors
    },
    methods:{
        setCustomMenuList(){
            this.types.map((type)=>{
                let object = type
                object.is_active = false
                object.url = "/startup/dashboard?type="+type.id
                this.menu_list.push(object)
            })
        },
        searchByMenuTitle(menu_id){
            let is_menu_id_exists = (menu_id !== undefined)?'?type='+menu_id:''

            axios.get('/startup/dashboard/cards'+is_menu_id_exists)
            .then((response)=>{
                this.custom_investors = response.data
            })
        },
    },
}
</script>
<style>
.single_menu_div:hover{
    background:#b3b3b3;
}
</style>
