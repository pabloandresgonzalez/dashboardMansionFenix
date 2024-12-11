<div class="alert-overlay" id="alertOverlay">
    <div class="alert-box">
        <h2>Hola!</h2>
        <p>No olvides revisar el tiempo restante de tus membresías.</p>
        <button id="closeAlert">Aceptar</button>
    </div>
</div>
<style>
    .alert-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        display: none;
        justify-content: center;
        align-items: center;
    }

    .alert-box {
        background: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        text-align: center;
        width: 300px;
    }

    .alert-box h2 {
        margin-top: 0;
    }

    .alert-box button {
        margin-top: 15px;
        padding: 10px 20px;
        background: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .alert-box button:hover {
        background: #0056b3;
    }
</style>
<script>
    function showAlert() {
        const alertOverlay = document.getElementById("alertOverlay");
        alertOverlay.style.display = "flex"; // Muestra la alerta
    }

    function closeAlert() {
        const alertOverlay = document.getElementById("alertOverlay");
        alertOverlay.style.display = "none"; // Oculta la alerta
    }

    document.addEventListener("DOMContentLoaded", function () {
        showAlert(); // Muestra la alerta al cargar la página
        document.getElementById("closeAlert").addEventListener("click", closeAlert); // Cierra la alerta
    });
</script>
