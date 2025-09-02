function validarSenha() {
    var senha = document.getElementById("password").value;

    if (senha.length < 8) {
        alert("A senha deve ter no mínimo 8 caracteres.");
        return false;
    }

    return true;
}