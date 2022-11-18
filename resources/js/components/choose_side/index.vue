<template>
<div>
	<div class="container-fluid pd-50">
	    <div class="row sign-up">
		    <div class="col-md-4 left">
		        <a href="/" class="sign-logo">
		            <img src="/assets/images/sign-logo.svg" alt="">
		        </a>
		        <div class="sign-text">
		            <span>
	            		Few clicks away from your Ecosystem
		        	</span>
		            <p>
		            	Already have an account?<a href="/login">Login</a>
		            </p>
		        </div>
		    </div>
		    <div class="col-md-8 right"  v-if="selected.type.index === undefined">
		        <div class="sign-title">
		            Choose the type of your account
		        </div>
		        <div class="sign-desc">
		        	Few clicks away from your Ecosystem
		        </div>
		        <div class="type_list">
		            <a
		            	v-for="(type, index) in types"
		            	@click="onTypeClick(index, type);type.is_selected=true;"
		            	class="item"
	            	>
		                <img :src="type.src" alt="">
		                <div class="texts">
		                    <div class="t-title">
		                    	{{ type.title }}
		                    </div>
		                    <div class="t-desc">
		                    	{{ type.description }}
		                    </div>
		                </div>
		            </a>
		        </div>
	    	</div>
			<div class="col-md-8 right mt-3" v-else>
				<div>
					<button class="btn btn-light login-btn" @click="types.map((type)=>type.is_selected = false);selected.type = {}">
						<!-- <i class="fa fa-arrow-left"></i> -->
						< back
					</button>
				</div>
				<create-startup
					:stages="stages"
                    :phone_index="phone_index"
					:countries="countries"
					:industries="industries"
					:looking_for="looking_for"
					:investment_range="investment_range"
					:investor_types="investor_types"
					:bussines_models="bussines_models"
					class="pt-2"
					v-if="selected.type.index === 0"
				/>
				<create-investor
					:investor_types="investor_types"
					:looking_for="looking_for"
					:investment_range="investment_range"
					:markets="markets"
					:countries="countries"
					:stages="stages"
					class="pt-2"
					v-if="selected.type.index === 1"
				/>
				<create-mentor
                    :issues="issues"
                    :fields="fields"
                    :countries="countries"
                    class="pt-2"
					v-if="selected.type.index === 2"
				/>
			</div>
		</div>
	</div>
</div>
</template>
<script>
export default{
	props:[
        "stages",
        "bussines_models",
        "phone_index",
        "countries",
        "industries",
        "investment_range",
        "looking_for",
        "markets",
        "investor_types",
        "issues",
        "fields"
    ],
    methods:{
      onTypeClick(index ,type){
          this.types.map((tp)=>tp.is_selected = false)
          this.selected.type = type
          this.selected.type.index = index
          // this.changeUserType(index)
      },
    },
	data(){
		return {
			selected:{
				type:{},
			},
			types:[
				{
					title:'Startup',
					description:'Find investment',
					// href:'https://startupcentraleurasia.com/en/dashboard/addUserByType/1',
					is_selected:false,
					src:'/assets/images/startup-icon.svg',
				},
				{
					title:'Investor',
					description:'Find startups',
					// href:'https://startupcentraleurasia.com/en/dashboard/addUserByType/2',
					is_selected:false,
					src:'/assets/images/investor-icon.svg',
				},
				{
					title:'Mentor',
					description:'Mark the time for the session',
					// href:'https://startupcentraleurasia.com/en/dashboard/addUserByType/3',
					is_selected:false,
					src:'/assets/images/mentor-icon.svg',
				},
			],
		}
	}
};
</script>
