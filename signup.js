let btn=document.getElementById("submitBtn")
const emailRegex = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/;
const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{4,20}$/;
const mobileRegex = /^\d{11,15}$/;
const addressRegex = /^[a-zA-Z0-9\s,-]+$/;
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
            userNameAlertText.style.backgroundColor="red"
            userNameAlertText.classList="pl-5 pr-5 container-fluid w-100"
            userNameAlertText.innerText = "Name Must Contain Three Letter and No Digits"
        }
    })
