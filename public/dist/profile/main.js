// enable file
function openFileInput(id) {
    document.getElementById(`fileInput${id}`).click();
}

let uploadFile = (id) => {
    const fileInput = document.getElementById(`fileInput${id}`);
    const profile_photo = document.getElementById(`profile_photo${id}`);
    const auth_id = document.getElementById("auth_id");
    console.log(profile_photo);
    const file = fileInput.files[0];
    const reader = new FileReader();

    reader.onload = function (e) {
        profile_photo.src = e.target.result;
    };
    reader.readAsDataURL(file);
    const form = new FormData();
    form.append("auth_id", parseInt(auth_id.value));

    if (id == 1) {
        form.append("profile_photo", file);
    } else {
        form.append("cover_photo", file);
    }
    axios.post("http://127.0.0.1:8000/api/media", form).then((resp) => {
        console.log(resp.data);
    });
};

// display image in post ui
let handleFile = () => {
    const postFile = document.querySelector("#postFile");
    const imagePreview = document.getElementById("imagePreview");
    const close = document.querySelector("#close");
    console.log(imagePreview);
    const file = postFile.files[0];
    const reader = new FileReader();

    reader.onload = function (e) {
        imagePreview.src = e.target.result;
        imagePreview.style.display = "block";
        close.style.display = "block";
        // imagePreview.classList.add("d-block");
        // close.classList.add("d-block");
    };
    reader.readAsDataURL(file);
};

const openPostFile = () => {
    document.querySelector("#postFile").click();
};

const cleanFile = () => {
    const postFile = document.querySelector("#postFile");
    const imagePreview = document.getElementById("imagePreview");
    const close = document.querySelector("#close");
    postFile.value = "";
    imagePreview.src = null;
    imagePreview.style.display = "none";
    close.style.display = "none";
};
