// let check = 0;
// async function showComment(id) {
//     // check = document.getElementById(`check${id}`).value;
//     let displayComment = document.getElementById(`displayComment${id}`);
//     if (check == 0) {
//         let res = await axios.get("http://127.0.0.1:8000/api/comment/" + id);
//         console.log("comment", res.data.data);
//         for (val in res.data.data) {
//             displayComment.innerHTML += `<div class="mb-2">
//             <p class="m-0 fs-7 fw-bolder">${res.data.data[val].user.name}</p>
//             <p class="m-0 fs-7 bg-gray p-2 rounded">
//              ${res.data.data[val].name}
//             </p>
//             </div>
//             `;
//         }
//     }
//     check = 1;
// }

{
    /* <div class="mb-2">
<p class="m-0 fs-7 fw-bolder">{{ $comment->user->name }}</p>
<p class="m-0 fs-7 bg-gray p-2 rounded">
    {{ $comment->name }}
</p>
</div> */
}

async function storeComment(name, post_id, user_id) {
    let displayComment = document.getElementById(`displayComment${post_id}`);
    data = {
        name: name,
        post_id: post_id,
        user_id: user_id,
    };

    let res = await axios.post("http://127.0.0.1:8000/api/comment", data);

    displayComment.innerHTML += `
            <div class="mb-2">
            <p class="m-0 fs-7 fw-bolder">${res.data}</p>
            <p class="m-0 fs-7 bg-gray p-2 rounded">

            </p>
            </div>
    `;
}

// var myForm = document.forms["storeComment"];
// myForm.addEventListener("submit", (e) => {
//     e.preventDefault();
//     const name = myForm["name"].value;
//     const post_id = myForm["post_id"].value;
//     const user_id = myForm["user_id"].value;
//     storeComment(name, post_id, user_id);
//     name = "";
// });

function myForm(e) {
    e.preventDefault();
    // var myForm = document.forms[`storeComment${id}`];
    const name = myForm["name"].value;
    const post_id = myForm["post_id"].value;
    const user_id = myForm["user_id"].value;
    // storeComment(name, post_id, user_id);
    name = "";

    console.log(e.target);
}
