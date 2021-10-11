<template>
    <div>


        <div>
            <input v-model.trim="category_name" >

        </div>





    </div>
</template>

<script>
    export default {


        data() {
            return {
                caegories: categories,
                category_name: ""
            }
        }
    }
</script>
