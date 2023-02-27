<template>
<div class="container w-100 border-left pt-3 pb-5">
    <single-page-header
        :user_data="{
                name:startup.name,
                logo:startup.logo,
                industries:startup.startup_industries,
                looking_for:undefined,
                black_card:{
                    title:'What are we looking for:',
                    content:'Partners',
                },
            }"
    ></single-page-header>
    <div class="m-0 row m-0">
        <div class="order-1 order-sm-0 col-12 col-sm-8 col-md-8 col-lg-9 pl-0 pr-3">
            <div
                v-for="item in details.content"
                class="mt-4 mb-4 pb-4 border-bottom"
            >
                <div
                    v-text="item.title"
                    class="font-weight-bold mt-3 mb-3 "
                ></div>
                <div
                    style="color:rgba(0, 0, 0, 0.74);word-break: break-all;"
                    v-html="item.description"
                ></div>
            </div>
        </div>
        <div
            class="order-0 order-sm-1 bg-white col-12 col-sm-4 col-md-4 col-lg-3 mt-4 row ml-0 mr-0 pb-0 rounded-20px pt-2 pt-sm-4 pl-0 pr-0 pb-4"
        >
            <div
                class="mt-3 col-12 pl-4 pr-3 pb-0"
                v-for="item in details.menu"
            >
                <div
                    v-text="item.title+':'"
                    style="color:#797979;font-size:13px;"
                ></div>
                <div
                    class="font-weight-bold"
                    :style="{
                        color:item.color.text,
                    }"
                    v-text="item.content"
                ></div>
            </div>
        </div>
    </div>
</div>
</template>
<script>
export default {
    props:['startup'],
    data(){
      return{
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
                  {
                      title:'Received investment',
                      description:'<h1 class="m-0 font-weight-bold" style="color:#6200EE!important;">$ 117k</h1>',
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
                      content:this.startup.full_name,
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
    },
}
</script>
<style>
.rounded-20px{
    border-radius:20px;
}
</style>
