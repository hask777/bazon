<template>
    <div class="text-2xl" v-on:click="addLike">
        <i class="fa fa-heart"></i>
        <div>
            <span v-if="likes.like_count = 0">
                 {{ likes.like_count }}
            </span>
             <span v-else="likes.like_count > 0">
                 {{ newLike }}
            </span>
           
        </div>
    </div>
</template>

<script>
export default {
    name: 'Like',
    data() {
        return{
            newLike: 0,
            likes: [
                {
                    'movie_id': 1,
                    'like_count': 0
                }
            ]
        }
    }, 
    methods: {
        addLike(){
            this.likes.push({
                //  id: this.idForLike,
                like_count: this.newLike++,
            })      
            alert('hi')
        }
    }
}
</script>
