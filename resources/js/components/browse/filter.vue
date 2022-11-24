<template>
<div>
    <div class="chek-list"
         v-for="(list, index) in data"
         :key="index+'list'"
         v-if="list.data"
    >
        <div
            class="title"
        >
            {{ list.title }}
        </div>
        <ul>
            <li
                v-for="(response) in list.data.slice(0,(show[index].show_more)?list.data.length:3)"
                :key="response.id+response.title"
            >
                <div class="form-check">
                    <input
                        @[event]="setCustomUrl"
                        class="form-check-input country-check"
                        type="checkbox"
                        :id="response.id+response.title"
                        :disabled="response.is_disabled"
                    >
                    <label class="form-check-label" :for="response.id+response.title">
                        {{ response.title }}
                    </label>
                </div>
            </li>
        </ul>
        <div
            class="mb-3 pb-3 border-bottom font-weight-bold text-underline text-center cursor-pointer"
            @click="show[index].show_more = !show[index].show_more"
            v-if="show[index] && show[index].item_quantity > 3"
        >
            Show <span v-if="!show[index].show_more">more</span><span v-else>less</span>
        </div>
    </div>
</div>
</template>
<script>
export default{
	props:['data'],
    data(){
        return{
            event:null,
            show:[],
        }
    },
    created(){
        this.event = 'change'
        this.setShow()
    },
	methods:{
        setShow(){
          this.data.map((item)=>{
            this.show.push({
                title:item.title,
                item_quantity:(item.data)?item.data.length:0,
                show_more:false,
            })
          })
        },
        getSelectedFilters(){
            let filters = []
            this.data.map((data)=>{
                if (data.data){
                    data.data.map((filter)=>{
                        let object = filter
                        let checkbox = document.getElementById(filter.id+filter.title)
                        object.checked = (checkbox)?checkbox.checked:false
                        object.url = data.prop+filter.id
                        filters.push(object)
                    })
                }
            })
            return filters.filter((filter)=>filter.checked)
        },
        setCustomUrl(){
            this.$emit('getSelectedFilters', this.getSelectedFilters())
        }
    },
};
</script>
