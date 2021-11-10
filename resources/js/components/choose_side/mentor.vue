<template>
<div>
    <div class="sign-title">
        Mentor Registration         
    </div>
    <div class="sign-desc">
        Plan your mentorship sessions easily        
    </div>
    <form action="" class="sign-form" id="startup-form" method="post" enctype="multipart/form-data" novalidate="novalidate">
        <div class="row">
            <div class="col-md-6">
                <label for="full_name">Full Name</label>
                <input type="text" id="full_name" name="full_name" value="" class="form-control" placeholder="Full Name">
            </div>
            <div class="col-md-6">
                <label for="linkedin_address">Linkedin profile</label>
                <input type="text" id="linkedin_address" name="linkedin_address" value="" class="form-control" placeholder="Linkedin profile">
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
                    <select name="country_id" class="form-control" id="country_id">
                        <option value="3">Azerbaijan</option>
                        <option value="1">Georgia</option>
                        <option value="2">Armenia</option>
                        <option value="4">Kazakhstan</option>
                        <option value="7">Kyrgyzstan</option>
                        <option value="5">Uzbekistan</option>
                        <option value="6">Tajikistan</option>
                    </select>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="fields_consult_id">Which fields can you consult in?</label>
                    <select name="fields_consult_id[]" class="js-example-disabled-results form-control select2-hidden-accessible" id="fields_consult_id" multiple="" data-select2-id="select2-data-fields_consult_id" tabindex="-1" aria-hidden="true">
                        <option value="12">Blockchain</option>
                        <option value="24">Legal</option>
                        <option value="23">Enterprise Software</option>
                        <option value="22">Media</option>
                        <option value="21">Marketing</option>
                        <option value="20">Security</option>
                    </select>
                    <span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="select2-data-1-qqwv" style="width: 849px;">
                        <span class="selection">
                            <span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-disabled="false">
                                <ul class="select2-selection__rendered" id="select2-fields_consult_id-container"></ul>
                                <span class="select2-search select2-search--inline">
                                    <input class="select2-search__field" type="search" tabindex="0" autocorrect="off" autocapitalize="none" spellcheck="false" role="searchbox" aria-autocomplete="list" autocomplete="off" aria-describedby="select2-fields_consult_id-container" placeholder="" style="width: 0.75em;">
                                </span>
                            </span>
                        </span>
                        <span class="dropdown-wrapper" aria-hidden="true"></span>
                    </span>
                    <img src="https://startupcentraleurasia.com/themes/application/Components/svg/drop-down-arrow.svg" alt="" class="select-arrow">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="issues_consult_id">Which issues can you consult on?</label>
                    
                    <select name="issues_consult_id[]" class="js-example-disabled-results form-control select2-hidden-accessible" id="issues_consult_id" multiple="" data-select2-id="select2-data-issues_consult_id" tabindex="-1" aria-hidden="true">
                        <option value="8">Strategy </option>
                        <option value="9">Business analytics</option>
                        <option value="10">Technology</option>
                        <option value="11">AI</option>
                    </select>
                    <span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="select2-data-2-lh5f" style="width: 849px;">
                        <span class="selection">
                            <span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-disabled="false">
                                <ul class="select2-selection__rendered" id="select2-issues_consult_id-container"></ul>
                                <span class="select2-search select2-search--inline">
                                    <input class="select2-search__field" type="search" tabindex="0" autocorrect="off" autocapitalize="none" spellcheck="false" role="searchbox" aria-autocomplete="list" autocomplete="off" aria-describedby="select2-issues_consult_id-container" placeholder="" style="width: 0.75em;">
                                </span>
                            </span>
                        </span>
                        <span class="dropdown-wrapper" aria-hidden="true"></span>
                    </span>
                    <img src="https://startupcentraleurasia.com/themes/application/Components/svg/drop-down-arrow.svg" alt="" class="select-arrow">
                </div>
            </div>
            <div class="col-md-12">
                <div class="alert alert-warning alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                    <strong>warning!</strong>  file_text_for_mentor                    
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