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
                <label for="full_name">Full Name <span class="text-danger">*</span></label>
                <input
                    type="text"
                    id="full_name"
                    placeholder="Full Name"
                    name="full_name"
                    v-model="input.name"
                    :class="setClassByValue(input.name,false,button)"
                    class="form-control"
                >
            </div>
            <div class="col-md-6">
                <label for="linkedin_address">Linkedin profile <span class="text-danger">*</span></label>
                <input
                    type="text"
                    placeholder="Linkedin profile"
                    id="linkedin_address"
                    name="linkedin_address"
                    v-model="input.linkedin"
                    :class="setClassByValue(input.linkedin,false,button)"
                    class="form-control"
                >
            </div>
            <div class="col-md-12">
                <label for="price">Price range <span class="text-danger">*</span></label>
                <input
                    type="price"
                    id="full_name"
                    placeholder="Price range"
                    name="full_name"
                    v-model="input.price"
                    :class="setClassByValue(input.price,false,button)"
                    class="form-control"
                >
            </div>
            <div class="col-md-12">
                <label for="experience_text">What experience do I have and what proccesses did I improve? <span class="text-danger">*</span></label>
                <textarea
                    name="experience_text"
                    v-model="input.experience"
                    :class="setClassByValue(input.experience,false,button)"
                    id="experience_text"
                    cols="30"
                    rows="10"
                    class="form-control h160"
                    placeholder="Type here"
                ></textarea>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="country_id">Country</label>
                    <multiselect
                        id="country_id"
                        v-model="input.country.data"
                        track-by="id"
                        label="title"
                        :style="setClassByValue(input.country.data,true,button)"
                        :options="countries"
                        :multiple="false"
                    ></multiselect>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="fields_consult_id">Which fields can you consult in? <span class="text-danger">*</span></label>
                    <multiselect
                        id="fields_consult_id"
                        v-model="input.which.field"
                        :style="setClassByValue(input.which.field,true,button)"
                        track-by="id"
                        label="title"
                        :options="fields"
                        :multiple="false"
                    ></multiselect>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="issues_consult_id">Which issues can you consult on? <span class="text-danger">*</span></label>
                    <multiselect
                        id="issues_consult_id"
                        v-model="input.which.issue"
                        :style="setClassByValue(input.which.issue,true,button)"
                        track-by="id"
                        label="title"
                        :options="issues"
                        :multiple="true"
                    ></multiselect>
                </div>
            </div>
            <div class="col-md-12">
                <div class="alert alert-warning alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                    <strong>warning!</strong>  file_text_for_mentor
                </div>
            </div>
            <div class="col-md-6 st-logo position-relative" :class="(input_data)?setClassByValue(image.edited,false,button):''" style="height:100%;">
                <span class="text-danger float-right">*</span>
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
            <div v-if="input_data && input?.preview" class="d-flex align-items-center ">
                <img height="150" class="rounded" :src="'/mentors/'+input?.preview" :alt="input?.preview">
            </div>
        </div>
        <div class="float-right mt-3">
            <button @click="sendData()" class="pl-3 pr-3 pt-2 pb-2 btn btn-primary">
                Get started
            </button>
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
                    class="col-7 d-flex justify-content-center align-items-center"
                ></cropper>
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
    props:{
        input_data:Object,
        user_id:Number,
        countries:Array,
        fields:Array,
        issues:Array,
    },
    data(){
        return {
            fileRecords:[],
            image:{
                uploaded:"",
                edited:"",
                preview:"",
            },
            button:false,
            custom_input_data:{},
            input:this.setInputs(
                this.input_data?.name,
                this.input_data?.price,
                this.input_data?.linkedin,
                this.input_data?.experience,
                this.input_data?.country?.data?.id,
                this.input_data?.which?.field,
                this.input_data?.which?.issue,
                this.input_data?.preview
            ),
        }
    },
    watch:{
        input_data(val) {
            this.input = this.setInputs(
                val?.name,
                val?.price,
                val?.linnkedin,
                val?.question1,
                val?.country.id,
                val?.fields,
                val?.issues,
                val?.preview
            )
        }
    },
    methods:{
        setInputs(name, price, linkedin, experience, country, fields, issues, logo){
            let selected_country = this.findSingleDataByValueName('countries', country)
            return  {
                user_id:this.user_id,
                name:name??"",
                price:price??"",
                linkedin:linkedin??"",
                experience:experience??"",
                country:{
                    data:selected_country,
                },
                which:{
                    field:this.findMultipleDataByValueName('fields',fields, 'id')[0]??"",
                    issue:this.getMentorIssues(issues)??"",
                },
                preview:logo,
            }
        },
        findSingleDataByValueName(value_name, id){
            if(this[value_name]){
                return this[value_name].find((value)=>value.id == id)
            }
            return {}
        },
        getMentorIssues(issues){
            let arr = []
            issues?.filter((issue)=> {
                arr.push(issue.issue)
            })
            return arr
        },
        findMultipleDataByValueName(data ,value_name = [], attr){
            return this[data]?.filter((item)=>{
                if(value_name.length > 0){
                    return value_name.find((second_item)=>item.id === second_item[attr])
                }
                return item.id === value_name[attr]
            })
        },
        sendData(){
            this.button = true
            axios.post('/register/mentor',this.input)
                .then((response)=>{
                    console.log('წარმატებით დაემატა')
                    window.location.replace(response.data)
                })
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
