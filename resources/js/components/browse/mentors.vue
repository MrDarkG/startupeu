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
        		<filter-list
        			:data="filter_data"
        			@getSelectedFilters="setSearchUrl"
        		>
        		</filter-list>   	
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
                    <div class="row" v-if="mentors">
                        <div class="col-md-6" v-for="mentor in custom_mentors">
                            <div class="list-item investor-item d-flex justify-content-between pt-4 pb-2">
                                <a href="#">
                                    <img :src="mentor.logo" alt="Logo" style="border-radius: 16px;">
                                    <div class="title investor-title">{{ mentor.name }}</div>
                                    <div class="desc investor-desc">{{ mentor.question1 }}</div>
                                </a>
                                <div class="d-flex justify-content-between  tags-div">
                                    <div>
                                        <ul class="tags">
                                            <li><a href="#">#Enterprise Software </a></li>
                                        </ul>
                                    </div>
                                    <div>
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
	watch:{
		url:function(url){
			this.getMentorData(url)
		}
	},
	data(){
		return {
			custom_mentors:[],
			url:'',
			filter_data:[
				{
					title:'Countries',
					prop:'countries[]=',
					data:this.contries
				},
				{
					title:'issues_consult',
					prop:'issues[]=',
					data:this.issues
				},
				{
					title:'Fieldes consult',
					prop:'fields[]=',
					data:this.fields
				},
			],
		}
	},
	created(){
		this.setMentors()
	},
	methods:{
		setMentors(){
			this.mentors.data.map((mentor)=>{
				let object = mentor
				this.custom_mentors.push(object)
			})
		},
		checkFilterExistance(string){
			return 
		},
		setSearchUrl(selected_filters){
			let custom_url = ''
			selected_filters.map((filter, index)=>{
				let char = (index!==0)?'&':'?'
				custom_url += char+filter.url
			})
			this.url = custom_url
		},
		getMentorData(url){
			axios.get('/mentor/search'+url)
			.then((response)=>{
				this.custom_mentors = response.data
			})
		}
	},
};
</script>