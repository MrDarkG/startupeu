<template>
<div>
    <div class="d-flex flex-wrap align-items-center justify-content-center">
        <div
            @click="setActiveCategory(category.id)"
            class="pl-3 pr-3 pt-2 font-weight-bold cursor-pointer"
            style="color:#666666;"
            :class="{
                'pb-1': category.is_active,
                'pb-2': !category.is_active,
            }"
            v-for="category in custom_categories"
        >
            {{ category.title }}
            <div class="custom-faq" v-if="category.is_active"></div>
        </div>
    </div>
    <div
        v-for="(category, c_index) in custom_categories"
        :key="c_index+category.title"
        v-if="category.is_active"
        class="pb-5 mb-5"
    >
        <div
            v-for="(question, q_index) in category.questions"
            :key="c_index+category.title+q_index"
        >
            <div
                 class="pl-4 pr-4 pt-2 pb-2 cursor-pointer shadow bg-white mt-3 d-flex align-items-center justify-content-between"
                 :style="{
                    border:question.is_active?'#6200ee 2px solid':'',
                 }"
                 @click="question.is_active = !question.is_active"
                 style="border-radius:28px;height:97px;"
            >
                <div>
                    <h6 class="m-0 font-weight-bold">
                        {{ question.question }}
                    </h6>
                </div>
                <div class="accordion-icon">
                    <img v-if="!question.is_active" src="https://startupcentraleurasia.com/themes/application/Components/svg/arrow-down.svg" alt="">
                    <img v-if="question.is_active" src="https://startupcentraleurasia.com/themes/application/Components/svg/arrow-up.svg" alt="">
                </div>
                <div class="mt-3">
                    <div
                        class="pl-3 border-left border-success"
                        v-for="answer in question.answers"
                    >
                        {{ answer.title }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>
<script>
export default {
    props:['categories'],
    data(){
      return {
          custom_categories:[],
      }
    },
    created(){
        this.setCustomCategory()
        this.addAllCategory()
        this.custom_categories[0].is_active = true
    },
    methods:{
        addAllCategory(){
            let all_category = {
                id:0,
                title:'All',
                questions:[],
                is_active:false,
            }
            this.custom_categories.map((category)=>{
                category.questions.map((question)=>{
                    all_category.questions.push(question)
                })
            })
            this.custom_categories.unshift(all_category)
        },
        setCustomCategory(){
            this.categories.map((category)=>{
                category.is_active = false
                category.questions.map((question)=>{
                    question.is_active = false
                })
                this.custom_categories.push(category)
            })
        },
        setActiveCategory(category_id){
            this.custom_categories.map((category)=>{
                category.is_active = false
                if(category.id === category_id){
                    category.is_active = true
                }
            })
        },
    },
}
</script>
<style>
.custom-faq{
    border-bottom: solid 3px #1abc9c;
    animation-name: animate-faq-border;
    animation-duration: 1s;
}
@keyframes animate-faq-border{
    from {width:0px;}
    to {width:100%;}
}
</style>
