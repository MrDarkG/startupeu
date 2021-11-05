<template>
<div class="row sign-up">
    <div class="col-md-4 left">
        <a href="http://beta.startupcentraleurasia.com/en/" class="sign-logo">
            <img src="http://beta.startupcentraleurasia.com/themes/application/Components/svg/sign-logo.svg" alt="">
        </a>
        <div class="sign-text">
            <span>few clicks away from your ecosystem</span>
            <p>Already have an account?<a href="/login">Login</a></p>
        </div>
    </div>
    <div class="col-md-8 right">
        <div class="sign-title">
            sign up        
        </div>

        <form action="register" @submit.prevent="submit=true;register()" class="sign-form" method="post">
            <div class="row">
                <div class="col-md-6">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" :class="isInputFilled(input.email)" v-model="input.email" class="form-control">
                </div>
                <div class="col-md-2">
                    <label for="phone_index">Phone index</label>
                    <select name="phone_index" class="form-control" :class="isInputFilled(input.phone.index)" v-model="input.phone.index" id="phone_index">
                        <option :value="index.id" v-for="index in phone_index">{{ index.code }}</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="phone">Phone Number</label>
                    <input type="text" id="phone" name="phone" :class="isInputFilled(input.phone.number)" v-model="input.phone.number" class="form-control">
                </div>
                <div class="col-md-6  ">
                    <label for="password">Password</label>
                    <input type="password" :class="isInputFilled(input.password.main)" v-model="input.password.main" id="password" class="form-control ">
                </div>
                <div class="col-md-6 ">
                    <label for="re_password">Repeat password</label>
                    <input type="password" :class="isInputFilled(input.password.repeat)" v-model="input.password.repeat" id="re_password"  class="form-control">
                </div>
                <button type="submit" id="submit" class="btn">
                    Create an account
                </button>
                <div class="clear"></div>
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
    props:["phone_index"],
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
        register(){
            axios.post("/register",this.input)
            .then(()=>{

            })
        },
    },
    created(){

    },
};
</script>