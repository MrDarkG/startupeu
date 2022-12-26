<template>
<div class="dash-container">
	<div class="account-info" style="padding-right:14px;">
        <div class="row m-0">
            <startup-account-menu
                class="col-md-6 p-0"
                :is_editable="true"
                :menu_list="menu_list"
                @getActive="setActiveMenu"
            ></startup-account-menu>
            <div
                class="col-md-6 d-flex align-items-center justify-content-center justify-content-sm-center justify-content-md-end mt-3 mt-sm-3 mt-md-0"
            >
                <div>
                    <button
                        class="btn btn-6200EE d-flex align-items-center pl-3 pr-3 pt-2 pb-2"
                        style="border-radius:15px;"
                        @click="setEditButtonTitle(edit_button.title, edit_button.is_active = !edit_button.is_active)"
                    >
                        <img src="/assets/images/edit-logo.svg">
                        <span class="pl-2 pr-1" style="color:#03DAC5;">Edit {{ edit_button.title }} Info</span>
                        <img height="17" src="/assets/images/right-arrow.svg">
                    </button>
                </div>
            </div>
        </div>
        <div
            style="margin-top: 15px;"
            v-if="menu_list[0].is_active"
        >
            <general-info
                @setEditButtonTitle="setEditButtonTitle"
                :edit_button="edit_button"
                :startup="startup"
                :data="data"
            ></general-info>
        </div>
        <div class="ment-box box-active sign-form" v-if="menu_list[1].is_active">
            <div class="col-md-12 additional-form p-0">
                <additional-info
                    :startup="startup"
                    @setEditButtonTitle="setEditButtonTitle"
                    :edit_button="edit_button"
                ></additional-info>
            </div>
        </div>
        <div class="ment-box box-active sign-form" v-if="menu_list[2].is_active">
            <div class="col-md-12 p-0" style="border-top:solid 1px rgba(0, 0, 0, 0.12);">
                <startup-team-info
                    @setEditButtonTitle="setEditButtonTitle"
                    :edit_button_active="edit_button.is_active"
                    :teamates="startup.teamates"
                ></startup-team-info>
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
            edit_button:{
                title:"Profile",
                is_active:true,
            },
            menu_list:[
                {
                    title:"General Info",
                    id:"general",
                    is_active:false,
                },
                {
                    title:"Additinal Info",
                    id:"additional",
                    is_active:true,
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
        setEditButtonTitle(value = "Profile", attr = "title"){
            this.edit_button[attr] = value
        },
        setActiveMenu(id){
            this.edit_button.is_active = true
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
