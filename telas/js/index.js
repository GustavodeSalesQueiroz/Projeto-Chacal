function validarSenha() {
    var senhaInput = document.getElementById("password");
    var senha = senhaInput.value;

    if (senha.length < 8) {
        alert("A senha deve ter no mínimo 8 caracteres.");
        senhaInput.value = ""; // Limpa o campo
        senhaInput.focus(); // Coloca o foco de volta no campo
        return false;
    }
}

function togglePasswordVisibility() {
    var passwordInput = document.getElementById("password");
    var toggleIcon = document.getElementById("togglePassword");
    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        document.getElementById("Design_sem_nome__9_-removebg-preview.png").src = "../img/Design_sem_nome__10_-removebg-preview.png"; // Ícone de olho aberto
    } else {
        passwordInput.type = "password";
        document.getElementById(visualizar).src = "../img/Design_sem_nome__10_-removebg-preview.png"; // Ícone de olho fechado
    }
}