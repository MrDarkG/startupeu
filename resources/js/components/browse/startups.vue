<template>
<div class="container-fluid" style="background:#efeff4;">
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
				    <div class="chek-list">
				        <div class="title">Countries</div>
				        <ul>
				            <li>
				                <div class="form-check">
				                    <input class="form-check-input country-check" type="checkbox" value="5" id="country-5" name="country[]">
				                    <label class="form-check-label" for="country-5">
				                        Uzbekistan                    
				                    </label>
				                </div>
				            </li>
				        </ul>
				    </div>
				    <div class="chek-list">
				        <div class="title">Industry</div>
				        <ul>
				       		<li>
				                <div class="form-check">
				                    <input class="form-check-input" type="checkbox" value="2" id="Industry-2" name="industry[]">
				                    <label class="form-check-label" for="Industry-2">
				                        Fashion                    
				                    </label>
				                </div>
				            </li>
				        </ul>
				    </div>
			        <div class="chek-list">
			        	<div class="title">Startup Stage</div>
				        <ul>
			                <li>
				                <div class="form-check">
				                    <input class="form-check-input" type="checkbox" value="5" id="stage-5" name="stage[]">
				                    <label class="form-check-label" for="stage-5">
				                        Paying Users                    
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
		                        Startups                        
		                    </div>
		                    <div class="col-md-6 list-type-count">
		                        Showing  :60 Startups                        
		                    </div>
		                </div>
		            </div>
		            <div class="col-md-12">
		                <div class="row">
		                    <div class="col-md-4">
		                        <div class="list-item" style="height: 235px">
		                            <a href="https://beta.startupcentraleurasia.com/en/startups/v/25">
		                                <img src="https://beta.startupcentraleurasia.com/themes/application/Components/images/application-no-image.png" alt="" style="    width: 62px;">
		                                <div class="title">Intelliants </div>
		                                <div class="desc">A software development company in the web segment....</div>
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
		mentors:Object
	},
	data(){
		return{

		}
	},
};
</script>