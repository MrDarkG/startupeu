<template>
<div class="container-fluid">
    <form action="" id="startupSearch">
	    <div class="container-fluid startup-list-search">
	        <div class="list-search">
	            <div class="left">
	                <img src="https://beta.startupcentraleurasia.com/themes/application/Components/svg/search.svg" alt="" width="20">
	                <label for="search">
	                    <input type="text" id="search" placeholder="Search..." name="s" value="">
	                </label>
	            </div>
	            <div class="right">
	                <button tyzxpe="submit">Search</button>
	            </div>
	        </div>
	    </div>
	    <div class="clb"></div>
		<div class="container">
			<div class="row startup-list">
			    <div class="col-md-3 left-search">
					<filter-list
	        			:data="filter_data"
	        			@getSelectedFilters="setSelectedFilters"
	        		>
	        		</filter-list> 
			    </div>
		        <div class="col-md-9 pb-150">
		            <div class="col-md-12">
		                <div class="row">
		                    <div class="col-md-6 list-type-style">
		                        Startups                        
		                    </div>
		                    <div class="col-md-6 list-type-count">
		                        Showing  :{{ startups.length }} Startups                        
		                    </div>
		                </div>
		            </div>
		            <div class="col-md-12">
		                <div class="row">
		                    <div class="col-md-4" v-for="startup in startups">
		                        <div class="list-item" style="height: 235px">
		                            <a href="#">
		                                <img :src="startup.logo" alt="Logo" style="width: 62px;">
		                                <div class="title">
		                                	{{ startup.name }} - {{ startup.what_your_company_does }}
		                                </div>
		                                <div class="desc" :title="startup.description">
		                                	{{ setShortDescription(startup.description) }}
		                                </div>
		                            </a>
		            			</div>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
		    <div class="clb"></div>
		</div>
	</form>
</div>
</template>
<script>
export default{
	props:{
		fields:Array,
		issues:Array,
		startups:Object
	},
	data(){
		return{
			filter_data:[
				{
					title:'Countries',
					prop:'contries[]=',
					data:[
						{
							title:'Not Available At This Moment',
							is_disabled:true,
						}
					]
				},
				{
					title:'Industry',
					prop:'issues[]=',
					data:this.issues
				},
				{
					title:'Startup Stage',
					prop:'fields[]=',
					data:this.fields
				},
			],
		}
	},
	methods:{
		setSelectedFilters(filters){
			console.log(filters)
		},
		setShortDescription(string){
			return (string.length > 172)?string.slice(0,169)+' ...':string
		},
	},
};
</script>