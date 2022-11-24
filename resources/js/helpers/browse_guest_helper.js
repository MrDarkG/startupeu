Vue.mixin({
    methods:{
        setShortDescription(string,length = 172){
            return (string.length > length)?string.slice(0,length-3)+' ...':string
        },
        setCustomData(variable, push_variable = 'data'){
            if(this[variable].data){
                this[variable].data.map((item)=>{
                    item['is_disabled']
                    this[push_variable].push(item)
                })
            }else{
                this[variable].map((item)=>{
                    item['is_disabled'] = false
                    this[push_variable].push(item)
                })
            }
        },
        setSearchedData(input, var_name = "data"){
            let var_attrs = ['title','name','facebook','telegram']
            this[var_name].map((item)=>{
                item.is_disabled = true
                var_attrs.map((arr)=>{
                    if(item[arr]){
                        if(item[arr].toLowerCase().includes(input.toLowerCase())){
                            item.is_disabled = false
                        }
                    }
                })
            })
        },
    }
})
