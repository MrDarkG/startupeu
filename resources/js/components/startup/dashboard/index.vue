<template>
<div class="dash-container">
    <!-- <p class="alert alert-success">Startup add successfully </p>             -->
    <div class="title">Investment Oportunities </div>
    <div class="desc">
        Find investment opportunities from leading Venture Funds, Angels and Accelerators, apply with one click.            
    </div>
    <div class="tabs tabs-bordered ui-tabs ui-corner-all ui-widget ui-widget-content">
        <div class="container ml-3 pl-0">
            <div class="row p-1" style="background:#d8d8dc;border-radius:16px;width:70%;">
                <div  
                    v-for="(menu, index) in menu_list" 
                    class="text-center col-sm p-2 single_menu_div" 
                    :class="{'shadow-sm':menu.is_active,'mr-1':(index+1!==menu_list.length)}" 
                    style="border-radius:14px;cursor:pointer;"
                    @click="menu_list.map((m)=>m.is_active = false);menu.is_active=true"
                    :style="(menu.is_active)?'color:#6200ee;background:white;':''"
                >
                    {{ menu.title }}
                </div>
            </div>
        </div>
        <div>
            <div class="tab-content clearfix ui-tabs-panel ui-corner-bottom ui-widget-content" id="tabs-0" aria-labelledby="ui-id-1" role="tabpanel" aria-hidden="false">
                <div class="dash-list">
                    <div class="item d-flex" v-for="investor in investors">
                        <img src="https://startupcentraleurasia.com/./uploads/photos/cache/2021-05/c7c90dee1ccdff6b236f115060aca782.png" alt="Logo">
                        <div class="txts">
                            <div class="title">
                                {{ investor.company_name }} - {{ investor.name }}
                            </div>
                            <div class="desc">
                                {{ investor.about }}
                            </div>
                        </div>
                        <div class="right">
                            <div class="range">
                                <p>Investment range:</p>
                                <span>10000-20000</span>
                            </div>
                            <a href="https://startupcentraleurasia.com/en/investors/v/1/27" class="btn">
                                Apply for investment
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>
<script>
export default{
    props:{
        investors:Array,
    },
    data(){
        return{
            menu_list:[
                {
                    title:'All',
                    is_active:true
                },
                {
                    title:'Venture Funds',
                    is_active:false
                },
                {
                    title:'Angels',
                    is_active:false
                },
                {
                    title:'Accelerators',
                    is_active:false
                },
            ],
        }
    }
}
</script>
<style>
.single_menu_div:hover{
    background:#b3b3b3;
}
</style>