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
    </div>
</template>
<script>
export default {
    props:['mentor'],
    data(){
        return{
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
                menu:[
                    {
                        title:'Email',
                        content:`
                            <a href="mailto:${1}">
                                ${1}
                            </a>
                        `,
                        color:{
                            text:'#6200EE',
                        },
                    },
                    {
                        title:'Successful investments',
                        content:`
                            <a href="https://${2}">
                                ${2}
                            </a>
                        `,
                        color:{
                            text:'#6200EE',
                        },
                    },
                    {
                        title:'Fields',
                        content:[
                            {
                                title:'Field 1',
                            },
                        ],
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
}
</script>
<style>
.rounded-20px{
    border-radius:20px;
}
</style>
