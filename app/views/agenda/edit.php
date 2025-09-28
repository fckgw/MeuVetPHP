<style>
    .form-container { /* ... (mesmos estilos do create.php) ... */ }
</style>

<div class="form-container">
    <h1>Editar Agendamento</h1>
    <form action="/public/agenda/atualizar/<?php echo $consulta['id']; ?>" method="POST">
        <div class="form-group"><label for="data_consulta">Data e Hora:</label><input type="datetime-local" id="data_consulta" name="data_consulta" value="<?php echo date('Y-m-d\TH:i', strtotime($consulta['data_consulta'])); ?>" required></div>
        <div class="form-group">
            <label for="animal_id">Animal:</label>
            <select id="animal_id" name="animal_id" required>
                <?php foreach ($animais as $animal): ?>
                    <option value="<?php echo $animal['id']; ?>" <?php echo ($animal['id'] == $consulta['animal_id']) ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($animal['nome']) . ' (Dono: ' . htmlspecialchars($animal['nome_cliente']) . ')'; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="veterinario_id">Veterinário:</label>
            <select id="veterinario_id" name="veterinario_id" required>
                <?php foreach ($veterinarios as $vet): ?>
                    <option value="<?php echo $vet['id']; ?>" <?php echo ($vet['id'] == $consulta['veterinario_id']) ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($vet['nome']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <select id="status" name="status" required>
                <option value="Agendada" <?php echo ($consulta['status'] == 'Agendada') ? 'selected' : ''; ?>>Agendada</option>
                <option value="Concluída" <?php echo ($consulta['status'] == 'Concluída') ? 'selected' : ''; ?>>Concluída</option>
                <option value="Cancelada" <?php echo ($consulta['status'] == 'Cancelada') ? 'selected' : ''; ?>>Cancelada</option>
            </select>
        </div>
        <div class="form-group"><label for="descricao">Descrição/Motivo:</label><textarea id="descricao" name="descricao" rows="4"><?php echo htmlspecialchars($consulta['descricao']); ?></textarea></div>
        <div class="form-actions">
            <button type="submit">Atualizar Agendamento</button>
            <a href="/public/agenda">Cancelar</a>
        </div>
    </form>
</div>