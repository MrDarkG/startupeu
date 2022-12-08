<template>
    <div class="container w-100 border-left pt-3 pb-5">
        <single-page-header
            :user_data="{
                name:mentor.name,
                logo:'/mentors/'+mentor.logo,
                industries:mentor.industries,
                looking_for:undefined,
                black_card:{
                    title:'Price range:',
                    content:'$18 <small>/hour</small>',
                },
            }"
        ></single-page-header>
        <div class="row mt-2 m-0">
            <div class="col-12 order-1 order-sm-0 col-sm-8 col-md-8 col-lg-9 pt-3">
                <div
                    v-for="about in details.about"
                    class="border-bottom pb-3 pt-2"
                >
                    <div class="font-weight-bold mt-3">
                        {{about.title}}
                    </div>
                    <div>
                        {{about.description}}
                    </div>
                </div>
            </div>
            <div class="col-12 order-0 order-sm-1 col-sm-4 col-md-4 col-lg-3 p-0">
                <div class="bg-white pl-3 pr-3 pt-3 pb-3" style="border-radius:26px;">
                    <div
                        v-for="(menu, m_index) in details.menu"
                        class="mt-3"
                        :key="m_index"
                    >
                        <div class="mentor-single-page-label">
                            {{ menu.title }}
                        </div>
                        <div>
                            <div
                                v-if="typeof menu.content === 'string'"
                                class="mentor-single-page-description text-break"
                                v-html="menu.content"
                            ></div>
                            <div
                                v-else-if="typeof menu.content === 'object'"
                                class="row m-0 p-0"
                            >
                                <div
                                    class="p-0 pr-1 m-0 mentor-single-page-description"
                                    style="font-size:15px;"
                                    :class="{
                                        'col-4 col-sm-6 col-md-4':menu.content > 1,
                                        'col-12':menu.content < 2,
                                    }"
                                    v-for="content in menu.content"
                                >
                                    <div
                                        class="h-100 p-1 content"
                                        v-text="content.title"
                                    ></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-4 ml-4 mr-3">
            <div class="font-weight-bold">
                Book Session
            </div>
            <div class="mt-3 assesstment-time bg-white shadow single-mentor-calendar-div pt-4 pb-2 pl-4 pr-3 row">
                <div class="pl-0 col-12 col-sm-12 col-md-12 col-lg-4 pr-0 calendar">
                    <DatePicker
                        class="assessment_datepicker d-flex align-items-center justify-content-center col-md-10"
                        :locale="'en'"
                        v-model="date"
                        @change="setCalendarHighlight"
                        @dayclick="setCalendarHighlight"
                        :min-date="new Date()"
                        :attributes="myattrs"
                        color="purple"
                    ></DatePicker>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                    <div class="font-weight-light pt-2 mt-1 pl-1">
                        {{ getNowFullDate() }}
                    </div>
                    <div class="w-100">
                        <div
                            class="mt-2 p-1"
                            v-for="hour in hours"
                        >
                            <div
                                style="
                                    border-left: 1px solid #F2F2F7;
                                    border-right: 1px solid #F2F2F7;
                                "
                            >
                                <div
                                    class="p-3 mt-2 text-center hour cursor-pointer custom-hour-div"
                                    @click="hour.is_active = !hour.is_active"
                                    :style="setTakenHourStyle(hour.is_active)"
                                >
                                    <div class="pr-0 font-weight-bold">
                                        {{ hour.from  }} : {{ hour.to  }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-4 pl-4">
                    <div class="pt-1 mt-2">
                        <h4 class="m-0 font-weight-bold">
                            60 minute session
                        </h4>
                    </div>
                    <div class="d-flex flex-column mt-3 justify-content-between" style="min-height:400px;height:85%;">
                        <div class="d-flex align-items-center">
                            <div>
                                <img style="border-radius:16px;" :src="'/mentors/'+mentor.logo" height="56px" alt="Logo" class="shadow">
                            </div>
                            <div class="pl-3">
                                <div style="font-size:20px;color:rgba(0, 0, 0, 0.6);" class="font-weight-bold">
                                    {{ mentor.name }}
                                </div>
                                <div class="font-weight-bold" style="color:rgba(98, 0, 238, 1);">
                                    Mentor
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="mb-3">
                                <label class="font-weight-bold" for="mentor_name">
                                    Full name
                                </label>
                                <input id="mentor_name" type="text" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="font-weight-bold" for="mentor_email">
                                    Email
                                </label>
                                <input id="mentor_email" type="text" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button class="btn mentor-confirm-button font-weight-bold w-100">
                                    Confirm
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import { Calendar, DatePicker } from 'v-calendar'
import "./../../components/css/mentor/signle-page.css"

export default {
    props:['mentor'],
    components: {
        DatePicker,
    },
    data(){
        return{
            date:new Date(Date.now()),
            hours:[
                {
                    year_month:"2020-10-10",
                    from:"10:00",
                    to:"11:00",
                    is_active:true,
                },
                {
                    year_month:"2020-10-10",
                    from:"11:00",
                    to:"12:00",
                    is_active:false,
                },
            ],
            myattrs:[
                {
                    dates: new Date(Date.now()),
                    highlight:{
                        borderRadius:'0px!important',
                    },
                    popover: {
                        label: 'description',
                    },
                }
            ],
            details:{
                content:[
                    {
                        title:'Email',
                        description:1,
                    },
                    {
                        title:'Our priorities',
                        description:2,
                    },
                ],
                about:[
                    {
                        title:'What experience do I have and what proccesses did I improve?',
                        description:this.mentor.question1,
                    },
                    {
                        title:'What companies have I worked in?',
                        description:this.mentor.question2,
                    },
                ],
                menu:[
                    {
                        title:'Email',
                        content:`
                            <a
                                style="color:rgba(98, 0, 238, 1);"
                                class="text-wrap"
                                onclick="${this.getBlankPage('mailto:'+this.mentor.user.email)}"
                            >
                                ${this.mentor.user.email}
                            </a>
                        `
                    },
                    {
                        title:'Social media',
                        content:`
                            <a
                                style="color:rgba(10, 102, 194, 1);"
                                onclick="${this.getBlankPage(this.mentor.linnkedin)}"
                            >
                                ${this.mentor.linnkedin}
                            </a>
                        `,
                    },
                    {
                        title:'Fields',
                        content:[this.mentor.fields],
                        color:{
                            text:'#6200EE',
                        },
                    },
                    {
                        title:'Which issues can I consult on?',
                        content:[
                            {
                                title:'Issue 1',
                            },
                        ],
                        color:{
                            text:'black',
                        },
                    },

                ],
            },
        }
    },
    methods:{
        getBlankPage(url){
            window.open(url, '_blank')
        },
        getNowFullDate(){
            let date = new Date(Date.now())
            let week = this.getWeekByIndex(date.getDay())
            let month = this.getMonthByIndex(date.getMonth())
            return `${week}, ${month} ${date.getDate()}`
        },
        setTakenHourStyle(is_active){
            return {
                border:`solid 2px ${is_active?'#5856d6':'#c1c1de'}!important`,
                color:is_active?'#ffffff':'#5856D6',
                background:(is_active)?'#6200ee':'white'+'!important',
            }
        },
        onCalendarMonthChange(){
            let arrows = document.querySelectorAll('.assesstment-time .vc-arrow')
            arrows.forEach((div)=>{
                div.addEventListener('click', this.setCalendarHighlight)
            })

            let days = document.querySelectorAll('.assesstment-time .vc-day')
            arrows.forEach((div)=>{
                div.addEventListener('click', this.setCalendarHighlight)
            })
        },
        setCalendarHighlight(){
            setTimeout(()=>{
                let divs = document.querySelectorAll('.assesstment-time .vc-day')
                divs.forEach((div)=>{
                    //DAY WILL CHANGE AS ACTIVE STYLE
                    if (div.childNodes[0].tagName === "DIV"){
                        div.setAttribute('style', 'border:none!important;box-shadow: 2px 2px 5px 3px #c7c7ed;' )
                        div.childNodes[1].setAttribute('style', 'background:none!important;color:white;' )
                        div.childNodes[0].style.background="#5856d6"
                    }else{
                        //DAYS SET AS DEFAULT STYLE
                        div.setAttribute('style', 'border:solid 2px #d5d5d9!important;box-shadow:none!important;' )
                        div.childNodes[0].setAttribute('style', 'background:none!important;' )
                    }
                    div.style.height="35px"
                    div.style.width="35px"
                })

                let empty_calendar_divs = document.querySelectorAll('.assesstment-time .is-not-in-month')
                empty_calendar_divs.forEach((div)=>{
                    div.setAttribute( 'style', 'border:none!important;background: none!important;' )
                })
            },10)
        },
    },
}
</script>
<style>
.rounded-20px{
    border-radius:20px;
}
</style>
