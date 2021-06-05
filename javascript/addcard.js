//preview your chosen image
let uploadzones = document.querySelectorAll('.uploadzone');
console.log(uploadzones);

uploadzones.forEach((uploadzone) => {
    let fileSelect = uploadzone.querySelector('.addStudentCard');
    fileSelect.addEventListener("change", function(f){
        let preview = uploadzone.querySelector(".prev");
        preview.classList.add('post__prevImage');
        preview.src = URL.createObjectURL(f.target.files[0]);
        console.log(uploadzone);
    });

    uploadzone.querySelector('.prev').addEventListener('click', function(e) {
        e.preventDefault();
        fileSelect.click();
    })
});
