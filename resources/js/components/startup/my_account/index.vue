<template>
<div class="dash-container">
	<div class="account-info" style="padding-right:14px;">
		<startup-account-menu
            :menu_list="menu_list"
            @getActive="setActiveMenu"
		>
		</startup-account-menu>
        <div style="margin-top: 15px;" v-if="menu_list[0].is_active"> 
            <general-info>
            </general-info>
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
import 'vue-multiselect/dist/vue-multiselect.min.css'
import Multiselect from 'vue-multiselect'
import VModal from 'vue-js-modal'

Vue.component('multiselect', Multiselect)
Vue.use(VModal, { componentName: 'modal',dynamicDefault: { draggable: true, resizable: false }  })

export default{
    data(){
        return{
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