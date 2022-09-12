<template>
<div>
    <div class="chek-list" v-for="(list, index) in data" :key="index+'list'">
        <div class="title">{{ list.title }}</div>
        <ul>
            <li v-for="response in list.data" :key="response.id+response.title">
                <div class="form-check">
                    <input @[event]="setCustomUrl" class="form-check-input country-check" type="checkbox" :id="response.id+response.title" :disabled="response.is_disabled">
                    <label class="form-check-label" :for="response.id+response.title">
                        {{ response.title }}
                    </label>
                </div>
            </li>
        </ul>
    </div>
</div>
</template>
<script>
export default{
	props:['data'],
    data(){
        return{
            event:null,
        }
    },
    created(){
        this.event = 'change'
    },
	methods:{
        getSelectedFilters(){
            let filters = []
            this.data.map((data)=>{
                if (data.data){
                    data.data.map((filter)=>{
                        let object = filter
                        object.checked = document.getElementById(filter.id+filter.title).checked
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
