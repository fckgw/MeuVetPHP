<style>
    .form-container { background-color: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); max-width: 600px; margin: 20px; }
    .form-group { margin-bottom: 15px; }
    label { display: block; margin-bottom: 5px; font-weight: 500; }
    input, select { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
    .form-actions { margin-top: 20px; }
    button { padding: 10px 20px; border: none; border-radius: 4px; color: white; background-color: #28a745; cursor: pointer; }
    a { text-decoration: none; color: #555; margin-left: 15px; }
</style>

<div class="form-container">
    <h1>Adicionar Novo Animal</h1>
    <form action="/public/animais/salvar" method="POST">
        <div class="form-group">
            <label for="cliente_id">Dono (Cliente):</label>
            <select id="cliente_id" name="cliente_id" required>
                <option value="">-- Selecione o Dono --</option>
                <?php foreach ($clientes as $cliente): ?>
                    <option value="<?php echo $cliente['id']; ?>"><?php echo htmlspecialchars($cliente['nome']); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group"><label for="nome">Nome do Animal:</label><input type="text" id="nome" name="nome" required></div>
        <div class="form-group"><label for="especie">Espécie:</label><input type="text" id="especie" name="especie" placeholder="Ex: Cão, Gato"></div>
        <div class="form-group"><label for="raca">Raça:</label><input type="text" id="raca" name="raca"></div>
        <div class="form-group"><label for="sexo">Sexo:</label><input type="text" id="sexo" name="sexo" placeholder="Ex: Macho, Fêmea"></div>
        <div class="form-group"><label for="data_nascimento">Data de Nascimento:</label><input type="date" id="data_nascimento" name="data_nascimento"></div>
        <div class="form-actions">
            <button type="submit">Salvar Animal</button>
            <a href="/public/animais">Cancelar</a>
        </div>
    </form>
</div>