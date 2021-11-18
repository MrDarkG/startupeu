<template>
<div>
	<div 
		class="col-md-3 investor-startup-card" 
		:class="{'pl-2':(index === 0),'pr-0':(index === startups.length-1)}" 
		v-for="(startup, index) in startups" 
		:key="index+startup.name"
	>
		<div class="bg-white">
			{{ startup.name }}
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

		}
	},
};
</script>
<style>
.investor-startup-card div{
	border-radius:36px;
	height:25vh;
}
</style>