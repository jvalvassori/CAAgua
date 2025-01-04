document.addEventListener("DOMContentLoaded", function() {
    var errorMessage = "<?php echo !empty($error_message) ? $error_message : ''; ?>";
    var errorElement = document.getElementById("error-message");
    if (errorMessage) {
        errorElement.innerHTML = "<p>" + errorMessage + "</p>";
    }
});