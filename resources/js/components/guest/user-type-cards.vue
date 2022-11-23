<template>
<div class="row mt-5">
    <div class="col-12 col-md-6 col-lg-4 mt-3" v-for="(card, c_index) in cards">
        <a :href="card.url">
            <div
                class="pt-3 pb-3 pl-5 pr-5 shadow position-relative d-flex align-items-end"
                style="border-radius: 36px;word-wrap:break-word;height: 264px;"
                :style="{
                    background:card.color.card+'!important',
                }"
            >
                <img class="position-absolute" :src="card.image" style="z-index:0;top:25px;right:20px;">
                <div
                    class="d-flex flex-column h-100 justify-content-end align-content-end pb-2"
                    style="z-index:1;"
                    :class="{
                        'mb-4':c_index > 1,
                    }"
                >
                    <span
                        :style="{
                            color:card.color.text+'!important',
                        }"
                        style="font-size: 36px;"
                        class="m-0"
                    >
                        {{ card.title }}
                    </span>
                    <p
                        style="font-size:16px;"
                        :style="{
                            color:card.color.text+'!important',
                        }"
                        class="m-0"
                    >
                        {{ card.description }}
                    </p>
                </div>
            </div>
        </a>
    </div>
</div>
</template>
<script>
export default {
    data(){
        return {
            cards:[
                {
                    title:'Startups',
                    description:'Register startup and get access to the leading venture funds',
                    card_color:'white',
                    url:'/browse/startups',
                    image:'/assets/images/box1.svg',
                    color:{
                        card:'white',
                        text:'black',
                    },
                },
                {
                    title:'Investors',
                    description:'Get access to the most promising startups from the region',
                    url:'browse/investors',
                    image:'/assets/images/box2.svg',
                    color:{
                        card:'#6200ee',
                        text:'white',
                    },
                },
                {
                    title:'Mentors',
                    description:'Become mentors for the startups',
                    url:'/browse/mentors',
                    image:'/assets/images/box3.svg',
                    color:{
                        card:'black',
                        text:'white',
                    },
                },
            ],
        }
    },
}
</script>
