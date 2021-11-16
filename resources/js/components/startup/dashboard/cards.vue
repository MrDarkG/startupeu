<template>
	<div>
        <div class="tab-content clearfix ui-tabs-panel ui-corner-bottom ui-widget-content" id="tabs-0" aria-labelledby="ui-id-1" role="tabpanel" aria-hidden="false" v-if="investors.length>0">
            <div class="dash-list">
            	<a :href="`/startup/dashboard/apply/${investor.id}`" v-for="investor in investors">
	                <div class="item row" >
	                	<div class="col-md-9 d-flex">
	                    	<img src="https://startupcentraleurasia.com/./uploads/photos/cache/2021-05/c7c90dee1ccdff6b236f115060aca782.png" alt="Logo">
		                    <div class="txts">
		                        <div class="title">
		                            {{ investor.company_name }} - {{ investor.name }}
		                        </div>
		                        <div class="desc">
		                            {{ investor.about }}
		                        </div>
		                    </div>
	                	</div>
	                    <div class="right col-md-3 d-flex justify-content-center align-items-center flex-column">
	                        <div class="range">
	                            <p>Investment range:</p>
	                            <span>10000-20000</span>
	                        </div>
	                        <a href="https://startupcentraleurasia.com/en/investors/v/1/27" class="btn">
	                            Apply for investment
	                        </a>
	                    </div>
	                </div>
                </a>
            </div>
        </div>
    </div>
</template>
<script>
	export default {
		props:{
        	investors:Array,

		},
		created(){
	        // this.setCustomMenuList()
	        // this.custom_investors=this.investors
	    },
	};
</script>