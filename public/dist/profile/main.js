function openFileInput(id) {
    document.getElementById(`fileInput${id}`).click();
}

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
    // imagePreview.classList.add("d-none");
    // close.classList.add("d-none");
};
