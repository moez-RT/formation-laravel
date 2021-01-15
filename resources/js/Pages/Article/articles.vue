
<template>
    <div>
        <h1>Books</h1>
        <ul>
            <li v-for="article in articles.data">
                <inertia-link >
                    {{ article.title }}
                </inertia-link>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        props: {
            articles: Object
        }
    }
</script>
