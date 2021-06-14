<template>
    
</template>

<script>
    export default {
        props: ['title', 'timeA', 'timeB'],
        data(){
            return {
                jogadoresA: JSON.parse(this.timeA),
                jogadoresB: JSON.parse(this.timeB),
            }
        }
    }
</script>
