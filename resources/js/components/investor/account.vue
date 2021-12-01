<template>
<div>
	<div class="ml-4">

        <div class="row dash-container sign-up">
            <div class="title">My account</div>
            <div class="sign-form" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12">
                        <div class="clear"></div>
                    </div>
                    <div class="col-md-6">
                        <label for="full_name">Full Name</label>
                        <input type="text" id="full_name" name="full_name" value="" class="form-control" placeholder="Full Name">
                    </div>
                    <div class="col-md-6">
                        <label for="company_name">Company name</label>
                        <input type="text" id="company_name" name="company_name" value="" class="form-control" placeholder="Company name">
                    </div>
                    <div class="col-md-12">
                        <label for="successful_investments">Successful investments</label>
                        <textarea name="successful_investments" id="successful_investments" cols="30" rows="10" class="form-control h160" placeholder="Type here"></textarea>
                    </div>
                    <div class="col-md-12">
                        <label for="successful_investments">About Investor</label>
                        <textarea name="about_investor" id="about_investor" cols="30" rows="10" class="form-control h160" placeholder="Type here"></textarea>
                    </div>
                    <div class="col-md-4">
                        <label for="website">Website</label>
                        <input type="text" id="website" name="website" value="" class="form-control" placeholder="Website address">
                    </div>
                    <div class="col-md-4">
                        <label for="email">Email</label>
                        <input type="text" id="email" name="email" value="" class="form-control" placeholder="Email address">
                    </div>
                    <div class="col-md-4">
                        <label for="investment_range">Investment range</label>

                        <select name="investment_range" id="investment_range" class="form-control">
                            <option value="0"> Choose </option>
                            <option id="" value="1"> 10000-20000 </option>
                            <option id="" value="2"> 10000 - 50.0000 </option>
                            <option id="" value="3"> 50.000- 100.000 </option>
                            <option id="" value="4"> 100.000 - 200.000 </option>
                            <option id="" value="5"> 200.000- 500.000 </option>
                            <option id="" value="6">  500.000 - more </option>                        
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label for="interest_martket_id">Which markets are you interested in?</label>
                        <select name="interest_martket_id" id="interest_martket_id" class="form-control">
                            <option value="0"> Choose </option>
                            <option id="" value="4"> Western Europe </option>
                            <option id="" value="5"> Eastern Europe </option>
                            <option id="" value="6"> Scandinavia </option>
                            <option id="" value="7"> CIS  </option>
                            <option id="" value="8"> Asia </option>                       
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label for="interest_stage_id">Which stages are you interested in?</label>
                        <select name="interest_stage_id" id="interest_stage_id" class="form-control">
                            <option value="0"> Choose </option>
                            <option id="" value="2"> Idea Stage </option>
                            <option id="" value="3"> Prototype </option>
                            <option id="" value="4"> Users </option>
                            <option id="" value="5"> Paying Users </option>                        
                        </select>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="country_id">Country</label>
                            <select name="country_id" class="form-control" id="country_id">
                                <option value="0"> Choose </option>
                                <option id="" value="1"> Bangladesh </option>
                                <option id="" value="3"> Burkina Faso </option>
                                <option id="" value="2"> Belgium </option>
                                <option id="" value="4"> Bulgaria </option>
                                <option id="" value="5"> Bosnia and Herzegovina </option> 
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="investor_type">investor_type</label>
                        <select name="investor_type" id="investor_type" class="form-control">
                            <option value="0"> Choose </option>
                            <option id="" value="1"> Venture Funds </option>
                            <option id="" value="2"> Angels </option>
                            <option id="" value="3"> Accelerators </option>                        
                        </select>
                    </div>
                    <div class="col-md-12 st-logo" style="margin-right: 20px;">
                        <input type="file" id="image" class="filestyle" name="image" style="position: absolute; clip: rect(0px, 0px, 0px, 0px);" tabindex="-1"><div class="bootstrap-filestyle input-group"><div name="filedrag" style="position: absolute; width: 100%; height: 103px; z-index: -1;"></div><span class="group-span-filestyle " tabindex="0"><label for="image" style="margin-bottom: 0;" class="btn  "><img class="st-logo-img" src="https://startupcentraleurasia.com/themes/application/Components/svg/attachment.svg" alt=""><span class="buttonText">Drag your logo here, or browse</span></label></span></div>
                    </div>
                    <div class="float-right">
                    	<button type="submit" id="submit" class="btn">edit_investor_info</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>
<script>
import helper from '../../mixin/helper.vue'
export default{	
	mixins:[helper],
	props:{
		startups:Array,
	},
	data(){
		return{
			input:{

			},
		}
	},
	methods:{
	},
};
</script>