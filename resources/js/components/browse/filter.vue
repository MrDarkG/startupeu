<template>
<div>
    <div class="chek-list" v-for="(list, index) in data" :key="index+'list'">
        <div class="title">{{ list.title }}</div>
        <ul>
            <li v-for="response in list.data" :key="response.id+response.title">
                <div class="form-check">
                    <input class="form-check-input country-check" type="checkbox" value="5" :id="response.id+response.title" :disabled="response.is_disabled">
                    <label class="form-check-label" :for="response.id+response.title">
                        {{ response.title }}                    
                    </label>
                </div>
            </li>
        </ul>
    </div>
</div>
</template>
<script>
export default{
	props:['data'],
	
};
</script>