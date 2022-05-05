<template>
    <div>
       <div class="flex flex-col justify-center ">
           <div class="flex">
              <span class="flex p-input-icon-left">
                <i class="pi pi-search" />
                 <InputText type="text" v-model="searchKey" placeholder="Search" />
            </span>
           </div>

            <div class="flex flex-col">
                <InputNumber   class="" label="Records Per page" v-model="perPage"/>
            </div>

                    </div>
    </div>
</template>

<script setup>
import { watch,ref, computed, toRefs } from "@vue/runtime-core";
import  debounce  from "lodash/debounce";
import {Inertia} from '@inertiajs/inertia'

  const props=defineProps({model:String})
  const {model}= toRefs(props)
  const emit =defineEmits('loadMembers');
  let items=null
  let searchKey=ref('')
  let perPage=ref(null)
//   const getRoute=computed(()=>route(`${props.model}'.index'`))

watch(searchKey,debounce((value)=>{
                                    Inertia.get(route(model.value),{'search':value,'perPage':value},{preserveState:true,replace:true})
                                  },300));

watch(perPage,debounce((value)=>{   if (perPage=0) perPage=16
                                    Inertia.get(route(model.value),{'perPage':value,'search':value},{preserveState:true,replace:true})
                                    },300));
</script>

<style lang="scss" scoped>

</style>
