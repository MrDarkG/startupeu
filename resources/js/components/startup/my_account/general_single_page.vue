<template>
    <div>
        <single-page-header
            :user_data="{
                name:startup.name,
                logo:startup.logo,
                industries:startup.startup_industries,
                looking_for:undefined,
                black_card:{
                    title:'What are we looking for:',
                    content:'Partners'
                }
            }"
        ></single-page-header>
        <div
            class="bg-white col-md-12 mt-4 row ml-0 mr-0 pb-0 rounded-20px pt-2 pt-sm-4 pl-0 pr-0 pb-4"
        >
            <div
                class="mt-3 col-md-4 col-lg-3 pl-4 pr-3 pb-0"
                v-for="item in details.menu"
            >
                <div style="color:#797979;font-size:13px;">
                    {{ item.title }}:
                </div>
                <div
                    class="font-weight-bold"
                    :style="{
                        color:item.color.text,
                    }"
                >
                    {{ item.content}}
                </div>
            </div>
        </div>
        <div class="col-md-12 pl-0 pr-3">
            <div v-for="item in details.content" class="mt-4 mb-4 pb-4 border-bottom" style="border-color:rgba(0, 0, 0, 0.08);">
                <div  class="font-weight-bold mt-3 mb-3 ">
                    {{ item.title}}
                </div>
                <div
                    style="color:rgba(0, 0, 0, 0.74);word-break: break-all;"
                    v-html="item.description"
                ></div>
            </div>
        </div>
        <div class="col-md-12 p-0 pb-5">
            <div class="d-flex align-items-center justify-content-between">
                <div class="font-weight-bolder">
                    Competitors and local markets
                </div>
                <div class="d-flex align-items-center">
                    <arrow rotate="true" opacity="true" class="mr-2"></arrow>
                    <span style="font-size: 18px">|</span>
                    <arrow class="ml-2"></arrow>
                </div>
            </div>
            <div class="d-flex flex-wrap m-0 p-0 mt-3">
                <div
                    v-for="(competitor, c_index) in competitors"
                    class=" p-0 mt-2"
                    :class="{
                        'pr-2':(c_index < competitors.length-1)
                    }"
                >
                    <div class="p-3 bg-white rounded-20px">
                        <div class="font-weight-bolder">
                            {{competitor.title}}
                        </div>
                        <div style="color:#6200EE;">
                            {{competitor.website}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default{
    props:['startup'],
    data(){
        return {
            competitors:[
                {
                    title:'Starbucks',
                    website:'www.website.io',
                },
                {
                    title:'Ferrari',
                    website:'www.website.io',
                },
                {
                    title:'MasterCard',
                    website:'www.website.io',
                },
                {
                    title:'The Walt Disney Company',
                    website:'www.website.io',
                },
                {
                    title:'Johnson & Johnson',
                    website:'www.website.io',
                },
                {
                    title:'Sony',
                    website:'www.website.io',
                },
            ],
            details:{
                content:[
                    {
                        title:'What our company does',
                        description:this.startup.what_your_company_does,
                    },
                    {
                        title:'Our product and what it does or will do',
                        description:this.startup.description,
                    },
                    {
                        title:'Our innovaiton',
                        description:this.startup.inovation,
                    },
                ],
                menu:[
                    {
                        title:'Email',
                        content:this.startup.startup_email,
                        color:{
                            text:'#6200EE',
                        },
                    },
                    {
                        title:'Location',
                        content:this.startup.country.title,
                        color:{
                            text:'black',
                        },
                    },
                    {
                        title:'Founding Year',
                        content:new Date(this.startup.founded).getFullYear(),
                        color:{
                            text:'black',
                        },
                    },
                    {
                        title:'CEO',
                        content:this.startup.ceo_email,
                        color:{
                            text:'black',
                        },
                    },
                    {
                        title:'Founders',
                        content:'7',
                        color:{
                            text:'black',
                        },
                    },
                    {
                        title:'Stage',
                        content:'MVP',
                        color:{
                            text:'black',
                        },
                    },
                    {
                        title:'Business model',
                        content:this.startup.business_model.title,
                        color:{
                            text:'black',
                        },
                    },
                    {
                        title:'Traction',
                        content:'15000',
                        color:{
                            text:'black',
                        },
                    },
                    {
                        title:'Website',
                        content:this.startup.website,
                        color:{
                            text:'#6200EE',
                        },
                    },
                    {
                        title:'Investment',
                        content:'Seed',
                        color:{
                            text:'black',
                        },
                    },
                ],
            },
        }
    }
}
</script>
