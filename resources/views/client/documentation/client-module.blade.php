<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documentação do módulo Client</title>
    <style>
        :root {
            color-scheme: light;
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }
        body {
            margin: 0;
            padding: 2rem;
            background: linear-gradient(135deg, #f8fafc 0%, #eef2ff 100%);
            color: #1f2937;
        }
        .container {
            max-width: 1100px;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 15px 35px rgba(15, 23, 42, 0.08);
        }
        h1, h2 { color: #111827; }
        .hero {
            background: #0f172a;
            color: #fff;
            border-radius: 16px;
            padding: 1.25rem 1.5rem;
            margin-bottom: 1rem;
        }
        .badge {
            display: inline-block;
            padding: 0.35rem 0.75rem;
            border-radius: 999px;
            background: #e0e7ff;
            color: #4338ca;
            font-size: 0.9rem;
            margin-right: 0.5rem;
            margin-bottom: 0.5rem;
        }
        .card {
            border: 1px solid #e5e7eb;
            border-radius: 14px;
            padding: 1rem 1.2rem;
            margin-bottom: 1rem;
            background: #fafafa;
        }
        code {
            background: #f3f4f6;
            padding: 0.15rem 0.35rem;
            border-radius: 6px;
        }
        ul { padding-left: 1.2rem; }
        .flow {
            background: #f8fafc;
            border-left: 4px solid #6366f1;
            padding: 0.8rem 1rem;
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="hero">
            <h1>Documentação do módulo Client</h1>
            <p>Estrutura organizada para manutenção, escalabilidade e clareza de responsabilidades.</p>
        </div>

        <div class="card">
            <h2>Visão geral</h2>
            <p>O módulo Client foi reorganizado com uma separação clara entre camada de apresentação, regras de negócio e acesso a dados, seguindo um padrão mais próximo de arquiteturas modernas.</p>
        </div>

        <div class="card">
            <h2>Estrutura adotada</h2>
            <span class="badge">Presentation</span>
            <span class="badge">Business</span>
            <span class="badge">Data</span>
            <span class="badge">DTO</span>
            <span class="badge">Contracts</span>
            <ul>
                <li><strong>Presentation</strong>: controllers e requests que recebem a requisição.</li>
                <li><strong>Business</strong>: services com regras específicas do módulo.</li>
                <li><strong>Data</strong>: repositórios para acesso e persistência.</li>
                <li><strong>DTO</strong>: transferência de dados entre camadas.</li>
                <li><strong>Contracts</strong>: interfaces para abstração do repositório.</li>
            </ul>
        </div>

        <div class="card">
            <h2>Fluxo de uma requisição</h2>
            <div class="flow">
                <strong>Route</strong> → <strong>Controller</strong> → <strong>Service</strong> → <strong>Repository</strong> → <strong>Model</strong>
            </div>
            <p>Esse fluxo deixa o código mais previsível, facilita testes e reduz o acoplamento entre as partes do sistema.</p>
        </div>

        <div class="card">
            <h2>O que já está implementado</h2>
            <ul>
                <li>Cadastro e atualização de Client</li>
                <li>Upload de imagem de perfil</li>
                <li>Validação em requests separados</li>
                <li>Controllers de páginas públicas: Home, Blog, Produtos, Contato, Sobre e Eventos</li>
                <li>Documentação pública acessível via rota</li>
            </ul>
        </div>

        <div class="card">
            <h2>Rotas públicas relevantes</h2>
            <ul>
                <li><code>/</code> — página inicial</li>
                <li><code>/produtos</code> — catálogo</li>
                <li><code>/contato</code> — página de contato</li>
                <li><code>/blog</code> — lista de posts</li>
                <li><code>/sobre</code> — página institucional</li>
                <li><code>/eventos</code> — agenda</li>
                <li><code>/client-documentation</code> — esta documentação</li>
            </ul>
        </div>

        <div class="card">
            <h2>Próximos passos</h2>
            <p>Aplicar essa mesma abordagem para os módulos de Admin, User, Product e Blog, mantendo consistência em todo o projeto.</p>
        </div>
    </div>
</body>
</html>
