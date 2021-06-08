let plantpreferences = document.querySelectorAll('.form__input--twocolumns');
// console.log(checkboxes);

plantpreferences.forEach((plantpreference) => {
    let prefCheckbox = plantpreference.querySelector('.prefCheckbox');
    // console.log(prefCheckbox);

    prefCheckbox.addEventListener('change', () => {
        

        let userId = prefCheckbox.dataset.userid;
        let plantId = prefCheckbox.dataset.plantid;
        let isChecked = prefCheckbox.dataset.ischecked;
        if(isChecked == 0){
            isChecked = 1;
            prefCheckbox.dataset.ischecked = 1;
        }else{
            isChecked = 0;
            prefCheckbox.dataset.ischecked = 0;
        }
        
        console.log(`userid: ${userId} - plantid: ${plantId} - ischecked: ${isChecked}`);

        // post to database (ajax)
        let formData = new FormData();
        formData.append("userId", userId);
        formData.append("plantId", plantId);
        formData.append("isChecked", isChecked);

        fetch('ajax/saveplantpreference.php', {
            method: "POST",
            body: formData
        })


        
    });
});