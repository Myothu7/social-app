async function storeComment(name, post_id, user_id) {
    let displayComment = document.getElementById(`displayComment${post_id}`);
    data = {
        name: name,
        post_id: post_id,
        user_id: user_id,
    };

    let res = await axios.post("http://127.0.0.1:8000/api/comment", data);
    user_name = document.forms[`commentForm${post_id}`]["user_name"].value;
    // console.log(res.data);
    displayComment.innerHTML += `
            <div class="mb-2">
            <p class="m-0 fs-7 fw-bolder">
                ${user_name}
            </p>
            <p class="m-0 fs-7 bg-gray p-2 rounded">
            ${res.data.data.name}
            </p>
            </div>
    `;
    document.forms[`commentForm${post_id}`]["name"].value = "";
}

const chColor = (post_id) => {
    let commentBut = document.getElementById("commentBut" + post_id);
    let comment = document.forms[`commentForm${post_id}`]["name"].value;
    if (comment != "") {
        commentBut.classList.add("text-primary");
    } else {
        commentBut.classList.remove("text-primary");
    }
};

const store = (post_id) => {
    let commentForm = document.forms[`commentForm${post_id}`];
    let name = commentForm["name"].value;
    let user_id = parseInt(commentForm["user_id"].value);

    if (name != "") {
        storeComment(name, post_id, user_id);
    }
};
