<template>
<div>
	<div class="container-fluid pd-50">
	    <div class="row sign-up">
		    <div class="col-md-4 left">
		        <a href="https://startupcentraleurasia.com/en/" class="sign-logo">
		            <img src="https://startupcentraleurasia.com/themes/application/Components/svg/sign-logo.svg" alt="">
		        </a>

		        <div class="sign-text">
		            <span>
	            		Few clicks away from your Ecosystem
		        	</span>
		            <p>
		            	Already have an account?<a href="https://startupcentraleurasia.com/en/login">Login</a>
		            </p>
		        </div>
		    </div>
		    <div class="col-md-8 right">
		        <div class="sign-title">
		            Choose the type of your account        
		        </div>
		        <div class="sign-desc">
		        	Few clicks away from your Ecosystem        
		        </div>
		        <div class="type_list">
		            <a v-for="type in types" :href="type.href" class="item">
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
		</div>
	</div>
</div>
</template>
<script>
export default{
	data(){
		return {
			types:[
				{
					title:'Startup',
					description:'Find investment',
					href:'https://startupcentraleurasia.com/en/dashboard/addUserByType/1',
					src:'https://startupcentraleurasia.com/themes/application/Components/svg/startup-icon.svg',
				},
				{
					title:'Investor',
					description:'Find startups',
					href:'https://startupcentraleurasia.com/en/dashboard/addUserByType/2',
					src:'https://startupcentraleurasia.com/themes/application/Components/svg/investor-icon.svg',
				},
				{
					title:'Mentor',
					description:'Mark the time for the session',
					href:'https://startupcentraleurasia.com/en/dashboard/addUserByType/3',
					src:'https://startupcentraleurasia.com/themes/application/Components/svg/mentor-icon.svg',
				},
			],
		}
	}
};
</script>