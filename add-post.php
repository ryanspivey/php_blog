<?php include('partials/menu.php') ?>

<form action="" method="post" onsubmit="submitForm()">
<ul class="form-style-1">
    <li><label>Full Name <span class="required">*</span></label><input type="text" name="firstName" class="field-divided" placeholder="First" /> <input type="text" name="lastName" class="field-divided" placeholder="Last" /></li>
    <li>
        <label>Title <span class="required">*</span></label>
        <input type="text" name="title" class="field-long" />
    </li>
    <li>
        <label>Category</label>
        <select name="selectCategory" class="field-select">
        </select>
    </li>
    <li>
        <label>Your Message <span class="required">*</span></label>
        <textarea name="field5" id="field5" class="field-long field-textarea"></textarea>
    </li>
    <li>
        <input type="submit" value="Submit" />
    </li>
</ul>
</form>



<script>
    let submitForm = async () => {
        let firstName = document.querySelector('input[name="firstName"]').value;
        let lastName = document.querySelector('input[name="lastName"]').value;
        let fullName = firstName + ' ' + lastName;
        let title = document.querySelector('input[name="title"]').value;
        let body = document.querySelector('textarea[name="field5"]').value;
        let selectedCategory = document.querySelector('select[name="selectCategory"]').value;
        

        let getCategoryId = async () => {
            let allCategories = await getCategories();
            let category_id = 0;
            allCategories.data.forEach(category => {
                if(category.name == selectedCategory) {
                    category_id = category.id;
                }
            });
            return category_id;
        }

        let category_id = await getCategoryId();
        

        axios.post('http://localhost/myblog/api/post/create.php', {
            author: fullName,
            title: title,
            body: body,
            category_id: category_id
        })

    }

    const getCategories = async () => {
        const response = await axios.get('http://localhost/myblog/api/category/read.php');
        return response.data;
    }

    const createCategoryElements = async () => {
        const categories = await getCategories();
        categories.data.forEach(category => {
            const categoryElement = document.createElement('option');
            categoryElement.innerHTML = category.name;
            document.querySelector('select[name="selectCategory"]').appendChild(categoryElement);
        });
    }

    createCategoryElements();
    

</script>

</body>
</html>