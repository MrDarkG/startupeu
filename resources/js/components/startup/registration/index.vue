<template>
<div class="pt-2" >
    <div class="sign-title">
        Startup registration
    </div>
    <div class="sign-desc">
    	Find investment opportunities from leading Venture Funds, Angels and Accelerators, apply with the one click
    </div>
    <div class="row sign-form">
        <div class="col-md-4">
            <label for="title">Startup Name</label>
            <input type="text" id="title" name="title" v-model="input.startup.name" :class="setClassByValue(input.startup.name,false,button)" class="form-control" placeholder="Startup Name">
        </div>
        <div class="col-md-4">
            <label for="founded">Founded</label>
            <input type="date" id="founded" name="founded" v-model="input.founded.year" :class="setClassByValue(input.founded.year,false,button)"  class="form-control" placeholder="Year">
        </div>
        <div class="col-md-4">
            <label for="founded_number">Number of Founders</label>
            <input type="text" id="founded_number" v-model="input.founded.number" :class="setClassByValue(input.founded.number,false,button)" name="founded_number"  class="form-control" placeholder="Number">
        </div>
        <div class="col-md-4">
            <label for="ceo">Full Name</label>
            <input type="text" id="ceo" name="ceo" v-model="input.full_name" :class="setClassByValue(input.full_name,false,button)" class="form-control" placeholder="Full Name">
        </div>
        <div class="col-md-4">
            <label for="phone_index">Phone index</label>
            <multiselect
                id="phone_index"
                v-model="input.phone.index"
                :style="setClassByValue(input.phone.index,true,button)"
                track-by="id"
                label="code"
                :options="phone_index"
                :multiple="false"
            >
            </multiselect>
        </div>
        <div class="col-md-4">
            <label for="ceo_mobile">CEO mobile number</label>
            <input type="text" id="ceo_mobile" v-model="input.startup.number" :class="setClassByValue(input.startup.number,false,button)" name="ceo_mobile" class="form-control" placeholder="XXX XX XX XX">
        </div>
        <!-- <div class="col-md-3">
            <label for="ceo_email">CEO e-mail</label>
            <input type="text" id="ceo_email" v-model="input.phone.number" name="ceo_email"  class="form-control" placeholder="Email address"
        </div> -->
        <div class="col-md-6  ">
            <label for="startup_email">Startup email</label>
            <input type="text" id="startup_email" v-model="input.startup.email" :class="setClassByValue(input.startup.email,false,button)" name="startup_email" class="form-control" placeholder="Email address">
        </div>
        <div class="col-md-6  ">
            <label for="website">Website</label>
            <input type="text" id="website" v-model="input.website" :class="setClassByValue(input.website,false,button)" name="website" class="form-control" placeholder="Website address">
        </div>
        <div class="col-md-12">
            <label for="what_your_company_does">What your company does?</label>
            <textarea name="what_your_company_does" v-model="input.about.company" :class="setClassByValue(input.about.company,false,button)" id="what_your_company_does" cols="30" rows="10" class="form-control h160" placeholder="Type here"></textarea>
        </div>
        <div class="col-md-12">
            <label for="describe_your_product_text">Describe your product and what it does or will do</label>
            <textarea name="describe_your_product_text" v-model="input.about.product" :class="setClassByValue(input.about.product,false,button)" id="describe_your_product_text" cols="30" rows="10" class="form-control h160" placeholder="Type here"></textarea>
        </div>
        <div class="col-md-12">
            <label for="what_is_your_innovation">What is your innovation - what are you doing in an absolutely new or significantly improved way?</label>
            <textarea name="what_is_your_innovation" v-model="input.about.innovation" :class="setClassByValue(input.about.innovation,false,button)" id="what_is_your_innovation" cols="30" rows="10" class="form-control h160" placeholder="Type here"></textarea>
        </div>
        <div class="col-md-4" :class="">
            <label for="what_is_your_current_stage">What is your current stage ?</label>
            <multiselect
                id="what_is_your_current_stage"
                v-model="input.current_stage"
                :style="setClassByValue(input.current_stage,true,button)"
                track-by="id"
                label="title"
                :options="stages"
                :multiple="false"
            ></multiselect>
        </div>
        <div class="col-md-4">
            <label for="your_bussiness_model">Your business model</label>
            <multiselect
                id="your_bussiness_model"
                v-model="input.bussiness_model"
                :style="setClassByValue(input.bussiness_model,true,button)"
                track-by="id1"
                label="title"
                :options="bussines_models"
                :multiple="false"
            ></multiselect>
        </div>
        <div class="col-md-4">
            <label for="target_audience">Target Audience</label>
            <multiselect
                id="target_audience"
                v-model="input.target_audience"
                :style="setClassByValue(input.target_audience,true,button)"
                track-by="id"
                label="title"
                :options="investor_types"
                :multiple="false"
            ></multiselect>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="which_markets_are_you_interested_in">Industries</label>
                <multiselect
                    id="which_markets_are_you_interested_in"
                    v-model="input.industries"
                    :style="setClassByValue(input.industries,true,button)"
                    track-by="id"
                    label="title"
                    :options="industries"
                    :multiple="true"
                ></multiselect>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="country_id">Country</label>
                <multiselect
                    id="country_id"
                    v-model="input.country"
                    :style="setClassByValue(input.country,true,button)"
                    track-by="id"
                    label="title"
                    :options="countries"
                    :multiple="false"
                ></multiselect>
            </div>
        </div>
        <div class="col-md-6">
            <label for="how_much">How Much ?</label>
            <multiselect
                id="how_much"
                v-model="input.how_much"
                :style="setClassByValue(input.how_much,true,button)"
                track-by="id"
                label="title"
                :options="investment_range"
                :multiple="false"
            >
            </multiselect>
        </div>
        <div class="col-md-6">
            <label for="what_are_you_looking_for">What are you looking for?</label>
            <multiselect
                id="what_are_you_looking_for"
                v-model="input.what_are_you_looking"
                :style="setClassByValue(input.what_are_you_looking,true,button)"
                track-by="id"
                label="title"
                :options="looking_for"
                :multiple="true"
            ></multiselect>
        </div>
        <div class="col-md-12 mt-4">
            <div class="alert alert-warning alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                <strong>warning!</strong>   Image file formats  - JPG,PNG,JPEG; PDF file size - 2 MB;
            </div>
        </div>
        <div class="col-md-6 st-logo position-relative" :class="setClassByValue(input.image,false,button)" style="margin-right: 20px;height:100%;">
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
        <button type="submit" @click="saveStartup()" id="submit" class="btn">Get started </button>
    </div>
    <modal name="chose_side_image_modal" id="choose_side_image_modal">
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
                            <button class="btn btn-success" @click="$modal.hide('chose_side_image_modal')">
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
    props:['industries','stages','countries','looking_for','investment_range','bussines_models','investor_types','phone_index'],
    data(){
        return {
            button:false,
            fileRecords:[],
            image:{
                uploaded:'',
                edited:'',
            },
            input:{
                startup:{
                    name:"",
                    email:"",
                },
                founded:{
                    year:"",
                    number:"",
                },
                full_name:"",
                phone:{
                    index:"",
                    number:"",
                },
                website:"",
                about:{
                    company:"",
                    product:"",
                    innovation:"",
                },
                current_stage:"",
                bussiness_model:"",
                target_audience:"",
                industries:[],
                country:"",
                how_much:"",
                what_are_you_looking:[],
                image:"",
            },
        }
    },
    methods:{
        saveStartup(){
            this.button = true
            axios.post('/register/startup' ,this.input)
            .then((response)=>{
                console.log('წარმატებით დაემატა!')
                if(redirect){
                    window.location.replace(redirect)
                }
            }).catch(()=>{
                console.log('წარუმატებელი მოთხოვნა!')
            })
        },
        onImageUpload(event){
            this.image.uploaded = event[0].urlResized
            this.$modal.show('chose_side_image_modal')
        },
        change(file){
            this.input.image = file.canvas.toDataURL('image/jpeg')
        },
    },
};
</script>
<style>
.position-relative{
    position:relative;
}
.vm--modal{
    height: unset!important;
    top:120px!important;
}
.choose_side_image_modal .vm--modal{
    height:100%!important;
}
.choose_image_side_startup .grid-block-wrapper.vue-file-agent.file-input-wrapper.is-single{
    border:none;
}
.choose_image_side_startup .vfa-demo .file-preview-wrapper::before {
    background: none!important;
}
</style>
