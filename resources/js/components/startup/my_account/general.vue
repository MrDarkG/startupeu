<template>
<div class="sign-form" id="startup-form">
    <div class="row">
        <div class="col-md-4">
            <label for="title">Startup Name</label>
            <input type="text" id="title" name="title" value="ragac startup" class="form-control" placeholder="Startup Name">
        </div>

        <div class="col-md-4">
            <label for="founded">Founded</label>
            <input type="text" id="founded" name="founded" value="2021" class="form-control" placeholder="Year">
        </div>

        <div class="col-md-4">
            <label for="founded_number">Number of Founders</label>
            <input type="text" id="founded_number" name="founded_number" value="1" class="form-control" placeholder="Number">
        </div>

        <div class="col-md-4">
            <label for="ceo">Full Name</label>
            <input type="text" id="ceo" name="ceo" value="saba torikashvili" class="form-control" placeholder="Full Name">
        </div>

        <div class="col-md-4">
            <label for="ceo_mobile">CEO mobile number</label>
            <input type="text" id="ceo_mobile" name="ceo_mobile" value="+995551999015" class="form-control" placeholder="+995 XXX XX XX XX">
        </div>

        <div class="col-md-4">
            <label for="ceo_email">CEO e-mail</label>
            <input type="text" id="ceo_email" name="ceo_email" value="torikabot@gmail.com" class="form-control" placeholder="Email address">
        </div>


        <div class="col-md-6  ">
            <label for="startup_email">Startup email</label>
            <input type="text" id="startup_email" name="startup_email" value="torikabot@gmail.com" class="form-control" placeholder="Email address">
        </div>

        <div class="col-md-6  ">
            <label for="website">Website</label>
            <input type="text" id="website" name="website" value="www.goandgrow.ge" class="form-control" placeholder="Website address">
        </div>


        <div class="col-md-12">
            <label for="what_your_company_does">What your company does?</label>
            <textarea name="what_your_company_does" id="what_your_company_does" cols="30" rows="10" class="form-control h160" placeholder="Type here">www.goandgrow.ge</textarea>
        </div>


        <div class="col-md-12">
            <label for="describe_your_product_text">Describe your product and what it does or will do</label>
            <textarea name="describe_your_product_text" id="describe_your_product_text" cols="30" rows="10" class="form-control h160" placeholder="Type here">www.goandgrow.ge</textarea>
        </div>


        <div class="col-md-12">
            <label for="what_is_your_innovation">What is your innovation - what are you doing in an absolutely new or significantly improved way?</label>
            <textarea name="what_is_your_innovation" id="what_is_your_innovation" cols="30" rows="10" class="form-control h160" placeholder="Type here">www.goandgrow.ge</textarea>
        </div>


        <div class="col-md-4">
            <label for="what_is_your_current_stage">What is your current stage ?</label>

            <select name="what_is_your_current_stage" id="what_is_your_current_stage" class="form-control">
                <option value="0"> Choose </option><option id="" value="2" selected=""> Idea Stage </option><option id="" value="3"> Prototype </option><option id="" value="4"> Users </option><option id="" value="5"> Paying Users </option>                            </select>

        </div>


        <div class="col-md-4">
            <label for="your_business_model">Your business model</label>

            <select name="your_business_model" id="your_business_model" class="form-control">
                <option value="0"> Choose </option><option id="" value="1"> SAAS </option><option id="" value="2"> E-commerce </option><option id="" value="3"> Enterprise </option><option id="" value="4"> Transactional </option><option id="" value="5"> Marketplace </option><option id="" value="6"> Advertising </option><option id="" value="7"> LeadGen </option><option id="" value="8" selected=""> Other </option>                            </select>

        </div>

        <div class="col-md-4">
            <label for="target_audience">Target Audience</label>

            <select name="target_audience" id="target_audience" class="form-control">
                <option value="0"> Choose </option><option id="" value="1"> B2B (Business to Business) </option><option id="" value="2" selected=""> B2C (Business to Customer) </option><option id="" value="3"> B2G (Business to Government) </option><option id="" value="4"> C2C (Customer to Customer) </option>                            </select>
        </div>


        <div class="col-md-4">
            <label for="do_you_have_traction">Do you have traction ?</label>

            <select name="do_you_have_traction" class="form-control" id="do_you_have_traction">
                <option value="1"> Yes</option>
                <option value="0"> No</option>
            </select>
        </div>


        <div class="col-md-8">
            <label for="what_kind_of_traction_do_you_have">What kind of traction do you have ?</label>
            <input type="text" id="what_kind_of_traction_do_you_have" name="what_kind_of_traction_do_you_have" value="www.goandgrow.ge" class="form-control" placeholder="Type here">
        </div>

        <div class="col-md-12">
            <label>Who are your competitors?</label>
            <div class="row">
                <div class="col-md-6">
                    <input type="text" id="company_name_one" name="company_name_one" value="www.goandgrow.ge" class="form-control" placeholder="Company Name">
                </div>

                <div class="col-md-6">
                    <input type="text" id="company_address_one" name="company_address_one" value="www.goandgrow.ge" class="form-control" placeholder="Company Address">
                </div>


                <div class="col-md-6">
                    <input type="text" id="company_name_two" name="company_name_two" value="www.goandgrow.ge" class="form-control" placeholder="Company Name">
                </div>

                <div class="col-md-6">
                    <input type="text" id="company_address_two" name="company_address_two" value="www.goandgrow.ge" class="form-control" placeholder="Company Address">
                </div>

                <div class="col-md-6">
                    <input type="text" id="company_name_three" name="company_name_three" value="www.goandgrow.ge" class="form-control" placeholder="Company Name">
                </div>

                <div class="col-md-6">
                    <input type="text" id="company_address_three" name="company_address_three" value="www.goandgrow.ge" class="form-control" placeholder="Company Address">
                </div>
            </div>

        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="country_id">Country</label>
                <select name="country_id" class="form-control" id="country_id">
                    <option value="0"> Choose </option><option id="" value="3"> Azerbaijan </option><option id="" value="1" selected=""> Georgia </option><option id="" value="2"> Armenia </option><option id="" value="4"> Kazakhstan </option><option id="" value="7"> Kyrgyzstan </option><option id="" value="5"> Uzbekistan </option><option id="" value="6"> Tajikistan </option>                                </select>
            </div>
        </div>

        <div class="col-md-4">
            <label for="did_you_already_received_investment">Did you already receive the investment?</label>

            <select name="did_you_already_received_investment" class="form-control" id="did_you_already_received_investment">
                <option value="1" selected=""> Yes</option>
                <option value="0"> No</option>
            </select>
        </div>

        <div class="col-md-4">
            <label for="how_much">How Much ?</label>

            <select name="how_much" class="form-control" id="how_much">
                <option value="0"> Choose </option><option id="" value="1"> 10000-20000 </option><option id="" value="2"> 10000 - 50.0000 </option><option id="" value="3"> 50.000- 100.000 </option><option id="" value="4"> 100.000 - 200.000 </option><option id="" value="5"> 200.000- 500.000 </option><option id="" value="6" selected="">  500.000 - more </option>                            </select>
        </div>


        <div class="col-md-4">
            <label for="what_are_you_looking_for">What are you looking for?</label>

            <select name="what_are_you_looking_for[]" class="js-example-disabled-results form-control select2-hidden-accessible" id="what_are_you_looking_for" multiple="" style="width: 100%" data-select2-id="select2-data-what_are_you_looking_for" tabindex="-1" aria-hidden="true">
                <option id="" value="1"> Investment </option><option id="" value="2"> Mentoring </option><option id="" value="3"> Visibility </option><option id="" value="4"> New connections </option><option id="" value="5"> Partners </option><option id="" value="6" selected="" data-select2-id="select2-data-3-dmbc"> Programs </option><option id="" value="7"> Other </option>                            </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="select2-data-2-ms3e" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-disabled="false"><ul class="select2-selection__rendered" id="select2-what_are_you_looking_for-container"><li class="select2-selection__choice" title=" Programs " data-select2-id="select2-data-4-zknk"><button type="button" class="select2-selection__choice__remove" tabindex="-1" title="Remove item" aria-label="Remove item" aria-describedby="select2-what_are_you_looking_for-container-choice-mew2-6"><span aria-hidden="true">×</span></button><span class="select2-selection__choice__display" id="select2-what_are_you_looking_for-container-choice-mew2-6"> Programs </span></li></ul><span class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="0" autocorrect="off" autocapitalize="none" spellcheck="false" role="searchbox" aria-autocomplete="list" autocomplete="off" aria-describedby="select2-what_are_you_looking_for-container" placeholder="" style="width: 0.75em;"></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
            <img src="https://startupcentraleurasia.com/themes/application/Components/svg/drop-down-arrow.svg" alt="" class="select-arrow">
        </div>


        <!--   <div class="col-md-3 st-logo" style="margin-right: 20px;">
               <input type="file" id="image" class="filestyle" name="image">
           </div>
           <div class="col-md-8 st-logo">
               <input type="file" id="pdf" class="filestyle" name="pdf">
           </div>-->

        <button type="submit" id="submit" class="btn">Get started </button>

    </div>
</div>
</template>