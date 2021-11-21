<template>
<div class="dash-container pl-3">
	<div>
		<div>
			<h3>
				<b>
					My Calendar
				</b>
			</h3>
		</div>
		<div>
			<span>
				Mark the time for a session 
			</span>
		</div>
	</div>
	<div class="d-flex flex-wrap mt-5">
		<div class="bg-white p-0 col-md-6 d-flex align-items-center justify-content-center" style="border-radius:10px;">
			<DatePicker 
				:locale="'en'" 
				class="custom-datepicker"
				v-model="calendar.DatePicker.date" 
				:min-date="new Date()"  
				:attributes="calendar.DatePicker.todos" 
				color="purple"
			></DatePicker>
		</div>
		<div class="mentor-range-cards col-md-6 d-flex flex-column justify-content-between pl-2 pr-0">
			<div class="bg-white p-3" style="border-radius:10px;">
				<div class="d-flex align-items-center justify-content-between">
					<div class="d-flex align-items-center" style="font-size:18px">
						<div class="p-2">
							Price range per hour:
						</div>
						<div style="color:#3700b3;font-weight:bold;">
							$0/hr
						</div>
					</div>
					<div>
						<img src="https://startupcentraleurasia.com/themes/application/Components/svg/dashboard/edit.svg" alt="">
					</div>
				</div>
			</div>
			<div class="bg-white p-3 mt-2" style="border-radius:10px;">
				<div class="font-weight-bold" style="font-size:18px;">
					Meeting settings
				</div>
				<hr style="opacity:0.5;">
				<div class="d-flex flex-wrap">
					<div class="col-xl-6 mt-1 col-md-12 in-box">
                        <div class="in-title">Set your hours</div>
                        <div class="available-hours" data-toggle="modal" data-target=".addtimemodal">
                            Available hours
                            <img src="https://startupcentraleurasia.com/themes/application/Components/svg/dashboard/timer.svg" alt="">
                        </div>
                        <div class="in-desc">Define hours when you are available for meeting.</div>
                    </div>
                    <div class="col-xl-6 mt-1 col-md-12 in-box">
                        <div class="in-title">Duration</div>

                        <select name="duration" id="duration" class="form-control duration">
                            <option value="1">1</option>
                        </select>
                        <div class="in-desc">Define how long your meeting will be. It can be as long as 12
                            hours.
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
	<v-calendar
			class="custom-calendar max-w-full mt-2"
			:masks="calendar.masks"
			:attributes="calendar.attributes"
			disable-page-swipe
			is-expanded
	>
	  	<template v-slot:day-content="{ day, attributes }">
		    <div class="flex flex-col h-full z-10 overflow-hidden">
		      <span class="day-label text-sm text-gray-900">{{ day.day }}</span>
		      <div class="flex-grow overflow-y-auto overflow-x-auto">
		        <div
		          v-for="attr in attributes"
		          :key="attr.key"
		          class="text-xs leading-tight rounded-sm p-1 mt-0 mb-1 d-flex flex-column"
		          :class="attr.customData.class"
		        >
		            <div v-for="tdata in attr.customData.hours" class="d-flex justify-content-between">
			            <div class="clock-lables" >
			              {{ tdata.hours }} 
			            </div>
			            <div class="clock-lables">
			            	
			              <img src="/assets/image/people-active.svg" height="14px">
			              {{ tdata.users }}
			            </div>
		        	</div>
		        </div>
		      </div>
		    </div>
	  	</template>
</v-calendar>
</div>
</template>
<script>
import { Calendar, DatePicker } from 'v-calendar'
export default{
	components:{
		Calendar,
		DatePicker,
	},
	computed:{
		myAttrs(){
			return [...this.DatePicker.todos.map(todo => ({
	          	dates: todo.dates,
	          	highlight:todo.highlight,
		        popover: {
		          label: todo.description,
		        },
	        }))]
		}
	},
	data(){
		return{
			calendar:{
		  	 	attributes: [
		  	 		{
				        // An optional key can be used for retrieving this attribute later,
				        // and will most likely be derived from your data object
				        key: 121,
				        // Attribute type definitions
				        highlight: true,  // Boolean, String, Object
				        dot: true,        // Boolean, String, Object
				        bar: true,        // Boolean, String, Object
				        content: 'red',   // Boolean, String, Object
				        popover: {}, // Only objects allowed
				        // Your custom data object for later access, if needed
				        customData: {},
				        // We also need some dates to know where to display the attribute
				        // We use a single date here, but it could also be an array of dates,
				        //  a date range or a complex date pattern.
				        dates: new Date(),
				        // You can optionally provide dates to exclude
				        excludeDates: null,
				        // Think of `order` like `z-index`
				        order: 0
			      	}
		  	 	],
		  	 	masks: {
		      	  weekdays: 'WWW',
		      	},
		      	DatePicker:{
		      		date:new Date(),
		      		todos: [
				    	{
				        	key: 'today',
				        	highlight: {
				          		color: 'purple',
				          		fillMode:'solid'
				        	},
		        	        description: 'რამე ვაკანსიის სახელი',
				        	dates: new Date(),
				      	},
				    ],
		      	}
			},
		}
	}
}
</script>
<style>
.custom-datepicker .vc-pane{
	padding:10px;
}
.custom-datepicker .vc-day-content vc-focusable{
	padding:40px!important;
	border-radius:0px!important;
}
.custom-datepicker .vc-weeks{
	height:20vh;
}
.custom-datepicker .vc-pane{
	height: 36vh;
}  
.custom-datepicker{
	border:none;
	width:100%;
}  
@media only screen and (max-width: 767px) {
	.mentor-range-cards{
		padding-left: 0px !important;
		margin-top: 10px !important;
	}
}
</style>