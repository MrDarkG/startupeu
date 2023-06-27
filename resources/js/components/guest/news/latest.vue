<template>
<div class="row pr-2 pl-2">
	<div
		v-for="(item, item_i) in news"
        class="col-md-12 pl-4 pr-4"
        :class="{
            'col-sm-12 mt-3 col-md-6 col-lg-4':item_i > 0 || item_i === 0 && !checkScreenSize()
        }"
        :style="{
            height:'280px'
        }"
	>
		<a
            :href="`/news/${item.id}`"
            class="p-4"
        >
			<div class="bg-white row h-100 rounded-2 overflow-hidden" style="box-shadow: 0px 4px 32px rgb(0 0 0 / 16%);">
				<div
                    :class="{
                        'col-md-6':item_i === 0 && checkScreenSize(),
                        'col-md-12':item_i > 0
				    }"
                    class="p-0 rounded rounded-2"
                >
					<img
                        class="col-md-12 h-100 p-0"
                        :src="`/uploads/${item.image}`" :alt="item.image"
                    >
				</div>
				<div
					class="col-md-6 d-flex pl-4 pr-4 pt-3 pb-3 flex-column align-items-start h-100 justify-content-between"
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
</div>
</template>
<script>
export default{
	props:['news'],
	methods:{
        checkScreenSize(){
            return document.querySelector('#app').clientWidth > 768?true:false
        },
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
