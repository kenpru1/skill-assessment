<template>
    <div v-show="show" class="text-center">
        <h3>Loading...</h3>
    </div>
</template>

<script setup lang="ts">
    
    defineProps({show:Boolean})
    
</script>

  