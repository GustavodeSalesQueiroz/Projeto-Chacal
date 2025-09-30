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
    ("Design_sem_nome__9_-removebg-preview.png");
    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        visualizar.src = ("../img/Design_sem_nome__10_-removebg-preview.png");
        
    } else {
        passwordInput.type = "password";
        visualizar.src = ("../img/Design_sem_nome__9_-removebg-preview.png");

    }
}