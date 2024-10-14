function validateForm() {
    // Recuperar variables
    const nombre = document.getElementById("nombre").value;
    const apellido = document.getElementById("apellido").value;
    const dni = document.getElementById("dni").value;
    const telefono = document.getElementById("telefono").value;
    const fNacimiento = document.getElementById("fDate").value;
    const email = document.getElementById("email").value;

    // Validar nombre
    if (!/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/.test(nombre)) {
        alert("El nombre solo puede contener letras y espacios.");
        return false;
    }

    // Validar apellido
    if (!/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/.test(apellido)) {
        alert("El apellido solo puede contener letras y espacios.");
        return false;
    }

    // Validar DNI
    if (!validarDNI(dni)) {
        return false;
    }

    // Validar teléfono
    if (!/^\d{9}$/.test(telefono)) {
        alert("El teléfono debe tener 9 dígitos.");
        return false;
    }

    // Validar fecha de nacimiento
    if (!/^\d{4}-\d{2}-\d{2}$/.test(fNacimiento)) {
        alert("La fecha de nacimiento debe estar en formato aaaa-mm-dd.");
        return false;
    }

    // Validar email
    const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    if (!emailRegex.test(email)) {
        alert("El email no es válido. Ejemplo: ejemplo@servidor.com");
        return false;
    }

    return true;
}

function validarDNI(dni) {
    // Comprobar el formato del DNI
    const dniRegex = /^\d{8}-[A-Z]$/; // Formato: 12345678-Z
    if (!dniRegex.test(dni)) {
        alert("El DNI no es válido. Formato correcto: 12345678-Z");
        return false;
    }

    // Extraer el número y la letra
    const numero = dni.substr(0, 8);
    const letra = dni.charAt(9);
    
    // Calcular la letra correspondiente
    const letras = "TRWAGMYFPDXBNJZSQVHLCKE";
    const letraCorrecta = letras.charAt(numero % 23);
    
    if (letra !== letraCorrecta) {
        alert("La letra del DNI es incorrecta.");
        return false;
    }

    return true;
}

