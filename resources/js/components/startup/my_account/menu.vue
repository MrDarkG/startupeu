<template>
   <div class="container ml-3 pl-0">
      <div class="row p-1" style="background:#d8d8dc;border-radius:16px;">
          <div  
              v-for="(menu, index) in menu_list" :id="menu.id" 
              class="text-center col-sm p-2 single_menu_div" 
              style="border-radius:14px;cursor:pointer;"
              @click="$emit('getActive',menu.id)" 
              :class="{'shadow-sm':menu.is_active,'mr-1':(index+1!==menu_list.length),'bg-white':menu.is_active}" 
              :key="menu.id+menu.title"
          >
              {{ menu.title }}
          </div>
      </div>
   </div>
</template>
<script>
export default{
	props:{
   	menu_list:Array,
   }
}
</script>