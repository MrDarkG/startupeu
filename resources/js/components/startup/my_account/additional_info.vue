<template>
<div>
    <div class="row">
        <div class="col-md-4 d-flex flex-column pt-3 pb-3 justify-content-between">
            <label for="are_you_interested_in_traction">
            	What kind of traction do you have ?
            </label>
            <multiselect
                id="interest_martket_id"
                v-model="input.what.traction"
                :style="setClassByValue(input.what.traction,true)"
                track-by="title"
                label="title"
                :options="default_data"
                :multiple="false"
            >
            </multiselect>
        </div>
        <div class="col-md-4 d-flex flex-column pt-3 pb-3 justify-content-between">
            <label for="are_you_interested_what_kind_of_problem_startup_solving">What kind of problem your startup will solve?</label>
            <multiselect
                id="interest_martket_id"
                v-model="input.what.problem_solve"
                :style="setClassByValue(input.what.problem_solve,true)"
                track-by="title"
                label="title"
                :options="default_data"
                :multiple="false"
            >
            </multiselect>
        </div>
        <div class="col-md-4 d-flex flex-column pt-3 pb-3 justify-content-between">
            <label for="are_you_interested_in_expected_revenue">What revenue are you expected in 5 years ?</label>
            <div class="row">
                <div class="col-md-6 money-range">
                    <input type="text" id="are_you_interested_in_expected_revenue" v-model="input.what.expected.start" :class="setClassByValue(input.what.expected.start)" class="form-control mb-0" placeholder="From">
                    <img src="https://startupcentraleurasia.com/themes/application/Components/svg/dashboard/dolar.svg">
                </div>
                <div class="col-md-6 money-range">
                    <input type="text" id="are_you_interested_in_expected_revenue" v-model="input.what.expected.end" :class="setClassByValue(input.what.expected.end)" class="form-control mb-0" placeholder="To">
                    <img src="https://startupcentraleurasia.com/themes/application/Components/svg/dashboard/dolar.svg" alt="">
                </div>
            </div>
        </div>
        <div class="col-md-4 d-flex flex-column pt-3 pb-3 justify-content-between">
            <label for="do_you_need_mrr_data">What is your current  mrr data ?</label>
            <div class="row">
                <div class="col-md-6 money-range">
                    <input type="text" id="do_you_need_mrr_data" v-model="input.what.mrr_data.start" :class="setClassByValue(input.what.mrr_data.start)" class="form-control" placeholder="From">
                    <img src="https://startupcentraleurasia.com/themes/application/Components/svg/dashboard/dolar.svg" alt="">
                </div>

                <div class="col-md-6 money-range">
                    <input type="text" id="do_you_need_mrr_data" v-model="input.what.mrr_data.end" :class="setClassByValue(input.what.mrr_data.end)" class="form-control" placeholder="To">
                    <img src="https://startupcentraleurasia.com/themes/application/Components/svg/dashboard/dolar.svg" alt="">
                </div>
            </div>
        </div>
        <div class="col-md-4 d-flex flex-column pt-3 pb-3 justify-content-between">
            <label for="do_you_need_arr_data">What is you current arr ?</label>
            <div class="row">
                <div class="col-md-6 money-range">
                    <input type="text" id="do_you_need_arr_data" v-model="input.what.arr_data.start" :class="setClassByValue(input.what.arr_data.start)"  class="form-control" placeholder="From">
                    <img src="https://startupcentraleurasia.com/themes/application/Components/svg/dashboard/dolar.svg" alt="">
                </div>

                <div class="col-md-6 money-range">
                    <input type="text" id="do_you_need_arr_data" v-model="input.what.arr_data.end" :class="setClassByValue(input.what.arr_data.end)" class="form-control" placeholder="To">
                    <img src="https://startupcentraleurasia.com/themes/application/Components/svg/dashboard/dolar.svg" alt="">
                </div>
            </div>
        </div>
        <div class="col-md-4 d-flex flex-column pt-3 pb-3 justify-content-between">
            <label for="what_is_your_retention">What is your retention ? (%)</label>
            <input type="text" id="what_is_your_retention" v-model="input.what.retention" :class="setClassByValue(input.what.retention)" class="form-control" placeholder="Write here">
        </div>

        <div class="col-md-4 d-flex flex-column pt-3 pb-3 justify-content-between">
            <label for="do_you_need_cac">Customer acquisition cos</label>
            <input type="text" id="do_you_need_cac" v-model="input.customer_acquisition" :class="setClassByValue(input.customer_acquisition)" class="form-control mb-0" placeholder="Write here">
        </div>

        <div class="col-md-4 d-flex flex-column pt-3 pb-3 justify-content-between">
            <label for="should_startup_have_prototype">Do you have prototype ?</label>
            <multiselect
                class="mb-0"
                id="interest_martket_id"
                v-model="input.prototype"
                :style="setClassByValue(input.prototype,true)"
                track-by="title"
                label="title"
                :options="default_data"
                :multiple="false"
            >
            </multiselect>
        </div>
        <div class="col-md-4 d-flex flex-column pt-3 pb-3 justify-content-between">
            <label for="should_startup_has_experience">How many years of experience do you have ?</label>
            <input type="text" id="should_startup_has_experience" v-model="input.experience" :class="setClassByValue(input.experience)" name="should_startup_has_experience" value="0" class="form-control mb-0" f="" placeholder="Number of years">
        </div>
        <div class="col-md-4 d-flex align-items-center">
            <div class="d-flex flex-column justify-content-between h-100 pt-3 pb-3">
                <label class="mb-0" for="should_startup_mention_how_much_money_they_need">How much do you need ?</label>
                <div class="row align-items-center">
                    <div class="col-md-6 money-range">
                        <input type="text" id="should_startup_mention_how_much_money_they_need" v-model="input.how_much_do_you_need.start" :class="setClassByValue(input.how_much_do_you_need.start)" class="form-control mb-0" placeholder="From">
                        <img src="https://startupcentraleurasia.com/themes/application/Components/svg/dashboard/dolar.svg" alt="">
                    </div>
                    <div class="col-md-6 money-range">
                        <input type="text" id="should_startup_mention_how_much_money_they_need" v-model="input.how_much_do_you_need.end" :class="setClassByValue(input.how_much_do_you_need.end)" class="form-control mb-0" placeholder="To">
                        <img src="https://startupcentraleurasia.com/themes/application/Components/svg/dashboard/dolar.svg" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 d-flex flex-column pt-3 pb-3 justify-content-between">
            <label for="for_how_much_percent_do_you_need_for_this_money">For how much percent do you need for this money ?</label>
            <input type="text" id="for_how_much_percent_do_you_need_for_this_money" v-model="input.how_much_percent_you_need" :class="setClassByValue(input.how_much_percent_you_need)" class="form-control mb-0" placeholder="Write here">
        </div>
        <div class="col-md-4 d-flex flex-column pt-3 pb-3 justify-content-between">
            <label for="do_you_need_churn_rate">What is your churn rate ? (%) </label>
            <input type="text" id="do_you_need_churn_rate" v-model="input.churn_rate" :class="setClassByValue(input.churn_rate)" class="form-control mb-0" placeholder="Write here">
        </div>
        <div class="clear"></div>
        <div class="col-md-12">
            <!-- url ,inputs ,div_class=null ,redirect=undefined -->
            <button class="startup-form-btn" @click="button = true;sendToSave()">Save </button>
        </div>
    </div>
</div>
</template>
<script>
export default{
	data(){
		return {
			button:false,
			input:{
				what:{
					traction:"",
					problem_solve:"",
					expected:{
						start:"",
						end:"",
					},
					mrr_data:{
						start:"",
						end:"",
					},
					arr_data:{
						start:"",
						end:"",
					},
					retention:"",
				},
				customer_acquisition:"",
				prototype:"",
				experience:"",
				how_much_do_you_need:{
					start:"",
					end:"",
				},
				how_much_percent_you_need:"",
				churn_rate:"",
			},
			default_data:[
				{
					title:1,
				},
				{
					title:2,
				},
				{
					title:3,
				},
				{
					title:4,
				},
			]
		}
	},
	methods:{
		isInputsValid(){
            let input = this.input
            let array = [
                input.what.traction,
                input.what.problem_solve,
                input.what.expected.start,
                input.what.expected.end,
                input.what.mrr_data.start,
                input.what.mrr_data.end,
                input.what.arr_data.start,
                input.what.arr_data.end,
                input.what.retention,
                input.customer_acquisition,
                input['prototype'],
                input.experience,
                input.how_much_do_you_need.start,
                input.how_much_do_you_need.end,
                input.how_much_percent_you_need,
                input.churn_rate,
            ]
            return this.checkStringValidation(array)
        },
        checkStringValidation(array){
            let counter = 0
            array.map((str, index)=>{
                if(Array.isArray(str) && str.length > 0){
                    counter+=1
                }else if(str !== undefined && str !== null && str !== "" && !Array.isArray(str)){
                    counter+=1
                }
            })
            return counter === array.length
        },
		setClassByValue(input, is_multiselect=false){
            if (this.button) {
                let bol = (is_multiselect)?{
                    border:'solid 1.5px red!important',
                    borderRadius:'5px'
                }:'border-danger'

                let is_array = (Array.isArray(input) && input.length === 0)?bol:''
                return (input !== null && input !== "" && input !== " ")?is_array:bol
            }
        },
        sendToSave(){
            if(this.isInputsValid()){
                axios.post('/save/additional/info',this.input)
                .then((response)=>{
                    console.log('წარმატებით დაემატა!')
                }).catch(()=>{
                    console.log('წარუმატებელი მოთხოვნა!')
                })
            }

        },
	}
}
</script>
