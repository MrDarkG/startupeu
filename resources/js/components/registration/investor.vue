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
                    <textarea name="successful_investments" id="successful_investments" cols="30" rows="10" class="form-control h160" placeholder="Type here">
                        
                    </textarea>
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
                        <option id="" value="3"> 50.000 - 100.000 </option>
                        <option id="" value="4"> 100.000 - 200.000 </option>
                        <option id="" value="5"> 200.000 - 500.000 </option>
                        <option id="" value="6">  500.000 - more </option>                    
                    </select>

                </div>

                <div class="col-md-12">
                    <label for="interest_martket_id">Which markets are you interested in?</label>
                    <select name="interest_martket_id" id="interest_martket_id" class="form-control valid" aria-invalid="false">
                        <option value="0"> Choose </option>
                        <option id="" value="9"> Central Asia </option>
                        <option id="" value="17"> Central and South America </option>
                        <option id="" value="16"> Canada </option>
                        <option id="" value="15"> USA </option>
                        <option id="" value="14"> Africa </option>
                        <option id="" value="13"> Australia </option>
                        <option id="" value="12"> India </option>
                        <option id="" value="11"> Japan </option>
                        <option id="" value="10"> China </option>
                        <option id="" value="1"> Advertising </option>
                        <option id="" value="8"> Asia </option>
                        <option id="" value="7"> CIS  </option>
                        <option id="" value="6"> Scandinavia </option>
                        <option id="" value="5"> Eastern Europe </option>
                        <option id="" value="4"> Western Europe </option>
                        <option id="" value="3"> Marketing </option>
                        <option id="" value="2"> sales </option>                    
                    </select>

                </div>

                <div class="col-md-12">
                    <label for="interest_stage_id">Which stages are you interested in?</label>
                    <select name="interest_stage_id" id="interest_stage_id" class="form-control valid" aria-invalid="false">
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
                            <select name="country_id" class="form-control valid" id="country_id" aria-invalid="false">
                                <option value="1">Bangladesh</option>
                                <option value="3">Burkina Faso</option>
                                <option value="2">Belgium</option>
                                <option value="4">Bulgaria</option>
                                <option value="5">Bosnia and Herzegovina</option>
                                <option value="6">Barbados</option>
                                <option value="7">Wallis and Futuna</option>
                                <option value="8">Saint Barthelemy</option>
                                <option value="9">Bermuda</option>
                                <option value="10">Brunei</option>
                                <option value="11">Bolivia</option>
                                <option value="12">Bahrain</option>
                                <option value="13">Burundi</option>
                                <option value="14">Benin</option>
                                <option value="15">Bhutan</option>
                                <option value="16">Jamaica</option>
                                <option value="17">Bouvet Island</option>
                                <option value="18">Botswana</option>
                                <option value="19">Samoa</option>
                                <option value="20">Bonaire, Saint Eustatius and Saba </option>
                                <option value="21">Brazil</option>
                                <option value="22">Bahamas</option>
                                <option value="23">Jersey</option>
                                <option value="24">Belarus</option>
                                <option value="25">Belize</option>
                                <option value="26">Russia</option>
                                <option value="27">Rwanda</option>
                                <option value="28">Serbia</option>
                                <option value="29">East Timor</option>
                                <option value="30">Reunion</option>
                                <option value="31">Turkmenistan</option>
                                <option value="32">Tajikistan</option>
                                <option value="33">Romania</option>
                                <option value="34">Tokelau</option>
                                <option value="35">Guinea-Bissau</option>
                                <option value="36">Guam</option>
                                <option value="37">Guatemala</option>
                                <option value="38">South Georgia and the South Sandwich Islands</option>
                                <option value="39">Greece</option>
                                <option value="40">Equatorial Guinea</option>
                                <option value="41">Guadeloupe</option>
                                <option value="42">Japan</option>
                                <option value="43">Guyana</option>
                                <option value="44">Guernsey</option>
                                <option value="45">French Guiana</option>
                                <option value="46">Georgia</option>
                                <option value="47">Grenada</option>
                                <option value="48">United Kingdom</option>
                                <option value="49">Gabon</option>
                                <option value="50">El Salvador</option>
                                <option value="51">Guinea</option>
                                <option value="52">Gambia</option>
                                <option value="53">Greenland</option>
                                <option value="54">Gibraltar</option>
                                <option value="55">Ghana</option>
                                <option value="56">Oman</option>
                                <option value="57">Tunisia</option>
                                <option value="58">Jordan</option>
                                <option value="59">Croatia</option>
                                <option value="60">Haiti</option>
                                <option value="61">Hungary</option>
                                <option value="62">Hong Kong</option>
                                <option value="63">Honduras</option>
                                <option value="64">Heard Island and McDonald Islands</option>
                                <option value="65">Venezuela</option>
                                <option value="66">Puerto Rico</option>
                                <option value="67">Palestinian Territory</option>
                                <option value="68">Palau</option>
                                <option value="69">Portugal</option>
                                <option value="70">Svalbard and Jan Mayen</option>
                                <option value="71">Paraguay</option>
                                <option value="72">Iraq</option>
                                <option value="73">Panama</option>
                                <option value="74">French Polynesia</option>
                                <option value="75">Papua New Guinea</option>
                                <option value="76">Peru</option>
                                <option value="77">Pakistan</option>
                                <option value="78">Philippines</option>
                                <option value="79">Pitcairn</option>
                                <option value="80">Poland</option>
                                <option value="81">Saint Pierre and Miquelon</option>
                                <option value="82">Zambia</option>
                                <option value="83">Western Sahara</option>
                                <option value="84">Estonia</option>
                                <option value="85">Egypt</option>
                                <option value="86">South Africa</option>
                                <option value="87">Ecuador</option>
                                <option value="88">Italy</option>
                                <option value="89">Vietnam</option>
                                <option value="90">Solomon Islands</option>
                                <option value="91">Ethiopia</option>
                                <option value="92">Somalia</option>
                                <option value="93">Zimbabwe</option>
                                <option value="94">Saudi Arabia</option>
                                <option value="95">Spain</option>
                                <option value="96">Eritrea</option>
                                <option value="97">Montenegro</option>
                                <option value="98">Moldova</option>
                                <option value="99">Madagascar</option>
                                <option value="100">Saint Martin</option>
                                <option value="101">Morocco</option>
                                <option value="102">Monaco</option>
                                <option value="103">Uzbekistan</option>
                                <option value="104">Myanmar</option>
                                <option value="105">Mali</option>
                                <option value="106">Macao</option>
                                <option value="107">Mongolia</option>
                                <option value="108">Marshall Islands</option>
                                <option value="109">Macedonia</option>
                                <option value="110">Mauritius</option>
                                <option value="111">Malta</option>
                                <option value="112">Malawi</option>
                                <option value="113">Maldives</option>
                                <option value="114">Martinique</option>
                                <option value="115">Northern Mariana Islands</option>
                                <option value="116">Montserrat</option>
                                <option value="117">Mauritania</option>
                                <option value="118">Isle of Man</option>
                                <option value="119">Uganda</option>
                                <option value="120">Tanzania</option>
                                <option value="121">Malaysia</option>
                                <option value="122">Mexico</option>
                                <option value="123">Israel</option>
                                <option value="124">France</option>
                                <option value="125">British Indian Ocean Territory</option>
                                <option value="126">Saint Helena</option>
                                <option value="127">Finland</option>
                                <option value="128">Fiji</option>
                                <option value="129">Falkland Islands</option>
                                <option value="130">Micronesia</option>
                                <option value="131">Faroe Islands</option>
                                <option value="132">Nicaragua</option>
                                <option value="133">Netherlands</option>
                                <option value="134">Norway</option>
                                <option value="135">Namibia</option>
                                <option value="136">Vanuatu</option>
                                <option value="137">New Caledonia</option>
                                <option value="138">Niger</option>
                                <option value="139">Norfolk Island</option>
                                <option value="140">Nigeria</option>
                                <option value="141">New Zealand</option>
                                <option value="142">Nepal</option>
                                <option value="143">Nauru</option>
                                <option value="144">Niue</option>
                                <option value="145">Cook Islands</option>
                                <option value="146">Kosovo</option>
                                <option value="147">Ivory Coast</option>
                                <option value="148">Switzerland</option>
                                <option value="149">Colombia</option>
                                <option value="150">China</option>
                                <option value="151">Cameroon</option>
                                <option value="152">Chile</option>
                                <option value="153">Cocos Islands</option>
                                <option value="154">Canada</option>
                                <option value="155">Republic of the Congo</option>
                                <option value="156">Central African Republic</option>
                                <option value="157">Democratic Republic of the Congo</option>
                                <option value="158">Czech Republic</option>
                                <option value="159">Cyprus</option>
                                <option value="160">Christmas Island</option>
                                <option value="161">Costa Rica</option>
                                <option value="162">Curacao</option>
                                <option value="163">Cape Verde</option>
                                <option value="164">Cuba</option>
                                <option value="165">Swaziland</option>
                                <option value="166">Syria</option>
                                <option value="167">Sint Maarten</option>
                                <option value="168">Kyrgyzstan</option>
                                <option value="169">Kenya</option>
                                <option value="170">South Sudan</option>
                                <option value="171">Suriname</option>
                                <option value="172">Kiribati</option>
                                <option value="173">Cambodia</option>
                                <option value="174">Saint Kitts and Nevis</option>
                                <option value="175">Comoros</option>
                                <option value="176">Sao Tome and Principe</option>
                                <option value="177">Slovakia</option>
                                <option value="178">South Korea</option>
                                <option value="179">Slovenia</option>
                                <option value="180">North Korea</option>
                                <option value="181">Kuwait</option>
                                <option value="182">Senegal</option>
                                <option value="183">San Marino</option>
                                <option value="184">Sierra Leone</option>
                                <option value="185">Seychelles</option>
                                <option value="186">Kazakhstan</option>
                                <option value="187">Cayman Islands</option>
                                <option value="188">Singapore</option>
                                <option value="189">Sweden</option>
                                <option value="190">Sudan</option>
                                <option value="191">Dominican Republic</option>
                                <option value="192">Dominica</option>
                                <option value="193">Djibouti</option>
                                <option value="194">Denmark</option>
                                <option value="195">British Virgin Islands</option>
                                <option value="196">Germany</option>
                                <option value="197">Yemen</option>
                                <option value="198">Algeria</option>
                                <option value="199">United States</option>
                                <option value="200">Uruguay</option>
                                <option value="201">Mayotte</option>
                                <option value="202">United States Minor Outlying Islands</option>
                                <option value="203">Lebanon</option>
                                <option value="204">Saint Lucia</option>
                                <option value="205">Laos</option>
                                <option value="206">Tuvalu</option>
                                <option value="207">Taiwan</option>
                                <option value="208">Trinidad and Tobago</option>
                                <option value="209">Turkey</option>
                                <option value="210">Sri Lanka</option>
                                <option value="211">Liechtenstein</option>
                                <option value="212">Latvia</option>
                                <option value="213">Tonga</option>
                                <option value="214">Lithuania</option>
                                <option value="215">Luxembourg</option>
                                <option value="216">Liberia</option>
                                <option value="217">Lesotho</option>
                                <option value="218">Thailand</option>
                                <option value="219">French Southern Territories</option>
                                <option value="220">Togo</option>
                                <option value="221">Chad</option>
                                <option value="222">Turks and Caicos Islands</option>
                                <option value="223">Libya</option>
                                <option value="224">Vatican</option>
                                <option value="225">Saint Vincent and the Grenadines</option>
                                <option value="226">United Arab Emirates</option>
                                <option value="227">Andorra</option>
                                <option value="228">Antigua and Barbuda</option>
                                <option value="229">Afghanistan</option>
                                <option value="230">Anguilla</option>
                                <option value="231">U.S. Virgin Islands</option>
                                <option value="232">Iceland</option>
                                <option value="233">Iran</option>
                                <option value="234">Armenia</option>
                                <option value="235">Albania</option>
                                <option value="236">Angola</option>
                                <option value="237">Antarctica</option>
                                <option value="238">American Samoa</option>
                                <option value="239">Argentina</option>
                                <option value="240">Australia</option>
                                <option value="241">Austria</option>
                                <option value="242">Aruba</option>
                                <option value="243">India</option>
                                <option value="244">Aland Islands</option>
                                <option value="245">Azerbaijan</option>
                                <option value="246">Ireland</option>
                                <option value="247">Indonesia</option>
                                <option value="248">Ukraine</option>
                                <option value="249">Qatar</option>
                                <option value="250">Mozambique</option>
                            </select>
                    </div>
                </div>

                <div class="col-md-12">
                    <label for="investor_type">investor_type</label>
                    <select name="investor_type" id="investor_type" class="form-control valid" aria-invalid="false">
                        <option value="0"> Choose </option>
                        <option id="" value="1"> Venture Funds </option>
                        <option id="" value="2"> Angels </option>
                        <option id="" value="3"> Accelerators </option>                    
                    </select>
                </div>
                <div class="col-md-12">
                    <div class="alert alert-warning alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        <strong>warning!</strong>  
                        file_text_for_investor                   
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