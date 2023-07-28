let btn=document.getElementById("submitBtn")
const emailRegex = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/;
const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{4,20}$/;
const mobileRegex = /^\d{11,15}$/;
const addressRegex = /^[a-zA-Z0-9\s,-]+$/;
// const userName=document.getElementById("userName");
// userName
const usernameRegex = /^[a-zA-Z]{3,20}$/;
document.getElementById('userName').addEventListener("input",()=>{
        let userName = document.getElementById('userName')
        let userNameAlertText = document.getElementById('userNameAlertText');
        let userNameText = document.querySelector(".userNameLabel");
        if (usernameRegex.test(userName.value)) {
            userNameText.style.backgroundColor = "green";
            userNameText.style.color= "white";
            userNameAlertText.style.backgroundColor=""
            userNameAlertText.classList=""
            userNameAlertText.innerText = ""
        } else{
            userNameText.style.backgroundColor = "red";
            // userName.classList="form-control is-invalid"
            userNameAlertText.style.backgroundColor="red"
            userNameAlertText.classList="pl-5 pr-5 container-fluid w-100"
            userNameAlertText.innerText = "Name Must Contain Three Letter and No Digits"
        }
    })
    // Email
    document.getElementById('userEmail').addEventListener("input",()=>{
        let userName = document.getElementById('userEmail')
        let userNameAlertText = document.getElementById('userEmailAlertText');
        let userNameText = document.querySelector(".userEmailLabel");
        if (emailRegex.test(userName.value)) {
            userNameText.style.backgroundColor = "green";
            userNameText.style.color= "white";
            userNameAlertText.style.backgroundColor=""
            userNameAlertText.classList=""
            userNameAlertText.innerText = ""
        } else{
            // userName.classList="form-control is-invalid"
            userNameAlertText.style.backgroundColor="red"
            userNameAlertText.classList="pl-5 pr-5 container-fluid w-100"
            userNameAlertText.innerText = "Name Must Contain Three Letter and No Digits"
        }
    })
   // password
   document.getElementById('userPassword').addEventListener("input",()=>{
    let userName = document.getElementById('userPassword')
    let userNameAlertText = document.getElementById('userPasswordAlertText');
    let userNameText = document.querySelector(".userPasswordLabel");
    if (passwordRegex.test(userName.value)) {
        userNameText.style.backgroundColor = "green";
        userNameText.style.color= "white";
        userNameAlertText.style.backgroundColor=""
        userNameAlertText.classList=""
        userNameAlertText.innerText = ""
    } else{
        // userName.classList="form-control is-invalid"
        userNameAlertText.style.backgroundColor="red"
        userNameAlertText.classList="pl-5 pr-5 container-fluid w-100"
        userNameAlertText.innerText = "Name Must Contain Three Letter and No Digits"
    }
})
   //Confirm password
   document.getElementById('userConfirmPassword').addEventListener("input",()=>{
    let userName = document.getElementById('userConfirmPassword')
    let userNameAlertText = document.getElementById('userConfirmPasswordAlertText');
    let userNameText = document.querySelector(".userConfirmPasswordLabel");
    if (passwordRegex.test(userName.value)) {
        userNameText.style.backgroundColor = "green";
        userNameText.style.color= "white";
        userNameAlertText.style.backgroundColor=""
        userNameAlertText.classList=""
        userNameAlertText.innerText = ""
    } else{
        // userName.classList="form-control is-invalid"
        userNameAlertText.style.backgroundColor="red"
        userNameAlertText.classList="pl-5 pr-5 container-fluid w-100"
        userNameAlertText.innerText = "Name Must Contain Three Letter and No Digits"
    }
})
   //mobile
   document.getElementById('userMobile').addEventListener("input",()=>{
    let userName = document.getElementById('userMobile')
    let userNameAlertText = document.getElementById('userMobileAlertText');
    let userNameText = document.querySelector(".userMobileLabel");
    if (mobileRegex.test(userName.value)) {
        userNameText.style.backgroundColor = "green";
        userNameText.style.color= "white";
        userNameAlertText.style.backgroundColor=""
        userNameAlertText.classList=""
        userNameAlertText.innerText = ""
    } else{
        // userName.classList="form-control is-invalid"
        userNameAlertText.style.backgroundColor="red"
        userNameAlertText.classList="pl-5 pr-5 container-fluid w-100"
        userNameAlertText.innerText = "Name Must Contain Three Letter and No Digits"
    }
})
   //Adress
   document.getElementById('userAdress').addEventListener("input",()=>{
    let inputField = document.getElementById('userAdress')
    let alertArea = document.getElementById('userAdressAlertText');
    if (addressRegex.test(inputField.value)) {
        inputField.classList="form-control is-valid"
        alertArea.innerText="Not Valid"
        alertArea.classList="d-none"  
    } else{
        alertArea.innerText="Not Valid"
        alertArea.classList="invalid-feedback d-block"
        inputField.classList="form-control is-invalid"
    }
})


// =========================================================
// imageRealTimePriview

let imgInput = document.getElementById('userImage');
document.getElementById('imageBtn').addEventListener('click', () => {
    imgInput.click();
});
let preview = document.getElementById('imagePreview');
imgInput.addEventListener('change', () => {
    if (imgInput.files && imgInput.files[0]) {
        preview.src = URL.createObjectURL(imgInput.files[0]);
        preview.style.display = 'inline-block';
    }
});