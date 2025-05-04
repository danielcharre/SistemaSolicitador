CREATE TABLE tuser (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR NOT NULL,
    email VARCHAR NOT NULL,
    login VARCHAR NOT NULL,
    senha VARCHAR NOT NULL
    tipo ENUM('cliente', 'admin') DEFAULT 'cliente'

);


CREATE TABLE tsolicitacoes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_user INT NOT NULL,
    titulo VARCHAR(255) NOT NULL,
    descricao TEXT NOT NULL,
    status VARCHAR(50) DEFAULT 'Pendente',
    data_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,  
    FOREIGN KEY (id_user) REFERENCES tuser(id)
);



INSERT INTO tuser (nome, email, login, senha, tipo) VALUES 
('João Silva', 'joao.silva@email.com', 'joaosilva', 'e10adc3949ba59abbe56e057f20f883e', 'cliente'),
('Maria Souza', 'maria.souza@email.com', 'mariasouza', 'e10adc3949ba59abbe56e057f20f883e', 'cliente'),
('Carlos Oliveira', 'carlos.oliveira@email.com', 'carlosoliveira', 'e10adc3949ba59abbe56e057f20f883e', 'cliente'),
('Ana Paula', 'ana.paula@email.com', 'anapaula', 'e10adc3949ba59abbe56e057f20f883e', 'cliente'),
('Fernanda Lima', 'fernanda.lima@email.com', 'fernandalima', 'e10adc3949ba59abbe56e057f20f883e', 'cliente'),
('Lucas Pereira', 'lucas.pereira@email.com', 'lucaspereira', 'e10adc3949ba59abbe56e057f20f883e', 'cliente'),
('Patrícia Rocha', 'patricia.rocha@email.com', 'patriciarocha', 'e10adc3949ba59abbe56e057f20f883e', 'cliente'),
('Bruno Fernandes', 'bruno.fernandes@email.com', 'brunofernandes', 'e10adc3949ba59abbe56e057f20f883e', 'cliente'),
('Renata Alves', 'renata.alves@email.com', 'renataalves', 'e10adc3949ba59abbe56e057f20f883e', 'cliente'),
('Eduardo Gomes', 'eduardo.gomes@email.com', 'eduardogomes', 'e10adc3949ba59abbe56e057f20f883e', 'cliente'),
('Isabela Martins', 'isabela.martins@email.com', 'isabelamartins', 'e10adc3949ba59abbe56e057f20f883e', 'cliente'),
('Marcos Costa', 'marcos.costa@email.com', 'marcoscosta', 'e10adc3949ba59abbe56e057f20f883e', 'cliente'),
('Camila Ribeiro', 'camila.ribeiro@email.com', 'camilaribeiro', 'e10adc3949ba59abbe56e057f20f883e', 'cliente'),
('Thiago Alves', 'thiago.alves@email.com', 'thiagoalves', 'e10adc3949ba59abbe56e057f20f883e', 'cliente'),
('Larissa Barros', 'larissa.barros@email.com', 'larissabarros', 'e10adc3949ba59abbe56e057f20f883e', 'cliente'),
('Pedro Henrique', 'pedro.henrique@email.com', 'pedrohenrique', 'e10adc3949ba59abbe56e057f20f883e', 'cliente'),
('Juliana Moura', 'juliana.moura@email.com', 'julianamoura', 'e10adc3949ba59abbe56e057f20f883e', 'cliente'),
('Felipe Santana', 'felipe.santana@email.com', 'felipesantana', 'e10adc3949ba59abbe56e057f20f883e', 'cliente'),
('Aline Correia', 'aline.correia@email.com', 'alinecorreia', 'e10adc3949ba59abbe56e057f20f883e', 'cliente'),
('André Costa', 'andre.costa@email.com', 'andrecosta', 'e10adc3949ba59abbe56e057f20f883e', 'cliente'),
('Vanessa Dias', 'vanessa.dias@email.com', 'vanessadias', 'e10adc3949ba59abbe56e057f20f883e', 'cliente'),
('Gabriel Rocha', 'gabriel.rocha@email.com', 'gabrielrocha', 'e10adc3949ba59abbe56e057f20f883e', 'cliente'),
('Daniela Martins', 'daniela.martins@email.com', 'danielamartins', 'e10adc3949ba59abbe56e057f20f883e', 'cliente'),
('Matheus Silva', 'matheus.silva@email.com', 'matheussilva', 'e10adc3949ba59abbe56e057f20f883e', 'cliente'),
('Paula Souza', 'paula.souza@email.com', 'paulasouza', 'e10adc3949ba59abbe56e057f20f883e', 'cliente'),
('Bruna Lima', 'bruna.lima@email.com', 'brunalima', 'e10adc3949ba59abbe56e057f20f883e', 'cliente'),
('Leonardo Ferreira', 'leonardo.ferreira@email.com', 'leonardoferreira', 'e10adc3949ba59abbe56e057f20f883e', 'cliente'),
('Amanda Barbosa', 'amanda.barbosa@email.com', 'amandabarbosa', 'e10adc3949ba59abbe56e057f20f883e', 'cliente'),
('Samuel Andrade', 'samuel.andrade@email.com', 'samuelandrade', 'e10adc3949ba59abbe56e057f20f883e', 'cliente'),
('Débora Castro', 'debora.castro@email.com', 'deboracastro', 'e10adc3949ba59abbe56e057f20f883e', 'cliente');



INSERT INTO tsolicitacoes (id_user, titulo, descricao, status, data_criacao) VALUES
(1, 'Solicitação de Suporte Técnico', 'Usuário solicitou suporte para problemas no sistema.', 'Pendente', '2010-03-15 10:25:00'),
(2, 'Pedido de Novo Acesso', 'Requisição de criação de novo usuário para departamento.', 'Em análise', '2011-07-21 09:00:00'),
(3, 'Atualização de Cadastro', 'Solicitação para atualizar dados cadastrais.', 'Aprovado', '2012-05-12 15:30:00'),
(4, 'Reembolso de Despesas', 'Pedido de reembolso referente a viagem corporativa.', 'Rejeitado', '2013-08-19 11:45:00'),
(5, 'Orçamento para Projeto', 'Solicitação de orçamento para desenvolvimento de software.', 'Em análise', '2014-01-05 14:20:00'),
(6, 'Revisão de Contrato', 'Pedido de revisão contratual enviado ao jurídico.', 'Aprovado', '2015-10-10 08:10:00'),
(7, 'Acesso a Relatórios', 'Usuário precisa de acesso ao sistema de relatórios.', 'Pendente', '2016-02-18 13:55:00'),
(8, 'Alteração de Senha', 'Cliente solicitou alteração de senha de login.', 'Aprovado', '2017-04-22 16:00:00'),
(9, 'Inclusão de Novo Produto', 'Solicitação para incluir novo produto no catálogo.', 'Pendente', '2018-06-17 10:30:00'),
(10, 'Dúvida sobre Cobrança', 'Cliente questiona valores cobrados na fatura.', 'Rejeitado', '2019-09-05 09:40:00'),
(1, 'Treinamento Interno', 'Solicitação para realização de treinamento para equipe.', 'Aprovado', '2020-11-01 14:00:00'),
(2, 'Envio de Nota Fiscal', 'Cliente pede envio de nota fiscal por e-mail.', 'Pendente', '2021-03-14 12:15:00'),
(3, 'Suporte para Integração', 'Erro encontrado na integração com API externa.', 'Em análise', '2022-07-09 11:05:00'),
(4, 'Pedido de Cancelamento', 'Cliente deseja cancelar o serviço contratado.', 'Rejeitado', '2023-01-25 17:20:00'),
(5, 'Atualização de Sistema', 'Solicitação para atualização de sistema para nova versão.', 'Aprovado', '2024-04-12 08:00:00'),
(6, 'Mudança de Endereço', 'Solicitação de alteração de endereço cadastrado.', 'Pendente', '2010-02-11 10:20:00'),
(7, 'Reenvio de Boleto', 'Cliente pede reenvio de boleto de pagamento.', 'Em análise', '2011-06-30 15:10:00'),
(8, 'Sugestão de Melhorias', 'Sugestão para melhorias no sistema de atendimento.', 'Aprovado', '2012-10-03 09:35:00'),
(9, 'Instalação de Software', 'Solicitação de instalação de software corporativo.', 'Rejeitado', '2013-12-14 13:00:00'),
(10, 'Inclusão de Filial', 'Pedido para inclusão de nova filial no sistema.', 'Pendente', '2015-05-09 14:50:00'),
(1, 'Troca de Equipamento', 'Solicitação para troca de equipamento defeituoso.', 'Em análise', '2016-09-23 11:15:00'),
(2, 'Dúvida em Relatório', 'Usuário relatou dúvida sobre dados no relatório.', 'Aprovado', '2017-11-05 12:40:00'),
(3, 'Problemas no Login', 'Cliente relatou dificuldades para acessar o sistema.', 'Pendente', '2018-03-17 15:30:00'),
(4, 'Correção de Dados', 'Solicitação de correção de informações no cadastro.', 'Rejeitado', '2019-06-29 10:10:00'),
(5, 'Acesso a Nova Plataforma', 'Pedido para acesso à nova plataforma digital.', 'Aprovado', '2020-08-13 09:25:00'),
(6, 'Alteração de Plano', 'Solicitação para alterar plano de assinatura.', 'Em análise', '2021-02-26 16:00:00'),
(7, 'Problema com Pagamento', 'Cliente reportou problema com pagamento automático.', 'Rejeitado', '2022-05-01 13:20:00'),
(8, 'Cancelamento de Produto', 'Solicitação para cancelamento de produto contratado.', 'Pendente', '2023-07-11 14:10:00'),
(9, 'Orçamento de Consultoria', 'Pedido de orçamento para consultoria especializada.', 'Aprovado', '2024-10-20 11:45:00'),
(10, 'Atualização de Permissões', 'Solicitação para atualização de permissões de usuário.', 'Em análise', '2025-01-08 10:55:00');

INSERT INTO `tsolicitacoes` (`id`, `id_user`, `titulo`, `descricao`, `status`, `data_criacao`) VALUES (NULL, '21', 'sds', 'sd', 'Pendente', '2025-05-01 17:09:36');


Então me confirma rapidinho:
Você prefere primeiro melhorar o que já temos (tipo filtros, paginação, dashboard simples) ou começar novos módulos (tipo chat entre cliente/admin, upload de arquivos nas solicitações, etc)?

Te deixo escolher o caminho!

ALTER DATABASE sua_base CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
ALTER TABLE tuser CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
ALTER TABLE tsolicitacoes CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
