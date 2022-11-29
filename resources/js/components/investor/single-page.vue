<template>
    <div class="container w-100 border-left pt-3 pb-5">
        <div class="row border-bottom pl-0 pb-4 pr-0 m-0 justify-content-between flex-wrap w-100">
            <div
                class="d-flex pl-0 pr-0 mt-3 col-12 col-sm-8 col-md-8 col-lg-9 align-items center"
                style="height:120px;"
            >
                <div
                    class="p-1 rounded-20px"
                    style=";width:120px;"
                >
                    <img
                        style="height:100%;border-radius: 20px;"
                        alt="Investor logo"
                        :src="'/investor/'+investor.logo"
                    >
                </div>
                <div class="pl-4 w-100 d-flex flex-column justify-content-center align-content-start">
                    <div>
                        <h1>{{investor.name}}</h1>
                    </div>
                    <div class="font-weight-bold" style="color:rgba(3, 218, 197, 1);font-size:16px;">
                        Looking for startup
                    </div>
                    <div class="d-flex justify-content-start">
                        <h6 class="text-center">
<!--                        <span-->
<!--                            style="color:rgba(98, 0, 238, 1);"-->
<!--                            v-for="tag in investor.startup_industries"-->
<!--                            class="pr-2"-->
<!--                        >-->
<!--                            #{{tag.industry.title}}-->
<!--                        </span>-->
                        </h6>
                    </div>
                </div>
            </div>
            <div
                style="background: black;"
                class="p-3 mt-3 col-12 col-sm-4 col-md-4 col-lg-3 w-100 text-white d-flex flex-column justify-content-center font-weight-bold rounded-20px"
            >
                <div style="font-size:15px;">
                    Investment range::
                </div>
                <div style="font-size:20px;color:#03DAC5;">
                    {{investor.ranges.title.replace(' -','$ -')}}$
                </div>
            </div>
        </div>
        <div class="m-0 row m-0">
            <div
                class="bg-white col-md-12 mt-4 row ml-0 mr-0 pb-0 rounded-20px pt-2 pt-sm-4 pl-0 pr-0 pb-4"
            >
                <div
                    :class="{
                        'col-md-12':(i_index===0),
                        'col-12 col-sm-6 col-md-6 col-lg-4':(i_index>0),
                    }"
                    class="mt-3 pl-4 pr-3 pb-0"
                    v-for="(item, i_index) in details.menu"
                >
                    <div style="color:#797979;font-size:13px;">
                        {{ item.title }}:
                    </div>
                    <div
                        class="font-weight-bold"
                        :style="{
                            color:item.color.text,
                        }"
                        v-html="item.content"
                    ></div>
                </div>
            </div>
            <div class="col-12 col-sm-8 col-md-8 col-lg-9 pl-0 pr-3">
                <div v-for="item in details.content" class="mt-4 mb-4 pb-4 border-bottom">
                    <div  class="font-weight-bold mt-3 mb-3 ">
                        {{ item.title}}
                    </div>
                    <div
                        style="color:rgba(0, 0, 0, 0.74);word-break: break-all;"
                        v-html="item.description"
                    ></div>
                </div>
                <div class="btn btn-success">
                    Apply for investment
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props:['investor'],
    data(){
        return{
            details:{
                content:[
                    {
                        title:'About us',
                        description:this.investor.about,
                    },
                    {
                        title:'Our priorities',
                        description:this.investor.investments,
                    },
                ],
                menu:[
                    {
                        title:'Successful investments',
                        content:'123',
                        color:{
                            text:'#6200EE',
                        },
                    },
                    {
                        title:'Stages of interest',
                        content:'321',
                        color:{
                            text:'#6200EE',
                        },
                    },
                    {
                        title:'Website',
                        content:`
                            <a href="https:/${this.investor.website}">
                                ${this.investor.website}
                            </a>
                        `,
                        color:{
                            text:'#6200EE',
                        },
                    },
                    {
                        title:'Email',
                        content:`
                            <a href="mailto:${this.investor.email}">
                                ${this.investor.email}
                            </a>
                        `,
                        color:{
                            text:'#6200EE',
                        },
                    },
                ],
            },
        }
    },
}
</script>
<style>
.rounded-20px{
    border-radius:20px;
}
</style>
