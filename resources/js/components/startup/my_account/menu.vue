<template>
   <div :class="{
       'ml-3':!is_editable
   }">
      <div
        class="row m-0 p-1"
        style="background:#d8d8dc;border-radius:16px;"
        :class="{
            'col-12 col-sm-12 col-md-12 col-lg-6':!is_editable,
            'col-sm-12':is_editable,
        }"
      >
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
        is_editable:Boolean
    }
}
</script>
