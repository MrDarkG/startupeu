<template>
    <div>
        <div class="container-fluid pd-50">
            <div class="row sign-up">
                <div class="col-md-4 left">
                    <a href="http://beta.startupcentraleurasia.com/en/" class="sign-logo">
                        <img src="http://beta.startupcentraleurasia.com/themes/application/Components/svg/sign-logo.svg" alt="">
                    </a>

                    <div class="sign-text">
                        <span>Few clicks away from your Ecosystem </span>
                        <p>Already have an account?<a href="http://beta.startupcentraleurasia.com/en/login">Login</a></p>
                    </div>
                </div>
                <div class="col-md-8 right">
                    <div class="sign-title">
                        Mentor Registration         </div>
                    <div class="sign-desc">Plan your mentorship sessions easily        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="full_name">Full Name</label>
                                <input type="text" id="full_name" v-model="input.full_name" value="" class="form-control" placeholder="Full Name">
                            </div>


                            <div class="col-md-6">
                                <label for="linkedin_address">Linkedin address </label>
                                <input type="text" id="linkedin_address" v-model="input.linkedin_address" value="" class="form-control" placeholder="Linkedin address ">
                            </div>

                            <div class="col-md-12">
                                <label for="experience_text">What experience do I have and what proccesses did I improve?</label>
                                <textarea v-model="input.experience_text" id="experience_text" cols="30" rows="10" class="form-control h160" placeholder="Type here"></textarea>
                            </div>


                            <div class="col-md-12">
                                <label for="companies_worked_text">What companies have I worked in?</label>
                                <textarea v-model="input.companies_worked_text" id="companies_worked_text" cols="30" rows="10" class="form-control h160" placeholder="Type here"></textarea>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="country_id">Country</label>
                                    <multiselect
                                        label="title"
                                        v-model="multiselect.country"
                                        :options="countries"
                                        :multiple="false"
                                    >
                                  
                                    </multiselect>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="fields_consult_id">Fieldes consult</label>
                                    
                                    <multiselect
                                        label="title"
                                        v-model="multiselect.fieldes_consult"
                                        :options="countries"
                                        :multiple="true"
                                      >
                                      
                                    </multiselect>
                                </div>

                            </div>

                            <div class="col-md-12">


                                <div class="form-group">
                                    <label for="issues_consult_id">Issues consult ID</label>
                                    <multiselect
                                        label="title"
                                        v-model="multiselect.issues_consult_id"
                                        :options="countries"
                                        :multiple="true"
                                    >
                                    </multiselect>
                                </div>
                            </div>
                            <div class="col-md-12 st-logo" style="margin-right: 20px;">
                                <VueFileAgent 
                                    :accept="'image/*'"
                                    :maxSize="'10MB'"
                                    :maxFiles="14"
                                    :errorText="{
                                      type: 'Invalid file type. Only images or zip Allowed',
                                      size: 'Files should not exceed 10MB in size',
                                    }"
                                    :uploadUrl="img.uploaded"
                                    @select="onImageUpload" 
                                    v-model="fileRecords"
                                ></VueFileAgent>
                            </div>

                            <button type="submit" id="submit" class="btn" @click="getStarted">Get started </button>

                        </div>
                </div>
            </div>
        </div>
        <modal name="croppermodal" class="p-4">
            <div class="d-flex mt-3">
                <div class="col-md-12">
                    <cropper 
                        :src="img.uploaded"
                        :stencil-props="{
                            aspectRatio: 1/1
                        }"
                        @change="change"
                        :stencil-component="$options.components.CircleStencil"
                        class="upload-example-cropper"
                    >
                    </cropper>
                </div>
            </div>
            <div class="float-right mt-2 mr-3">   
                <button class="btn btn-success mt-4" @click="$modal.hide('croppermodal')">
                    Save
                </button>
            </div>
        </modal>
    </div>
</template>
<script>
export default {
    props:['data','countries'],
    data () {
      return {
        input:{
            full_name:'',
            linkedin:'',
            experience:'',
            about_prev_company:'',

        },
        multiselect:{
            country:'',
            fieldes_consult:[],
            issues_consult_id:[],
        },
        fileRecords:[],
        img:{
            uploaded:'',
            edited:'',
        },
        options: ['list', 'of', 'options'],
      }
    },
    created(){
        // after template render
    },
    methods:{
        onImageUpload(event){
            this.img.uploaded = event[0].urlResized
            this.$modal.show('croppermodal')
        },
        setSelectedCountry(event){
            console.log(event)
        },
        change(file){
            this.img.edited = file.canvas.toDataURL('image/jpeg')
        },
        getStarted(){
            axios.post('/register/mentor',{
                input:this.input,
                multiselect:this.multiselect,
                avatar:this.img.edited
            }).then((response)=>{
                console.log(response)
            })
        },
    }
};
</script>

