<template>
	<div>
        <div
            class="mb-4"
            id="tabs-0"
            aria-labelledby="ui-id-1"
            role="tabpanel"
            aria-hidden="false"
            v-if="investors_data?.length>0"
        >
            <div
                class="bg-white mt-4"
                v-for="investor in investors_data"
                style="border-radius: 26px;"
            >

                <div class="row m-0">
                    <a
                        :href="`/startup/dashboard/apply/${investor.id}`"
                        class="col-md-9 row m-0 mt-3 mb-3 border-right border-sm-none"
                    >
                        <div class="pl-2 pr-2 col-md-3 d-flex justify-content-center justify-content-sm-start">
                            <img
                                :src="investor.logo"
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
                    </a>
                    <div
                        class="col-md-3 mt-3 mb-3 d-flex justify-content-between align-items-center flex-column"
                    >
                        <div class="d-flex flex-column justify-content-start align-items-center">
                            <p  style="font-size: 15px;" class="m-0">Investment range:</p>
                            <span style="font-size:20px;color:#03DAC5;">
                                {{ investor.ranges.title.replace(" -", "$ -") }}$
                            </span>
                        </div>
                        <div
                            :class="setClassById(investor.apply_status?.status?.id)"
                            @click="applyForInvestment(investor.id, startup_id)"
                            class="btn w-100 pl-3 pr-3 pb-2 pt-2 font-weight-bold startup-dashboard-apply-btn"
                        >
                            {{ investor.apply_status?.status?.status??'Apply for investment' }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
	export default {
		props:{
        	investors:Array,
            startup_id:Number,
		},
        data(){
          return {
              investors_data:this.investors,
          }
        },
        methods:{
            applyForInvestment(investor_id, startup_id){
                axios.post('/startup/dashboard/change/startup/status',{
                    investor_id:investor_id,
                    startup_id:startup_id,
                    status_id:1,
                }).then((response)=>{
                    this.investors_data?.map((investor)=>{
                        if(investor_id==investor?.id){
                            investor.apply_status = response.data
                        }
                    })
                })
            },
            setClassById(status_id){
                if(status_id === 1){
                    return 'startup-apply-btn-pending'
                }else if(status_id === 2){
                    return "startup-apply-btn-selected"
                }else if(status_id === 3){
                    return "btn btn-danger"
                }
                return "startup-apply-btn-default"
            },
        }
	};
</script>
