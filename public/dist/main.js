// popover
var popoverTriggerList = [].slice.call(
    document.querySelectorAll('[data-bs-toggle="popover"]')
);
var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
    return new bootstrap.Popover(popoverTriggerEl);
});

// Gender Select
if (window.location.pathname === "/") {
    const radioBtn1 = document.querySelector("#flexRadioDefault1");
    const radioBtn2 = document.querySelector("#flexRadioDefault2");
    const radioBtn3 = document.querySelector("#flexRadioDefault3");
    const genderSelect = document.querySelector("#genderSelect");

    radioBtn1.addEventListener("change", () => {
        genderSelect.classList.add("d-none");
    });
    radioBtn2.addEventListener("change", () => {
        genderSelect.classList.add("d-none");
    });
    radioBtn3.addEventListener("change", () => {
        genderSelect.classList.remove("d-none");
    });
}

// let showComment = ($id) => {
//     axios.get('http://127.0.0.1:8000/api/comment/'+$id)
//          .then((res)=>{
//             console.log(res.data);
//          });
// }
