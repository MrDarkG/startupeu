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
                                    <label for="fields_consult_id">Fieldes consult</label>
                                    
                                    <multiselect
                                        v-model="selected"
                                        :options="countries"
                                        :multiple="true"

                                      >
                                      
                                    </multiselect>
                                </div>

                            </div>

                            <div class="col-md-12">


                                <div class="form-group">
                                    <label for="issues_consult_id">Issues consult ID</label>
                                    <multiselect
                                        v-model="selected"
                                        :options="countries"
                                        :multiple="true"
                                    >
                                    </multiselect>
                                </div>
                            </div>
                            

                            <div class="col-md-12 st-logo" style="margin-right: 20px;">
                                <input type="file" id="image" class="filestyle" name="image" style="position: absolute; clip: rect(0px, 0px, 0px, 0px);" tabindex="-1">
                                <div class="bootstrap-filestyle input-group">
                                    <div name="filedrag" style="position: absolute; width: 100%; height: 103px; z-index: -1;">
                                    
                                    </div>
                                    <span class="group-span-filestyle " tabindex="0">
                                        <label for="image" style="margin-bottom: 0;" class="btn  ">
                                            <img class="st-logo-img" src="http://beta.startupcentraleurasia.com/themes/application/Components/svg/attachment.svg" alt="">
                                            <span class="buttonText">Drag your logo here, or browse</span>
                                        </label>
                                    </span>
                                </div>
                            </div>

                            <button type="submit" id="submit" class="btn">Get started </button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
<script>
  import Multiselect from 'vue-multiselect'
  Vue.component('multiselect', Multiselect)

  export default {
    components: { Multiselect },
    data () {
      return {
        selected: null,
        options: ['list', 'of', 'options'],
        countries:[
            "Azerbaijan",
            "Georgia",
            "Armenia",
            "Khazakhstan"
        ]

      }
    }
  };
</script>