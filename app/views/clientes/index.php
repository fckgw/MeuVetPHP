<style>
    /* Estilos específicos para esta página */
    table { width: 100%; border-collapse: collapse; margin-top: 20px; background-color: #fff; }
    table, th, td { border: 1px solid #ddd; }
    th, td { padding: 12px; text-align: left; }
    th { background-color: #f8f9fa; }
    .actions a, .actions button { text-decoration: none; padding: 5px 10px; border-radius: 4px; margin-right: 5px; color: white; border: none; cursor: pointer; font-size: 14px; }
    .actions .edit-btn { background-color: #007bff; }
    .actions .delete-btn { background-color: #dc3545; }
</style>

<h1>Gerenciar Clientes</h1>
<!-- CORREÇÃO AQUI -->
<a href="/public/clientes/adicionar" class="logout-btn" style="background-color: #28a745; text-decoration: none; display: inline-block; margin-bottom: 20px;">Adicionar Novo Cliente</a>

<table>
    <thead>
        <tr>
            <th>Nome</th>
            <th>CPF</th>
            <th>Telefone</th>
            <th>Email</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($clientes as $cliente): ?>
        <tr>
            <td><?php echo htmlspecialchars($cliente['nome']); ?></td>
            <td><?php echo htmlspecialchars($cliente['cpf']); ?></td>
            <td><?php echo htmlspecialchars($cliente['telefone']); ?></td>
            <td><?php echo htmlspecialchars($cliente['email']); ?></td>
            <td class="actions">
                <!-- CORREÇÃO AQUI -->
                <a href="/public/clientes/editar/<?php echo $cliente['id']; ?>" class="edit-btn">Editar</a>
                <!-- CORREÇÃO AQUI -->
                <form action="/public/clientes/excluir/<?php echo $cliente['id']; ?>" method="POST" style="display:inline;" onsubmit="return confirm('Atenção! Excluir um cliente também removerá todos os animais associados a ele. Deseja continuar?');">
                    <button type="submit" class="delete-btn">Excluir</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>