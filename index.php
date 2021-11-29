<?php include('partials/menu.php') ?>

<script>
    const getPosts = async () => {
        const response = await axios.get('http://localhost/myblog/api/post/read.php');
        return response.data;
    }

    const createPostElements = async () => {
        const posts = await getPosts();
        posts.data.forEach(post => {
            const postElement = document.createElement('div');
            postElement.className = `post`;
            postElement.innerHTML = `
                <h1>${post.title}</h1>
                <p>${post.body}</p>
                <p>Category: ${post.category_name}</p>
                <p>Author: ${post.author}</p>
                <p>Created At: ${post.created_at}</p>
            `;
            document.body.appendChild(postElement);
        });
    }

    createPostElements();
    
</script>
</body>


</html>