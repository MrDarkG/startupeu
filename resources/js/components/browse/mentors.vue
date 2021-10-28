<template>
<div class="container">
    <div class="container-fluid startup-list-search">
        <div class="list-search">
            <div class="left">
                <img src="https://beta.startupcentraleurasia.com/themes/application/Components/svg/search.svg" alt="" width="20">
                <label for="search">
                    <input type="text" id="search" placeholder="Search..." name="s" value="">
                </label>
            </div>

            <div class="right">
                <button type="submit">Search</button>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row startup-list">
            <div class="col-md-3 left-search">
			    <div class="chek-list">
			        <div class="title">Countries </div>
			        <ul>

			            <li v-for="country in contries" :key="country.id+country.title">
			                <div class="form-check">
			                    <input class="form-check-input country-check" type="checkbox" value="5" :id="`country-${country.id}`">
			                    <label class="form-check-label" :for="`country-${country.id}`">
			                        {{ country.title }}                    
			                    </label>
			                </div>
			            </li>
			        </ul>
			    </div>
			    <div class="chek-list">
			        <div class="title">issues_consult</div>
			        <ul>
			        	<li v-for="issue in issues" :key="issue.id+issue.title">
			                <div class="form-check">
			                    <input class="form-check-input" type="checkbox" value="25" :id="`Issues-${issue.id}`">
			                    <label class="form-check-label" :for="`Issues-${issue.id}`">
			                        {{ issue.title }}                    
			                    </label>
			                </div>
			            </li>
			        </ul>
			    </div>
			    <div class="chek-list">
			    	<div class="title">Fieldes consult</div>
			    	<ul>
			            <li v-for="field in fields" :key="field.id+field.title">
			                <div class="form-check">
			                    <input class="form-check-input" type="checkbox" value="2" :id="`fieldes-${field.id}`">
			                    <label class="form-check-label" :for="`fieldes-${field.id}`">
			                        {{ field.title }}              
			                    </label>
			                </div>
			            </li>
			        </ul>
				</div>
    		</div>            
    		<div class="col-md-9 pb-150">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6 list-type-style">
                            Mentors                        
                        </div>
                        <div class="col-md-6 list-type-count">
                            Showing  :2 Mentors                         
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6" v-for="mentor in mentors.data">
                            <div class="list-item investor-item d-flex justify-content-between pt-4 pb-2">
                                <a href="https://beta.startupcentraleurasia.com/en/mentors/v/9">
                                    <img :src="mentor.logo" alt="Logo" style="border-radius: 16px;">
                                    <div class="title investor-title">{{ mentor.name }}</div>
                                    <div class="desc investor-desc">{{ mentor.question1 }}</div>
                                </a>
                                <div class="d-flex justify-content-between  tags-div w-100">
                                    <div class="col-md-6">
                                        <ul class="tags">
                                            <li><a href="#">#Enterprise Softwa</a></li>
                                            <li><a href="#">#Enterprise Software </a></li>
                                            <li><a href="#">#Enterprise Software </a></li>
                                            <li><a href="#">#Enterprise Software </a></li>
                                        </ul>
                                    </div>
                                    <div class="d-flex justify-content-end col-md-6">
                                        <span class="money-in-investor">
                                            $50 
                                        </span>
                                        <span class="moneyandhours">
                                            $/hour
                                        </span>
                                    </div>
                                </div>
                            </div>
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
		props:{
			fields:Array,
			issues:Array,
			contries:Array,
			mentors:Object
		},
	data(){
		return {

		}
	},
};
</script>