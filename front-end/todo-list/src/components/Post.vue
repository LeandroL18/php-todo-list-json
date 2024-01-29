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
        pushPost() {

            const params = {
                text: this.newPostText
            };
            const config = {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            };

            axios.post('http://localhost/php-todo-list-json/back-end/pushPost.php', params, config)
                .then(res => {

                    this.posts = res.data;
                    this.newPostText = "";
                }).catch(err => console.log(err));
        },

        deletePost(index) {

            const params = {
                params: {

                    index: index
                }
            };

            axios.get("http://localhost/php-todo-list-json/back-end/deletePost.php", params)
            .then(res => {

                this.posts = res.data;
            })
            .catch(err => console.log(err));
        },
    },

    mounted() { 

        axios.get('http://localhost/php-todo-list-json/back-end/getPost.php')
        .then(res => {

            this.posts = res.data;

        }).catch(err => console.log(err));
    }
}


</script>

<template>
    <h2>Compiti: {{ posts.length }}</h2>
    <h3>Aggiungi un nuovo compito</h3>

    <form @submit.prevent="pushPost">
        <input type="text" name="text" v-model="newPostText"> 
        <input type="submit" value="AGGIUNGI">
    </form>
    <ul >
        <li
            v-for="(post, index) in posts"
            :key="index"
            style="margin-bottom: 10px;"
        >
            {{ post.text }}
            
            <button
                @click="deletePost(index)"
                style="padding:5px 10px; margin-left:20px;"
            >X</button>
        </li>
    </ul>
</template>

<style>

</style>