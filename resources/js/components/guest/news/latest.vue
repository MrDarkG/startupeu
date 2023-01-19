<template>
<div class="row pr-2 pl-2">
	<div
		v-for="(item, item_i) in news"
		class="col-md-12 pl-4 pr-4"
        v-if="item_i < 1"
        :style="{
            height:'280px'
        }"
	>
		<a :href="`/news/${item.title.replace(/[\/.#\\ \s]/g,'-')}.${item.id}`">
			<div class="bg-white row h-100 rounded-2 overflow-hidden" style="box-shadow: 0px 4px 32px rgb(0 0 0 / 16%);">
				<div class="p-0 rounded rounded-2 col-md-6">
					<img
                        class="col-md-12 h-100 p-0"
                        :src="`/uploads/${item.image}`" :alt="item.image"
                    >
				</div>
				<div
					class="col-md-6 d-flex pl-4 pr-4 pt-3 pb-3 flex-column align-items-start justify-content-between"
				>
					<div v-if="item.created_at" class="text-black-50">
						{{ setCustomDate(item.created_at) }}
					</div>
					<div class="pt-2">
						<b>
							<h4 class="m-0 p-0" v-text="item.title" style="font-size: 22px!important;"></h4>
						</b>
					</div>
					<div class="pt-2">
						<h6 class="text-black-50 latestnews-desc" v-html="item.description" style="font-size:16px!important;"></h6>
					</div>
				</div>
			</div>
		</a>
	</div>
    <news-card
        class="col-12 col-sm-12 mt-3 col-md-6 col-lg-4"
        v-else
        :item="item"
    ></news-card>
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
.latestnews-desc p ,p span{
    font-size: 16px!important;
    margin-top:0px!important;
    line-height: 22px!important;
    color: #666666!Important;
}
</style>
