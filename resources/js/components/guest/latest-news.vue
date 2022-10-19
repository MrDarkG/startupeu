<template>
<div class="row pr-2 pl-2">
	<div
		v-for="(item, item_i) in news"
		:class="{
			'p-4':item_i > 0,
			'pl-4 pr-4':item_i < 1,
			'col-md-12':item_i < 1,
			'col-md-4':item_i > 0,
		}"
	>
		<a :href="`/news/${item.title.replace(/[\/.#\\ \s]/g,'-')}.${item.id}`">
			<div class="bg-white row h-100 rounded-2 overflow-hidden" style="box-shadow: 0px 4px 32px rgb(0 0 0 / 16%);">
				<div class="p-0 rounded rounded-2"
					:class="{
						'col-md-6':item_i < 1,
						'col-md-12':item_i > 0,
					}"
				>
					<img class="col-md-12 p-0" :src="`/uploads/${item.image}`" :alt="item.image">
				</div>
				<div
					class="col-md-6 d-flex pl-4 pr-4 pt-3 pb-3 flex-column align-items-start justify-content-start"
					:class="{
						'col-md-6':item_i < 1,
						'col-md-12':item_i > 0,
					}"
				>
					<div v-if="item.created_at" class="text-black-50">
						{{ setCustomDate(item.created_at) }}
					</div>
					<div class="pt-2">
						<b>
							<h4 class="m-0 p-0" v-text="item.title"></h4>
						</b>
					</div>
					<div class="pt-2">
						<h6 class="text-black-50" v-html="item.description"></h6>
					</div>
				</div>
			</div>
		</a>
	</div>
</div>
</template>
<script>
export default{
	props:['news'],
	methods:{
		setCustomDate(date){
			const today = new Date(date)
			// today.toLocaleString('default',{ month: 'long' })
			let string = today.toDateString()
			string = string.replace(string.slice(0, 3),'')
			string = string.replace(string.slice(0, 7),string.slice(0, 7)+',')
			return string
		},
	},
}
</script>
<style>
.rounded-2{
	border-radius: 1.5rem!important;
}
</style>
