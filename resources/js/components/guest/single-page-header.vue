<template>
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
                    :src="user_data.logo"
                >
            </div>
            <div class="pl-4 w-100 d-flex flex-column justify-content-center align-content-start">
                <div>
                    <h1>{{user_data.name}}</h1>
                </div>
                <div
                    class="font-weight-bold"
                    style="color:rgba(3, 218, 197, 1);font-size:16px;"
                    v-if="user_data.looking_for"
                >
                    {{user_data.looking_for}}
                </div>
                <div v-if="user_data.industries" class="d-flex flex-wrap justify-content-start align-items-center">
                    <div
                        v-for="industry in user_data.industries"
                        class="pr-2"
                        style="color:rgba(98, 0, 238, 1);"
                    >
                        #{{(industry.industry)?industry.industry.title:industry.title}}
                    </div>
                </div>
            </div>
        </div>
        <div
            style="background: black;"
            v-if="user_data.black_card"
            class="p-3 mt-3 col-12 col-sm-4 col-md-4 col-lg-3 w-100 text-white d-flex flex-column justify-content-center font-weight-bold rounded-20px"
        >
            <div style="font-size:15px;">
                {{user_data.black_card.title}}
            </div>
            <div style="font-size:20px;color:#03DAC5;"
                v-html="user_data.black_card.content"
            ></div>
        </div>
    </div>
</template>
<script>
export default {
    props:['user_data'],
}
</script>

<style scoped>

</style>
