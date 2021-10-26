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

                    <form action="" class="sign-form" id="startup-form" method="post" enctype="multipart/form-data" novalidate="novalidate">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="full_name">Full Name</label>
                                <input type="text" id="full_name" name="full_name" value="" class="form-control" placeholder="Full Name">
                            </div>


                            <div class="col-md-6">
                                <label for="linkedin_address">Linkedin address </label>
                                <input type="text" id="linkedin_address" name="linkedin_address" value="" class="form-control" placeholder="Linkedin address ">
                            </div>

                            <div class="col-md-12">
                                <label for="experience_text">What experience do I have and what proccesses did I improve?</label>
                                <textarea name="experience_text" id="experience_text" cols="30" rows="10" class="form-control h160" placeholder="Type here"></textarea>
                            </div>


                            <div class="col-md-12">
                                <label for="companies_worked_text">What companies have I worked in?</label>
                                <textarea name="companies_worked_text" id="companies_worked_text" cols="30" rows="10" class="form-control h160" placeholder="Type here"></textarea>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="country_id">Country</label>
                                    <multiselect
                                        v-model="multiselect.country"
                                        :options="countries"
                                        label="title"
                                        :multiple="false"
                                    >
                                  
                                    </multiselect>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="fields_consult_id">Fieldes consult</label>
                                    
                                    <multiselect
                                        v-model="multiselect.fieldes_consult"
                                        :options="countries"
                                        label="title"
                                        :multiple="true"
                                      >
                                      
                                    </multiselect>
                                </div>

                            </div>

                            <div class="col-md-12">


                                <div class="form-group">
                                    <label for="issues_consult_id">Issues consult ID</label>
                                    <multiselect
                                        v-model="multiselect.issues_consult_id"
                                        :options="countries"
                                        label="title"
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
                                    v-model="fileRecords"
                                ></VueFileAgent>
                            </div>

                            <button type="submit" id="submit" class="btn" @click="getStarted">Get started </button>

                        </div>
                    </form>
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
                <!-- <div class="mr-2 col-md-1 d-flex flex-column justify-content-between"> -->
<!--                     <div>
                        <div class="d-flex align-bottom mt-2">
                            <div style="height:150px;width:150px;z-index:5;border:solid 1px black;border-radius:100%;position-relative">
                                <img :src="img.edited" alt="None" v-if="img.edited !== ''" style="" class="profile_medium_img position-absolute" style="position:absolute;">
                                <img :src="img.uploaded" alt="None" v-else style="position:absolute;" class="profile_medium_img position-absolute">
                            </div>
                        </div>
                    </div> -->
              <!--       <div>
                        <button class="btn btn-success mt-4" @click="closemodal()">
                            Save
                        </button>
                    </div>
                </div>
                <div> -->
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
import 'vue-multiselect/dist/vue-multiselect.min.css'
import VueFileAgent from 'vue-file-agent'
import { CircleStencil,Cropper } from 'vue-advanced-cropper'
import 'vue-advanced-cropper/dist/style.css'
import VueFileAgentStyles from 'vue-file-agent/dist/vue-file-agent.css'
import Multiselect from 'vue-multiselect'
import VueToastify from "vue-toastify"
import VModal from 'vue-js-modal'

Vue.use(VueFileAgent)
Vue.use(VueToastify)
Vue.component('multiselect', Multiselect)
Vue.use(VModal, { componentName: 'modal',dynamicDefault: { draggable: true, resizable: false }  })

export default {
    components: {
        Cropper, CircleStencil,Multiselect 
    },
    data () {
      return {
        selected: null,
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
        countries:[]

      }
    },
    created(){
        this.getCountries()
    },
    methods:{
        setSelectedCountry(event){
            console.log(event)
        },
        getCountries(){
            let countries = ["Azerbaijan" ,"Georgia" ,"Armenia" ,"Khazakhstan"]
            countries.filter((country)=>{
                this.countries.push({
                    title:country,
                    is_selected:false,
                })
            })
        },
        change(file){
            this.img.edited = file.canvas.toDataURL('image/jpeg')
        },
        getStarted(){
            axios.post('/register/mentor',{
                input:this.input,
                multiselect:this.multiselect,
                image:this.img.edited
            }).then((response)=>{
                console.log(response)
            })
        },
    }
};
</script>

