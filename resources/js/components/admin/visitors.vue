<template>
    <div>
        <h3 class="text-center mb-5 ml-3 mt-5">
            თვიურად შემოსული მომხმარებლების რაოდენობა
        </h3>
        <div
            class="row m-0 mt-4 mb-4 pl-2 pr-2"
            v-if="monthly && monthly.length > 0"
        >
            <div
                class="col-sm-6"
                v-for="visitor in monthly"
            >
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"> {{ calculatedDate(visitor.created_at) }}-ში შემოსვლელების რაოდენობა იყო : {{visitor.counted}}</h5>
                    </div>
                </div>
            </div>
            <a :href="`/news/${item.id}`">
                <div
                    class="bg-white d-flex flex-column h-100 rounded-2 overflow-hidden"
                    style="box-shadow: 0px 4px 32px rgb(0 0 0 / 16%);"
                >
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
                            v-text="getCustomDate(item?.created_at)"
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
        <h3 class="text-center mb-5 ml-3 mt-5">
            დღევანდელი შემომსვლელები
        </h3>
        <div class="row m-0">
            <div class="col-md-3" v-for="visitor in visitors">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">IP : {{ visitor.ip }}</h5>
                        <p class="card-text">ქვეყანა : {{ visitor.country }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default{
    props:['visitors','monthly'],
    methods:{
        calculatedDate(created_at){
            let date = new Date(created_at)
            return date.getMonth()+'თვე/'+date.getFullYear()
        }
    }
}
</script>
