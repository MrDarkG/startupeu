<template>
<div class="dash-container pl-3">
	<div>
		<div>
			<h3>
				<b>
					My account
				</b>
			</h3>
		</div>
		<div>
			<span>
				See/Edit your information.
			</span>
		</div>
	</div>
	<div class="d-flex flex-wrap mt-5 ">
		<div class="mentor-range-cards col-md-6 d-flex flex-column justify-content-between pl-2 pr-0 card-border-radius">
			<div class="bg-white p-3 card-border-radius">
				<div class="d-flex align-items-center justify-content-between">
					<div class="d-flex flex-wrap align-items-center" style="font-size:18px">
						<div class="p-2">
							Price range per hour:
						</div>
						<div
                            style="color:#3700b3;font-weight:bold;"
                            class="d-flex pl-2 pl-sm-0 align-items-center"
                        >
							$<span>{{selected_price}}</span>/hr
						</div>
					</div>
					<div
                        @click="id_edit_provoked = !id_edit_provoked"
                    >
						<img
                            src="https://startupcentraleurasia.com/themes/application/Components/svg/dashboard/edit.svg"
                            alt=""
                            class="cursor-pointer"
                        >
					</div>
				</div>
			</div>
		</div>
	</div>
    <div>
        <mentor-single-page
            v-if="!id_edit_provoked"
            :mentor="mentor"
        ></mentor-single-page>
        <create-mentor
            v-else
            :input_data="getInputData()"
            :issues="data.issues"
            :fields="data.fields"
            :countries="data.countries"
            :mentor="mentor"
            class="pl-2 mt-4 pt-3 pr-4"
        />
    </div>
</div>
</template>
<script>
import "/css/components/mentor/index.css"
import { Calendar, DatePicker } from 'v-calendar'
export default{
    props:['mentor','data'],
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
    methods:{
        getInputData(){
            let mentor = this.mentor
            this.selected_price = (this.selected_price > 0)?this.selected_price:""
            this.selected_price = (this.selected_price.length > 1 && this.selected_price[0] == 0)?"":this.selected_price
            return {
                name:mentor?.name,
                price:this.selected_price,
                linkedin:mentor?.linnkedin,
                experience:mentor?.question1,
                country:{
                    data:{
                        id:mentor?.country_id,
                    },
                },
                which:{
                    field:{
                        id:mentor?.fields_id
                    },
                    issue:mentor?.issues,
                },
                preview:mentor?.logo,
            }
        },
        changeMentorPrice(){
            axios.post('/register/mentor',this.getInputData()).then((response) => {
                this.$vToastify.success('Changed successfully','Response')
            }).catch((error) => {
                this.$vToastify.error('Use numbers','Response')
            })
        }
    },
	data(){
		return{
            selected_price:this.mentor.price??5,
            id_edit_provoked:false,
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
