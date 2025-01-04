
        function confirmDelete() {
            var result = confirm("Você tem certeza de que deseja excluir este usuário e todos os medidores relacionados?");
            if (result) {
                document.getElementById("deleteForm").submit();
            }
        }

        function cancelDelete() {
            window.location.href = "../View/listarusuario.php";
        }
