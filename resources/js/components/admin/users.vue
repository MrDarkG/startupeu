<template>
    <div>
        <div v-if="!this.input.user_id">
            <div class="font-weight-bold w-100 pb-2" style="font-size:20px;opacity:0.5;">
                Register user
            </div>
            <form
                action="/register"
                @submit.prevent="submit=true;saveUserCreatedByAdmin()"
                class="sign-form border shadow rounded mt-0 p-3"
                method="post"
            >
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-6">
                        <label for="email">Email</label>
                        <input type="text" id="email" name="email" :class="setClassByValue(input.email, false, submit)" v-model="input.email" class="form-control">
                    </div>
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-2">
                        <label for="phone_index">Phone index</label>
                        <multiselect
                            id="investment_range"
                            v-model="input.phone.index"
                            :style="setClassByValue(input.phone.index,true,submit)"
                            track-by="code"
                            label="code"
                            :searchable="true"
                            :allow-empty="false"
                            :options="phone_index"
                            :multiple="false"
                        ></multiselect>
                        <!--  <select name="phone_index" class="form-control" :class="setClassByValue(input.phone.index, false, submit)" v-model="input.phone.index" id="phone_index">
                             <option :value="index.id" v-for="index in phone_index">{{ index.code }}</option>
                         </select> -->
                    </div>
                    <div class="col-md-4">
                        <label for="phone">Phone Number</label>
                        <input type="text" id="phone" name="phone" :class="setClassByValue(input.phone.number, false, submit)" v-model="input.phone.number" class="form-control">
                    </div>
                    <div class="col-md-12 d-flex justify-content-center justify-content-sm-end justify-content-md-end m-0">
                        <button type="submit" class="btn btn-success pl-4 font-weight-bold pr-4 pt-3 pb-3">
                            Create user
                        </button>
                    </div>
                </div>
            </form>
            <div class="pt-5 mt-5">
                <div class="font-weight-bold w-100 pb-2" style="font-size:20px;opacity:0.5;">
                    Select Registered User
                </div>
                <div class="sign-form border shadow rounded mt-0 p-3">
                    <multiselect
                        id="users"
                        :style="setClassByValue(input.user_id,true,submit)"
                        track-by="id"
                        label="label"
                        :custom-label="setMultiselectCustomLabel"
                        @select="(value)=>{
                            getUserTypeData(value.user_type, value.id)
                            onSelectMultiselect(value.user_type, value.id)
                        }"
                        :searchable="true"
                        :allow-empty="false"
                        :options="users"
                        :multiple="false"
                    ></multiselect>
                </div>
            </div>
        </div>
        <div
            class="container-fluid pd-50"
            v-if="this.input.user_id"
        >
            <div class="row sign-up">
                <div class="col-md-12"  v-if="selected.type.index === undefined">
                    <div class="sign-title">
                        აირჩიეთ სასურველი მომხმარებლის ტიპი
                    </div>
                    <div class="type_list">
                        <a
                            v-for="(type, index) in types"
                            @click="onTypeClick(index, type);type.is_selected=true;"
                            class="item"
                        >
                            <img :src="type.src" alt="">
                            <div class="texts">
                                <div class="t-title">
                                    {{ type.title }}
                                </div>
<!--                                <div class="t-desc">-->
<!--                                    {{ type.description }}-->
<!--                                </div>-->
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-12 right mt-3" v-else>
                    <div>
                        <button class="btn btn-light login-btn" @click="types.map((type)=>type.is_selected = false);selected.type = {}">
                            <!-- <i class="fa fa-arrow-left"></i> -->
                            < back
                        </button>
                    </div>
                    <create-startup
                        :input_data="this.data.startup"
                        :user_id="this.input.user_id"
                        :stages="stages"
                        :phone_index="phone_index"
                        :countries="countries"
                        :industries="industries"
                        :looking_for="looking_for"
                        :investment_range="investment_range"
                        :investor_types="investor_types"
                        :bussines_models="bussines_models"
                        class="pt-2"
                        v-if="selected.type.index === 0"
                    />
                    <create-investor
                        :input_data="this.data.investor"
                        :user_id="this.input.user_id"
                        :industries="industries"
                        :investor_types="investor_types"
                        :looking_for="looking_for"
                        :investment_range="investment_range"
                        :markets="markets"
                        :countries="countries"
                        :stages="stages"
                        class="pt-2"
                        v-if="selected.type.index === 1"
                    />
                    <create-mentor
                        :input_data="this.data.mentor"
                        :user_id="this.input.user_id"
                        :issues="issues"
                        :fields="fields"
                        :countries="countries"
                        class="pt-2"
                        v-if="selected.type.index === 2"
                    />
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default{
        props:[
            "stages",
            "bussines_models",
            "phone_index",
            "countries",
            "users",
            "industries",
            "investment_range",
            "looking_for",
            "markets",
            "investor_types",
            "issues",
            "fields"
        ],
        data(){
            return {
                submit:false,
                input:{
                    user_id:null,
                    email:"",
                    phone:{
                        index:"",
                        number:""
                    },
                },
                data:{},
                selected:{
                    type:{},
                },
                types:[
                    {
                        title:'სტარტაპი',
                        description:'Find investment',
                        // href:'https://startupcentraleurasia.com/en/dashboard/addUserByType/1',
                        is_selected:false,
                        src:'https://startupcentraleurasia.com/themes/application/Components/svg/startup-icon.svg',
                    },
                    {
                        title:'ინვესტორი',
                        description:'Find startups',
                        // href:'https://startupcentraleurasia.com/en/dashboard/addUserByType/2',
                        is_selected:false,
                        src:'https://startupcentraleurasia.com/themes/application/Components/svg/investor-icon.svg',
                    },
                    {
                        title:'მენტორი',
                        description:'Mark the time for the session',
                        // href:'https://startupcentraleurasia.com/en/dashboard/addUserByType/3',
                        is_selected:false,
                        src:'https://startupcentraleurasia.com/themes/application/Components/svg/mentor-icon.svg',
                    },
                ],
            }
        },
        methods:{
            setMultiselectCustomLabel({email, user_type}){
                return `${email} (${user_type?user_type:'Without type'})`
            },
            onSelectMultiselect(type, user_id){
                this.selectUserType(type)
                this.input.user_id = user_id
            },
            getUserTypeData(type, user_id){
                axios.get('/admin/get-user-type-data/'+type+'/'+user_id)
                .then((response)=>{
                    this.data = response.data
                })
            },
            selectUserType(user_type){
                if(user_type === 'startup'){
                    user_type = 0
                }else if(user_type === 'investor'){
                    user_type = 1
                }else if(user_type === 'mentor'){
                    user_type = 2
                }else{
                    user_type = {}
                }
                this.selected.type = (typeof user_type==='number')?{
                    index:user_type,
                }:{}
            },
            saveUserCreatedByAdmin(){
                axios.post('/api/admin-user-registeration' ,this.input)
                .then((response)=>{
                    this.input.user_id = response.data
                }).catch((error)=>{
                    this.popupErrors(error.response.data.errors)
                })
            },
            onTypeClick(index ,type){
                this.types.map((tp)=>tp.is_selected = false)
                this.selected.type = type
                this.selected.type.index = index
                // this.changeUserType(index)
            },
        },
    };
</script>
