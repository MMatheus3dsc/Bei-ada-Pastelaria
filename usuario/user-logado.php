<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área do Usuário</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="../css/user.logado.css">
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <div class="user-info">
                <img src="user-avatar.png" alt="Avatar do usuário">
                <p>Olá, <strong>Matheus!</strong></p>
            </div>
            <nav>
                <ul>
                    <li><a href="#dados-pessoais">Dados pessoais</a></li>
                    <li><a href="#enderecos">Endereços</a></li>
                    <li><a href="#pedidos">Pedidos</a></li>
                    <li><a href="#cartoes">Cartões</a></li>
                    <li><a href="#autenticacao">Autenticação</a></li>
                    <li><a href="#devolucoes">Devoluções</a></li>
                    <li><a href="../sair.php">Sair</a></li>
                </ul>
            </nav>
        </div>
        <div class="main-content">
            <section id="dados-pessoais">
                <h1>Dados pessoais</h1>
                <div class="user-data">
                    <div>
                        <p><strong>Nome</strong><br>Matheus</p>
                        <p><strong>Sobrenome</strong><br>Carolino</p>
                    </div>
                    <div>
                        <p><strong>Email</strong><br>matheusdossantoscarolino@gmail.com</p>
                        <p><strong>Gênero</strong><br>Masculino</p>
                    </div>
                    <div>
                        <p><strong>CPF</strong><br>39001577822</p>
                        <p><strong>Data de nascimento</strong><br>22/09/2002</p>
                        <p><strong>Telefone</strong><br>(11) 97207-7617</p>
                    </div>
                </div>
            </section>
            <section id="enderecos">
                <h1>Endereços</h1>
                <p>Aqui você pode gerenciar seus endereços de entrega.</p>
                <!-- Adicione o conteúdo dos endereços aqui -->
            </section>
            <section id="pedidos">
                <h1>Pedidos</h1>
                <p>Acompanhe seus pedidos aqui.</p>
                <!-- Adicione o conteúdo dos pedidos aqui -->
            </section>
            <section id="cartoes">
                <h1>Cartões</h1>
                <p>Gerencie seus cartões de crédito/débito aqui.</p>
                <!-- Adicione o conteúdo dos cartões aqui -->
            </section>
            <section id="autenticacao">
                <h1>Autenticação</h1>
                <p>Altere suas configurações de autenticação aqui.</p>
                <!-- Adicione o conteúdo da autenticação aqui -->
            </section>
            <section id="devolucoes">
                <h1>Devoluções</h1>
                <p>Gerencie suas devoluções de produtos aqui.</p>
                <!-- Adicione o conteúdo das devoluções aqui -->
            </section>
            <section id="newsletter">
                <h2>Newsletter</h2>
                <label>
                    <input type="checkbox"> Quero receber e-mails com promoções.
                </label>
            </section>
        </div>
    </div>
</body>
</html>
