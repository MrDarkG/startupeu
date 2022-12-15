<template>
<div class="dash-container">
	<div class="account-info" style="padding-right:14px;">
		<startup-account-menu
            :menu_list="menu_list"
            @getActive="setActiveMenu"
		></startup-account-menu>
        <div style="margin-top: 15px;" v-if="menu_list[0].is_active">
            <general-info
                :startup="startup"
                :data="data"
            ></general-info>
        </div>
        <div class="ment-box box-active sign-form" v-if="menu_list[1].is_active">
            <div class="col-md-12 additional-form p-0">
                <additional-info>
				</additional-info>
            </div>
        </div>
    </div>
</div>
</template>
<script>
export default{
    props:["startup","data"],
    data(){
        return{
            menu_list:[
                {
                    title:"General Info",
                    id:"general",
                    is_active:true,
                },
                {
                    title:"Additinal Info",
                    id:"additional",
                    is_active:false,
                },
                {
                    title:"Team Info",
                    id:"team_info",
                    is_active:false,
                },
            ],
        }
    },
    methods:{
        setActiveMenu(id){
            this.menu_list.map((menu)=>{
                menu.is_active = false
                if (menu.id === id) {
                    menu.is_active = true
                }
            })
        },
    }
};
</script>
