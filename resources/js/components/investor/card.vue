<template>
<div>
	<div 
		class="col-md-3 investor-startup-card" 
		:class="{'pl-2':(index === 0),'pr-0':(index === startups.length-1)}" 
		v-for="(startup, index) in startups" 
		:key="index+startup.name"
	>
		<div class="d-flex flex-column justify-content-between bg-white p-4">
			<div>
        		<img style="height:56px;border-radius:16px;" src="https://startupcentraleurasia.com/./uploads/photos/cache/2021-05/c7c90dee1ccdff6b236f115060aca782.png" alt="Logo">
			</div>
			<div>
				{{ startup.name }}
			</div>
			<div v-if="startup.description">
				{{ startup.description }}
			</div>
			<div class="d-flex flex-wrap">
				<div style="color:#6200EE;" class="col-4">
					#tags
				</div>
				<div style="color:#6200EE;" class="col-4">
					#tags
				</div>
				<div style="color:#6200EE;" class="col-4">
					#tags
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