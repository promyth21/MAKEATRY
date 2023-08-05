import { initializeApp } from "https://www.gstatic.com/firebasejs/10.1.0/firebase-app.js";
import { getAnalytics } from "https://www.gstatic.com/firebasejs/10.1.0/firebase-analytics.js";
import { getAuth, signInWithPhoneNumber } from "firebase/auth";
import { getAuth, RecaptchaVerifier } from "firebase/auth";
const firebaseConfig = {
    apiKey: "AIzaSyAGh2u6DR7Nl7YJBWMQU_MqZrFWjClICc0",
    authDomain: "makeatry-1690758159577.firebaseapp.com",
    projectId: "makeatry-1690758159577",
    storageBucket: "makeatry-1690758159577.appspot.com",
    messagingSenderId: "211964721121",
    appId: "1:211964721121:web:e2db5ebcbabafd686944a0",
    measurementId: "G-H8N9GVDR95"
  };
  const app = initializeApp(firebaseConfig);
  const analytics = getAnalytics(app);
document.getElementById('btns').addEventListener('submit',()=>{
    window.alert("ok");
    userCrede
  const phoneNumber = +8801798142951;
  const auth = getAuth();
  firebase.auth().signInWithPhoneNumber(auth, phoneNumber,app)
      .then((confirmationResult) => {
        // SMS sent. Prompt user to type the code from the message, then sign the
        // user in with confirmationResult.confirm(code).
        window.confirmationResult('123') = confirmationResult;
        // ...
      }).catch((error) => {
        // Error; SMS not sent
        // ..
      });
      const code = getCodeFromUserInput();
confirmationResult.confirm(code).then((result) => {
  // User signed in successfully.
  const user = result.user;
  // ...
}).catch((error) => {
  // User couldn't sign in (bad verification code?)
  // ...
});
})
