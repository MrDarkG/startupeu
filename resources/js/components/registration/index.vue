<template>
<div class="row sign-up ml-0 mr-0 justify-content-between">
    <div class="col-xl-3 col-md-4 left">
        <a href="http://beta.startupcentraleurasia.com/en/" class="sign-logo">
            <img src="http://beta.startupcentraleurasia.com/themes/application/Components/svg/sign-logo.svg" alt="">
        </a>
        <div class="sign-text">
            <span>few clicks away from your ecosystem</span>
            <p>Already have an account?<a href="/login">Login</a></p>
        </div>
    </div>
    <div class="col-md-7 col-xl-8 right d-flex justify-content-center flex-column">
        <div class="sign-title">
            sign up        
        </div>

        <form action="register" @submit.prevent="submit=true;sendToSave('/register' ,input ,null ,'/home')" class="sign-form" method="post">
            <div class="row">
                <div class="col-md-6">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" :class="setClassByValue(input.email, false, submit)" v-model="input.email" class="form-control">
                </div>
                <div class="col-md-2">
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
                <div class="col-md-6  ">
                    <label for="password">Password</label>
                    <input type="password" :class="setClassByValue(input.password.main, false, submit)" v-model="input.password.main" id="password" class="form-control ">
                </div>
                <div class="col-md-6 ">
                    <label for="re_password">Repeat password</label>
                    <input type="password" :class="setClassByValue(input.password.repeat, false, submit)" v-model="input.password.repeat" id="re_password"  class="form-control">
                </div>
                <div class="col-md-6 ">
                    <button type="submit" class="btn register-btn">
                        Create an account
                    </button>
                </div>
                <div class="social-sign">
                    <a href="" class="g-btn">
                        <img src="http://beta.startupcentraleurasia.com/themes/application/Components/svg/g-sign.svg" alt="">
                    </a>
                    <a href="" class="fb-btn">
                        <img src="http://beta.startupcentraleurasia.com/themes/application/Components/svg/f-sign.svg" alt="">
                     </a>
                </div>
            </div>
        </form>
    </div>
</div>
</template>
<script>
export default{
    props:{
        phone_index:Array
    },
    data(){
        return {
            submit:false,
            input:{
                email:"",
                phone:{
                    index:"",
                    number:""
                },
                password:{
                    main:"",
                    repeat:""
                }
            }
        }
    },
    methods:{
        isInputFilled(string){
            let is_error = (string !== "" && string !== " " &&  string !== undefined)?"":"border-danger"
            return this.submit?is_error:''
        },
    },
    created(){

    },
};
</script>