<template>
<div>
	<div class="dash-container ml-3">
	    <!-- <p class="alert alert-success">Startup add successfully </p>             -->
	    <div>
	    	<div class="title">Investment Oportunities </div>
	    	<div class="desc">
	        	Find investment opportunities from leading Venture Funds, Angels and Accelerators, apply with one click.            
	    	</div>
	    </div>
	    <div class="tabs tabs-bordered ui-tabs ui-corner-all ui-widget ui-widget-content mt-5">
	        <div class="bg-white p-3 d-flex flex-wrap align-items-center justify-content-between" style="border-radius:24px;">
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
	        		<button class="btn text-white p-2" style="background:#6200ee;border-radius:16px;">
	        			<span class="text-white" style="font-size:16px;">+</span> Add Investment Oportunities
	        		</button>
	        	</div>
	        </div>
	        <investor-startup-cards 
	        	class="mt-4 d-flex flex-wrap justify-content-between"
	        	:startups="custom_investors">
	        </investor-startup-cards>
	    </div>
	</div>
</div>
</template>
<script>
export default{
	data(){
		return {
			custom_investors:[
				{name:1},
				{name:2},
				{name:3},
				{name:4},
			],
		}
	}
};
</script>