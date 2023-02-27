<template>
    <div
        class="p-2"
        style="height:404px;"
    >
        <a :href="`/news/${item.title}.${item.id}`">
            <div class="bg-white d-flex flex-column h-100 rounded-2 overflow-hidden" style="box-shadow: 0px 4px 32px rgb(0 0 0 / 16%);">
                <div
                    :style="{
                        backgroundImage:`url('/uploads/${item?.image}')`
                    }"
                    class="news-single-image d-flex p-0 w-100 rounded-top"
                ></div>
                <div
                    class="d-flex overflow-hidden pl-4 pr-4 pt-3 mb-2 flex-column align-items-start justify-content-between"
                    style="height: 50%;"
                >
                    <div
                        v-if="item?.created_at"
                        class="text-black-50"
                        v-text="new Date(item?.created_at).toLocaleDateString('en-US')"
                    ></div>
                    <div class="pt-2">
                        <b>
                            <h4
                                v-text="item?.title"
                                class="m-0 p-0"
                            ></h4>
                        </b>
                    </div>
                    <div class="pt-2">
                        <h6
                            class="text-black-50 latestnews-desc"
                            v-html="item?.description"
                        ></h6>
                    </div>
                </div>
            </div>
        </a>
    </div>
</template>
<script>
export default {
    props: {
        item: Object,
    },
    methods:{
         imageExists(image_url){
            const http = new XMLHttpRequest()
            http.open('HEAD', image_url, false)
            http.send()

            return (http.status != 404)?image_url:'/mini-logo.svg'
        }
    }
}
</script>
<style>
.news-single-image{
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    height: 50%;
}
</style>
