<template>
<div>
    <div class="row" v-if="edit_button.is_active">
        <div class="col-md-4 d-flex flex-column pt-3 pb-3 justify-content-between">
            <label for="are_you_interested_in_traction">
            	What kind of traction do you have ?
            </label>
            <input
                type="text"
                id="are_you_interested_in_traction"
                v-model="input.traction"
                :class="setClassByValue(input.traction, false, button)"
                class="form-control mb-0"
                placeholder="Traction..."
            >
        </div>
        <div class="col-md-4 d-flex flex-column pt-3 pb-3 justify-content-between">
            <label for="are_you_interested_what_kind_of_problem_startup_solving">
                What kind of problem your startup will solve?
            </label>
            <input
                type="text"
                id="are_you_interested_what_kind_of_problem_startup_solving"
                v-model="input.problem"
                :class="setClassByValue(input.problem, false, button)"
                class="form-control mb-0"
                placeholder="Problem..."
            >
        </div>
        <div class="col-md-4 d-flex flex-column pt-3 pb-3 justify-content-between">
            <label for="are_you_interested_in_expected_revenue">
                What revenue are you expected in 5 years ?
            </label>
            <div class="row">
                <div class="col-md-6 money-range">
                    <input
                        type="text"
                        id="are_you_interested_in_expected_revenue"
                        v-model="input.expected_revenue.from"
                        :class="setClassByValue(input.expected_revenue.from, false, button)"
                        class="form-control mb-0"
                        placeholder="From..."
                    >
                    <img src="https://startupcentraleurasia.com/themes/application/Components/svg/dashboard/dolar.svg">
                </div>
                <div class="col-md-6 money-range">
                    <input
                        type="text"
                        id="are_you_interested_in_expected_revenue"
                        v-model="input.expected_revenue.to"
                        :class="setClassByValue(input.expected_revenue.to, false, button)"
                        class="form-control mb-0"
                        placeholder="To..."
                    >
                    <img src="https://startupcentraleurasia.com/themes/application/Components/svg/dashboard/dolar.svg" alt="">
                </div>
            </div>
        </div>
        <div class="col-md-4 d-flex flex-column pt-3 pb-3 justify-content-between">
            <label for="do_you_need_mrr_data">
                What is your current  mrr data ?
            </label>
            <div class="row">
                <div class="col-md-6 money-range">
                    <input
                        type="text"
                        id="do_you_need_mrr_data"
                        v-model="input.mmr_data.from"
                        :class="setClassByValue(input.mmr_data.from, false, button)"
                        class="form-control"
                        placeholder="From..."
                    >
                    <img src="https://startupcentraleurasia.com/themes/application/Components/svg/dashboard/dolar.svg" alt="">
                </div>
                <div class="col-md-6 money-range">
                    <input
                        type="text"
                        id="do_you_need_mrr_data"
                        v-model="input.mmr_data.to"
                        :class="setClassByValue(input.mmr_data.to, false, button)"
                        class="form-control"
                        placeholder="To..."
                    >
                    <img src="https://startupcentraleurasia.com/themes/application/Components/svg/dashboard/dolar.svg" alt="">
                </div>
            </div>
        </div>
        <div class="col-md-4 d-flex flex-column pt-3 pb-3 justify-content-between">
            <label for="do_you_need_arr_data">
                What is you current arr ?
            </label>
            <div class="row">
                <div class="col-md-6 money-range">
                    <input
                        type="text"
                        id="do_you_need_arr_data"
                        v-model="input.current_arr.from"
                        :class="setClassByValue(input.current_arr.from, false, button)"
                        class="form-control"
                        placeholder="From..."
                    >
                    <img src="https://startupcentraleurasia.com/themes/application/Components/svg/dashboard/dolar.svg" alt="">
                </div>
                <div class="col-md-6 money-range">
                    <input
                        type="text"
                        id="do_you_need_arr_data"
                        v-model="input.current_arr.to"
                        :class="setClassByValue(input.current_arr.to, false, button)"
                        class="form-control"
                        placeholder="To..."
                    >
                    <img src="https://startupcentraleurasia.com/themes/application/Components/svg/dashboard/dolar.svg" alt="">
                </div>
            </div>
        </div>
        <div class="col-md-4 d-flex flex-column pt-3 pb-3 justify-content-between">
            <label for="what_is_your_retention">
                What is your retention ? (%)
            </label>
            <input
                type="text"
                id="what_is_your_retention"
                v-model="input.retention"
                :class="setClassByValue(input.retention, false, button)"
                class="form-control"
                placeholder="Write here"
            >
        </div>
        <div class="col-md-4 d-flex flex-column pt-3 pb-3 justify-content-between">
            <label for="do_you_need_cac">
                Customer acquisition cos
            </label>
            <input
                type="text"
                id="do_you_need_cac"
                v-model="input.custumer_acquisition"
                :class="setClassByValue(input.custumer_acquisition, false, button)"
                class="form-control mb-0"
                placeholder="Write here"
            >
        </div>
        <div class="col-md-4 d-flex flex-column pt-3 pb-3 justify-content-between">
            <label for="should_startup_have_prototype">
                Do you have prototype ?
            </label>
            <input
                type="text"
                id="should_startup_have_prototype"
                v-model="input.prototype"
                :class="setClassByValue(input.prototype, false, button)"
                class="form-control mb-0"
                placeholder="Write here"
            >
        </div>
        <div class="col-md-4 d-flex flex-column pt-3 pb-3 justify-content-between">
            <label for="should_startup_has_experience">
                How many years of experience do you have ?
            </label>
            <input
                type="text"
                id="should_startup_has_experience"
                v-model="input.years_experience"
                :class="setClassByValue(input.years_experience, false, button)"
                name="should_startup_has_experience"
                value="0"
                class="form-control mb-0"
                placeholder="Number of years"
            >
        </div>
        <div class="col-md-4 d-flex align-items-center">
            <div class="d-flex flex-column justify-content-between h-100 pt-3 pb-3">
                <label class="mb-0" for="should_startup_mention_how_much_money_they_need">
                    How much do you need ?
                </label>
                <div class="row align-items-center">
                    <div class="col-md-6 money-range">
                        <input
                            type="text"
                            id="should_startup_mention_how_much_money_they_need"
                            v-model="input.how_much_money.from"
                            :class="setClassByValue(input.how_much_money.from, false, button)"
                            class="form-control mb-0"
                            placeholder="From"
                        >
                        <img src="https://startupcentraleurasia.com/themes/application/Components/svg/dashboard/dolar.svg" alt="">
                    </div>
                    <div class="col-md-6 money-range">
                        <input
                            type="text"
                            id="should_startup_mention_how_much_money_they_need"
                            v-model="input.how_much_money.to"
                            :class="setClassByValue(input.how_much_money.to, false, button)"
                            class="form-control mb-0"
                            placeholder="To"
                        >
                        <img src="https://startupcentraleurasia.com/themes/application/Components/svg/dashboard/dolar.svg" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 d-flex flex-column pt-3 pb-3 justify-content-between">
            <label for="for_how_much_percent_do_you_need_for_this_money">
                For how much percent do you need for this money ?
            </label>
            <input
                type="text"
                id="for_how_much_percent_do_you_need_for_this_money"
                v-model="input.how_much_percent"
                :class="setClassByValue(input.how_much_percent, false, button)"
                class="form-control mb-0"
                placeholder="Write here"
            >
        </div>
        <div class="col-md-4 d-flex flex-column pt-3 pb-3 justify-content-between">
            <label for="do_you_need_churn_rate">
                What is your churn rate ? (%)
            </label>
            <input
                type="text"
                id="do_you_need_churn_rate"
                v-model="input.churn_rate"
                :class="setClassByValue(input.churn_rate, false, button)"
                class="form-control mb-0"
                placeholder="Write here"
            >
        </div>
        <div class="clear"></div>
        <div class="col-md-12">
            <button
                class="startup-form-btn"
                @click="button = true;sendToSave()"
            >
                Save
            </button>
        </div>
    </div>
    <div v-else>
        <single-page-header
            :is_looking_for_active="true"
            :user_data="{
                name:startup.name,
                logo:startup.logo,
                industries:startup.startup_industries,
                looking_for:undefined,
                black_card:{
                    title:'What are we looking for:',
                    content:'Partners'
                }
            }"
        ></single-page-header>
        <div
            class="bg-white col-md-12 mt-4 row ml-0 mr-0 pb-0 rounded-20px pt-sm-4 pl-0 pr-0 pb-4 pt-2"
        >
            <div
                class="mt-3 col-md-4 col-lg-3 pl-4 pr-3 pb-0"
                v-for="(value, key) in menu"
            >
                <div style="color:#797979;font-size:13px;">
                    {{ value.title }}:
                </div>
                <div
                    class="font-weight-bold"
                >
                    {{ value.value }}
                </div>
            </div>
        </div>
    </div>
</div>
</template>
<script>
export default{
    props:['startup','edit_button'],
	data(){
		return {
            button: false,
            menu:[
                {
                    title:'Traction',
                    value:this.startup?.aditional_info?.traction??'Not mentioned',
                },
                {
                    title:'Kind of problem startup will solve',
                    value:this.startup?.aditional_info?.problem??'Not mentioned',
                },
                {
                    title:'Expected revenue in 5 years',
                    value:this.startup?.aditional_info?.revenue??'Not mentioned',
                },
                {
                    title:'Curent mrr data',
                    value:this.startup?.aditional_info?.mmr_data??'Not mentioned',
                },
                {
                    title:'Curent arr',
                    value:this.startup?.aditional_info?.current_arr??'Not mentioned',
                },
                {
                    title:'Churn rate',
                    value:this.startup?.aditional_info?.churn_rate??'Not mentioned',
                },
                {
                    title:'Retention',
                    value:this.startup?.aditional_info?.retention??'Not mentioned',
                },
                {
                    title:'Customer Acquisition Cost',
                    value:this.startup?.aditional_info?.custumer_acquisition??'Not mentioned',
                },
                {
                    title:'Prototype',
                    value:this.startup?.aditional_info?.prototype??'Not mentioned',
                },
                {
                    title:'Startup experience',
                    value:this.startup?.aditional_info?.years_experience??'Not mentioned',
                },
                {
                    title:'Required amount of money',
                    value:this.startup?.aditional_info?.how_much_money??'Not mentioned',
                },
                {
                    title:'For how much percent?',
                    value:this.startup?.aditional_info?.how_much_percent+'%'??'Not mentioned',
                }
            ],
            input: {}
        }
	},
    created(){
        this.$emit('setEditButtonTitle','Additional')
        this.$emit('setEditButtonTitle',this.startup?.aditional_info?.traction.length === 0,'is_active')
        this.setInputDefaultValue()
    },
	methods:{
        setInputDefaultValue(){
          this.input = {
              traction:this.startup?.aditional_info?.traction??"",
              problem:this.startup?.aditional_info?.problem??"",
              expected_revenue:{
                  from:this.startup?.aditional_info?.expected_revenue.split('-')[0]??"",
                  to:this.startup?.aditional_info?.expected_revenue.split('-')[1]??""
              },
              mmr_data: {
                  from:this.startup?.aditional_info?.mmr_data.split('-')[0]??"",
                  to:this.startup?.aditional_info?.mmr_data.split('-')[1]??""
              },
              current_arr: {
                  from:this.startup?.aditional_info?.current_arr.split('-')[0]??"",
                  to:this.startup?.aditional_info?.current_arr.split('-')[1]??""
              },
              how_much_money:{
                  from:this.startup?.aditional_info?.how_much_money.split('-')[0]??"",
                  to:this.startup?.aditional_info?.how_much_money.split('-')[1]??""
              },
              retention:this.startup?.aditional_info?.retention??"",
              custumer_acquisition:this.startup?.aditional_info?.custumer_acquisition??"",
              prototype:this.startup?.aditional_info?.prototype??"",
              years_experience:this.startup?.aditional_info?.years_experience??"",
              how_much_percent:this.startup?.aditional_info?.how_much_percent??"",
              churn_rate:this.startup?.aditional_info?.churn_rate??"",
          }
        },
        sendToSave(){
            axios.post('/startup/dashboard/add/additional_info',this.input)
            .then((response)=>{
                console.log('წარმატებით დაემატა!')
                this.button = false
                window.location.reload()
            }).catch((error)=>{
                this.popupErrors(error.response.data.errors)
            })
        },
	}
}
</script>
