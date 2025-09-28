<style>
    /* Estilos para a página de agenda */
    table { width: 100%; border-collapse: collapse; margin-top: 20px; background-color: #fff; }
    table, th, td { border: 1px solid #ddd; }
    th, td { padding: 12px; text-align: left; }
    th { background-color: #f8f9fa; }
    .status-Agendada { color: #007bff; font-weight: bold; }
    .status-Concluída { color: #28a745; font-weight: bold; }
    .status-Cancelada { color: #dc3545; font-weight: bold; }
</style>

<h1>Agenda de Consultas</h1>
<a href="/public/agenda/adicionar" class="logout-btn" style="background-color: #28a745; text-decoration: none; display: inline-block; margin-bottom: 20px;">Novo Agendamento</a>

<table>
    <thead>
        <tr>
            <th>Data/Hora</th>
            <th>Animal</th>
            <th>Cliente</th>
            <th>Veterinário</th>
            <th>Status</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($consultas as $consulta): ?>
        <tr>
            <td><?php echo date('d/m/Y H:i', strtotime($consulta['data_consulta'])); ?></td>
            <td><?php echo htmlspecialchars($consulta['nome_animal']); ?></td>
            <td><?php echo htmlspecialchars($consulta['nome_cliente']); ?></td>
            <td><?php echo htmlspecialchars($consulta['nome_veterinario']); ?></td>
            <td><span class="status-<?php echo $consulta['status']; ?>"><?php echo $consulta['status']; ?></span></td>
            <td class="actions">
                <a href="/public/agenda/editar/<?php echo $consulta['id']; ?>" class="edit-btn">Editar</a>
                <form action="/public/agenda/excluir/<?php echo $consulta['id']; ?>" method="POST" style="display:inline;" onsubmit="return confirm('Deseja realmente excluir este agendamento?');">
                    <button type="submit" class="delete-btn">Excluir</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<style>
    .form-container { background-color: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); max-width: 600px; margin: 20px; }
    .form-group { margin-bottom: 15px; }
    label { display: block; margin-bottom: 5px; font-weight: 500; }
    input, select, textarea { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
</style>

<div class="form-container">
    <h1>Novo Agendamento</h1>
    <form action="/public/agenda/salvar" method="POST">
        <div class="form-group"><label for="data_consulta">Data e Hora:</label><input type="datetime-local" id="data_consulta" name="data_consulta" required></div>
        <div class="form-group">
            <label for="animal_id">Animal:</label>
            <select id="animal_id" name="animal_id" required>
                <option value="">-- Selecione o Animal --</option>
                <?php foreach ($animais as $animal): ?>
                    <option value="<?php echo $animal['id']; ?>"><?php echo htmlspecialchars($animal['nome']) . ' (Dono: ' . htmlspecialchars($animal['nome_cliente']) . ')'; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="veterinario_id">Veterinário:</label>
            <select id="veterinario_id" name="veterinario_id" required>
                <option value="">-- Selecione o Veterinário --</option>
                <?php foreach ($veterinarios as $vet): ?>
                    <option value="<?php echo $vet['id']; ?>"><?php echo htmlspecialchars($vet['nome']); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <select id="status" name="status" required>
                <option value="Agendada" selected>Agendada</option>
                <option value="Concluída">Concluída</option>
                <option value="Cancelada">Cancelada</option>
            </select>
        </div>
        <div class="form-group"><label for="descricao">Descrição/Motivo:</label><textarea id="descricao" name="descricao" rows="4"></textarea></div>
        <div class="form-actions">
            <button type="submit">Salvar Agendamento</button>
            <a href="/public/agenda">Cancelar</a>
        </div>
    </form>
</div>