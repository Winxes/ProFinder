---
name: Use Case
about: Descreve as interações entre os atores e o sistema
title: "[Use Case]"
labels: use-case
assignees: ''

---

**Use Case:**
Nome da interação. Ex. Finalizar Compra 

**Descrição Geral:**
Resuma objetivamente o contexto em que se inicia. Ex. Inicia quando o cliente deseja efetuar a compra dos produtos que já estão no carrinho.

**Atores:**
Quem está interagindo. Ex. Cliente

**Pré-Condições:**
O que se pressupõe já estar feito para iniciar o caso. Ex.: Cliente já logado; Produtos adicionados no carrinho.

 **Pós-Condições:**
O estado do software depois do caso ser finalizado. Ex.: Pedido fechado; Compra efetuada; Sistema aguarda confirmação de pagamento;

**Fluxo Básico:**
O caminho "feliz" de um caso executado com sucesso. 
Ex.: 
1 - Cliente clica em finalizar compra, sistema pede forma de pagamento e entrega;
1 - Cliente escolhe pagamento em cartão;
1 - Sistema solicita dados do cartão;
1 - Sistema valida os dados;
1- Sistema gera número do pedido;
1 - Compra finalizada

**Fluxo Alternativo:**
Outra possibilidade de caminho. 
Ex.: 
1 - Cliente clica em cancelar;
   - Sistema volta para carrinho;
