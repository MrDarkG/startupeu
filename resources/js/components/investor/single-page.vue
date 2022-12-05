<template>
    <div class="container w-100 border-left pt-3 pb-5">
        <single-page-header
            :user_data="{
                name:investor.name,
                logo:'/investor/'+investor.logo,
                industries:investor.industries,
                looking_for:'Looking for startup',
                black_card:{
                    title:'Investment range :',
                    content:investor.ranges.title.replace(' -','$ -')+'$',
                },
            }"
        ></single-page-header>
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
                <div
                    class="btn btn-success border-0 font-weight-bold"
                    style="
                        padding: 15px 35px;
                        background:rgba(98, 0, 238, 1);
                        color:white;
                        border-radius:16px;
                    "
                >
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
