<template>
<div>
	<div class="dash-container pr-2">
	    <!-- <p class="alert alert-success">Startup add successfully </p>             -->
	    <div class="mr-3 ml-3">
	    	<div class="title">Startups</div>
	    	<div class="desc">
                Nunc sed enim imperdiet mauris mattis netus diam. Ullamcorper leo est leo tincidunt enim aliquam.
            </div>
	    </div>
	    <div class="tabs tabs-bordered ui-tabs ui-corner-all ui-widget ui-widget-content mt-5">
	        <div class="bg-white p-3 d-flex flex-wrap align-items-center justify-content-between mr-0 ml-0 mr-sm-0 ml-sm-0  ml-md-0 mr-md-3" style="border-radius:24px;">
	        	<div class="d-flex flex-wrap mt-1 col-12 col-sm-12 col-lg-7 align-items-center">
	        		<div class="col-12 col-sm-4 col-md-4 p-0" v-for="(item, i_index) in statuses">
                        <div class="d-flex">
                            <input type="checkbox" @change="addOrDeleteFilter($event, i_index, item)" :id="item.status"/>
                            <label
                                class="m-0 pl-1"
                                :for="item.status"
                                v-text="(i_index>0)?item.status:'New'"
                            ></label>
                        </div>
	        		</div>
	        	</div>
	        	<div v-if="false">
	        		<button @click="$modal.show('add_investment_opportunities')" class="btn text-white p-2" style="background:#6200ee;border-radius:16px;">
	        			<span class="text-white" style="font-size:16px;">+</span> Add Investment Oportunities
	        		</button>
	        	</div>
	        </div>
	        <investor-startup-cards
	        	class="mt-4 row m-0"
	        	:startups="custom_startups"
                :statuses="statuses"
            ></investor-startup-cards>
	    </div>
	</div>
	<modal class="add_investment_opportunities" name="add_investment_opportunities">
		<div style="position:relative;" class="d-flex justify-content-end p-1">
			<div class="position-fixed bg-danger text-white d-flex justify-content-center align-items-center" @click="$modal.hide('add_investment_opportunities')" style="height:30px;width:30px;z-index:10000;border-radius:5px;font-weight:bold;cursor:pointer;">
				X
			</div>
		</div>
		<investment-register>
		</investment-register>
	</modal>
</div>
</template>
<script>
export default{
    props:['startups','statuses'],
	data(){
		return {
            custom_startups:[],
            selected:{
                statuses:[],
            },
			value:[10000,15000],
		}
	},
    created(){
        this.setCustomStartups()
    },
    methods:{
        setCustomStartups(){
            this.startups.map((startup)=>{
                startup.is_active = true
                this.custom_startups.push(startup)
            })
        },
        setCardsByStatus(statuses){
            this.custom_startups.map((startup)=>{
                startup.is_active = (statuses.length>0)?false:true
                statuses.map((status)=>{
                    if(startup.status.id === status.id){
                        startup.is_active = true
                    }
                })
            })
        },
        addOrDeleteFilter(event, index, item){
            let status = this.selected.statuses.findIndex((i)=>i.id === item.id)
            if(event.target.checked){
                this.selected.statuses.push(item)
            }else{
                this.selected.statuses.splice( status, 1)
            }
            this.setCardsByStatus(this.selected.statuses)
        },
    },
};
</script>
<style>
.add_investment_opportunities .vm--modal{
	overflow-y:auto;
	top:15px!important;
	left:15px!important;
	width:98%!important;
	height:97vh!important;
	background:#ebebeb;
}
</style>
