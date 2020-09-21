<template>
    <div>
        <h1>The number is {{ views }}</h1>
        <button @click="updateCounter(1)">Increase</button>
        <button @click="updateCounter(-1)">Decrease</button>
        <br /><br />

        <div v-for="(blog, i) in blogs" :key="i" v-if="blogs.length">
            <h1>{{ blog.title }}</h1>
            <p>{{ blog.post }}</p>
        </div>

        <br /><br />

        <div>
            <h1 v-if="showItem">Show this item if "showItem" is true</h1>
            <p v-else>Show this item if "showItem" is false</p>
        </div>

        <button @click="showItem = !showItem">Change showItem</button>
    </div>
</template>

<script>
export default {
    data() {
        return {
            views: 0,
            blogs: [],
            showItem: false
        };
    },
    methods: {
        updateCounter(number) {
            this.views += number;
        }
    },
    created() {
        // call the server to get views of this blog post
        this.views = 100;
        // get the blog post
        let posts = [
            {
                title: "Blog Title 1",
                post: "This is blog post 1",
                id: 1
            },
            {
                title: "Blog Title 2",
                post: "This is blog post 2",
                id: 2
            },
            {
                title: "Blog Title 3",
                post: "This is blog post 3",
                id: 3
            },
            {
                title: "Blog Title 4",
                post: "This is blog post 4",
                id: 4
            }
        ];
        this.blogs = posts;
    }
};
</script>
