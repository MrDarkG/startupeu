<template>
<div class="sign-form" id="startup-form">
    <div v-if="edit_button.is_active" class="row">
        <div class="col-md-6">
            <label for="title">Startup Name</label>
            <input
                id="title"
                type="text"
                v-model="inputs.startup.name"
                :class="setClassByValue(inputs.startup.name,false,button)"
                class="form-control"
                placeholder="Startup Name"
            >
        </div>
        <div class="col-md-6">
            <label for="founded">Founded</label>
            <input
                id="founded"
                type="date"
                v-model="inputs.startup.date"
                :class="setClassByValue(inputs.startup.date,false,button)"
                class="form-control"
                placeholder="Year"
            >
        </div>
        <div class="col-md-4">
            <label for="full_name">Full Name</label>
            <input
                type="text"
                id="full_name"
                min="0"
                v-model="inputs.full_name"
                :class="setClassByValue(inputs.full_name,false,button)"
                class="form-control"
                placeholder="Full Name"
            >
        </div>
        <div class="col-md-4">
            <label for="ceo_mobile">CEO mobile number</label>
            <input
                type="text"
                id="ceo_number"
                min="0"
                v-model="inputs.ceo.number"
                :class="setClassByValue(inputs.ceo.number,false,button)"
                class="form-control"
                placeholder="+995 XXX XX XX XX"
            >
        </div>
        <div class="col-md-4">
            <label for="ceo_email">CEO e-mail</label>
            <input
                type="email"
                id="ceo_number"
                v-model="inputs.ceo.email"
                :class="setClassByValue(inputs.ceo.email,false,button)"
                class="form-control"
                placeholder="Email address"
            >
        </div>
        <div class="col-md-6  ">
            <label for="startup_email">Startup email</label>
            <input
                type="email"
                id="startup_email"
                v-model="inputs.startup.email"
                :class="setClassByValue(inputs.startup.email,false,button)"
                class="form-control"
                placeholder="Email address"
            >
        </div>
        <div class="col-md-6  ">
            <label for="website">Website</label>
            <input
                type="text"
                id="website"
                v-model="inputs.website"
                :class="setClassByValue(inputs.website,false,button)"
                class="form-control"
                placeholder="Website address"
            >
        </div>
        <div class="col-md-12">
            <label for="describe_your_product_text">
                Description of the startup(product, business model and innovation)
            </label>
            <textarea
                id="describe_your_product_text"
                cols="30"
                rows="10"
                :class="setClassByValue(inputs.about.describe_your_product,false,button)"
                v-model="inputs.about.describe_your_product"
                class="form-control h160"
                placeholder="Type here"
            ></textarea>
        </div>
        <div class="col-md-4">
            <label for="what_is_your_current_stage">What is your current stage ?</label>
            <multiselect
                id="what_is_your_current_stage"
                v-model="inputs.stage"
                :style="setClassByValue(inputs.stage,true,button)"
                track-by="id"
                label="title"
                :options="data.stages"
                :multiple="false"
            ></multiselect>
        </div>
        <div class="col-md-4">
            <label for="your_business_model">Your business model</label>
            <multiselect
                id="your_business_model"
                v-model="inputs.business_model"
                :style="setClassByValue(inputs.business_model,true,button)"
                track-by="id"
                label="title"
                :options="data.bussiness_model"
                :multiple="false"
            ></multiselect>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="country_id">Country</label>
                <multiselect
                    id="country_id"
                    v-model="inputs.country"
                    :style="setClassByValue(inputs.country,true,button)"
                    track-by="id"
                    label="title"
                    :options="data.countries"
                    :multiple="false"
                ></multiselect>
            </div>
        </div>
        <div class="col-md-6">
            <label for="how_much">How Much ?</label>
            <multiselect
                id="how_much"
                v-model="inputs.investment_range"
                :style="setClassByValue(inputs.investment_range,true,button)"
                track-by="id"
                label="title"
                :options="data.investment_range"
                :multiple="false"
            ></multiselect>
        </div>
        <div class="col-md-6">
            <label for="what_are_you_looking_for">What are you looking for?</label>
            <multiselect
                id="how_much"
                v-model="inputs.looking_for"
                :style="setClassByValue(inputs.looking_for,true,button)"
                track-by="id"
                :custom-label="({looking_for})=>looking_for.title"
                :options="data.looking_for"
                :multiple="true"
            ></multiselect>
        </div>
        <div class="col-md-12 mt-2">
            <label for="target_audience">Target Audience</label>
            <multiselect
                id="target_audience"
                v-model="inputs.target_audience"
                :style="setClassByValue(inputs.target_audience,true,button)"
                track-by="id"
                label="title"
                :options="data.target_audience"
                :multiple="false"
            ></multiselect>
        </div>
        <div class="mb-5 mt-3 col-md-12 d-flex align-items-center justify-content-end">
            <button
                type="submit"
                id="submit"
                class="btn"
                @click="button = true;sendAxiosToSave()"
            >
                Get started
            </button>
        </div>
    </div>
    <div v-else>
        <startup-general-info-single-page
            :startup="startup"
        ></startup-general-info-single-page>
    </div>
</div>
</template>
<script>
export default{
    props:["startup","data","edit_button"],
    data(){
      return {
          button:false,
          inputs:{
              id:this.startup.id,
              full_name:this.startup.full_name,
              website:this.startup.website,
              startup:{
                  name:this.startup.name,
                  date:this.startup.founded,
                  number_of_founders:'0',
                  email:this.startup.startup_email,
              },
              ceo:{
                  number:this.startup.number,
                  email:this.startup.ceo_email,
              },
              about:{
                  company_does:'declined - company_does',
                  describe_your_product:this.startup.description,
                  your_innovation:'declined - your_innovation',
              },
              stage:this.startup.stages,
              country:this.startup.country,
              investment_range:this.startup.investment_range,
              target_audience:this.startup.target_audience,
              business_model:this.startup.business_model,
              looking_for:this.startup.looking_for,
          },
      }
    },
    created(){
        this.$emit('setEditButtonTitle','General')
        this.$emit('setEditButtonTitle',this.startup.logo.length === 0 ,'is_active')
    },
    methods:{
        sendAxiosToSave(){
            axios.post("/startup/update",this.inputs)
            .then((response)=>{
                this.$vToastify.success("Successfully updated", "Response");
                setTimeout(()=>{
                    window.location.reload()
                },2000)
            }).catch((error)=>{
                this.popupErrors(error.response.data.errors)
            })
        }
    },
}
</script>
