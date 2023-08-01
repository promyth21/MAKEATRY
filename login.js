let btn=document.getElementById("submitBtn")
const emailRegex = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/;
const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{4,20}$/;
const mobileRegex = /^\d{11,15}$/;
const addressRegex = /^[a-zA-Z0-9\s,-]+$/;
// const userName=document.getElementById("userName");
// userName

    // Email
    document.getElementById('userEmail').addEventListener("input",()=>{
        let inputField = document.getElementById('userEmail')
        let alertArea = document.getElementById('userEmailAlertText');
        if (emailRegex.test(inputField.value)) {
            inputField.classList="form-control is-valid"
            alertArea.innerText="Not Valid"
            alertArea.classList="d-none"  
        } else{
            alertArea.innerText="Not Valid"
            alertArea.classList="invalid-feedback d-block"
            inputField.classList="form-control is-invalid"
        }
    })
   // password
   document.getElementById('userPassword').addEventListener("input",()=>{
    let inputField = document.getElementById('userPassword')
    let alertArea = document.getElementById('userPasswordAlertText');
    if (passwordRegex.test(inputField.value)) {
        inputField.classList="form-control is-valid"
        alertArea.innerText="Not Valid"
        alertArea.classList="d-none"  
    } else{
        alertArea.innerText="Not Valid"
        alertArea.classList="invalid-feedback d-block"
        inputField.classList="form-control is-invalid"
    }
})