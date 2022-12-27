<template>
<div>
	<div
		class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4 row m-0 mt-3 investor-startup-card"
		v-for="(data, index) in startups"
		:key="index+data.startup.name"
	>
		<div class="w-100 d-flex flex-column justify-content-between bg-white p-4 h-100">
            <div>
                <div style="min-height:56px;">
                    <img
                        :src="isImageExists(data.startup.logo)"
                        class="investor-dashboard-card-image"
                        alt="Logo"
                    >
                </div>
                <div class="font-weight-bold mt-2" style="font-size:20px;word-break: break-word;">
                    {{ data.startup.name }}
                </div>
                <div
                    v-if="data.startup.description"
                    class="mt-2 mb-2"
                    style="font-size:15px;color:#8c8c8c;word-break: break-word;"
                >
                    {{ data.startup.description.slice(0,50) }} {{data.startup.description.length>50?'...':''}}
                </div>
            </div>
            <div>
                <div class="d-flex flex-wrap">
                    <div
                        style="color:#6200EE;font-size:15px;"
                        class="pt-1 pl-1 pr-1"
                        v-if="tag.industry"
                        v-for="tag in data.startup.startup_industries"
                    >
                        #{{ tag.industry.title }}
                    </div>
                </div>
                <div style="color:#6200EE;" class="d-flex pt-3">
                    <multiselect
                        :id="'investor_startup_multiselect'+index"
                        class="investor_startup_multiselect"
                        :value="data?.status.id > 0?data?.status:null"
                        track-by="id"
                        label="status"
                        @input="(event)=>changeStatus(event ,data.startup_id, data.investor_id)"
                        :options="statuses.slice(1,statuses.length)"
                        :multiple="false"
                    ></multiselect>
                </div>
            </div>
		</div>
	</div>
</div>
</template>
<script>
export default{
	props:{
		startups:Array,
        statuses:Array,
	},
	data(){
		return{
			value: [10000,15000],
            status:'',
			input:{},
		}
	},
	methods:{
        findListItemByID(id, obj) {
            return id === obj.id
        },
        changeStatus(event, startup_id, investor_id){
            console.log(event, startup_id, investor_id)
            axios.post('/investor/dashboard/change/startup/status', {
                startup_id: startup_id,
                investor_id: investor_id,
                status_id: event.id,
            }).then(()=>{
                this.status = event.status
            })
        },
	},
};
</script>
<style>
.investor-startup-card .bg-white{
	border-radius:36px;
	height:30vh;
}
.investor_startup_multiselect .multiselect__single{
	color:black!important;
	background:#f2f2f7!important;
}
.investor_startup_multiselect .multiselect__tags{
	background:#f2f2f7!important;
	border-color:rgba(0, 0, 0, 0.12)!important;
	border-radius:16px!important;
	color:rgba(0, 0, 0, 0.12)!important;
}
</style>
