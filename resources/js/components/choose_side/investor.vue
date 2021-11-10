<template>
<div>
    <div class="sign-title">
        Investor Registration        
    </div>
    <div class="sign-desc">
    	Use our smart matching tool to find startups from Central Eurasia        
    </div>
    <form action="" class="sign-form" id="startup-form" method="post" enctype="multipart/form-data" novalidate="novalidate">
        <div class="row">
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
                </select>
            </div>
            <div class="col-md-12">
                <label for="interest_martket_id">Which markets are you interested in?</label>
                <select name="interest_martket_id" id="interest_martket_id" class="form-control">
                    <option value="0"> Choose </option>
                    <option id="" value="4"> Western Europe </option>
                    <option id="" value="5"> Eastern Europe </option>
                    <option id="" value="6"> Scandinavia </option>            
                </select>
            </div>
            <div class="col-md-12">
                <label for="interest_stage_id">Which stages are you interested in?</label>
                <select name="interest_stage_id" id="interest_stage_id" class="form-control">
                    <option value="0"> Choose </option>
                    <option id="" value="2"> Idea Stage </option>
                    <option id="" value="3"> Prototype </option>
                    <option id="" value="4"> Users </option>                  
                </select>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="country_id">Country</label>
                    <select name="country_id" class="form-control" id="country_id">
                        <option value="1">Bangladesh</option>
                        <option value="3">Burkina Faso</option>
                        <option value="2">Belgium</option>
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
            <div class="col-md-12">
                <div class="alert alert-warning alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                    <strong>warning!</strong>  Image file formats - JPG,PNG,JPEG; Size - 2MB                    
                </div>
            </div>
            <div class="col-md-12 st-logo" style="margin-right: 20px;">
                <input type="file" id="image" class="filestyle" name="image" style="position: absolute; clip: rect(0px, 0px, 0px, 0px);" tabindex="-1">
                <div class="bootstrap-filestyle input-group">
                	<div name="filedrag" style="position: absolute; width: 100%; height: 131px; z-index: -1;"></div>
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
    </form>
</div>
</template>