<template>
<div>
	<div
		class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4 row m-0 mt-3 investor-startup-card"
		v-for="(startup, index) in startups"
		:key="index+startup.name"
	>
		<div class="w-100 d-flex flex-column justify-content-between bg-white p-4 h-100">
            <div>
                <div>
                    <img style="height:56px;border-radius:16px;" :src="startup.logo" alt="Logo">
                </div>
                <div class="font-weight-bold mt-2" style="font-size:20px;word-break: break-word;">
                    {{ startup.name }}
                </div>
                <div v-if="startup.description" class="mt-2 mb-2" style="font-size:15px;color:#8c8c8c;word-break: break-word;">
                    {{ startup.description }}
                </div>
            </div>
            <div>

                <div class="d-flex flex-wrap">
                    <div
                        style="color:#6200EE;font-size:15px;"
                        class="pt-1 pl-1 pr-1"
                        v-if="tag.industry"
                        v-for="tag in startup.startup_industries"
                    >
                        #{{ tag.industry.title }}
                    </div>
                </div>
                <div style="color:#6200EE;" class="d-flex">
                    <multiselect
                        :id="'investor_startup_multiselect'+index"
                        class="investor_startup_multiselect"
                        v-model="input['multiselect'+index]"
                        track-by="name"
                        label="name"
                        @input="setUserStatus($event, index)"
                        :options="startups"
                        :multiple="false"
                    >
                    </multiselect>
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
	},
	data(){
		return{
			value: [10000,15000],
			input:{

			},
		}
	},
	methods:{
		setUserStatus(event, index){
			console.log(event.name, index)
		}
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
