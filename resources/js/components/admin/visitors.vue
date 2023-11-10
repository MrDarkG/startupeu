<template>
    <div>
        <h3 class="text-center mb-5 ml-3 mt-5">
            დღევანდელი შემომსვლელები
        </h3>
        <div class="row justify-content-center m-0">
            <div class="col-md-6" >
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">რაოდენობა <b>{{visitors.length}}</b></h5>
                    </div>
                </div>
            </div>
        </div>
        <h3 class="text-center mb-5 ml-3 mt-5" v-if="monthly && monthly.length > 0">
            შემოსული მომხმარებლების რაოდენობა <span> ჯამში - ({{countMonthly(monthly)}})</span>
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
                        <h5 class="card-title"> შემოსვლელების რაოდენობა იყო : {{visitor.counted}}</h5>
                        <p class="card-text">თარიღი : {{ calculatedDate(visitor.created_at) }}</p>
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
            return date
        },
        countMonthly(visitors){
            let count = 0
            visitors.map((visitor)=>{
                count += visitor.counted
            })
            return count
        }
    }
}
</script>
