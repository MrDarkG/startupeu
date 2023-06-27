<template>
    <div class="row pr-2 pl-2">
        <div
            v-for="(item, item_i) in news"
            v-if="item_i === 0"
            :class="{
                'col-md-12 p-2':checkScreenSize(),
                'col-12 col-sm-12 col-md-6 col-lg-4 p-2':!checkScreenSize(),
            }"
            :style="{
                height:checkScreenSize()?'280px':'404px'
            }"
        >
            <a :href="`/news/${item.id}`">
                <div
                    :class="{
                        'row':checkScreenSize(),
                        'd-flex flex-column':!checkScreenSize(),
                    }"
                    class="bg-white h-100 rounded-2 overflow-hidden"
                    style="box-shadow: 0px 4px 32px rgb(0 0 0 / 16%);"
                >
                    <div
                        :class="{
                            'p-0 rounded rounded-2 col-md-6':checkScreenSize(),
                            'news-single-image d-flex p-0 w-100 rounded-top':!checkScreenSize(),
                        }"
                        :style="{
                            backgroundImage:`url('/uploads/${item?.image}')`
                        }"
                    ></div>
                    <div
                        :class="{
                            'd-flex overflow-hidden pl-4 pr-4 pt-3 mb-2 flex-column align-items-start justify-content-between':!checkScreenSize(),
                            'col-md-6 d-flex pl-4 pr-4 pt-3 pb-3 flex-column align-items-start h-100 justify-content-between':checkScreenSize(),
                        }"
                    >
                        <div
                            v-if="item?.created_at"
                            class="text-black-50"
                            v-text="setCustomDate(item.created_at)"
                        ></div>
                        <div class="pt-2">
                            <b>
                                <h4
                                    class="m-0 p-0"
                                    v-text="item.title"
                                    style="font-size: 22px!important;"
                                ></h4>
                            </b>
                        </div>
                        <div class="pt-2">
                            <h6
                                class="text-black-50 latestnews-desc"
                                v-html="item.description"

                                style="font-size:16px!important;"
                            ></h6>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <news-card
            v-else
            class="col-12 col-sm-12 col-md-6 col-lg-4"
            :item="item"
        ></news-card>
    </div>
</template>
<script>
export default {
    props: ['news'],
    data(){
      return {
          width:window.innerWidth,
      }
    },
    methods: {
        checkScreenSize() {
            return this.width > 768 ? true : false
        },
        setCustomDate(date) {
            const today = new Date(date)
            // today.toLocaleString('default',{ month: 'long' })
            let string = today.toDateString()
            string = string.replace(string.slice(0, 3), '')
            string = string.replace(string.slice(0, 7), string.slice(0, 7) + ',')
            return string
        },
        addEventForResize(){
            window.addEventListener('resize', () => {
                this.width = window.innerWidth
            })
        },
    },
    mounted(){
        this.addEventForResize()
    },
}
</script>
<style>
.rounded-2 {
    border-radius: 1.5rem !important;
}
.latestnews-desc p, p span {
    font-size: 16px !important;
    margin-top: 0px !important;
    line-height: 22px !important;
    color: #666666 !Important;
}
</style>
