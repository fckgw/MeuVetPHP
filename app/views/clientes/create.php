<style>
    .form-container { background-color: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); max-width: 800px; margin: 20px; }
    .form-grid { display: grid; grid-template-columns: repeat(6, 1fr); gap: 20px; }
    .form-group { margin-bottom: 15px; }
    .col-span-6 { grid-column: span 6; }
    .col-span-3 { grid-column: span 3; }
    .col-span-2 { grid-column: span 2; }
    .col-span-4 { grid-column: span 4; }
    label { display: block; margin-bottom: 5px; font-weight: 500; }
    input { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
    .form-actions { margin-top: 20px; }
    button { padding: 10px 20px; border: none; border-radius: 4px; color: white; background-color: #28a745; cursor: pointer; }
    a { text-decoration: none; color: #555; margin-left: 15px; }
    input.readonly { background-color: #e9ecef; }
</style>

<div class="form-container">
    <h1>Adicionar Novo Cliente</h1>
    <form action="/public/clientes/salvar" method="POST">
        <div class="form-grid">
            <div class="form-group col-span-6"><label for="nome">Nome Completo:</label><input type="text" id="nome" name="nome" required></div>
            <div class="form-group col-span-3"><label for="cpf">CPF:</label><input type="text" id="cpf" name="cpf"></div>
            <div class="form-group col-span-3"><label for="telefone">Telefone:</label><input type="text" id="telefone" name="telefone"></div>
            <div class="form-group col-span-6"><label for="email">Email:</label><input type="email" id="email" name="email"></div>
            
            <hr class="col-span-6">

            <div class="form-group col-span-2"><label for="cep">CEP:</label><input type="text" id="cep" name="cep" onblur="buscarCep(this.value);"></div>
            <div class="form-group col-span-4"><label for="logradouro">Rua / Logradouro:</label><input type="text" id="logradouro" name="logradouro"></div>
            
            <div class="form-group col-span-2"><label for="numero">Número:</label><input type="text" id="numero" name="numero"></div>
            <div class="form-group col-span-4"><label for="complemento">Complemento:</label><input type="text" id="complemento" name="complemento" placeholder="Apto, Bloco, Casa, etc."></div>

            <div class="form-group col-span-3"><label for="bairro">Bairro:</label><input type="text" id="bairro" name="bairro" class="readonly" readonly></div>
            <div class="form-group col-span-3"><label for="cidade">Cidade:</label><input type="text" id="cidade" name="cidade" class="readonly" readonly></div>
        </div>

        <div class="form-actions">
            <button type="submit">Salvar Cliente</button>
            <a href="/public/clientes">Cancelar</a>
        </div>
    </form>
</div>

<!-- SCRIPT DE BUSCA DE CEP -->
<script src="/public/js/cep.js"></script>