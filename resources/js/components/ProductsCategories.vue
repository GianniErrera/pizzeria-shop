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
                categories: categories,
                category_name: ""
            }
        }
    }
</script>
