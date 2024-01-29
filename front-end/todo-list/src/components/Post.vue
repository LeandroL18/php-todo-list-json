<script>
import axios from 'axios';

export default {
    name: 'Post',
    data() {
        return {
            posts: [],
            newPostText: ""
        }
    },

    methods: { 
        
    },

    mounted() { 

        axios.get('http://localhost/php-todo-list-json/back-end/getPost.php')
        .then(res => {

            this.posts = res.data;
            console.log(this.posts);

        }).catch(err => console.log(err));
    }
}


</script>

<template>
    <h2>Compiti:{{ posts.length }}</h2>
    <h3>Aggiungi un nuovo compito</h3>
    <form @submit.prevent="pushPost">
        <input type="text" name="text" v-model="newPostText"> 
        <input type="submit" value="AGGIUNGI">
    </form>
    <ul>
        <li
            v-for="(post, index) in posts"
            :key="index"
        >
            {{ post.text }}
            <br>
        </li>
    </ul>
</template>

<style>

</style>