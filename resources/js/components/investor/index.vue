<template>
<div>
	<div class="dash-container">
	    <!-- <p class="alert alert-success">Startup add successfully </p>             -->
	    <div class="mr-3 ml-3">
	    	<div class="title">Startups</div>
	    	<div class="desc">
                Nunc sed enim imperdiet mauris mattis netus diam. Ullamcorper leo est leo tincidunt enim aliquam.
            </div>
	    </div>
	    <div class="tabs tabs-bordered ui-tabs ui-corner-all ui-widget ui-widget-content mt-5">
	        <div class="bg-white p-3 d-flex flex-wrap align-items-center justify-content-between mr-0 ml-0 mr-sm-0 ml-sm-0  ml-md-3 mr-md-3" style="border-radius:24px;">
	        	<div class="d-flex flex-wrap mt-1 col-md-5 align-items-center">
	        		<div class="col-md-4">
	        			<input type="checkbox" id="new"/>
	        			<label for="new">New</label>
	        		</div>
	        		<div class="col-md-4">
	        			<input type="checkbox" id="selected"/>
	        			<label for="selected">Selected</label>
	        		</div>
	        		<div class="col-md-4">
	        			<input type="checkbox" id="funded"/>
	        			<label for="funded">Funded</label>
	        		</div>
	        	</div>
	        	<div>
	        		<button @click="$modal.show('add_investment_opportunities')" class="btn text-white p-2" style="background:#6200ee;border-radius:16px;">
	        			<span class="text-white" style="font-size:16px;">+</span> Add Investment Oportunities
	        		</button>
	        	</div>
	        </div>
	        <investor-startup-cards
	        	class="mt-4 d-flex flex-wrap justify-content-between"
	        	:startups="startups"
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
			value:[10000,15000],
		}
	}
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
