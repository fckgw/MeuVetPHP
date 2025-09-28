<style>
    table { width: 100%; border-collapse: collapse; margin-top: 20px; background-color: #fff; }
    table, th, td { border: 1px solid #ddd; }
    th, td { padding: 12px; text-align: left; }
    th { background-color: #f8f9fa; }
    .actions a, .actions button { text-decoration: none; padding: 5px 10px; border-radius: 4px; margin-right: 5px; color: white; border: none; cursor: pointer; font-size: 14px; }
    .actions .edit-btn { background-color: #007bff; }
    .actions .delete-btn { background-color: #dc3545; }
</style>

<h1>Gerenciar Animais</h1>
<a href="/public/animais/adicionar" class="logout-btn" style="background-color: #28a745; text-decoration: none; display: inline-block; margin-bottom: 20px;">Adicionar Novo Animal</a>

<table>
    <thead>
        <tr>
            <th>Nome do Animal</th>
            <th>Dono (Cliente)</th>
            <th>Espécie</th>
            <th>Raça</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($animais as $animal): ?>
        <tr>
            <td><?php echo htmlspecialchars($animal['nome']); ?></td>
            <td><?php echo htmlspecialchars($animal['nome_cliente']); ?></td>
            <td><?php echo htmlspecialchars($animal['especie']); ?></td>
            <td><?php echo htmlspecialchars($animal['raca']); ?></td>
            <td class="actions">
                <a href="/public/animais/editar/<?php echo $animal['id']; ?>" class="edit-btn">Editar</a>
                <form action="/public/animais/excluir/<?php echo $animal['id']; ?>" method="POST" style="display:inline;" onsubmit="return confirm('Tem certeza que deseja excluir este animal?');">
                    <button type="submit" class="delete-btn">Excluir</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>