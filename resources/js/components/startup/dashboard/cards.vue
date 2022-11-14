<template>
	<div>
        <div
            class="mb-4"
            id="tabs-0"
            aria-labelledby="ui-id-1"
            role="tabpanel"
            aria-hidden="false"
            v-if="investors.length>0"
        >
            <div
                class="bg-white mt-4"
                v-for="investor in investors"
                style="border-radius: 26px;"
            >
            	<a :href="`/startup/dashboard/apply/${investor.id}`">
	                <div class="row m-0">
	                	<div class="col-md-9 row m-0 mt-3 mb-3 border-right border-sm-none">
                            <div class="pl-2 pr-2 col-md-3 d-flex justify-content-center justify-content-sm-start">
                                <img
                                    :src="'/investor/'+investor.logo"
                                    alt="Logo"
                                    class=""
                                    style="border-radius: 36px;height:120px;width:120px!important;"
                                >
                            </div>
		                    <div class="pb-0 pt-0 mt-0 mb-0 pt-2 pb-2 col-md-9">
		                        <div class="title d-flex justify-content-center justify-content-sm-start" style="overflow: hidden;font-size:20px;">
		                            {{ investor.company_name }} - {{ investor.name }}
		                        </div>
		                        <div class="desc d-flex justify-content-center justify-content-sm-start" style="font-size:15px;">
		                            {{ investor.about }}
		                        </div>
		                    </div>
	                	</div>
	                    <div
                            class="col-md-3 mt-3 mb-3 d-flex justify-content-between align-items-center flex-column"
                        >
	                        <div class="d-flex flex-column justify-content-start align-items-center">
	                            <p  style="font-size: 15px;" class="m-0">Investment range:</p>
	                            <span style="font-size:20px;color:#03DAC5;">
                                    {{ investor.ranges.title.replace(" -", "$ -") }}$
                                </span>
	                        </div>
	                        <a
                                href="https://startupcentraleurasia.com/en/investors/v/1/27"
                                class="btn pl-3 pr-3 pb-2 pt-2 font-weight-bold"
                                style="background:#6200EE;color:white;border-radius:16px;"
                            >
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
        methods:{
        }
	};
</script>
