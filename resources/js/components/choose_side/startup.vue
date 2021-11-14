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
            <input type="text" id="title" name="title" v-model="input.startup.name" class="form-control" placeholder="Startup Name">
        </div>
        <div class="col-md-4">
            <label for="founded">Founded</label>
            <input type="text" id="founded" name="founded" v-model="input.founded.year"  class="form-control" placeholder="Year">
        </div>
        <div class="col-md-4">
            <label for="founded_number">Number of Founders</label>
            <input type="text" id="founded_number" v-model="input.founded.number" name="founded_number"  class="form-control" placeholder="Number">
        </div>
        <div class="col-md-4">
            <label for="ceo">Full Name</label>
            <input type="text" id="ceo" name="ceo" v-model="input.full_name"  class="form-control" placeholder="Full Name">
        </div>
        <div class="col-md-4">
            <label for="phone_index">Phone index</label>
            <select name="phone_index" v-model="input.phone.index" class="form-control" id="phone_index">
                <option value="0"> Choose </option>
                <option id="" value="+93"> Afghanistan </option>
                <option id="" value="+355"> Albania </option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="ceo_mobile">CEO mobile number</label>
            <input type="text" id="ceo_mobile" v-model="input.phone.number" name="ceo_mobile" class="form-control" placeholder="XXX XX XX XX">
        </div>
        <!-- <div class="col-md-3">
            <label for="ceo_email">CEO e-mail</label>
            <input type="text" id="ceo_email" v-model="input.phone.number" name="ceo_email"  class="form-control" placeholder="Email address"
        </div> -->
        <div class="col-md-6  ">
            <label for="startup_email">Startup email</label>
            <input type="text" id="startup_email" v-model="input.startup.email" name="startup_email" class="form-control" placeholder="Email address">
        </div>
        <div class="col-md-6  ">
            <label for="website">Website</label>
            <input type="text" id="website" v-model="input.website" name="website" class="form-control" placeholder="Website address">
        </div>
        <div class="col-md-12">
            <label for="what_your_company_does">What your company does?</label>
            <textarea name="what_your_company_does" v-model="input.about.company" id="what_your_company_does" cols="30" rows="10" class="form-control h160" placeholder="Type here"></textarea>
        </div>
        <div class="col-md-12">
            <label for="describe_your_product_text">Describe your product and what it does or will do</label>
            <textarea name="describe_your_product_text" v-model="input.about.product" id="describe_your_product_text" cols="30" rows="10" class="form-control h160" placeholder="Type here"></textarea>
        </div>
        <div class="col-md-12">
            <label for="what_is_your_innovation">What is your innovation - what are you doing in an absolutely new or significantly improved way?</label>
            <textarea name="what_is_your_innovation" v-model="input.about.innovation" id="what_is_your_innovation" cols="30" rows="10" class="form-control h160" placeholder="Type here"></textarea>
        </div>
        <div class="col-md-4">
            <label for="what_is_your_current_stage">What is your current stage ?</label>
            <select name="what_is_your_current_stage" v-model="input.current_stage" id="what_is_your_current_stage" class="form-control">
                <option value="0"> Choose </option>
                <option id="" value="2"> Idea Stage </option>
                <option id="" value="3"> Prototype </option>
                <option id="" value="4"> Users </option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="your_business_model">Your business model</label>
            <select name="your_business_model" v-model="input.business_model" id="your_business_model" class="form-control">
                <option value="0"> Choose </option>
                <option id="" value="1"> SAAS </option>
                <option id="" value="2"> E-commerce </option>
                <option id="" value="3"> Enterprise </option>                
            </select>
        </div>
        <div class="col-md-4">
            <label for="target_audience">Target Audience</label>
            <select name="target_audience" v-model="input.target_audience" id="target_audience" class="form-control">
                <option value="0"> Choose </option>
                <option id="" value="1"> B2B (Business to Business) </option>
                <option id="" value="2"> B2C (Business to Customer) </option>
                <option id="" value="3"> B2G (Business to Government) </option>
            </select>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="which_markets_are_you_interested_in">Industries</label>
                <select 
                    v-model="input.industries" 
                    class="js-example-disabled-results form-control select2-hidden-accessible" 
                    id="geography_on_which_you_startup_is_orientied" 
                >
                    <option value="14">Travel</option>
                    <option value="27">Hosting</option>
                    <option value="26">Music</option>
                </select>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="country_id">Country</label>
                <select name="country_id" v-model="input.country" class="form-control" id="country_id">
                    <option value="3">Azerbaijan</option>
                    <option value="1">Georgia</option>
                    <option value="2">Armenia</option>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <label for="did_you_already_received_investment">Did you already receive the investment?</label>
            <select name="did_you_already_received_investment" v-model="input.receive_investment" class="form-control" id="did_you_already_received_investment">
                <option value="1"> Yes</option>
                <option value="0"> No</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="how_much">How Much ?</label>
            <select name="how_much" v-model="input.how_much" class="form-control" id="how_much">
                <option value="0"> Choose </option>
                <option id="" value="1"> 10000-20000 </option>                  
            </select>
        </div>
        <div class="col-md-4">
            <label for="what_are_you_looking_for">What are you looking for?</label>
            <select 
                v-model="input.what_are_you_looking" 
                class="js-example-disabled-results form-control select2-hidden-accessible" 
                id="what_are_you_looking_for"
            >
                <option id="" value="1"> Investment </option>
                <option id="" value="2"> Mentoring </option>
                <option id="" value="3"> Visibility </option>                  
            </select>
            <!-- <span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="select2-data-3-ni1q" style="width: 362.333px;">
                <span class="selection">
                    <span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-disabled="false">
                        <ul class="select2-selection__rendered" id="select2-what_are_you_looking_for-container"></ul>
                        <span class="select2-search select2-search--inline">
                            <input class="select2-search__field" type="search" tabindex="0" autocorrect="off" autocapitalize="none" spellcheck="false" role="searchbox" aria-autocomplete="list" autocomplete="off" aria-describedby="select2-what_are_you_looking_for-container" placeholder="" style="width: 0.75em;">
                        </span>
                    </span>
                </span>
                <span class="dropdown-wrapper" aria-hidden="true"></span>
            </span> -->
            <img src="https://startupcentraleurasia.com/themes/application/Components/svg/drop-down-arrow.svg" alt="" class="select-arrow">
        </div>
        <div class="col-md-12">
            <div class="alert alert-warning alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                <strong>warning!</strong>   Image file formats  - JPG,PNG,JPEG; PDF file size - 2 MB;                    
            </div>
        </div>
        <div class="col-md-3 st-logo" style="margin-right: 20px;">
            <input type="file" id="image" @change="" class="filestyle" name="image" style="position: absolute; clip: rect(0px, 0px, 0px, 0px);" tabindex="-1">
            <div class="bootstrap-filestyle input-group">
                <div name="filedrag" style="position: absolute; width: 100%; height: 103px; z-index: -1;"></div>
                <span class="group-span-filestyle " tabindex="0">
                    <label for="image" style="margin-bottom: 0;" class="btn  ">
                        <img class="st-logo-img" src="https://startupcentraleurasia.com/themes/application/Components/svg/attachment.svg" alt="">
                        <span class="buttonText">Drag your logo here, or browse</span>
                    </label>
                </span>
            </div>
        </div>
        <button type="submit" id="submit" class="btn">Get started </button>
    </div>
</div>
</template>
<script>
export default{
    data(){
        return {
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
                ceo_email:"",
                website:"",
                about:{
                    company:"",
                    product:"",
                    innovation:"",
                },
                current_stage:"",
                business_model:"",
                target_audience:"",
                industries:"",
                country:"",
                receive_investment:"",
                how_much:"",
                what_are_you_looking:"",
                image:"",
            },
        }
    }
};
</script>