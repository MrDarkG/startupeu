<template>
<div class="d-flex justify-content-center pb-3">
    <div class="dash-container p-3">
        <div class="title">
	        Create Investment Oportunity
	    </div>
        <div class="desc">
        	Oportunity Add Desc
        </div>
        <div class="row">
            <div class="investor_maping_form sign-form container">
                <div class="row">
                    <div class="col-md-12">
                        <label for="title">Choose opportunity title</label>
                        <input type="text" id="title" :class="setClassByValue(input.choose_opportunity, false, button)" v-model="input.choose_opportunity" name="title" class="form-control" placeholder="Full Name">
                    </div>
                    <div class="col-md-6">
                        <label for="interest_martket_id">Which markets are you interested in?</label>
                       <multiselect
                            id="interest_martket_id"
                            v-model="input.which.markets"
                            :style="setClassByValue(input.which.markets,true,button)"
                            track-by="name" 
                            label="name"
                            :options="countries"
                            :multiple="false"
                        >
                        </multiselect>
                    </div>
                    <div class="col-md-6">
                        <label for="industries">Choose industries you are interested in</label>
                        <multiselect
                            id="industries"
                            v-model="input.which.industries"
                            :style="setClassByValue(input.which.industries,true,button)"
                            track-by="name" 
                            label="name"
                            :options="countries"
                            :multiple="false"
                        >
                        </multiselect>
                    </div>
                    <div class="col-md-12">
                        <div class="info-bar-inv d-flex justify-content-between align-items-center">
                            <div class="d-flex justify-content-center pl-0 ml-0">
                                <h4 style="text-weight:bold;" class="mb-0">
                                    You will automaticaly get information about points:
                                </h4>
                            </div>
                            <div @click="hoverMenu" id="down_arrow" style="cursor:pointer;">
                                <img src="https://startupcentraleurasia.com/themes/application/Components/svg/arrow-down.svg" alt="">
                            </div>
                        </div>
                    </div>
                    <div v-if="menu.hovered" class="d-flex flex-wrap">  
                        <div class="req-info-text col-md-12">
                            Request additional info                                
                            <div class="divid"></div>
                        </div>
                        <div class="clear"></div>
                        <div class="d-flex flex-wrap">
                            <div class="col-md-6 chosen-box">
                            <div class="info-bar-inv">
                                <span>Are you interested in team info?</span>
                                <div class="chosen-radio">
                                    <input id="radio1-1" v-model="input.additional_info.interested_team_info" :class="setClassByValue(input.additional_info.interested_team_info, false, button)" class="radio-style" name="are_you_interested_in_team_info" type="radio" checked="" value="1">
                                    <label for="radio1-1" class="radio-style-2-label">Yes</label>
                                </div>

                                <div class="chosen-radio">
                                    <input id="radio1-2" v-model="input.additional_info.interested_team_info" :class="setClassByValue(input.additional_info.interested_team_info, false, button)" class="radio-style" name="are_you_interested_in_team_info" type="radio" checked="" value="0">
                                    <label for="radio1-2" class="radio-style-2-label">No</label>
                                </div>
                            </div>
                            </div>
                            <div class="col-md-6 chosen-box">
                                <div class="info-bar-inv">
                                    <span>Do you need churn rate ?</span>

                                    <div class="chosen-radio">
                                        <input id="radio2-1" v-model="input.additional_info.churn_rate" class="radio-style" name="do_you_need_churn_rate" type="radio" checked="" value="1">
                                        <label for="radio2-1" class="radio-style-2-label">Yes</label>
                                    </div>

                                    <div class="chosen-radio">
                                        <input id="radio2-2" class="radio-style" v-model="input.additional_info.churn_rate" name="do_you_need_churn_rate" type="radio" checked="" value="0">
                                        <label for="radio2-2" class="radio-style-2-label">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 chosen-box">
                                <div class="info-bar-inv">
                                    <span>Are you interested in traction?</span>

                                    <div class="chosen-radio">
                                        <input id="radio3-1" class="radio-style" v-model="input.additional_info.interested_traction" name="are_you_interested_in_traction" type="radio" checked="" value="1">
                                        <label for="radio3-1" class="radio-style-2-label">Yes</label>
                                    </div>

                                    <div class="chosen-radio">
                                        <input id="radio3-2" class="radio-style" v-model="input.additional_info.interested_traction" name="are_you_interested_in_traction" type="radio" checked="" value="0">
                                        <label for="radio3-2" class="radio-style-2-label">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 chosen-box">
                                <div class="info-bar-inv">
                                    <span>Are you interested what kind of problem startup solving?</span>
                                    <div class="chosen-radio">
                                        <input id="radio4-1" v-model="input.additional_info.problem_solving" class="radio-style" name="are_you_interested_what_kind_of_problem_startup_solving" type="radio" checked="" value="1">
                                        <label for="radio4-1" class="radio-style-2-label">Yes</label>
                                    </div>

                                    <div class="chosen-radio">
                                        <input id="radio4-2" class="radio-style" v-model="input.additional_info.problem_solving" name="are_you_interested_what_kind_of_problem_startup_solving" type="radio" checked="" value="0">
                                        <label for="radio4-2" class="radio-style-2-label">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 chosen-box">
                                <div class="info-bar-inv">
                                    <span>Are you interested in expected revenue?</span>
                                    <div class="chosen-radio">
                                        <input id="radio5-1" v-model="input.additional_info.expected_revenue" class="radio-style" name="are_you_interested_in_expected_revenue" type="radio" checked="" value="1">
                                        <label for="radio5-1" class="radio-style-2-label">Yes</label>
                                    </div>

                                    <div class="chosen-radio">
                                        <input id="radio5-2" v-model="input.additional_info.expected_revenue" class="radio-style" name="are_you_interested_in_expected_revenue" type="radio" checked="" value="0">
                                        <label for="radio5-2" class="radio-style-2-label">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 chosen-box">
                                <div class="info-bar-inv">
                                    <span>Do you need arr data ?</span>

                                    <div class="chosen-radio">
                                        <input id="radio6-1" v-model="input.additional_info.arr_data" class="radio-style" name="do_you_need_arr_data" type="radio" checked="" value="1">
                                        <label for="radio6-1" class="radio-style-2-label">Yes</label>
                                    </div>

                                    <div class="chosen-radio">
                                        <input id="radio6-2" v-model="input.additional_info.arr_data" class="radio-style" name="do_you_need_arr_data" type="radio" checked="" value="0">
                                        <label for="radio6-2" class="radio-style-2-label">No</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 chosen-box">
                            <div class="info-bar-inv">
                                <span>Do you need mrr data ?</span>
                                <div class="chosen-radio">
                                    <input id="radio7-1" v-model="input.additional_info.mmr_data" class="radio-style" name="do_you_need_mrr_data" type="radio" checked="" value="1">
                                    <label for="radio7-1" class="radio-style-2-label">Yes</label>
                                </div>

                                <div class="chosen-radio">
                                    <input id="radio7-2" v-model="input.additional_info.mmr_data" class="radio-style" name="do_you_need_mrr_data" type="radio" checked="" value="0">
                                    <label for="radio7-2" class="radio-style-2-label">No</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 chosen-box">
                            <div class="info-bar-inv">
                                <span>I am interested in MRR range:</span>
                                <div class="chosen-radio d-flex align-items-center w-100">
                                    <div>
                                       {{ input.range[0] }} 
                                    </div>
                                    <vue-slider 
                                        class="investor_mmr_slider ml-2  w-100"
                                        v-model="input.range" 
                                        :min="10000" 
                                        :max="15000"
                                    />
                                    <div class="ml-2">
                                       {{ input.range[1] }} 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 chosen-box">
                            <div class="info-bar-inv">
                                <span>Do you need cac ?</span>

                                <div class="chosen-radio">
                                    <input id="radio8-1" v-model="input.additional_info.do_you_need_cac" class="radio-style" name="do_you_need_cac" type="radio" checked="" value="1">
                                    <label for="radio8-1" class="radio-style-2-label">Yes</label>
                                </div>

                                <div class="chosen-radio">
                                    <input id="radio8-2" v-model="input.additional_info.do_you_need_cac" class="radio-style" name="do_you_need_cac" type="radio" checked="" value="0">
                                    <label for="radio8-2" class="radio-style-2-label">No</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 chosen-box">
                            <div class="info-bar-inv">
                                <span>Should startup have prototype? </span>

                                <div class="chosen-radio">
                                    <input id="radio9-1" v-model="input.additional_info.startup_have_prototype" class="radio-style" name="should_startup_have_prototype" type="radio" checked="" value="1">
                                    <label for="radio9-1" class="radio-style-2-label">Yes</label>
                                </div>

                                <div class="chosen-radio">
                                    <input id="radio9-2" v-model="input.additional_info.startup_have_prototype" class="radio-style" name="should_startup_have_prototype" type="radio" checked="" value="0">
                                    <label for="radio9-2" class="radio-style-2-label">No</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 chosen-box">
                            <div class="info-bar-inv">
                                <span>Should startup has experience?</span>

                                <div class="chosen-radio">
                                    <input id="radio10-1" v-model="input.additional_info.should_startup_has_experience" class="radio-style" name="should_startup_has_experience" type="radio" checked="" value="1">
                                    <label for="radio10-1" class="radio-style-2-label">Yes</label>
                                </div>

                                <div class="chosen-radio">
                                    <input id="radio10-2" v-model="input.additional_info.should_startup_has_experience" class="radio-style" name="should_startup_has_experience" type="radio" checked="" value="0">
                                    <label for="radio10-2" class="radio-style-2-label">No</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 chosen-box">
                            <div class="info-bar-inv">
                                <span class="text-break">should_startup_mention_how_much_money_they_need</span>
                                <div class="chosen-radio">
                                    <input id="radio12-1" v-model="input.additional_info.should_startup_mention_how_much_money" class="radio-style" name="should_startup_mention_how_much_money_they_need" type="radio" checked="" value="1">
                                    <label for="radio12-1" class="radio-style-2-label">Yes</label>
                                </div>

                                <div class="chosen-radio">
                                    <input id="radio12-2" v-model="input.additional_info.should_startup_mention_how_much_money" class="radio-style" name="should_startup_mention_how_much_money_they_need" type="radio" checked="" value="0">
                                    <label for="radio12-2" class="radio-style-2-label">No</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 chosen-box">
                            <div class="info-bar-inv">
                                <span>What is your retention ?</span>
                                <div class="chosen-radio">
                                    <input id="radio13-1" v-model="input.additional_info.what_is_your_retention" class="radio-style" name="what_is_your_retention" type="radio" checked="" value="1">
                                    <label for="radio13-1" class="radio-style-2-label">Yes</label>
                                </div>

                                <div class="chosen-radio">
                                    <input id="radio13-2" v-model="input.additional_info.what_is_your_retention" class="radio-style" name="what_is_your_retention" type="radio" checked="" value="0">
                                    <label for="radio13-2" class="radio-style-2-label">No</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 chosen-box">
                            <div class="info-bar-inv">
                                <span>Should startup mention how much % they need for this money?</span>
                                <div class="chosen-radio">
                                    <input id="radio14-1" v-model="input.additional_info.how_much_percent_they_need" class="radio-style" name="for_how_much_percent_do_you_need_for_this_money" type="radio" checked="" value="1">
                                    <label for="radio14-1" class="radio-style-2-label">Yes</label>
                                </div>

                                <div class="chosen-radio">
                                    <input id="radio14-2" v-model="input.additional_info.how_much_percent_they_need" class="radio-style" name="for_how_much_percent_do_you_need_for_this_money" type="radio" checked="" value="0">
                                    <label for="radio14-2" class="radio-style-2-label">No</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="btns" @click="button=true;sendToSave('/register/investment' ,input ,'vm--modal')">
                            <button class="add-publish-btn btn">
                                Publish
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>
<script>
export default{
	data(){
		return{
            button:false,
            menu:{
                hovered:true,
            },
            input:{
			    range:[10000,15000],
                choose_opportunity:"",
                which:{
                    markets:"",
                    industries:"",
                },
                additional_info:{
                    interested_team_info:"0",
                    churn_rate:"0",
                    interested_traction:"0",
                    problem_solving:"0",
                    expected_revenue:"0",
                    arr_data:"0",
                    do_you_need_cac:"0",
                    startup_have_prototype:"0",
                    should_startup_has_experience:"0",
                    should_startup_mention_how_much_money:"0",
                    what_is_your_retention:"0",
                    how_much_percent_they_need:"0",
                },
            },
            countries:[
                {
                    name:"Azerbaijan",
                },
                {
                    name:"Georgia",
                },
                {
                    name:"Armenia",
                },
                {
                    name:"Khazakhstan",
                },
            ],
		}
	},
    methods:{ 
        hoverMenu(){
            this.menu.hovered = !this.menu.hovered
            let is_rotate = (this.menu.hovered)?'0':'180'
            document.getElementById('down_arrow').style.transform = `rotate(${is_rotate}deg)`
        },
    }
}
</script>
<style>
.investor_mmr_slider .vue-slider-process{
    background:#6200ee!important;
}
.vue-slider-dot-tooltip-inner ,.vue-slider-dot-tooltip-inner-top{
    background:#6200ee!important;
}
.vue-slider-dot-tooltip-inner-top ,.vue-slider-dot-tooltip-text{
    color:white!important;
}
</style>