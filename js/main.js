function submitForm() {
    var formId = this.closest("form").id; // Отримуємо ID форми, яка відправляється
    var response = grecaptcha.getResponse();

    if(response.length == 0) { 
        alert("Підтвердьте reCAPTCHA");
        return false;
    }

    // Викликаємо валідацію залежно від форми
    if(formId === "loginForm") {
        return validateLoginForm();
    } else if(formId === "registerForm") {
        return validateRegisterForm();
    }

    return true; // За замовчуванням дозволяємо відправку форми, якщо жодна умова не спрацювала
}

function validateLoginForm() {
    var email = document.getElementById("lemail").value;
    var password = document.getElementById("lpass").value;

    if (!email) {
        alert("Будь ласка, введіть свою електронну пошту.");
        return false;
    }

    if (password.length < 6) {
        alert("Пароль повинен містити мінімум 6 символів.");
        return false;
    }

    return true; // Валідація пройшла успішно
}

function validateRegisterForm() {
    var nickname = document.getElementById("rnickname").value; // Зверніть увагу, що ID повинен бути унікальним і відповідати ID поля у формі
    var email = document.getElementById("remail").value;
    var password = document.getElementById("rpass").value;
    var confirmPassword = document.getElementById("rep_pass").value;

    if (!nickname) {
        alert("Будь ласка, введіть свій нікнейм.");
        return false;
    }

    if (nickname.length < 3) {
        alert("Нікнейм повинен містити мінімум 3 символи.");
        return false;
    }

    if (!email) {
        alert("Будь ласка, введіть свою електронну пошту.");
        return false;
    }

    if (password.length < 6) {
        alert("Пароль повинен містити мінімум 6 символів.");
        return false;
    }

    if (password !== confirmPassword) {
        alert("Паролі не співпадають.");
        return false;
    }

    return true; // Валідація пройшла успішно
}
