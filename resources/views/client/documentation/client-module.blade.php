<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documentação arquitetural — Client e Admin</title>
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
            max-width: 1200px;
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
        .grid {
            display: grid;
            gap: 1rem;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            margin-bottom: 1rem;
        }
        .card {
            border: 1px solid #e5e7eb;
            border-radius: 14px;
            padding: 1rem 1.2rem;
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
            <h1>Documentação arquitetural do projeto</h1>
            <p>Separação entre o fluxo público/Client e o fluxo administrativo/Admin, com organização mais clara por camadas.</p>
        </div>

        <div class="card">
            <h2>Visão geral</h2>
            <p>O projeto passou por uma reorganização inicial para reduzir acoplamento e deixar as regras de negócio mais fáceis de manter. A estrutura agora foi iniciada tanto no lado do Client quanto no lado do Admin, com foco em Presentation, Business e Data.</p>
        </div>

        <div class="card">
            <h2>Estrutura adotada</h2>
            <span class="badge">Presentation</span>
            <span class="badge">Business</span>
            <span class="badge">Data</span>
            <span class="badge">DTO</span>
            <span class="badge">Contracts</span>
            <ul>
                <li><strong>Presentation</strong>: controllers e requests responsáveis por receber a requisição.</li>
                <li><strong>Business</strong>: services com as regras específicas do domínio.</li>
                <li><strong>Data</strong>: repositórios para acesso e persistência.</li>
                <li><strong>DTO</strong>: transporte de dados entre camadas.</li>
                <li><strong>Contracts</strong>: interfaces para abstração e testes futuros.</li>
            </ul>
        </div>

        <div class="card">
            <h2>Fluxo de uma requisição</h2>
            <div class="flow">
                <strong>Route</strong> → <strong>Controller</strong> → <strong>Service</strong> → <strong>Repository</strong> → <strong>Model</strong>
            </div>
            <p>Esse fluxo torna o código mais previsível, facilita manutenção e deixa o entendimento do fluxo mais claro para novos desenvolvedores.</p>
        </div>

        <div class="grid">
            <div class="card">
                <h2>Módulo Client</h2>
                <ul>
                    <li>Controllers de páginas públicas reorganizados para Presentation.</li>
                    <li>Fluxos de Home, Blog, Produtos, Contato, Sobre e Eventos separados por responsabilidade.</li>
                    <li>Validação e tratamento de dados movidos para requests e services.</li>
                    <li>Documentação pública acessível através da rota <code>/client-documentation</code>.</li>
                </ul>
            </div>

            <div class="card">
                <h2>Módulo Admin</h2>
                <ul>
                    <li>Dashboard e rotas administrativas passaram a apontar para controllers de apresentação específicos.</li>
                    <li>Blog, Product e User já foram iniciados com a camada Business para concentrar a regra de negócio.</li>
                    <li>As ações de criação, edição, exclusão e ordenação foram organizadas para seguir esse novo padrão.</li>
                    <li>O objetivo é manter consistência entre o fluxo público e o painel administrativo.</li>
                </ul>
            </div>
        </div>

        <div class="card">
            <h2>O que já foi implementado</h2>
            <ul>
                <li>Estrutura modular iniciada para Client e Admin.</li>
                <li>Controllers de presentation criados para as rotas públicas e administrativas principais.</li>
                <li>Services com regras de negócio para Blog, Product, User e Dashboard.</li>
                <li>Rotas do painel e da área pública já apontando para essa organização inicial.</li>
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
            <p>Continuar a expansão desse padrão para os demais módulos administrativos, mantendo Client e Admin com uma estrutura consistente e fácil de evoluir.</p>
        </div>
    </div>
</body>
</html>
