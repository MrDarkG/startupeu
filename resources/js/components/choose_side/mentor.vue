<template>
<div>
    <div class="sign-title">
        Mentor Registration         
    </div>
    <div class="sign-desc">
        Plan your mentorship sessions easily        
    </div>
    <div class="sign-form" id="startup-form">
        <div class="row">
            <div class="col-md-6">
                <label for="full_name">Full Name</label>
                <input type="text" id="full_name" name="full_name" v-model="input.name" :class="setClassByValue(input.name)" class="form-control" placeholder="Full Name">
            </div>
            <div class="col-md-6">
                <label for="linkedin_address">Linkedin profile</label>
                <input type="text" id="linkedin_address" name="linkedin_address" v-model="input.linkedin" :class="setClassByValue(input.linkedin)" class="form-control" placeholder="Linkedin profile">
            </div>
            <div class="col-md-12">
                <label for="experience_text">What experience do I have and what proccesses did I improve?</label>
                <textarea name="experience_text" v-model="input.experience" :class="setClassByValue(input.experience)" id="experience_text" cols="30" rows="10" class="form-control h160" placeholder="Type here"></textarea>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="country_id">Country</label>
                    <multiselect
                        id="country_id"
                        v-model="input.country"
                        :style="setClassByValue(input.country,true)"
                        track-by="name" 
                        label="name"
                        :options="countries"
                        :multiple="false"
                    >
                    </multiselect>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="fields_consult_id">Which fields can you consult in?</label>
                    <multiselect
                        id="fields_consult_id"
                        v-model="input.which.field"
                        :style="setClassByValue(input.which.field,true)"
                        track-by="name" 
                        label="name"
                        :options="countries"
                        :multiple="false"
                    >
                    </multiselect>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="issues_consult_id">Which issues can you consult on?</label>
                    <multiselect
                        id="issues_consult_id"
                        v-model="input.which.issue"
                        :style="setClassByValue(input.which.issue,true)"
                        track-by="name" 
                        label="name"
                        :options="countries"
                        :multiple="true"
                    >
                    </multiselect>
                </div>
            </div>
            <div class="col-md-12">
                <div class="alert alert-warning alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                    <strong>warning!</strong>  file_text_for_mentor                    
                </div>
            </div>
                <div class="col-md-6 st-logo position-relative" :class="setClassByValue(image.edited)" style="height:100%;">
                    <VueFileAgent 
                        :accept="'image/*'"
                        :maxSize="'10MB'"
                        :multiple="false"
                        :deletable="true"
                        :helpText="'დაამატეთ ან ჩააგდეთ სურათი'"
                        :errorText="{
                          type: 'Invalid file type. Only images or zip Allowed',
                          size: 'Files should not exceed 10MB in size',
                        }"
                        :uploadUrl="image.uploaded"
                        @select="onImageUpload" 
                        class="bootstrap-filestyle choose_image_side_startup cursor-pointer"
                        v-model="fileRecords"
                    ></VueFileAgent>
                </div>
        </div>
        <div class="float-right">
            <button type="submit" id="submit" @click="button = true;sendToSave()" class="btn">Get started </button>
        </div>
    </div>
    <modal name="chose_side_mentor_image_modal" id="chose_side_mentor_image_modal">
        <div class="row p-4">
            <div class="col-md-8 position-relative">
                <cropper 
                    :src="image.uploaded"
                    :stencil-props="{
                        aspectRatio: 1/1
                    }"
                    @change="change"
                    :stencil-component="$options.components.CircleStencil"
                    class="col-7  d-flex justify-content-center align-items-center"
                >
                </cropper>
            </div>
            <div class="col-md-4 p-3">
                <div class="d-flex justify-content-center align-items-center">   
                    <div>
                        <div>
                            <span style="font-weight:bold;">
                                შეცვალეთ სურათი სურვილისამებრ და დააჭირეთ დამახსოვრება ღილაკს.
                            </span>
                        </div>
                        <div class="mt-3 float-right">
                            <button class="btn btn-success" @click="$modal.hide('chose_side_mentor_image_modal')">
                                დამახსოვრება
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </modal>
</div>
</template>
<script>
export default{
    data(){
        return {
            fileRecords:[],
            image:{
                uploaded:"",
                edited:"",
            },
            button:false,
            input:{
                name:"",
                linkedin:"",
                experience:"",
                country:"",
                which:{
                    field:"",
                    issue:""
                },
                image:""
            },
            countries:[
                {
                    name:"Azerbaijan",
                },
                {
                    name:"Georgia",
                },
                {
                    name:"Armenia",
                },
                {
                    name:"Khazakhstan",
                },
            ],
        }
    },
    methods:{
        checkStringValidation(array){
            let counter = 0
            array.map((str, index)=>{
                if(Array.isArray(str) && str.length > 0){
                    counter+=1
                }else if(str !== undefined && str !== null && str !== "" && !Array.isArray(str)){
                    counter+=1
                }
            })
            return counter === array.length
        },
        isInputsValid(){
            let input = this.input
            let array = [
                input.name,
                input.linkedin,
                input.experience,
                input.country,
                input.which.field,
                input.which.issue,
                input.image
            ]
            return this.checkStringValidation(array)
        },
        setClassByValue(input, is_multiselect=false){
            if (this.button) {
                let bol = (is_multiselect)?{
                    border:'solid 1.5px red!important',
                    borderRadius:'5px'
                }:'border-danger'

                let is_array = (Array.isArray(input) && input.length === 0)?bol:''
                return (input !== null && input !== "" && input !== " ")?is_array:bol
            }
        },
        sendToSave(){
            if(this.isInputsValid()){
                axios.post('/register/mentor',this.input)
                .then((response)=>{
                    console.log('წარმატებით დაემატა!')
                }).catch(()=>{
                    console.log('წარუმატებელი მოთხოვნა!')
                })
            }
        },
        onImageUpload(event){
            this.image.uploaded = event[0].urlResized
            this.$modal.show('chose_side_mentor_image_modal')
        },
        change(file){
            this.input.image = file.canvas.toDataURL('image/jpeg')
            this.image.edited = file.canvas.toDataURL('image/jpeg')
        },
    },
}
</script>