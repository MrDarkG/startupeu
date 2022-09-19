Vue.mixin({
    data(){
        return {
            customToolbar: [
                [{ 'font': [] }],
                [{ 'header': [false, 1, 2, 3, 4, 5, 6, ] }],
                // [{ 'size': ['small', false, 'large', 'huge'] }],
                ['bold', 'italic', 'underline', 'strike'],
                [{'align': ''}, {'align': 'center'}, {'align': 'right'}, {'align': 'justify'}],
                [{ 'header': 1 }, { 'header': 2 }],
                // ['blockquote', 'code-block'],
                ['blockquote'],
                [{ 'list': 'ordered'}, { 'list': 'bullet' }, { 'list': 'check' }],
                // [{ 'script': 'sub'}, { 'script': 'super' }],
                [{ 'indent': '-1'}, { 'indent': '+1' }],
                [{ 'color': [] }, { 'background': [] }],
                // ['link', 'image', 'video', 'formula'],
                ['link'],
                // [{ 'direction': 'rtl' }],
                ['clean'],
            ],
        }
    },
    methods:{
        changeUserType(type){
            axios.get("/change_user_type/"+type)
        },
        setClassByValue(input, is_multiselect=false, button=false){
            if (button) {
                let bol = (is_multiselect)?{
                    border:'solid 1.5px red!important',
                    borderRadius:'5px'
                }:'border-danger'

                let is_array = (Array.isArray(input) && input.length === 0)?bol:''
                return (input !== null && input !== "" && input !== " ")?is_array:bol
            }
        },
        checkStringValidation(array){
            let counter = 0
            array.map((str, index)=>{
                if(Array.isArray(str) && str.length > 0){
                    counter+=1
                }else if(str !== undefined && str !== null && str !== ""){
                    counter+=1
                }
            })
            console.log(counter, array.length)
            return counter === array.length
        },
        isInputsValid(input){
            let array = []
            Object.entries(input).map((value ,key)=>{
                let val = value[1]
                if (val.is_required === undefined) {
                    if(Array.isArray(val) && !val instanceof Object){
                        array.push(val[1])
                    }else if(val instanceof Object){
                        Object.entries(val).map((v, index)=>{
                            if(v[1] instanceof Object){
                                Object.entries(v[1]).map((v_2)=>{
                                    array.push(v_2[1])
                                })
                            }else{
                                array.push(v[1])
                            }
                        })
                    }else{
                        array.push(val)
                    }
                }
            })
            return this.checkStringValidation(array)
        },
        sendToSave(url ,inputs ,div_class=null ,redirect=undefined){
            if(this.isInputsValid(inputs)){
                axios.post(url ,inputs)
                .then((response)=>{
                    console.log('წარმატებით დაემატა!')
                    if(redirect){
                        window.location.replace(redirect)
                    }
                }).catch(()=>{
                    console.log('წარუმატებელი მოთხოვნა!')
                    this.$modal.hide('add_investment_opportunities')
                })
            }else{
                if(div_class){
                    document.getElementsByClassName(div_class)[0].scrollTo(0,0)
                }
            }
        },
    }
})
