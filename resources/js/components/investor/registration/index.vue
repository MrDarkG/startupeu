<template>
<div>
    <div class="sign-title">
        Investor Registration
    </div>
    <div class="sign-desc">
    	Use our smart matching tool to find startups from Central Eurasia
    </div>
    <div class="sign-form" id="startup-form">
        <div class="row">
            <div class="col-md-6">
                <label for="full_name">Full Name</label>
                <input type="text" id="full_name" name="full_name" v-model="input.name.full" :class="setClassByValue(input.about.investments, false, button)" class="form-control" placeholder="Full Name">
            </div>
            <div class="col-md-6">
                <label for="company_name">Company name</label>
                <input type="text" id="company_name" name="company_name" v-model="input.name.company" :class="setClassByValue(input.about.investments, false, button)" class="form-control" placeholder="Company name">
            </div>
            <div class="col-md-12">
                <label for="successful_investments">Successful investments</label>
                <textarea name="successful_investments" v-model="input.about.investments" :class="setClassByValue(input.about.investments, false, button)" id="successful_investments" cols="30" rows="10" class="form-control h160" placeholder="Type here"></textarea>
            </div>
            <div class="col-md-12">
                <label for="successful_investments">About Investor</label>
                <textarea name="about_investor" v-model="input.about.investor" :class="setClassByValue(input.about.investor, false, button)" id="about_investor" cols="30" rows="10" class="form-control h160" placeholder="Type here"></textarea>
            </div>
            <div class="col-md-4">
                <label for="website">Website</label>
                <input type="text" id="website" name="website" v-model="input.website" :class="setClassByValue(input.website, false, button)" class="form-control" placeholder="Website address">
            </div>
            <div class="col-md-4">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" v-model="input.email" :class="setClassByValue(input.email, false, button)" class="form-control" placeholder="Email address">
            </div>
            <div class="col-md-4">
                <label for="investment_range">Investment range</label>
                <multiselect
                    id="investment_range"
                    v-model="input.investment_range"
                    :style="setClassByValue(input.investment_range,true,button)"
                    track-by="id"
                    label="title"
                    :options="investment_range"
                    :multiple="false"
                ></multiselect>
            </div>
            <div class="col-md-12 mt-2">
                <label for="interest_martket_id">Which markets are you interested in?</label>
                <multiselect
                    id="interest_martket_id"
                    v-model="input.which.market"
                    :style="setClassByValue(input.which.market,true,button)"
                    track-by="id"
                    label="title"
                    :options="markets"
                    :multiple="false"
                ></multiselect>
            </div>
            <div class="col-md-12 mt-2">
                <label for="interest_stage_id">Which stages are you interested in?</label>
                <multiselect
                    id="interest_stage_id"
                    v-model="input.which.stage"
                    :style="setClassByValue(input.which.stage,true,button)"
                    track-by="id"
                    label="title"
                    :options="stages"
                    :multiple="false"
                ></multiselect>
            </div>
            <div class="col-md-12 mt-2">
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
            <div class="col-md-12 mt-2">
                <label for="investor_type">Investor type</label>
                <multiselect
                    id="investor_type"
                    v-model="input.investor_type"
                    :style="setClassByValue(input.investor_type,true,button)"
                    track-by="id"
                    label="title"
                    :options="investor_types"
                    :multiple="false"
                ></multiselect>
            </div>
            <div class="col-md-12 mt-2">
                <label for="investor_industry">Industries</label>
                <multiselect
                    id="investor_industry"
                    v-model="input.industries"
                    :style="setClassByValue(input.industries,true,button)"
                    track-by="id"
                    label="title"
                    :options="industries"
                    :multiple="true"
                ></multiselect>
            </div>
            <div
                class="col-md-12 position-relative"
                :class="setClassByValue(image.uploaded, false, button)"
                style="margin-right: 20px;height:100%;"
            >
                <div class="col-md-6 st-logo m-0">
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
                <div class="col-md-6 m-0" v-if="image.preview">
                    <img :src="image.preview" style="height:194px;" class="img-fluid rounded">
                </div>
            </div>
        </div>
        <div class="float-right">
            <button class="btn btn-success" @click="sendData()">
                Get started
            </button>
        </div>
    </div>
    <modal name="chose_side_investor_image_modal" id="chose_side_investor_image_modal">
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
                            <button class="btn btn-success" @click="$modal.hide('chose_side_investor_image_modal')">
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
    props:[
        'user_id',
        'looking_for',
        'stages',
        'markets',
        'countries',
        'investor_types',
        'bussines_models',
        'industries',
        'investment_range',
        'input_data'
    ],
    data () {
      return {
        image:{
            uploaded:"",
            edited:"",
            preview:"",
        },
        fileRecords:[],
        input:{
            user_id:this.user_id,
            name:{
                full:"",
                company:"",
            },
            about:{
                investments:"",
                investor:"",
            },
            website:"",
            email:"",
            investment_range:"",
            which:{
                market:"",
                stage:"",
            },
            industries:[],
            country:"",
            investor_type:"",
            image:"",
        },
        button:false,
        selected: null,
        options: ['list', 'of', 'options'],
      }
    },
    watch:{
        input_data(val){
            if(val){
                this.input.name.full = val.name
                this.input.name.company = val.company_name
                this.input.investment_range = this.investment_range.find((range)=>range.id === val.range_id)
                this.input.which.market = this.markets.find((market)=>market.id === val.market_id)
                this.input.which.stage = this.stages.find((stage)=>stage.id === val.interest_id)
                this.input.investor_type = val.type
                this.input.industries = val.industries.map((data)=>data.industry)
                this.input.linkedin = val.linnkedin
                this.input.experience = val.question1
                this.input.country = val.countries
                this.input.website = val.website
                this.input.email = val.email
                this.input.about.investor = val.about
                this.input.about.investments = val.investments
                this.image.preview = val.logo
            }
        }
    },
    methods:{
        sendData(){
            this.button = true
            axios.post('/register/investor',this.input)
            .then((response)=>{
                console.log('წარმატებით დაემატა!')
                window.location.replace(response.data)
            })
        },
        onImageUpload(event){
            this.image.uploaded = event[0].urlResized
            this.$modal.show('chose_side_investor_image_modal')
        },
        change(file){
            this.input.image = file.canvas.toDataURL('image/jpeg')
            this.image.edited = file.canvas.toDataURL('image/jpeg')
        },
    }
};
</script>
