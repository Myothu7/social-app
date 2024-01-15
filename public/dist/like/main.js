const likeForm = document.getElementById("likeForm");
// const axios = require("axios");
let storeLike = (id, user_id) => {
    params = {
        post_id: id,
        user_id: user_id,
    };
    axios.post("http://127.0.0.1:8000/api/like", params).then((resp) => {
        console.log(resp.data);
    });
};

let deleteLike = (id, user_id) => {
    params = {
        post_id: id,
        user_id: user_id,
    };
    axios.post("http://127.0.0.1:8000/api/like/del", params).then((resp) => {
        console.log(resp.data);
    });
};
let likeColorCheck = (id, user_id, auth_id) => {
    let like_icon = document.getElementById(`like-icon${id}`);
    let like_text = document.getElementById(`like-text${id}`);
    if (user_id == auth_id) {
        like_icon.style.color = "blue";
        like_text.style.color = "blue";
    }
};
function checkLike(id, user_id) {
    let like = document.getElementById(`like${id}`);
    let like_icon = document.getElementById(`like-icon${id}`);
    let like_text = document.getElementById(`like-text${id}`);
    let like_count = document.getElementById(`like-count${id}`);
    if (like.value == 1) {
        let count = parseInt(like_count.innerText);
        like_count.innerText = count - 1;
        like_icon.classList.remove("text-primary");
        like_text.classList.remove("text-primary");
        like.value = 0;
        deleteLike(id, user_id);
    } else {
        let count = parseInt(like_count.innerText);
        like.value = 1;
        like_icon.classList.add("text-primary");
        like_text.classList.add("text-primary");
        if (count > 0) {
            like_count.innerText = count + 1;
        } else {
            like_count.innerHTML = 1;
        }

        storeLike(id, user_id);
    }
}
