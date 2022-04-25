<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Excluir contato</title>
  
    <link rel="stylesheet" href="../components/styles/modal.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</head>

<body>
    <div class="content flex">
        <div class="modal">
            <a href="../index.php" class="modal__cross">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="24" height="24" rx="4" fill="#EBEBF0" />
                    <path d="M16 8L8 16" stroke="#28293D" stroke-width="1.6" stroke-linecap="round"
                        stroke-linejoin="round" />
                    <path d="M8 8L16 16" stroke="#28293D" stroke-width="1.6" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </a>
            <div class="modal__header flex">
                <i class='bx bx-error bx-sm' ></i>
                <p class="bold">Excluir contato</p>
            </div>
            <p>
                ATENÇÃO! Tem certeza que deseja excluir esse contato?
            </p>
            <div class="modal__btns flex">
                <a href="../index.php" class="modal__cta"> Cancelar </a>
                <a href="../DAO/Excluir.php" class="modal__cta modal__cta--red"> Excluir </a>
            </div>
        </div>
    </div>
</body>

</html>