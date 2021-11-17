<template>
<div id="team-box" class="ment-box  sign-form">
    <div class="row">
        <div class="col-md-3">
            <div class="req-info-text">
                Team
                <div class="divid"></div>
            </div>
            <div class="st-logo" style="margin-right: 20px;">
                <input type="file" id="team_image" class="filestyle" name="team_image" style="position: absolute; clip: rect(0px, 0px, 0px, 0px);" tabindex="-1"><div class="bootstrap-filestyle input-group"><div name="filedrag" style="position: absolute; width: 100%; height: 0px; z-index: -1;"></div><span class="group-span-filestyle " tabindex="0"><label for="team_image" style="margin-bottom: 0;" class="btn  "><img class="st-logo-img" src="https://startupcentraleurasia.com/themes/application/Components/svg/attachment.svg" alt=""><span class="buttonText">Drag team image</span></label></span></div>
            </div>
            <button class="add_a_member_btn" onclick="saveTeamInfo()">
                <img src="https://startupcentraleurasia.com/themes/application/Components/svg/dashboard/plus.svg" alt="">Add another member                            
            </button>
        </div>
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-6">
                    <label for="first_name">First name</label>
                    <input type="text" id="first_name" name="first_name" value="" class="form-control" placeholder="Write here">
                </div>

                <div class="col-md-6">
                    <label for="last_name">Last name</label>
                    <input type="text" id="last_name" name="last_name" value="" class="form-control" placeholder="Write here">
                </div>


                <div class="col-md-6">
                    <label for="position">Position</label>
                    <input type="text" id="position" name="position" value="" class="form-control" placeholder="Write here">
                </div>

                <div class="col-md-6">
                    <label for="linkedin_address">Linkedin profile</label>
                    <input type="text" id="linkedin_address" name="linkedin_address" value="" class="form-control" placeholder="Write here">
                </div>

                <div class="col-md-12">
                    <label for="information_about_this_person">Information about this person</label>
                    <textarea name="information_about_this_person" id="information_about_this_person" cols="30" rows="10" class="form-control h160" placeholder="Type here"></textarea>
                </div>
            </div>
        </div>
        <div class="col-md-12">
        </div>
    </div>


</div>
</template>